@extends('layouts.auth_app')

@section('title', 'Login')
@section('content')
    <div class="bg-white" style="border-radius: 10px;">
        <div class="col-lg-12">
            <div class="registration form p-5">
                <h2 class="mb-4 text-center">Login</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mt-4">
                        <input type="text" name="email" class="form-control form-control-lg" placeholder="Enter your email">
                    </div>

                    <div class="mt-4">
                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Enter your password">
                    </div>

                    <div class="mt-4">
                        <a class="h6 font-weight-normal" href="{{ route('password.request') }}">Forgot password?</a>
                    </div>

                    <div class="mt-4">
                        <input type="submit" class="form-control form-control-lg text-white" value="Login"
                            style="background-color: #bd6b3d;">
                    </div>
                </form>
                <div class="mt-3">
                    <span class="h6 font-weight-normal">Don't have an account? <a class="login-link"
                            href="{{ route('register') }}">Signup</a></span>
                </div>
            </div>
        </div>
    </div>
@endsection
