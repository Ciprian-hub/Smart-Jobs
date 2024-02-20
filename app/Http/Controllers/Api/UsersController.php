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

    public function getUsers()
    {
        return User::all();
    }
}
