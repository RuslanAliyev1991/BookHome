@extends('layouts.app')

@section('content')
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Ana sehife</a></li>
                <li class="breadcrumb-item active" aria-current="page">Register</li>
            </ol>
        </div>
    </div>
</div>
<div class="container mb-5">
    <div class="row">
        <div class="col-md-6 mb-5 ml-5">
            <div class="row d-flex justify-content-center mt-5 mb-4">
                <h2>Register</h2>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control text" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="@error('name'){{ $message }} @enderror">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="@error('email'){{ $message }} @enderror">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control" name="password" autocomplete="new-password" placeholder="@error('password'){{ $message }} @enderror">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
