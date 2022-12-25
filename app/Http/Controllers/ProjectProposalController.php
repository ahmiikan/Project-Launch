<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use App\Models\ProjectProposal;

class ProjectProposalController extends Controller
{
    public function index(Request $request)
    {
        if ($request->filled('search')) {
            $projects = Project::search($request->search)->paginate(10);
        } else {

            $projects = Project::where('status', '1')->paginate(10);
        }

        return view('freelancer.projectProposal.index', compact('projects'));
    }

    public function create($project_id)
    {
        return view('freelancer.projectProposal.create', compact('project_id'));
    }


    public function store(Request $request)
    {
        $proposal = $request->validate([
            'description' => ['required', 'string', 'min:5', 'max:255'],
            'days' => ['required', 'integer'],
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
            'attachment' => 'required',
        ]);
        $fileName = time() . '.' . $request->attachment->getClientOriginalExtension();


        $request->attachment->move(public_path('uploads'), $fileName);
        $proposal['attachment'] = $fileName;
        $proposal['freelancer_id'] = $request->user()->freelancers->id;
        $proposal['project_id'] = $request->project_id;

        $created_proposal = ProjectProposal::create($proposal);
        return redirect()->route('projectList')->with('success', 'Proposal send successfully');

    }

    public function showProjectList($project_id)
    {
        $project = Project::find($project_id);
        $category = ProjectCategory::find($project->category_id);
        return view('freelancer.projectProposal.show', compact('project', 'category'));
    }

    public function showFullProposal($proposal_id)
    {
        $proposal = ProjectProposal::find($proposal_id);


        return view('client.project.showFullProposal', compact('proposal_id', 'proposal'));
    }


    public function downloadProposal($attachment)
    {
        $file = public_path('uploads/' . $attachment);
        return response()->download($file);
    }

    public function downloadProject($attachment)
    {
        $file = public_path('uploads/' . $attachment);
        return response()->download($file);
    }


}
