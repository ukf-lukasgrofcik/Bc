@extends('layout.system')

@section('title', ' - Odborná prax')

@section('content')
    @include('system._partials._title', ['title' => 'Odborná prax'])

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="card-title">Študíjne programy</h4>
                        </div>

                        @if(auth()->user()->clearance('workplace_leader'))
                            <div class="col-sm-6">
                                <p class="card-title-desc float-right">
                                    <a href="{{ route('study_programmes.create') }}" class="btn btn-primary waves-effect waves-light">Nový študíjny program</a>
                                </p>
                            </div>
                        @endif
                    </div>

                    @include('system._partials._alert')

                    <div class="row">
                        <div class="col-sm-12">
                            @include('system.study_programmes._partials._table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
