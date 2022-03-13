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
                            <h4 class="card-title">Pridať majiteľa</h4>
                        </div>

                        <div class="col-sm-6">
                            <p class="card-title-desc float-right">
                                <a href="{{ route('companies.index') }}" class="btn btn-primary waves-effect waves-light">Zoznam spoločností</a>
                            </p>
                        </div>
                    </div>

                    <form action="{{ route('companies.owner.store', $company) }}" method="post" enctype="multipart/form-data">
                        @include('system.companies._partials._owner_form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
