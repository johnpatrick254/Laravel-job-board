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
        $validatedData = $request->validate(['expected_salary' => "required|min:1|max:100000", 'cv' => 'required|mimes:pdf|max:4048']);
        $file = $request->file('cv')->store('cvs', 'private');
        $job->JobApplications()->create([
            "user_id" => $request->user()->id,
            "expected_salary" => $validatedData['expected_salary'],
            "cv_path" => $file
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
