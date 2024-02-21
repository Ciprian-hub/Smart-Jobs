<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getUsersCount()
    {
        return User::all()->count();

    }

    public function getUsersType()
    {
        $userTypeSeeker = User::where('user_type', 'seeker')->count();
        $userTypeEmployer = User::where('user_type', 'employer')->count();
        return [
           'seekers' => $userTypeSeeker,
           'employers' => $userTypeEmployer
        ];
    }
}
