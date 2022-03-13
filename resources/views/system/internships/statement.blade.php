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
                                <a href="{{ route('internships.index') }}" class="btn btn-primary waves-effect waves-light">Odborná prax</a>
                            </p>
                        </div>
                    </div>

                    @include('system._partials._alert')

                    <form action="{{ route('internships.statement.upload', $internship) }}" method="post" enctype="multipart/form-data">
                        @include('system.internships._partials._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
