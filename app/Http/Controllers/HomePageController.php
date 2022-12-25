<?php

namespace App\Http\Controllers;

use App\Models\Gig;
use App\Models\Project;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $gigs = Gig::all()->take(6);

        return view('welcome', compact('gigs'));
    }

    public function show($id, Gig $gig)
    {
        $gig = $gig->find($id);
        return view('homepage.show', compact('gig'));
    }

    public function showProjects(Request $request)
    {
        if ($request->filled('search')) {
            $projects = Project::search($request->search)->paginate(10);

        } else {
            $projects = Project::paginate(10);
        }
        return view('homepage.projectsShow', compact('projects'));
    }

    public function downloadHomeProject($attachment)
    {
        $file = public_path('uploads/' . $attachment);
        return response()->download($file);
    }

    public function showGigs(Request $request)
    {
        if ($request->filled('search')) {
            $gigs = Gig::search($request->search)->paginate(10);
        } else {
            $gigs = Gig::paginate(10);
        }
        return view('homepage.gigsShow', compact('gigs'));
    }
}
