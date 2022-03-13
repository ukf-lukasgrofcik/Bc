@csrf

<div class="row mb-2">
    <div class="col-sm-12 col-md-9">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="worker_id">Zamestnanec</label>
                    <select name="worker_id" class="form-control select2">
                        <option value>Vyberte zamestnanca</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ old('worker_id') == $employee->id ? 'selected' : '' }}>{{ "$employee->name $employee->surname" }}</option>
                        @endforeach
                    </select>
                    @include('auth._partials._errors', ['column' => 'worker_id'])
                </div>
            </div>
        </div>
    </div>
</div>

@include('system._partials._buttons')
