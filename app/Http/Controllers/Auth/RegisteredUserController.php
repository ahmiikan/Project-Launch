<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Models\Country;
use App\Models\Expertise;
use App\Models\Freelancer;
use App\Models\SkillTag;
use App\Http\Requests\Auth\RegisterRequest;

class RegisteredUserController extends Controller
{

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */

    public function create()
    {
        $data['countries'] = Country::get(["name", "id"]);
        $data['expertises'] = Expertise::get(["name", "id"]);
        $data['skill_tags'] = SkillTag::get(["name", "id"]);
        // dd($skl);
        return view('auth.register', ['data' => $data]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = 'storage/images/profileimages/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }


        $user = User::create($input);
        $user->expertises()->attach($request->expertise);
        $user->skills()->attach($request->skills);

        // if user is client assign client role id
        if (!$request->freelancer == 1) {
            $user->roles()->attach(3);
        }

        if ($request->freelancer == 1) {
            $freelancer = Freelancer::create([
                'user_id' => $user->id,

                'qualification' => $request->qualification,
                'expertise' => $request->expertise,
                'skills' => $request->skills
            ]);
            // if user is freelancer assign freelancer role id
            $user->roles()->attach(2);
        }


        event(new Registered($user));

        Auth::login($user);

        // redirect the user after registration to respective dashboard
        if ($user->hasRole('Client')) {
            Auth::login($user);
            return redirect()->route('clientDashboard');
        } else if ($user->hasRole('Freelancer')) {
            Auth::login($user);
            return redirect()->route('freelancerDashboard');
        } else {
            return view('404 not found');
            // "Page not found" page will be shown
        }
    }
}
