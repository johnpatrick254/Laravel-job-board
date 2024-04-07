<?php

namespace App\Policies;

use App\Models\JobApplication;
use App\Models\JobListing;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class JobListingPolicy
{

    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, JobApplication $jobApplication)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JobApplication $jobApplication)
    {
        //
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JobApplication $jobApplication)
    {
        //
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, JobApplication $jobApplication)
    {
        //
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JobApplication $jobApplication)
    {
        //
        return false;
    }

    public function apply(User $user, JobListing $job)
    {
        return !$job->hasUserApplied($user);
    }
}
