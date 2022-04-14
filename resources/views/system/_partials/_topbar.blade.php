<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('images/logo-dark.png') }}" alt="" height="20">
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('images/logo-light.png') }}" alt="" height="20">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">

            @if(auth()->check())
                

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="{{ asset('images/avatar.png')}}"
                             alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ml-1 font-weight-medium font-size-15">{{-- Auth::user()->name --}}</span>
                        <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">

                        <a class="dropdown-item" href="{{ route('settings.profile') }}">
                            <i class="uil uil-user-circle font-size-18 align-middle text-muted mr-1"></i>
                            <span class="align-middle">Profil</span>
                            <span class="badge badge-soft-success badge-pill mt-1 ml-2">0</span>
                        </a>

                        <a class="dropdown-item d-block" href="{{ route('settings.password') }}">
                            <i class="uil uil-cog font-size-18 align-middle mr-1 text-muted"></i>
                            <span class="align-middle">Zmena hesla</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="uil uil-sign-out-alt font-size-18 align-middle mr-1 text-muted"></i>
                                <span class="align-middle">Odhlásiť sa</span>
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary waves-effect waves-light">Prihláste sa</a>
            @endif

        </div>
    </div>
</header>
