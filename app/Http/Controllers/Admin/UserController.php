<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::role('user')->latest()->get();
        return view('admin.users.all-users')->with('users', $users);
    }

    public function active()
    {
        $users = User::role('user')->where('status', 'active')->latest()->get();
        return view('admin.users.active-users')->with('users', $users);
    }

    public function suspended()
    {
        $users = User::role('user')->where('status', 'suspended')->latest()->get();
        return view('admin.users.suspended-users')->with('users', $users);
    }
}
