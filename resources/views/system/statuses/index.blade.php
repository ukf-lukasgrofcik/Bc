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
                            <h4 class="card-title">Statusy</h4>
                        </div>

                        <div class="col-sm-6">
                            <p class="card-title-desc float-right"></p>
                        </div>
                    </div>

                    @include('system._partials._alert')

                    <div class="row">
                        <div class="col-sm-12">
                            @include('system.statuses._partials._table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
