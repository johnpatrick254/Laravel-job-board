<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class JobApplicationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(JobListing $job)
    {
        
        return view('job_applications.create', ['job' => $job]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobListing $job, Request $request)
    {
        //
        Gate::authorize('apply', $job);
        $job->JobApplications()->create([
            "user_id" => $request->user()->id,
            ...$request->validate(['expected_salary' => "required|min:1|max:100000"])
        ]);

        return redirect()->route('jobs.show', $job)->with('success', 'Application submitted successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
