<?php

namespace App\Http\Controllers\freelancer;

use App\Models\Gig;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Auth;

class FreelancerController extends Controller
{
    public function index()
    {
        $id = Auth::user()->freelancers->id;

        $pGigs = Gig::where([['status', '0'],
            ['freelancer_id', $id]])->count();
        $aGigs = Gig::where([['status', '1'],
            ['freelancer_id', $id]])->count();
        $cGigs = Gig::where([['status', '2'],
            ['freelancer_id', $id]])->count();
        $cProjects = Project::where('status', '1')->count();

        // dd($pGigs);
        return view('freelancer.dashboard', compact('pGigs', 'aGigs', 'cProjects', 'cGigs'));
    }


}
