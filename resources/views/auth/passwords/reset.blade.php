@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="text-center text-uppercase text-secondary mb-0">{{ __('Reset Password') }}</h4>
    <hr class="divider my-4">
    <p class="text-center text-uppercase text-secondary mb-0">Kini kami hadir sebagai surga kecil untuk Anda.</p>
    <br>
    <div class="row">
        <div class="col-lg-8 mx-auto">

            <form method="POST" action="{{ route('password.update') }}">

                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label for="email" class="col-md-4 col-form-label">{{ __('E-Mail Address') }}</label>

                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
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

                <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <hr>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <button type="submit" class="btn btn-primary btn-xl js-scroll-trigger">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
