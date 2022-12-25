<?php

namespace App\Http\Controllers\client;

use App\Models\Gig;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\ProjectProposal;
use App\Http\Controllers\Controller;
use Auth;

class ClientController extends Controller
{
    public function index()
    {
        $proposals = ProjectProposal::all();
        return view('client.freelancerProposalList', compact('proposals'));
    }

    public function countProjects()
    {
        $id = Auth::user()->id;
        $projects = Project::where([['status', '0'],
            ['user_id', $id]])->count();
        $aProjects = Project::where([['status', '1'],
            ['user_id', $id]])->count();
        $cProjects = Project::where([['status', '2'],
            ['user_id', $id]])->count();
        $gigs = Gig::where('status', '1')->count();
        return view('client.dashboard', compact('projects', 'aProjects', 'cProjects', 'gigs'));
    }

    public function gigView(Request $request)
    {
        if ($request->filled('search')) {
            $gigs = Gig::search($request->search)->paginate(10);
        } else {
            $gigs = Gig::where('status', '1')->paginate(10);
        }
        return view('client.gigView', compact('gigs'));
    }

    public function gigShow($gig_id)
    {
        $gig = Gig::find($gig_id);
        return view('client.gigShow', compact('gig'));
    }
}
