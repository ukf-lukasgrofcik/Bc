<form method="post" action="{{ route('student.internship.store') }}">
    @csrf
    @if($errors->any()){{ $errors }}@endif
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="academic_year" class="control-label">Akademický rok</label>
                <input type="text" name="academic_year" class="form-control {{ $errors->has('academic_year') ? 'parsley-error' : '' }}" value="{{ old('academic_year') }}">
                @include('system._partials._error', ['error' => 'academic_year'])
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label for="type_id" class="control-label">Typ zmluvy</label>
                <select class="form-control {{ $errors->has('type_id') ? 'parsley-error' : '' }}" name="type_id" id="type_id">
                    <option value>Vyberte typ zmluvy</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
                @include('system._partials._error', ['error' => 'type_id'])
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label for="tutor_id" class="control-label">Profesor</label>
                <select class="form-control {{ $errors->has('tutor_id') ? 'parsley-error' : '' }}" name="tutor_id" id="tutor_id">
                    <option value>Vyberte profesora</option>
                    @foreach($tutors as $tutor)
                        <option value="{{ $tutor->id }}" {{ old('tutor_id') == $tutor->id ? 'selected' : '' }}>{{ "$tutor->name $tutor->surname" }}</option>
                    @endforeach
                </select>
                @include('system._partials._error', ['error' => 'tutor_id'])
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="study_programme_id" class="control-label">Študijný program</label>
                <select class="form-control {{ $errors->has('study_programme_id') ? 'parsley-error' : '' }}" name="study_programme_id" id="study_programme_id" data-url="{{ route('student.internship.ajax.study_programme') }}">
                    <option value>Vyberte študijný program</option>
                    @foreach($study_programmes as $study_programme)
                        <option value="{{ $study_programme->id }}" {{ old('study_programme_id') == $study_programme->id ? 'selected' : '' }}>{{ $study_programme->name }}</option>
                    @endforeach
                </select>
                @include('system._partials._error', ['error' => 'study_programme_id'])
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label for="subject_id" class="control-label">Predmet</label>
                <select disabled class="form-control {{ $errors->has('subject_id') ? 'parsley-error' : '' }}" name="subject_id" id="subject_id">
                    <option selected>Vyberte predmet</option>
                </select>
                @include('system._partials._error', ['error' => 'subject_id'])
            </div>
        </div>
    </div>

    <hr class="mb-5">

    <div class="row">
        <div class="col-lg-12">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#select-company" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block">Vybrať spoločnosť</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#invite-company" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                        <span class="d-none d-sm-block">Pozvať spoločnosť</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content p-3 text-muted">
                <div class="tab-pane active" id="select-company" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="company_id" class="control-label">Firma</label>
                                <select class="form-control {{ $errors->has('company_id') ? 'parsley-error' : '' }}" name="company_id" id="company_id">
                                    <option value>Vyberte firmu</option>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>{{ "$company->name, $company->address $company->postal_code $company->city" }}</option>
                                    @endforeach
                                </select>
                                @include('system._partials._error', ['error' => 'company_id'])
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="invite-company" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="company[name]">Názov</label>
                                <input type="text" name="company[name]" value="{{ old('company.name') }}" class="form-control {{ $errors->has('company.name') ? 'parsley-error' : '' }}" id="company[name]" placeholder="Názov">
                                @include('auth._partials._errors', ['column' => 'company.name'])
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="company[address]">Adresa</label>
                                <input type="text" name="company[address]" value="{{ old('company.address') }}" class="form-control {{ $errors->has('company.address') ? 'parsley-error' : '' }}" id="company[address]" placeholder="Adresa">
                                @include('auth._partials._errors', ['column' => 'company.address'])
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="company[email]">E-mail</label>
                                <input type="text" name="company[email]" value="{{ old('company.email') }}" class="form-control {{ $errors->has('company.email') ? 'parsley-error' : '' }}" id="company[email]" placeholder="E-mail">
                                @include('auth._partials._errors', ['column' => 'company.email'])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('system._partials._buttons')
</form>
