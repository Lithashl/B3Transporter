@extends('layouts.app')

@section('content')
<div class="container col-lg-5 container_form nav_space">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card clean">
                <div class="card-header clean">
                    <h1><b>{{ __('Waste Pick-Up Service (B3)') }}</b></h1>
                    <p id="register-header">{{__('Create your account and schedule waste pick-ups easily')}}</p>
                    <!-- <p class="pt-2">{{__('Create your account and schedule waste pick-ups easily')}}</p>  -->
                </div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control form_custom @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="{{ __('Name*') }}" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control form_custom @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('Email Address*') }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control form_custom @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Password*') }}">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control form_custom" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password*') }}">
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-12">
                                <input id="phone-number" type="phone" class="form-control form_custom" name="phone_number" required placeholder="{{ __('Phone Number*') }}">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary col-md-12 form_custom">
                                    {{ __('Sign Up') }}
                                </button>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-12 pt-3">
                                <p>
                                    Already have an account? <a href="/login" class="secondary-color">Sign In</a> 
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
