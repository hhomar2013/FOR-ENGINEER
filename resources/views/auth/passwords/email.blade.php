@extends('layouts.auth',['title'=>''])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7 login-card">

        <br>
        <div class=" text-center bg-transparent p-3">{{ __('Reset Password') }}</div>

        <form method="POST" action="{{ route('password.email') }}">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @csrf

            <div class="row mb-3">

                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i>  {{ __('t.Submit') }}
                    </button>
                </div>
            </div>
        </form>


        </div>
    </div>
</div>

@endsection
