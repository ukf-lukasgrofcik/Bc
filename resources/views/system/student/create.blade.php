@extends('layout.system')

@section('title', 'Odborná prax')

@section('content')
    @include('system._partials._title', ['title' => 'Odborná prax'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="card-title">Žiadosť o odbornú prax</h4>
                        </div>

                        <div class="col-sm-6">
                            <p class="card-title-desc"></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            @include('system.student._partials._form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
