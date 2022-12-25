<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Auth;
use App\Models\Gig;
use App\Models\Project;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Freelancer;

class AdminController extends Controller
{
    //show projects
    public function showClientProjects(Request $request)
    {
        if ($request->filled('search')) {
            $projects = Project::search($request->search)->paginate(10);
        } else {
            $projects = Project::paginate(10);
        }
        return view('admin.client.showProjects', compact('projects'));
    }

    //approve project
    // function to update the value of the status to 1:approved
    public function approved($id)
    {
        $project = Project::find($id);
        $project->status = 1;
        $project->save();
        return redirect()->route('showClientProjects')->with('success', 'Project has been approved');
    }

    public function showClientProjectsView($id)
    {
        $projectView = Project::find($id);
        return view('admin.client.showProjectView', compact('projectView'));
    }

    public function projectCanceledReason($id)
    {
        $project = Project::find($id);
        return view('admin.canceledprojects.canceledProjectReason', compact('project'));
    }

    // cancel project
    // function to update the value of the status to 2:canceled
    public function canceled(Request $request, $id)
    {
        $project = Project::find($id);
        $project->message = request('message');

        $project->status = 2;

        // dd($project->status);
        $project->save();
        return redirect()->route('showClientProjects')->with('success', 'Project has been Canceled');
    }


    //show gigs
    public function showFreelancerGigs(Request $request)
    {
        if ($request->filled('search')) {
            $gigs = Gig::search($request->search)->paginate(10);
        } else {
            $gigs = Gig::paginate(10);
        }
        return view('admin.freelancer.showGigs', compact('gigs'));
    }

    public function showFreelancerGigsView($id)
    {
        $gigView = Gig::find($id);
        return view('admin.freelancer.showGigView', compact('gigView'));
    }

    //approve gigs
    // function to update the value of the status to 1:approved
    public function gigApproved($id)
    {
        $gig = Gig::find($id);
        $gig->status = 1;
        // dd($gig->status);
        $gig->save();

        return redirect()->route('showFreelancerGigs')->with('success', 'Gig has been approved');
    }

    public function gigCanceledReason($id)
    {
        $gig = Gig::find($id);
        return view('admin.canceledgigs.canceledGigReason', compact('gig'));
    }




    // cancel gig
    // function to update the value of the status to 2:canceled
    public function gigCanceled(Request $request, $id)
    {
        $gig = Gig::find($id);
        $gig->message = request('message');
        $gig->status = 2;
        $gig->save();
        return redirect()->route('showFreelancerGigs')->with('success', 'Gig has been Canceled');
    }

    // Users List
    public function allUsers(Request $request)
    {
        if ($request->filled('search')) {
            $users = User::search($request->search)->paginate(10);
        } else {
            $users = User::paginate(10);
        }
        return view('admin.users.allusers', compact('users'));
    }

    public function deleteUser($id)
    {

        $user = User::find($id);
        if ($user->hasRole('Admin')) {
            return redirect()->route('allUsers')->with('error', 'Hey...Stupid!... You cannot Delete Yourself');
        } else {
            // $user->status = 0;
            $user->delete();
        }
        return redirect()->route('allUsers')->with('success', 'User deleted successfully');

    }

    public function totalProjects()
    {
        $pendingProjects = Project::where('status', '0')->count();
        $pendingGigs = Gig::where('status', '0')->count();
        $users = User::count();
        $freelancers = Freelancer::count();
        $clients = User::whereHas(
            'roles', function ($q) {
            $q->where('role_name', 'Client');
        }
        )->get()->count();

        $approvedProjects = Project::where('status', '1')->count();
        $canceledProjects = Project::where('status', '2')->count();

        $approvedGigs = Gig::where('status', '1')->count();
        $canceledGigs = Gig::where('status', '2')->count();
        $listings = $approvedProjects + $approvedGigs;

        return view('admin.dashboard', compact('pendingProjects', 'pendingGigs', 'users', 'freelancers', 'clients', 'approvedProjects', 'canceledProjects', 'approvedGigs', 'canceledGigs', 'listings'));

    }

    public function pendingProjects(Request $request)
    {
        if ($request->filled('search')) {
            $pendingProjects = Project::search($request->search)->paginate(10);
        } else {
            $pendingProjects = Project::where('status', '0')->paginate(10);
        }
        return view('admin.pendingprojects.pendingProjects', compact('pendingProjects'));

    }

