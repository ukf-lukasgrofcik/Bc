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
                            <h4 class="card-title">Nový status</h4>
                        </div>

                        <div class="col-sm-6">
                            <p class="card-title-desc float-right">
                                <a href="{{ route('statuses.index') }}" class="btn btn-primary waves-effect waves-light">Zoznam statusov</a>
                            </p>
                        </div>
                    </div>

                    <form action="{{ route('statuses.store') }}" method="post" enctype="multipart/form-data">
                        @include('system.statuses._partials._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
