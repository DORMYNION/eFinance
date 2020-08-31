@extends('layouts.auth')
@section('content')

<div class="card login-card">
    <div class="row no-gutters">
        <div class="col-md-5">
            <img src="{{ asset('img/login.jpeg') }}" alt="login" class="login-card-img">
        </div>
        <div class="col-md-7">
            <div class="card-body">
                <div class="brand-wrapper">
                    <img src="{{ asset('img/efinance-logo.png')}}" alt="logo" class="logo">
                </div>
                <p class="login-card-description">Sign into your account</p>

                @if(session('message'))
                    <div class="alert alert-info" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group mb-4">
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group mb-4">
                        <div class="form-check checkbox">
                            <input class="form-check-input" name="remember" type="checkbox" id="remember" style="vertical-align: middle;" />
                            <label class="forgot-password-link pl-3" for="remember" style="vertical-align: middle;">
                                {{ trans('global.remember_me') }}
                            </label>
                        </div>
                    </div>
                    <button id="login" type="submit" class="btn btn-block login-btn mb-4">
                        {{ trans('global.login') }}
                    </button>
                    
                </form>
                @if(Route::has('password.request'))
                    <a class="forgot-password-link" href="{{ route('password.request') }}">
                        {{ trans('global.forgot_password') }}
                    </a><br>
                @endif
                <nav class="login-card-footer-nav">
                    <a href="https://www.efinanceng.com/terms.php">Terms of use.</a>
                    <a href="https://efinanceng.com/privacy.php">Privacy policy</a>
                </nav>
            </div>
        </div>
    </div>
</div>

@endsection