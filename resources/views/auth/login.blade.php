@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h2>
                        <b>{{ __('Login') }}</b>
                    </h2>
                </div>

                <div class="body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" id="sign_in">
                        @csrf

                        <div class="form-group">

                            <div class="form-line">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus/>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <label for="email">{{ __('Password') }}</label>
                                <input id="password" type="password" placeholder="{{ __('Password') }}" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required/>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                             <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Login') }}
                            </button>
                            <br>
                            <div class="align-center">
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
