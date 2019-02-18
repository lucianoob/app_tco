<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
    public function index() 
    {
        $users = DB::table('users')->get();
        return $users;
    }

    public function show(User $user) 
    {
        return $user;
    } 
}
