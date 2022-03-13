@csrf

<div class="row mb-2">
    <div class="col-sm-12 col-md-9">

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Názov</label>
                    <input type="text" name="name" value="{{ old('name', isset($workplace) ? $workplace->name : '') }}" class="form-control {{ $errors->has('name') ? 'parsley-error' : '' }}" id="name" placeholder="Názov">
                    @include('auth._partials._errors', ['column' => 'name'])
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="address">Adresa</label>
                    <input type="text" name="address" value="{{ old('address', isset($workplace) ? $workplace->address : '') }}" class="form-control {{ $errors->has('address') ? 'parsley-error' : '' }}" id="address" placeholder="Adresa">
                    @include('auth._partials._errors', ['column' => 'address'])
                </div>
            </div>
        </div>

        <div class="row">
            @if(isset($workplace) && $workplace->lecturers->count() > 0)
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="owner_id">Vedúci pracoviska</label>
                        <select name="owner_id" id="owner_id" class="form-control select2 {{ $errors->has('leader_id') ? 'parsley-error' : '' }}">
                            <option value="">Vyberte vedúceho pracoviska</option>
                            @foreach($workplace->lecturers as $lecturer)
                                <option value="{{ $lecturer->id }}" {{ old('leader_id', isset($workplace) ? $workplace->leader->id : '') == $lecturer->id ? 'selected' : '' }}>{{ "$lecturer->name $lecturer->surname" }}</option>
                            @endforeach
                        </select>
                        @include('auth._partials._errors', ['column' => 'leader_id'])
                    </div>
                </div>
            @endif
        </div>

    </div>
</div>

@include('system._partials._buttons')
