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
                            <h4 class="card-title">Pracoviská</h4>
                        </div>

                        @if(auth()->user()->clearance('admin'))
                            <div class="col-sm-6">
                                <p class="card-title-desc float-right">
                                    <a href="{{ route('workplaces.create') }}" class="btn btn-primary waves-effect waves-light">Nové pracovisko</a>
                                </p>
                            </div>
                        @endif
                    </div>

                    @include('system._partials._alert')

                    <div class="row">
                        <div class="col-sm-12">
                            @include('system.workplaces._partials._table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
