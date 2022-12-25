<?php

namespace App\Http\Controllers\client;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\ProjectCategory;
use App\Http\Controllers\Controller;
use App\Models\Freelancer;
use App\Models\ProjectProposal;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->filled('search')) {
            $projects = Project::search($request->search);
        } else {
            $projects = Project::all();
        }
        return view('client.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProjectCategory::get(['name', 'id']);
        return view('client.project.create', compact('categories'));
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
            'title' => ['required', 'min:3'],
            'description' => ['required', 'string', 'min:5'],
            'category' => ['required', 'exists:project_categories,id'],
            'budget' => ['required'],
            'duration' => ['required', 'numeric', 'min:1'],
            'attachment' => 'required',
        ]);

        $project = new Project;
        $fileName = time().'.'.$request->attachment->getClientOriginalExtension();  
        $request->attachment->move(public_path('uploads'), $fileName);
        $project['attachment'] = $fileName;

        $project->title = $request->title;
        $project->description = $request->description;
        $project->budget = $request->budget;
        $project->duration = $request->duration;
        $project->category_id = $request->category;
        $project['user_id'] = $request->user()->id;
        $project->save();
        return redirect()->route('projects.index')->with('success', 'Project added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('client.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $projectCategoryId = $project->category_id;
        $projectCategory = ProjectCategory::find($projectCategoryId);
        $categories = ProjectCategory::get(['name', 'id']);
        return view('client.project.edit', compact('project', 'categories', 'projectCategory'));
    }

    /**php
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $project->title = $request->title;
        $project->description = $request->description;
        $project->budget = $request->budget;
        $project->duration = $request->duration;
        $project->category_id = $request->category;
        if ($request->hasFile('attachment')) {
            $fileName = time() . '.' . $request->attachment->getClientOriginalExtension();


            $request->attachment->move(public_path('uploads'), $fileName);

            $project['attachment'] = "$fileName";
        } else {
            unset($project['attachment']);
        }


        $input['user_id'] = $request->user()->id;
        $project->save();
        if ($project->status == 2) {
            $project->status = 0;
            $project->save();
        }
        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }

    public function showProposal($project_id)
    {
        $project = Project::find($project_id);
        $project_proposals = ProjectProposal::where('project_id', $project_id)->get();

        $project_proposals_count = ProjectProposal::where('project_id', $project_id)->count();
        return view('client.project.showProposals', compact('project_proposals', 'project', 'project_proposals_count'));
    }


    public function hireFreelancer($freelancer_id, $project_id)
    {
        $project = Project::find($project_id);
        $freelancer = Freelancer::find($freelancer_id);
        $project->assign_to = $freelancer_id;
        $project->save();
        return view('client.project.showHiredFreelancer')->with('success', 'Freelancer hired successfully.');
    }


    public function approvedProjectList()
    {
        $approvedProjects = Project::where('status', '1')->get();
        return view('client.approvedProjects', compact('approvedProjects'));

    }

    public function approvedProjectListShow($id)
    {
        $approvedProjectsShow = Project::find($id);
        return view('client.approvedProjectsShow', compact('approvedProjectsShow'));
    }

    public function pendingProjectList()
    {
        $pendingProjects = Project::where('status', '0')->get();
        return view('client.pendingProjects', compact('pendingProjects'));
    }

    public function pendingProjectListShow($id)
    {
        $pendingProjects = Project::find($id);
        return view('client.pendingProjectsShow', compact('pendingProjects'));
    }

    public function canceledProjectList()
    {
        $canceledProjects = Project::where('status', '2')->get();
        return view('client.cancelledProjects', compact('canceledProjects'));
    }

    public function canceledProjectListShow($id)
    {
        $canceledProjects = Project::find($id);
        return view('client.cancelledProjectsShow', compact('canceledProjects'));
    }


}
