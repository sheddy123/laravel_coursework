@extends('layouts.app')

@section('content')
    <div class="mx-4">
        <div class="bg-[#25313ef0] border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold text-white uppercase mb-1">
                    Log In
                </h2>
            </header>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2 text-white">Email <span style="color:red"> *</span></label>
                    <input id="email" type="email"
                        class="border border-gray-200 rounded p-2 w-full z-0 focus:shadow focus:outline-none @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="inline-block text-lg mb-2 text-white">
                        Password <span style="color:red">*</span>
                    </label>
                    <input type="password" class="border border-gray-200 rounded p-2 w-full z-0 focus:shadow focus:outline-none" name="password" required
                        autocomplete="current-password" />

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-[#881337] text-white rounded py-2 px-4 hover:bg-black">
                        Sign In
                    </button>
                </div>

                <div class="mt-8">
                    <div class="form-check">
                        <input class="form-check-input " type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label text-white" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    <p class="text-white">
                        Don't have an account?
                        <a href="{{url('register')}}" class="text-[#f4bfbf] hover:text-[#881337]">Register<br />
                            @if (Route::has('password.request'))
                                <a class="text-[#f4bfbf] hover:text-[#881337]" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </a>
                    </p>

                </div>
            </form>
        </div>
    </div>

    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

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
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
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
        </div>
    </div> --}}
@endsection
