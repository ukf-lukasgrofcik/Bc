@extends('layout.system')

@section('title', ' - Zmena hesla')

@section('content')
    @include('system._partials._title', ['title' => 'Zmena hesla'])

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="card-title">Zmena hesla</h4>
                        </div>
                    </div>

                    @include('system._partials._alert')

                    <form action="{{ route('settings.password_update') }}" method="post" enctype="multipart/form-data">
                        @include('system.settings._partials._form_password')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
