<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Expertise;
use App\Models\SkillTag;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileViewsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user['countries'] = Country::get(['name', 'id']);
        $user['expertise'] = Expertise::get(['name', 'id'])->diff($user->expertises);
        $user['skill_tags'] = SkillTag::get(['name', 'id'])->diff($user->skills);

        return view('profileView', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $update = $this->validate($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'country_id' => 'required',
            'qualification' => [Rule::requiredIf($user->hasRole('Freelancer'))],
            'expertise' => [Rule::requiredIf($user->hasRole('Freelancer'))],
            'skills' => [Rule::requiredIf($user->hasRole('Freelancer'))],
        ]);

        if ($image = $request->file('image')) {
            $destinationPath = 'storage/images/profileimages/';
            $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $update['image'] = "$profileImage";
        } else {
            unset($update['image']);
        }
        $user->update($update);
        if ($user->hasRole('Freelancer')) {
            $user->freelancers->update($update);
            if (isset($request->expertise)) {
                $user->expertises()->sync($request->expertise);
            } else {
                $user->expertises()->sync([]);
            }
            if (isset($request->skills)) {
                $user->skills()->sync($request->skills);
            } else {
                $user->skills()->sync([]);
            }
        }
        return redirect()
            ->back()
            ->with('success', 'Profile updated successfully');
    }

    public function deleteUser()
    {
        $user = Auth::user();
        Auth::logout();

        if ($user->delete()) {
            return redirect()
                ->route('register')
                ->with('success', 'Profile deleted successfully');
        }
    }
}
