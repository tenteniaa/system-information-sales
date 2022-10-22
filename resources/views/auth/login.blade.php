@extends('layouts.app')

@section('content')
<link href="{{ asset('css/stylelogin.css') }}" rel="stylesheet">
<div class="container-fluid ps-md-0">
  <div class="row g-0">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">Welcome back!</h3>

              <!-- Sign In Form -->
              <form method="POST" action="{{ route('login') }}">
              @csrf
                <div class="form-floating mb-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                              @enderror
                <label for="floatingInput">{{ __('Email Address') }}</label>
                </div>
                <div class="form-floating mb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                  <label for="floatingPassword">{{ __('Password') }}</label>
                </div>

                <div class="d-flex mb-3 align-items-center">
                  <label class="form-check-label" for="rememberPasswordCheck"><span class="caption">{{ __('Remember Me') }}</span>
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <div class="control__indicator"></div>
                  </label>
                  <span class="ms-auto">
                  @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                @endif
                  </span>
                </div>
                <div class="d-grid">
                  <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">{{ __('Login') }}</button>
                </div>
              </form>
              <div class="d-grid">
                  <button class="btn btn-lg btn-google btn-login fw-bold text-uppercase"  value="Input Button" onclick=" google_login()">
                  <i class="fab fa-google me-2"></i> Sign in with Google
                  </button>
                  <script>
                    function google_login()
                        {
                            location.href = "{{ route('auth.google') }}";
                        } 
                  </script>
                  <div class="text-center">
                    <span>
                    @if (Route::has('register'))
                                    <a class="d-block text-center mt-2 small" href="{{ route('register') }}">{{ __("Don't have an account? Sign Up") }}</a>
                            @endif
                    </span>
                  </div>
                  <div class="d-grid">
                  <button class="btn btn-lg btn-success btn-login text-uppercase fw-bold mb-2"  value="Input Button" onclick=" login_sso()">{{ __('Login SSO') }}</button>
                   <script>
                    function login_sso()
                        {
                            location.href = "{{ route('sso.login') }}";
                        } 
                  </script>
                </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
