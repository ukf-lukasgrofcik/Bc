@extends('layout.system')

@section('title', ' - Odborná prax')

@section('content')
    @include('system._partials._title', ['title' => 'Odborná prax'])

    @include('system.subjects._partials._filters')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="card-title">Predmety</h4>
                        </div>

                        <div class="col-sm-6">
                            <p class="card-title-desc float-right">
                                <a href="{{ route('subjects.create') }}" class="btn btn-primary waves-effect waves-light">Nový predmet</a>
                            </p>
                        </div>
                    </div>

                    @include('system._partials._alert')

                    <div class="row">
                        <div class="col-sm-12">
                            @include('system.subjects._partials._table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
