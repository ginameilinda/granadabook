@extends('layouts.app')

@section('content')
<section id="contact">
<div class="container">
    <h4 class="text-center text-uppercase text-secondary mb-0">{{ __('Reset Password') }}</h4>
    <hr class="divider my-4">
    <p class="text-center text-uppercase text-secondary mb-0">Kini kami hadir sebagai surga kecil untuk Anda.</p>
    <br>

    <div class="row">
        <div class="col-lg-8 mx-auto">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <hr>

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <button type="submit" class="btn btn-primary btn-xl js-scroll-trigger">
                                    {{ __('Send Password Reset Link') }}
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
