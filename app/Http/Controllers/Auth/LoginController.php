<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Session;
use App\Borrow;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function suspend()
    {
        $borrows = Borrow::where('due_date','<',now()->addMinutes(60))
                    ->where('returned',0)
                    ->get();
        foreach ($borrows as $borrow){
            $user = User::where('id',$borrow->user_id)->first();
            if($user->rating >= 2 && $user->rating <= 5){
                $user->update([
                    'rating' => $user->rating - 1,
                    'rated_on' => now()
                ]);
                $borrow->update([
                    'returned' => 1
                ]);
            }else{
                $user->update([
                    'status' => 'suspended',
                    'suspended_till' => now()->addMonth(2),
                    'rated_on' => now()
                ]);
                foreach($user->borrow as $borrow){
                    $borrow->update([
                        'returned' => 1
                    ]);
                }
            }
        }
        // return $user;
    }

    public function rate()
    {
        $users = User::role('user')->get();
        foreach ($users as $user) {
            $from = $user->rated_on;
            $to = now()->addMinutes(60);
            $range = $to->diffInMonths($from);

            if($range >= 1){
                if($user->rating < 5){
                    $user->update([
                        'rating' => $user->rating + 1
                    ]);
                }
            }
            // return $user;
        }
    }

    public function postLogin(Request $request)
    {
        request()->validate([
        'email' => 'required',
        'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $getId = Auth::user()->id;
            $user = Auth::user();
            // Authentication passed...
            if($user->status == 'active'){
                $this->suspend();
                $this->rate();
                return redirect()->intended('home');
            }else if($user->status == 'suspended'){
                if($user->suspended_till > now()->addMinutes(60)){
                    Session::flush();
                    Auth::logout();
                    return redirect('/suspended/'.$getId);
                }else{
                    $user->update([
                        'status' => 'active',
                        'suspended_till' => null
                    ]);
                    return redirect()->intended('home');
                }
                // return Redirect::to("login")->withSuccess('Oppes! You have entered invalid credentials');
            }
        }
        return Redirect::to("login")->with('warning','Opps! You have entered invalid credentials');
    }
}
