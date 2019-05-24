@extends('layouts.app')

@section('content')
<section id="contact">
<div class="container">
    <h4 class="text-center text-uppercase text-secondary mb-0">{{ __('Login') }}</h4>
    <hr class="divider my-4">
    <p class="text-center text-uppercase text-secondary mb-0">Kini kami hadir sebagai surga kecil untuk Anda.</p>
    <br>

    <div class="row">
        <div class="col-lg-8 mx-auto">

            <form name="sentMessage" id="contactForm" novalidate="novalidate" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label for="email" class="col-md-4 col-form-label">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        <p class="help-block text-danger"></p>
                    </div>
                </div>

                <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <br>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <button type="submit" class="btn btn-primary btn-xl js-scroll-trigger">
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

</section>
@endsection
