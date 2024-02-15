<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function getJobs()
    {
        return Job::all()->count();
    }
}
