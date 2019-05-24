@extends('layouts.app')

@section('content')
<section class="page-section" id="services">
<div class="container">

    <div class="text-center mt-0">
        <h3><b>{{ Auth::user()->name }}, {{ __('Verify Your Email Address') }}!</b></h3>
    </div>
    <hr class="divider my-4">

    <div class="row">
        <div class="col text-center">

            @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
            @endif

            <h5>
                {{ __('Before proceeding, please check your email for a verification link.') }} 
                {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}"><br>{{ __('click here to request another') }}</a>.
            </h5>
            <br>
            <div>
                <a href="{{ url('public') }}" class="btn btn-primary btn-xl js-scroll-trigger">Belanja Sekarang</a>
            </div>
        </div>
    </div>
</div>
@endsection
