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
                            <h4 class="card-title">Pracovisko {{ $workplace->name }}</h4>
                        </div>

                        <div class="col-sm-6">
                            <p class="card-title-desc float-right">
                                <a href="{{ route('workplaces.index') }}" class="btn btn-primary waves-effect waves-light">Zoznam pracovísk</a>
                            </p>
                        </div>
                    </div>

                    @include('system._partials._alert')

                    <form action="{{ route('workplaces.update', $workplace) }}" method="post" enctype="multipart/form-data">
                        @include('system.workplaces._partials._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
