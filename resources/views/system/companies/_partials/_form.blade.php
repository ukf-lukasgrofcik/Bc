@csrf

<div class="row mb-2">
    <div class="col-sm-12 col-md-9">

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Názov</label>
                    <input type="text" name="name" value="{{ old('name', isset($company) ? $company->name : '') }}" class="form-control {{ $errors->has('name') ? 'parsley-error' : '' }}" id="name" placeholder="Názov">
                    @include('auth._partials._errors', ['column' => 'name'])
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="address">Adresa</label>
                    <input type="text" name="address" value="{{ old('address', isset($company) ? $company->address : '') }}" class="form-control {{ $errors->has('address') ? 'parsley-error' : '' }}" id="address" placeholder="Adresa">
                    @include('auth._partials._errors', ['column' => 'address'])
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" value="{{ old('email', isset($company) ? $company->email : '') }}" class="form-control {{ $errors->has('email') ? 'parsley-error' : '' }}" id="email" placeholder="E-mail">
                    @include('auth._partials._errors', ['column' => 'email'])
                </div>
            </div>

            @if(isset($company))
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="owner_id">Majiteľ</label>
                        <select name="owner_id" id="owner_id" class="form-control select2 {{ $errors->has('owner_id') ? 'parsley-error' : '' }}">
                            <option value="">Vyberte zamestnanca</option>
                            @foreach($company->employees as $employee)
                                <option value="{{ $employee->id }}" {{ old('owner_id', isset($company) ? $company->owner->id : '') == $employee->id ? 'selected' : '' }}>{{ "$employee->name $employee->surname" }}</option>
                            @endforeach
                        </select>
                        @include('auth._partials._errors', ['column' => 'owner_id'])
                    </div>
                </div>
            @endif
        </div>

    </div>
</div>

@include('system._partials._buttons')