    public function pendingProjectsApproved($id)
    {
        $project = Project::find($id);
        $project->status = 1;
        $project->save();
        return redirect()->route('pendingProjects')->with('success', 'Project has been approved');
    }

    // cancel project
    // function to update the value of the status to 2:canceled
    public function pendingProjectsCancelled($id)
    {
        $project = Project::find($id);
        $project->status = 2;

        // dd($project->status);
        $project->save();
        return redirect()->route('pendingProjects')->with('success', 'Project has been Canceled');
    }

    public function pendingProjectShow($id)
    {
        // $pendingProjectShow = Project::where('status', '0')->get();
        $pendingProjectShow = Project::find($id);
        return view('admin.pendingprojects.pendingProjectShow', compact('pendingProjectShow'));

    }


    public function pendingGigs(Request $request)
    {
        if ($request->filled('search')) {
            $pendingGigs = Gig::search($request->search)->paginate(10);
        } else {
            $pendingGigs = Gig::where('status', '0')->paginate(10);
        }
        return view('admin.pendinggigs.pendingGigs', compact('pendingGigs'));

    }

    public function pendingGigsApproved($id)
    {
        $gig = Gig::find($id);
        $gig->status = 1;
        $gig->save();
        return redirect()->route('pendingGigs')->with('success', 'Gig has been approved');
    }

    // cancel project
    // function to update the value of the status to 2:canceled
    public function pendingGigsCancelled($id)
    {
        $gig = Gig::find($id);
        $gig->status = 2;

        // dd($project->status);
        $gig->save();
        return redirect()->route('pendingGigs')->with('success', 'Gig has been Canceled');
    }

    public function pendingGigShow($id)
    {
        $pendingGigShow = Gig::find($id);
        return view('admin.pendinggigs.pendingGigShow', compact('pendingGigShow'));

    }

    public function freelancerList(Request $request)
    {
        $freelancer = User::whereHas(
            'roles', function ($q) {
            $q->where('role_name', 'freelancer');
        }
        )->paginate(10);

        return view('admin.freelancer.freelancerList', compact('freelancer'));

    }

    public function clientList()
    {
        $clients = User::whereHas(
            'roles', function ($q) {
            $q->where('role_name', 'Client');
        }
        )->paginate(10);
        return view('admin.client.clientList', compact('clients'));

    }

    public function approvedGigs(Request $request)
    {
        if ($request->filled('search')) {
            $approvedGigs = Gig::search($request->search)->paginate(10);
        } else {
            $approvedGigs = Gig::where('status', '1')->paginate(10);
        }
        return view('admin.freelancer.approvedGigs', compact('approvedGigs'));

    }

    public function approvedGigsShow($id)
    {
        $approvedGigShow = Gig::find($id);
        return view('admin.freelancer.approvedgigs.approvedGigsShow', compact('approvedGigShow'));

    }


    public function approvedProjects(Request $request)
    {
        if ($request->filled('search')) {
            $approvedProjects = Project::search($request->search)->paginate(10);
        } else {
            $approvedProjects = Project::where('status', '1')->paginate(10);
        }
        return view('admin.client.approvedprojects.approvedProjects', compact('approvedProjects'));

    }

    public function approvedProjectsShow($id)
    {
        $approvedProjectShow = Project::find($id);
        return view('admin.client.approvedprojects.approvedProjectsShow', compact('approvedProjectShow'));

    }

    public function canceledProjects()
    {
        $canceledProjects = Project::where('status', '2')->get();
        return view('admin.canceledprojects.canceledProjects', compact('canceledProjects'));

    }

    public function canceledProjectShow($id)
    {
        $canceledProjectShow = Project::find($id);
        return view('admin.canceledprojects.canceledProjectsShow', compact('canceledProjectShow'));

    }

    public function canceledGigs()
    {
        $canceledGigs = Gig::where('status', '2')->get();
        return view('admin.canceledgigs.canceledGigs', compact('canceledGigs'));


    }

    public function canceledGigsShow($id)
    {
        $canceledGigShow = Gig::find($id);
        return view('admin.canceledgigs.canceledGigsShow', compact('canceledGigShow'));

    }

}
