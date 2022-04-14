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
                            <h4 class="card-title">Nový akademický rok</h4>
                        </div>

                        <div class="col-sm-6">
                            <p class="card-title-desc float-right">
                                <a href="{{ route('academic_years.index') }}" class="btn btn-primary waves-effect waves-light">Zoznam akademických rokov</a>
                            </p>
                        </div>
                    </div>

                    <form action="{{ route('academic_years.store') }}" method="post" enctype="multipart/form-data">
                        @include('system.academic_years._partials._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
