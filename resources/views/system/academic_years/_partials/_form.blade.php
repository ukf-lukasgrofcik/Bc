@csrf

<div class="row mb-2">
    <div class="col-sm-12 col-md-9">

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Názov</label>
                    <input type="text" name="name" value="{{ old('name', isset($academic_year) ? $academic_year->name : '') }}" class="form-control {{ $errors->has('name') ? 'parsley-error' : '' }}" id="name" placeholder="Názov">
                    @include('auth._partials._errors', ['column' => 'name'])
                </div>
            </div>
        </div>

    </div>
</div>

@include('system._partials._buttons')
