@extends('layouts.auth',['title'=>__('t.signin')])

@section('content')
<div class="container" >
    <div class="row justify-content-center ">
        <div class="col-lg-5 col-md-7 login-card " style="">
{{--            <div class="card">--}}
{{--                <div class="card-header text-center bg-transparent">{{ __('t.welcome') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                   --}}
{{--                </div>--}}
{{--            </div>--}}
            <br>
            <div class=" text-center bg-transparent p-3">{{ __('t.welcome') }}</div>
                    @isset($route)
                    <form method="POST" action="{{ $route }}">
                    @else
                    <form method="POST" action="{{ route('login') }}">
                    @endisset
                            @csrf
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('t.email') }}</label>
                                <div class="col-md-7">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('t.password') }}</label>

                                <div class="col-md-7">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">

                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('t.rememberme') }}
                                        </label>

                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4 ">
                                    <br>
                                    <a href="/" class="btn btn-danger shadow text-white p-2 w-25 rounded-pill">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                    <button type="submit" class="btn btn-warning shadow text-white p-2 w-50 rounded-pill">
                                         {{ __('t.signin') }}
                                    </button>
                                    <br>
                                    @if (Route::has('login'))

                                    @endif

                                    @isset($route)@else
                                        <hr>
                                        <a class=" text-danger" href="{{ route('register') }}">
                                            {{ __("I don't have an account, create a new account") }}
                                        </a>
                                    @endisset
                                </div>
                            </div>
                        </form>
        </div>
    </div>
</div>
@endsection
