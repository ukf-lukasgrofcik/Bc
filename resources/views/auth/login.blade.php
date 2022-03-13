@extends('layout.auth')

@section('title', '- Prihlásenie')

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
                            <img src="{{ asset('images/logo-sm.png')}}" alt="" height="50" class="logo logo-dark">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Prihlásenie</h5>
                                <p class="text-muted"></p>
                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="text" name="email" value="{{ old('email') }}" class="form-control {{ $errors->has('email') ? 'parsley-error' : '' }}" id="email" placeholder="E-mail">
                                        @include('auth._partials._errors', ['column' => 'email'])
                                    </div>

                                    <div class="form-group">
                                        <div class="float-right">
                                            <a class="text-muted" href="{{ route('password.request') }}">
                                                Zabudli ste heslo?
                                            </a>
                                        </div>

                                        <label for="password">Heslo</label>
                                        <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'parsley-error' : '' }}" id="password" placeholder="Heslo">
                                        @include('auth._partials._errors', ['column' => 'password'])
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="auth-remember-check" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="auth-remember-check">Zostať prihlásený</label>
                                    </div>

                                    <div class="mt-3 text-right">
                                        <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Prihlásiť sa</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>
                            2021 - {{ \Carbon\Carbon::now()->year }} © Vytvoril
                            <a href="https://www.linkedin.com/in/lukas-grofcik-0628771a9/" target="_blank">
                                <b>Lukáš Grofčík</b>.
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
