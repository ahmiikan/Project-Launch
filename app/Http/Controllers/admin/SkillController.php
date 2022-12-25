<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SkillTag;
use Illuminate\Http\Request;

class skillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->filled('search')) {
            $skills = SkillTag::search($request->search)->get();
        } else {
            $skills = SkillTag::all();
        }
        return view('admin.freelancer.skills.index', compact('skills'));
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

        $skill = new SkillTag;
        $skill->name = $request->name;
        $skill->save();

        return redirect()->route('skills.index')->with('success', 'Gig Skill added successfully.');
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
            $skills = SkillTag::search($request->search)->get();
        } else {
            $skills = SkillTag::all();
        }

        $skill = SkillTag::find($id);
        return view('admin.freelancer.skills.edit', compact('skills', 'skill'));
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

        $skill = SkillTag::find($id);
        $skill->name = $request->name;
        $skill->save();

        return redirect()->route('skills.index')->with('success', 'Gig Skill updated successfully.');
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
