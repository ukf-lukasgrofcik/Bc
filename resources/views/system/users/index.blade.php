@extends('layout.system')

@section('title', ' - Administrácia')

@section('content')
    @include('system._partials._title', ['title' => 'Administrácia'])

    @include('system.users._partials._filters')

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

                        <div class="col-sm-6">
                            <p class="card-title-desc float-right">
                                <a href="{{ route('users.create') }}" class="btn btn-primary waves-effect waves-light">Pozvať používateľa</a>
                            </p>
                        </div>
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
