<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\JobApplication;
use App\Models\JobListing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\Job;

class MyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        //

        return view('my_jobs.index', ['jobs' => auth()->user()->employer
            ->jobListings()
            ->with(['employer', 'jobApplications', 'jobApplications.user'])

            ->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('my_jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {
        //

        auth()->user()->employer->jobListings()->create($request->validated());
        return redirect()->route('myjobs.index')->with('success', 'Job added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show(JobListing $myjob)
    {
        //
        return view('my_jobs.edit', ['job' => $myjob]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobRequest $request, JobListing $myjob)
    {
        //
        $myjob->update($request->validated());
        return redirect()->route('myjobs.index')->with('success', 'Job updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobListing $myjob)
    {
        //
        if (request()->user()->id === $myjob->employer->user_id) {
            $myjob->delete();
            return redirect()->route('myjobs.index')->with('success', 'Job deleted successfully');
        } else {
            return redirect()->route('myjobs.index')->with('error', 'job deletion failed. Insufficient permissions');
        }
    }
}
