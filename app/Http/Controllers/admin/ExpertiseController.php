<?php

namespace App\Http\Controllers\admin;

use App\Models\Expertise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->filled('search')) {
            $expertises = Expertise::search($request->search)->get();
        } else {
            $expertises = Expertise::all();
        }
        return view('admin.freelancer.expertises.index', compact('expertises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:25']],
            ['name' => 'name is required']
        );

        $expertise = new Expertise;
        $expertise->name = $request->name;
        $expertise->save();

        return redirect()->route('expertises.index')->with('success', 'Expertise added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if ($request->filled('search')) {
            $expertises = Expertise::search($request->search)->get();
        } else {
            $expertises = Expertise::all();
        }

        $expertise = Expertise::find($id);
        return view('admin.freelancer.expertises.edit', compact('expertises', 'expertise'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:25']],
            ['name' => 'name is required']
        );

        $expertise = Expertise::find($id);
        $expertise->name = $request->name;
        $expertise->save();

        return redirect()->route('expertises.index')->with('success', 'Expertise updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
