<?php

namespace App\Http\Controllers;

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
        return view('applications.show',['applications'=>$user->jobApplications()->latest()->get()]);
    }

  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
