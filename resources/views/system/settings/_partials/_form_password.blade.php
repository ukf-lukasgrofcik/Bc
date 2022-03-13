@csrf

<div class="row mb-2">
    <div class="col-sm-12 col-md-9">

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="password">Heslo</label>
                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'parsley-error' : '' }}" id="password" placeholder="Heslo">
                    @include('auth._partials._errors', ['column' => 'password'])
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="password_confirmation">Zopakujte heslo</label>
                    <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'parsley-error' : '' }}" id="password_confirmation" placeholder="Zopakujte heslo">
                    @include('auth._partials._errors', ['column' => 'password_confirmation'])
                </div>
            </div>
        </div>

    </div>
</div>

@include('system._partials._buttons')
