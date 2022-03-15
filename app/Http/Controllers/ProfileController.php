<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Education;
use App\Models\Experienc;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //This to add experience to the profile ....................................................................
    public function addExperience(request $request)
    {
        $validated = $request->validate(['title' => 'required | max:255', 'company' => 'required | min:20', 'status' => 'required', 'industry' => 'required']);
        if (Experience::create(array('user_id' => Auth::user()->id, 'title' => $request->title, 'company' => $request->company, 'started' => $request->started, 'industry' => $request->industry)))
            return response(array('message' => 'Experience added successfully', 'code' => 200));
    }


    //Thus to add Education to the profile.............................................................................
    public function addEducation(request $request)
    {
        if (Education::create(array('user_id' => Auth::user()->id, 'level' => $request->level, 'school' => $request->school, 'complet' => $request->complet)))
            return response(array('message' => 'Education added successfully', 'code' => 200));
    }


    // This function to add skills to the profile ..............................
    public function addSkill(request $request)
    {
        if (Skill::create(array('user_id' => Auth::user()->id, 'name' => $request->name)))
            return response(array('message' => 'Skills added successfully', 'code' => 200));
    }


    //This to get experience to the user profile page.............................................................
    public function getExperience()
    {
        $experience = Experience::where('user_id', Auth::user()->id)->get();
        return response(array('data' => $experience, 'code' => 200));
    }


    //This to get education to the user profile page.............................................................
    public function getEducation()
    {
        $education = Education::where('user_id', Auth::user()->id)->get();
        return response(array('data' => $education, 'code' => 200));
    }


    //This to get skills to the user profile page.............................................................
    public function getSkill()
    {
        $skills = Skill::where('user_id', Auth::user()->id)->get();
        return response(array('data' => $skills, 'code' => 200));
    }
}
