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
                            <h4 class="card-title">Odborné praxe</h4>
                        </div>
                    </div>

                    @include('system._partials._alert')

                    <div class="row">
                        <div class="col-sm-12">
                            @include('system.internships._partials._table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
