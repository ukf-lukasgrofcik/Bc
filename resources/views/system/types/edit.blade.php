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
                            <h4 class="card-title">Typ zmluvy - {{ $type->name }}</h4>
                        </div>

                        <div class="col-sm-6">
                            <p class="card-title-desc float-right">
                                <a href="{{ route('types.index') }}" class="btn btn-primary waves-effect waves-light">Zoznam typov zmlúv</a>
                            </p>
                        </div>
                    </div>

                    @include('system._partials._alert')

                    <form action="{{ route('types.update', $type) }}" method="post" enctype="multipart/form-data">
                        @include('system.types._partials._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
