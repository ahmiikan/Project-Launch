<?php

namespace App\Http\Controllers\admin;

use App\Models\GigCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GigCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->filled('search')) {
            $gigCategories = GigCategory::search($request->search)->get();
        } else {
            $gigCategories = GigCategory::all();
        }
        return view('admin.gig.Categories.index', compact('gigCategories'));
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

        $gigCategory = new GigCategory;
        $gigCategory->name = $request->name;
        $gigCategory->save();

        return redirect()->route('gigCategories.index')->with('success', 'Gig Category added successfully.');
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
            $gigCategories = GigCategory::search($request->search)->get();
        } else {
            $gigCategories = GigCategory::all();
        }

        $category = GigCategory::find($id);
        return view('admin.gig.categories.edit', compact('gigCategories', 'category'));
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

        $gigCategory = GigCategory::find($id);
        $gigCategory->name = $request->name;
        $gigCategory->save();

        return redirect()->route('gigCategories.index')->with('success', 'Gig Category updated successfully.');
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
