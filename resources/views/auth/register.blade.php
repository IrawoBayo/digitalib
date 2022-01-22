@extends('layouts.auth')

@section('title', 'Signup')

@section('content')
    <div class="login-logo">
        <a href="#">
            <img src="images/back/icon/logo2.png" alt="DigiLib">
        </a>
    </div>
    <div class="login-form">        
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <input class="au-input au-input--full" type="text" name="matricno" placeholder="Matric Number" required>
                @error('matricno')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <input class="au-input au-input--full" type="text" name="firstname" placeholder="First Name" required>
                        @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <input class="au-input au-input--full" type="text" name="lastname" placeholder="Last Name" required>  
                        @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input class="au-input au-input--full" type="email" name="email" placeholder="Email Address" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="au-input au-input--full" type="text" name="phone" placeholder="Phone Number" required>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="au-input au-input--full" type="text" name="nationalId" placeholder="National ID Number" required>
                @error('nationalId')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required>
                @error('passsword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!-- <div class="form-group">
                <input class="au-input au-input--full"  id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password" required>
            </div> -->
            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Create my Account</button>
        </form>
        <div class="register-link">
            <p>
                Already have an account?
                <a href="{{ route('login') }}">Sign In Here</a> | 
                <a href="{{ url('/') }}">Go back Home</a>
            </p>
        </div>
    </div>
@endsection
