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
                                        <select name="study_programme" class="form-control select2">
                                            <option value>Vyberte študíjny program</option>
                                            @foreach($study_programmes as $study_programme)
                                                <option value="{{ $study_programme->id }}" {{ request('study_programme') == $study_programme->id ? 'selected' : '' }}>{{ $study_programme->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Uložiť
                                    </button>
                                    <a href="{{ \Illuminate\Support\Facades\URL::current() }}" class="btn btn-secondary waves-effect m-l-5">
                                        Zrušiť
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
