@extends('layouts.app')

@section('content')
<div class="container col-lg-5 container_form nav_space login-space">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card clean">
                <div class="card-header clean">
                <h1><b>Waste Pick-Up Service (B3)</b></h1>
                <p class="pt-2">Log in to request waste pick-up and track your previous orders.</p>
                </div> 

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control form_custom @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('Email Address*') }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control form_custom @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Password*') }}">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-check pt-2">
                                    <input class="form-check-input custom-check" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label secondary-color" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link secondary-color" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary col-md-12 form_custom">
                                    {{ __('Sign In') }}
                                </button>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-12 pt-3">
                                <p>
                                    Don't have an account? <a href="/register" class="secondary-color">Sign Up Today!</a> 
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
