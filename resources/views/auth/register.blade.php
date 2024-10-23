@extends('layouts.auth_app')

@section('title', 'Create an Account')
@section('content')
    <div class="bg-white px-0 my-5" style="border-radius: 10px;">
        <div class="row">
            {{-- <div class="col-lg-7 pr-0">
                <img class="w-100" src="img/register-hero.jpg" alt="" height="568"
                    style="border-top-left-radius: 9px; border-bottom-left-radius: 9px;">
            </div> --}}
            <div class="col-lg-12 pl-0">
                <div class="registration form p-5">
                    <h2 class="mb-4 mt-1 text-center">Create an Account</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <input id="name" type="text" class="form-control form-control-lg" name="name"
                                value="{{ old('name') }}" placeholder="Name" autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <input id="email" type="email" class="form-control form-control-lg" name="email"
                                value="{{ old('email') }}" placeholder="Email" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <input id="password" type="password" class="form-control form-control-lg" name="password"
                                placeholder="Password" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <input id="password_confirmation" type="password" class="form-control form-control-lg"
                                name="password_confirmation" placeholder="Confirm Password" required
                                autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <!-- Address -->
                        <div class="mt-4">
                            <input id="address" type="text" class="form-control form-control-lg" name="address"
                                value="{{ old('address') }}" placeholder="Address" autofocus autocomplete="address" />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>

                        <!-- Shipping Address -->
                        <div class="mt-4">
                            <input id="shipping_address" type="text" class="form-control form-control-lg" name="shipping_address"
                                value="{{ old('shipping_address') }}" placeholder="Shipping Address" autofocus autocomplete="shipping_address" />
                            <x-input-error :messages="$errors->get('shipping_address')" class="mt-2" />
                        </div>

                        <!-- Phone Number -->
                        <div class="mt-4">
                            <input id="phone_number" type="text" class="form-control form-control-lg" name="phone_number"
                                value="{{ old('phone_number') }}" placeholder="Phone Number" autofocus autocomplete="phone_number" />
                            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                        </div>

                        {{-- register button --}}
                        <div class="mt-4">
                            <input type="submit" class="form-control form-control-lg text-white"
                                value="{{ __('Register') }}" style="background-color: #bd6b3d;">
                        </div>
                    </form>
                    <div class="mt-4">
                        <span class="h6 font-weight-normal">Already have an account? <a href="{{ route('login') }}"
                                class="login-link">Login</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
