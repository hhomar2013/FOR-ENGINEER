@extends('layouts.app' ,['title' => 'Verify'])

@section('content')
<div class="container">
    <div class="row justify-content-center text-center login-card">
        <div class="col-md-8">
{{--            <div class="card">--}}


{{--                <div class="card-body">--}}
{{--                    --}}
{{--                </div>--}}
{{--            </div>--}}


            <div class="card-header">{{ __('Verify Email Address') }}</div>
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            <br><br>
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf

                <button type="submit" class="btn btn-outline-warning text-decoration-none">{{ __('click here to request another') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
