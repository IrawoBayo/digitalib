@extends('layouts.auth')

@section('content')
    <div class="login-logo">
        <a href="#">
            <img src="images/back/icon/logo.png" alt="DigiLib">
        </a>
    </div>
    <div class="login-form">
        <form action="{{ url('post-login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Email Address</label>
                <input class="au-input au-input--full" id="email" type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input class="au-input au-input--full" id="passsword" type="password" name="password" placeholder="Password" required>
            </div>
            <button value="login" name="login" type="submit" class="au-btn au-btn--block au-btn--green m-b-20">sign in</button>
        </form>

@if (Route::has('password.request'))
    <a class="btn btn-link" href="{{ route('password.request') }}">
        {{ __('Forgot Your Password?') }}
    </a>
@endif
        <div class="register-link">
            <p>
                Don't have an account?
                <a href="{{ route('register') }}">Sign Up Here</a> | 
                <a href="{{ url('/') }}">Go back Home</a>
            </p>
        </div>
    </div>
@endsection
