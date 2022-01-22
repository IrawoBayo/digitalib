<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
Use App\Book;
use App\Borrow;
use Facades\jpmurray\LaravelCountdown\Countdown;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $from = auth()->user()->rated_on;
        // $to = now();
        // $range = $to->diffInMonths($from);
        // return $range;
        $user = User::role('user')->count();
        $active = User::role('user')->where('status', 'active')->count();
        $suspended = User::role('user')->where('status', 'suspended')->count();
        $book = Book::count();
        $req = Borrow::where('status',0)->count();
        $list = Borrow::where('status',1)->count();
        $myBooks = Borrow::where('user_id',auth()->user()->id)->where('returned',0)->count();
        $myReq = Borrow::where('user_id',auth()->user()->id)->where('status',0)->count();

        return view('home', compact('user', 'active', 'suspended', 'book','req', 'list','myBooks','myReq'));
    }
}
