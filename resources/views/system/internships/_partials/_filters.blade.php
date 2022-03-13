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
                                        <select name="status" class="form-control select2">
                                            <option value>Vyberte status</option>
                                            @foreach($statuses as $status)
                                                <option value="{{ $status->id }}" {{ request('status') == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
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
