<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        //
        return view('applications.show',['applications'=>$user->jobApplications()->with(['jobListing'=>fn($query)=>$query->withCount('jobApplications')->withAvg('jobApplications','expected_salary')],'jobListing.employer')->latest()->get()]);
    }

  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $user,JobApplication $application)
    {
        //
        $application->delete();
         
        return redirect()->back()->with('success','Job application removed.');

    }
}
