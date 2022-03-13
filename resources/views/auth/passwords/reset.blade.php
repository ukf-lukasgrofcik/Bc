@extends('layout.auth')

@section('title', '- Obnova zabudnutého hesla')

@section('content')
    <div class="home-btn d-none d-sm-block">
        <a href="{{ route('login') }}" class="text-dark"><i class="mdi mdi-home-variant h2"></i></a>
    </div>

    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <a href="{{ route('login') }}" class="mb-5 d-block auth-logo">
                            <img src="{{ asset('img/logo.webp')}}" alt="" height="50" class="logo logo-dark">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Obnova zabudnutého hesla</h5>
                                <p class="text-muted">Zadajte prosím Vaše nové heslo.</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf

                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="text" name="email" value="{{ old('email') }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" placeholder="E-mail">
                                        @include('auth._partials._errors', ['column' => 'email'])
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Heslo</label>
                                        <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" placeholder="Heslo">
                                        @include('auth._partials._errors', ['column' => 'password'])
                                    </div>

                                    <div class="form-group">
                                        <label for="password-confirm">Opakujte nové heslo</label>
                                        <input type="password" name="password_confirmation" class="form-control" id="password-confirm">
                                    </div>

                                    <div class="mt-3 text-right">
                                        <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Potvrdiť</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>
                            © 2021 DeMi-Box. Vytvorila spoločnosť
                            <a href="https://www.demi.sk/" target="_blank">
                                <b>DeMi Studio</b>.
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
