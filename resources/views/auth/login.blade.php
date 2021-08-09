@extends('layouts.app')

@section('content')
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Ana sehife</a></li>
                <li class="breadcrumb-item active" aria-current="page">Login</li>
            </ol>
        </div>
    </div>
</div>
<div class="container mb-5">
    <div class="row">
        <div class="col-md-6 mb-5 ml-5">
            <div class="row d-flex justify-content-center mt-5 mb-4">
                <h2>Login</h2>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-right">{{ __('E-Mail Address')
                                }}</label>

                            <div class="col-md-9">
                                <input id="email" type="email" class="form-control"
                                    name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="@error('email'){{ $message }} @enderror">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-right">{{ __('Password')
                                }}</label>

                            <div class="col-md-9">
                                <input id="password" type="password"
                                    class="form-control" name="password" autocomplete="current-password" placeholder="@error('password'){{ $message }} @enderror">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                        old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection