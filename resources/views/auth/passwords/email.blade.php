@extends('layout.auth')

@section('title', '- Zabudnuté heslo')

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
                                <h5 class="text-primary">Zabudnuté heslo?</h5>
                                <p class="text-muted">Zadajte prosím Váš e-mail pre obnovu zabudnutého hesla.</p>
                            </div>
                            <div class="p-2 mt-4">
                                @if (session('status'))
                                    <div class="alert alert-success mb-4" role="alert">
                                        Práve Vám bol poslaný e-mail s odkazom na obnovenie hesla!
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="text" name="email" value="{{ old('email') }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" placeholder="E-mail">
                                        @include('auth._partials._errors', ['column' => 'email'])
                                    </div>

                                    <div class="mt-3 text-right">
                                        <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Obnoviť heslo</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <p class="mb-0">Spomenuli ste si? <a href="{{ route('login') }}" class="font-weight-medium text-primary">Prihláste sa</a></p>
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
