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
                            <h4 class="card-title">Odborná prax študenta {{ $internship->student->name }} {{ $internship->student->surname }}</h4>
                        </div>

                        <div class="col-sm-6">
                            <p class="card-title-desc float-right">
                                <a href="{{ route('company.internships') }}" class="btn btn-primary waves-effect waves-light">Zoznam odbornej praxe</a>
                            </p>
                        </div>
                    </div>

                    <form action="{{ route('company.internships.assign', $internship) }}" method="post" enctype="multipart/form-data">
                        @include('system.company._partials._form_assign')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
