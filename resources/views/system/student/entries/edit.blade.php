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
                            <h4 class="card-title">Záznam praxe</h4>
                        </div>

                        <div class="col-sm-6">
                            <p class="card-title-desc float-right">
                                <a href="{{ route('student.internship.entries.index', $internship) }}" class="btn btn-primary waves-effect waves-light">Zoznam záznamov praxe</a>
                            </p>
                        </div>
                    </div>

                    @include('system._partials._alert')

                    <form action="{{ route('student.internship.entries.update', [$internship, $entry]) }}" method="post" enctype="multipart/form-data">
                        @include('system.student.entries._partials._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
