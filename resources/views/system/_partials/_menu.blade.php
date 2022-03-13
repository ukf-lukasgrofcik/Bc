<div class="vertical-menu">

    <div class="navbar-brand-box">
        <a href="{{ url('index') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('images/logo-dark.png') }}" alt="" height="20">
            </span>
        </a>

        <a href="{{ url('index') }}" class="logo logo-light">
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

    <div data-simplebar class="sidebar-menu-scroll">

        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">

                <!-- INFO -->
                <li class="menu-title">Info</li>

                <li>
                    <a href="{{ route('dashboard.index') }}">
                        <i class="uil-home-alt"></i><span>Nástenka</span>
                    </a>
                </li>

                @if(auth()->check())
                    @if(auth()->user()->clearance('student'))
                        <li class="menu-title">Študent</li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="uil-window-section"></i><span>Odborná prax</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('student.internship') }}">Odborná prax</a></li>
                            </ul>
                        </li>
                    @endif

                    @if(auth()->user()->clearance('employee'))
                        <li class="menu-title">Spoločnosť</li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="uil-window-section"></i><span>Odborná prax</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('company.internships') }}">Odborná prax</a></li>
                            </ul>
                        </li>

                            @if(auth()->user()->clearance('owner'))
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                        <i class="uil-window-section"></i><span>Administrácia</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="{{ route('company.employees.index', auth()->user()->company) }}">Zoznam zamestnancov</a></li>
                                    </ul>
                                </li>
                            @endif
                    @endif

                    @if(auth()->user()->clearance('admin'))
                        <li class="menu-title">Admin</li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="uil-window-section"></i><span>Administrácia</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('users.index') }}">Zoznam používateľov</a></li>
                                <li><a href="{{ route('companies.index') }}">Zoznam spoločností</a></li>
                                <li><a href="{{ route('workplaces.index') }}">Zoznam pracovísk</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="uil-window-section"></i><span>Odborná prax</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="javascript: void(0);" class="has-arrow">Predmety</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="{{ route('study_programmes.index') }}">Zoznam študíjnych programov</a></li>
                                        <li><a href="{{ route('subjects.index') }}">Zoznam predmetov</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('types.index') }}">Zoznam typov</a></li>
                                <li><a href="{{ route('statuses.index') }}">Zoznam statusov</a></li>
                                <li><a href="{{ route('internships.index') }}">Odborné praxe</a></li>
                            </ul>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</div>
