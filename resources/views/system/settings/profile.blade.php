@extends('layout.system')

@section('title', ' - Profil')

@section('content')
    @include('system._partials._title', ['title' => 'Profil'])

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="card-title">Profil</h4>
                        </div>
                    </div>

                    @include('system._partials._alert')

                    <form action="{{ route('settings.update') }}" method="post" enctype="multipart/form-data">
                        @include('system.settings._partials._form_profile')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
