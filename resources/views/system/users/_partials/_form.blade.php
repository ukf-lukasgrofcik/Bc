@csrf

<div class="row mb-2">
    <div class="col-sm-12 col-md-9">

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Rola</label>
                    <select id="role-select" name="role" class="form-control select2">
                        <option value>Vyberte rolu</option>
                        <option value="workplace_leader" {{ old('role') == 'workplace_leader' ? 'selected' : '' }}>Vedúci katedry</option>
                        <option value="lecturer" {{ old('role') == 'lecturer' ? 'selected' : '' }}>Profesor</option>
                        <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Študent</option>
                        <option value="owner" {{ old('role') == 'owner' ? 'selected' : '' }}>Majiteľ firmy</option>
                        <option value="employee" {{ old('role') == 'employee' ? 'selected' : '' }}>Zamestnanec firmy</option>
                    </select>
                    @include('auth._partials._errors', ['column' => 'role'])
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">E-mail</label>
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control {{ $errors->has('email') ? 'parsley-error' : '' }}" id="email" placeholder="E-mail">
                    @include('auth._partials._errors', ['column' => 'email'])
                </div>
            </div>
        </div>

        <div id="company-select" class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Spoločnosť</label>
                    <select name="company_id" class="form-control select2">
                        <option value>Vyberte spoločnosť</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}" {{ old('company') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                        @endforeach
                    </select>
                    @include('auth._partials._errors', ['column' => 'company'])
                </div>
            </div>
        </div>

        <div id="workplace-select" class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Pracovisko</label>
                    <select name="workplace_id" class="form-control select2">
                        <option value>Vyberte pracovisko</option>
                        @foreach($workplaces as $workplace)
                            <option value="{{ $workplace->id }}" {{ old('workplace') == $workplace->id ? 'selected' : '' }}>{{ $workplace->name }}</option>
                        @endforeach
                    </select>
                    @include('auth._partials._errors', ['column' => 'workplace'])
                </div>
            </div>
        </div>

    </div>
</div>

@include('system._partials._buttons')
