@csrf

<div class="row mb-2">
    <div class="col-sm-12 col-md-9">

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="statement">Výkaz</label>
                    <input class="form-control filestyle" type="file" name="statement" id="statement">
                    @include('auth._partials._errors', ['column' => 'statement'])
                </div>
            </div>
        </div>

    </div>
</div>

@include('system._partials._buttons')
