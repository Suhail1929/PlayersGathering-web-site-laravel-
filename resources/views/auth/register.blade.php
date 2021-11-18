@extends('layouts.app')

@section('content')

<div class="px-5 py-5 p-lg-0 bg-surface-secondary">
    <div class="d-flex justify-content-center">
        <div class="col-lg-5 col-xl-4 p-12 p-xl-20 position-fixed start-0 top-0 h-screen overflow-y-hidden bg-primary d-none d-lg-flex flex-column" style="height: 100%;">
            <!-- Circle -->
            <div class="w-56 h-56 bg-orange-500 rounded-circle position-absolute bottom-0 end-20 transform translate-y-1/3"></div>
        </div>
        <div class="col-12 col-md-9 col-lg-7 offset-lg-5 border-left-lg min-h-lg-screen d-flex flex-column justify-content-center py-lg-16 px-lg-20 position-relative">
            <div class="row">
                <div class="col-lg-10 col-md-9 col-xl-6 mx-auto ms-xl-0">
                    <div class="mt-10 mt-lg-5 mb-3 d-flex align-items-center d-lg-block">
                        <h1 class="ls-tight font-bolder h3">
                            {{ __('Créer un compte') }}
                        </h1>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-5">
                            <label class="form-label" for="email">{{ __('Nom') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label class="form-label" for="email">{{ __('Adresse Mail') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label class="form-label" for="password">{{ __('Mot de Passe') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label class="form-label" for="password-confirm">{{ __('Confirmation du mot de passe') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary w-full">
                                {{ __('Sign up') }}
                            </button>
                        </div>
                    </form>
                    <div class="my-3">
                        <small>{{ __('Vous avez déjà un compte ?') }}</small>
                        <a href="{{ route('login') }}" class="text-warning text-sm font-semibold">{{ __('Connectez vous') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
