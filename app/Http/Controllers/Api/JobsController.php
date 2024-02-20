<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobsController extends Controller
{
    public function getJobs()
    {
        $date = Carbon::now()->subDays(30);
        $query = Job::query()
            ->select([DB::raw('CAST(created_at as DATE) AS day'), DB::raw('COUNT(created_at) as count')])
            ->groupBy(DB::raw('CAST(created_at as DATE)'))
            ->get();
        return [
            $query

        ];
    }

    public function getAllJobs()
    {
        return Job::all();
    }
}
