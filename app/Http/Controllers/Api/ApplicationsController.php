<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    public function getApplications()
    {
        $applicant = Application::query()
            ->join('users', 'user_id', '=', 'users.id')
            ->join('jobs', 'job_id', '=', 'jobs.id')
            ->select('users.name', 'company_name', 'jobs.title', 'jobs.salary', 'jobs.level')
            ->get()->limit(5);
      return $applicant;
    }
}
