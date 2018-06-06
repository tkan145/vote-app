@extends('layouts.page')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="bd-card">
        <div class="bd-card-header">
          <h3>{{ __('Sign in') }}</h3>
          <p>or <a href="{{ route('register') }}">create an account</a></p>
        </div>

        <div class="bd-card-body">

          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group row">
              <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

              <div class="col-md-8">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group row">

              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

              <div class="col-md-8">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
              <div class="col-md-6 offset-md-4">
                <small id="passwordHelpBlock" class="form-text text-muted">This page is subject to the <a href="https://policies.google.com/privacy">Google Privacy Policy</a> and <a href="https://policies.google.com/terms">Terms of Service</a>.</small>
              </div>
           </div>


            <div class="form-group row">
              <div class="col-md-8 offset-md-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-8 offset-md-4">
                <button class="btn btn-primary" type="submit">{{ __('Login') }}</button>
                <a class="btn btn-link btn-sm" href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a>
              </div>
            </div>
          </form>

          <hr>
          <div class="text-center row justify-content-md-center">
            <div class="col-md-8">
              <a href="{{ url('/redirectLinkedIn') }}" class="btn btn-info btn-block waves-effect waves-light btn-block google">Login With Linkedin</a>
              <a href="{{ url('/redirectGoogle') }}" class="btn btn-danger btn-block">Login With Google</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
