@csrf

<div class="row mb-2">
    <div class="col-sm-12 col-md-9">

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Meno</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control {{ $errors->has('name') ? 'parsley-error' : '' }}" id="name" placeholder="Meno">
                    @include('auth._partials._errors', ['column' => 'name'])
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="surname">Priezvisko</label>
                    <input type="text" name="surname" value="{{ old('surname', $user->surname) }}" class="form-control {{ $errors->has('surname') ? 'parsley-error' : '' }}" id="surname" placeholder="Priezvisko">
                    @include('auth._partials._errors', ['column' => 'surname'])
                </div>
            </div>
        </div>

    </div>
</div>

@include('system._partials._buttons')
