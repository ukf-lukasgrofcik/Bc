@extends('layout.system')

@section('title', 'Odborná prax')

@section('content')
    @include('system._partials._title', ['title' => 'Odborná prax'])

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Odborná prax</h4>

                    @include('system._partials._alert')

                    @if(isset($internship))
                        @include('system.student._partials._table')
                    @else
                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <a href="{{ route('student.internship.create') }}" class="btn btn-primary waves-effect waves-light">Požiadať o prax</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
