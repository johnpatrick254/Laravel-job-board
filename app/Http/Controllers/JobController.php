<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $jobs = JobListing::query();
        $jobs->when(request('Search'), function ($query) {
            return $query->where('title', 'like', "%" . request('Search') . "%")->orWhere('description', 'like', "%" . request('Search') . "%");
        })->when(request('From'), function ($query) {
            return $query->where("salary", '>=', request('From'));
        })->when(request('To'), function ($query) {
            return $query->where('salary', '<=', request('To'));
        })->when((request('experience') !== 'null' && request('experience') !== null), function ($query) {
            return $query->where('experience', request('experience'));
        })->when((request('category') !== 'null' && request('category') !== null), function ($query) {
            return $query->where('category', request('category'));
        });
        return view('jobs.index', ['jobs' => $jobs->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(JobListing $job)
    {
        //
        return view('jobs.show', ["job" => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
