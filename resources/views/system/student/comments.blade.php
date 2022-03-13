@extends('layout.system')

@section('title', 'Odborná prax')

@section('content')
    @include('system._partials._title', ['title' => 'Odborná prax'])

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="card-title">Odborná prax - Komentáre</h4>
                        </div>

                        <div class="col-sm-6">
                            <p class="card-title-desc float-right">
                                @if(auth()->user()->clearance('student'))
                                    <a href="{{ route('student.internship') }}" class="btn btn-primary waves-effect waves-light">
                                        Späť na odbornú prax
                                    </a>
                                @else
                                    <a href="{{ route('internships.index') }}" class="btn btn-primary waves-effect waves-light">
                                        Späť na odbornú prax
                                    </a>
                                @endif
                            </p>
                        </div>
                    </div>

                    @include('system._partials._alert')

                    @include('system.student._partials._comments')

                    @include('system.student._partials._comment_form')
                </div>
            </div>
        </div>
    </div>
@endsection
