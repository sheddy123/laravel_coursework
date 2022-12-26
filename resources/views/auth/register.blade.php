@extends('layouts.app')

@section('content')
    <div class="mx-4">
        <div class="bg-[#25313ef0] border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl text-white font-bold uppercase mb-1">
                    Register
                </h2>
            </header>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-6">
                    <label for="name" class="inline-block text-white text-lg mb-2">
                        Name <span style="color:red">*</span>
                    </label>
                    <input id="name" type="text" class="form-control z-0 focus:shadow focus:outline-none @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="inline-block text-white text-lg mb-2">Email <span style="color:red">*</span></label>
                    <input id="email" type="email" class="form-control z-0 focus:shadow focus:outline-none @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                    <!-- Error Example -->

                </div>

                <div class="mb-6">
                    <label for="password" class="inline-block text-white text-lg mb-2">
                        Password <span style="color:red">*</span>
                    </label>
                    <input id="password" type="password"
                                        class="form-control z-0 focus:shadow focus:outline-none @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password2" class="inline-block text-white text-lg mb-2">
                        Confirm Password <span style="color:red">*</span>
                    </label>
                    <input id="password-confirm" type="password" class="form-control z-0 focus:shadow focus:outline-none"
                                        name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-[#881337] text-white rounded py-2 px-4 hover:bg-black">
                        {{ __('Register') }}
                    </button>
                </div>

                <div class="mt-8">
                    <p class="text-white">
                        Already have an account?
                        <a href="{{ url('login') }}" class="text-[#f4bfbf] hover:text-[#881337]">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

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
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
