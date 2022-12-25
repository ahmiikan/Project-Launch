<?php

namespace App\Http\Controllers;

use App\Models\Gig;
use App\Models\GigCategory;
use Illuminate\Http\Request;

class GigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->filled('search')) {
            $gigs = Gig::search($request->search)->paginate(1);
        } else {
            $gigs = Gig::all();
        }
        return view('freelancer.gig.index', compact('gigs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = GigCategory::get(['name', 'id']);
        return view('freelancer.gig.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:70'],
            'description' => ['required', 'string', 'min:10', 'max:255'],
            'category_id' => 'required|integer',
            'amount' => "required|regex:/^\d+(\.\d{1,2})?$/",
            'image' => 'required',
            'duration' => 'required|integer',
        ]);
        $validated['freelancer_id'] = $request->user()->freelancers->id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = 'storage/images/gigImages/';
            $gigImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $gigImage);
            $validated['image'] = "$gigImage";
        } else {
        }
        $validated['gig_commission'] = 10;
        $validated['gig_amount_after_commission'] = $validated['amount'] + $validated['amount'] * ($validated['gig_commission'] / 100);

        $created_gig = Gig::create($validated);

        return redirect()
            ->route('gigs.index')
            ->with('success', 'Gig Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Gig $gig)
    {
        return view('freelancer.gig.show', compact('gig'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gig $gig)
    {
        $gigCategoryId = $gig->category_id;
        $gigCategory = GigCategory::find($gigCategoryId);
        $categories = GigCategory::get(['name', 'id']);

        return view('freelancer.gig.edit', compact('gig', 'categories', 'gigCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gig $gig)
    {
        $update = $request->validate(
            [
                'title' => ['required', 'string', 'min:5', 'max:70'],
                'description' => ['required', 'string', 'min:10', 'max:255'],
                'category_id' => 'required',
                'amount' => "required|regex:/^\d+(\.\d{1,2})?$/",
                'duration' => 'required',
            ],
            [
                'title.required' => 'Title is required',
                'description.required' => 'Description is required',
                'category.required' => 'Category is required',
                'amount.required' => 'Price is required',
                'duration.required' => 'Duration is required',
            ],
        );

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = 'storage/images/gigImages/';
            $gigImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $gigImage);
            $update['image'] = "$gigImage";
        } else {
            unset($update['image']);
        }
        $update['freelancer_id'] = $request->user()->freelancers->id;
        $gig->update($update);
        if ($gig->status == 2) {
            $gig->status = 0;
            $gig->save();
        }
        return redirect()
            ->route('gigs.index')
            ->with('success', 'Gig Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gig $gig)
    {
        $gig->delete();

        return redirect()
            ->route('gigs.index')
            ->with('success', 'Gig Deleted Successfully');
    }

    public function pendingGigsList()
    {
        $pendingGigs = Gig::where('status', '0')->get();
        return view('freelancer.pendingGigsList', compact('pendingGigs'));

    }

    public function pendingGigsListShow($id)
    {
        $pendingGigShow = Gig::find($id);
        return view('freelancer.pendingGigListShow', compact('pendingGigShow'));
    }

    public function approvedGigsList()
    {
        $approvedGigs = Gig::where('status', '1')->get();
        return view('freelancer.approvedGigs', compact('approvedGigs'));

    }

    public function approvedGigsListShow($id)
    {
        $approvedGigs = Gig::find($id);
        return view('freelancer.approvedGigsListShow', compact('approvedGigs'));
    }

    public function canceledGigs()
    {
        $canceledGigs = Gig::where('status', '2')->get();
        return view('freelancer.canceledGigs', compact('canceledGigs'));

    }

    public function canceledGigsShow($id)
    {
        $canceledGigShow = Gig::find($id);
        return view('freelancer.canceledGigsShow', compact('canceledGigShow'));
    }

}
