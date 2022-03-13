@csrf

<div class="row mb-2">
    <div class="col-sm-12 col-md-9">

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Názov</label>
                    <input type="text" name="name" value="{{ old('name', isset($subject) ? $subject->name : '') }}" class="form-control {{ $errors->has('name') ? 'parsley-error' : '' }}" id="name" placeholder="Názov">
                    @include('auth._partials._errors', ['column' => 'name'])
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="study_programme_id">Študíjny program</label>
                    <select name="study_programme_id" id="study_programme_id" class="form-control select2 {{ $errors->has('study_programme_id') ? 'parsley-error' : '' }}">
                        <option value="">Vyberte študíjny program</option>
                        @foreach($study_programmes as $study_programme)
                            <option value="{{ $study_programme->id }}" {{ old('study_programme_id', isset($subject) ? $subject->study_programme->id : '') == $study_programme->id ? 'selected' : '' }}>{{ $study_programme->name }}</option>
                        @endforeach
                    </select>
                    @include('auth._partials._errors', ['column' => 'study_programme_id'])
                </div>
            </div>
        </div>

    </div>
</div>

@include('system._partials._buttons')
