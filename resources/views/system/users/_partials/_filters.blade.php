<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="card-title">
                            Filtre
                        </h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-9">
                        <form>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <select name="role" class="form-control select2">
                                            <option value>Vyberte rolu</option>
                                            <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Vedúci fakulty</option>
                                            <option value="workplace_leader" {{ request('role') == 'workplace_leader' ? 'selected' : '' }}>Vedúci katedry</option>
                                            <option value="lecturer" {{ request('role') == 'lecturer' ? 'selected' : '' }}>Profesor</option>
                                            <option value="student" {{ request('role') == 'student' ? 'selected' : '' }}>Študent</option>
                                            <option value="owner" {{ request('role') == 'owner' ? 'selected' : '' }}>Majiteľ firmy</option>
                                            <option value="employee" {{ request('role') == 'employee' ? 'selected' : '' }}>Zamestnanec firmy</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <select name="company" class="form-control select2">
                                            <option value>Vyberte spoločnosť</option>
                                            @foreach($companies as $company)
                                                <option value="{{ $company->id }}" {{ request('company') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <select name="workplace" class="form-control select2">
                                            <option value>Vyberte pracovisko</option>
                                            @foreach($workplaces as $workplace)
                                                <option value="{{ $workplace->id }}" {{ request('workplace') == $workplace->id ? 'selected' : '' }}>{{ $workplace->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    @include('system._partials._buttons')
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
