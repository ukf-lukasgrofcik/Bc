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
                            <h4 class="card-title">Typy zmlúv</h4>
                        </div>

                        @if(auth()->user()->clearance('workplace_leader'))
                            <div class="col-sm-6">
                                <p class="card-title-desc float-right">
                                    <a href="{{ route('types.create') }}" class="btn btn-primary waves-effect waves-light">Nový typ zmluvy</a>
                                </p>
                            </div>
                        @endif
                    </div>

                    @include('system._partials._alert')

                    <div class="row">
                        <div class="col-sm-12">
                            @include('system.types._partials._table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
