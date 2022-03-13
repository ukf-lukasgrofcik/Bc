@extends('layout.system')

@section('title', ' - Administrácia')

@section('content')
    @include('system._partials._title', ['title' => 'Administrácia'])

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="card-title">
                                Používatelia {{ isset($group) ? ' - ' . $group['name'] : '' }}
                            </h4>
                        </div>

                        @if(auth()->user()->clearance('owner'))
                            <div class="col-sm-6">
                                <div class="card-title-desc float-right">
                                    <form action="{{ route('company.employees.store') }}" method="post">
                                        @csrf

                                        <div class="form-group d-inline-block">
                                            <input type="text" name="email" value="{{ old('email') }}" class="form-control {{ $errors->has('email') ? 'parsley-error' : '' }}" id="email" placeholder="E-mail">
                                            @include('auth._partials._errors', ['column' => 'email'])
                                        </div>

                                        <div class="form-group d-inline-block">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                Pozvať zamestnanca
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>

                    @include('system._partials._alert')

                    <div class="row">
                        <div class="col-sm-12">
                            @include('system.users._partials._table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
