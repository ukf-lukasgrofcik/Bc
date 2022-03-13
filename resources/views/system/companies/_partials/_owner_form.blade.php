@csrf
<div class="row mb-2">
    <div class="col-sm-12 col-md-9">

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Meno</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control {{ $errors->has('name') ? 'parsley-error' : '' }}" id="name" placeholder="Meno">
                    @include('auth._partials._errors', ['column' => 'name'])
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="surname">Priezvisko</label>
                    <input type="text" name="surname" value="{{ old('surname') }}" class="form-control {{ $errors->has('surname') ? 'parsley-error' : '' }}" id="surname" placeholder="Priezvisko">
                    @include('auth._partials._errors', ['column' => 'surname'])
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">E-mail</label>
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control {{ $errors->has('email') ? 'parsley-error' : '' }}" id="email" placeholder="E-mail">
                    @include('auth._partials._errors', ['column' => 'email'])
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="password">Heslo</label>
                    <div class="input-group">
                        <input type="text" name="password" value="{{ old('password') }}" class="form-control {{ $errors->has('password') ? 'parsley-error' : '' }}" id="password" placeholder="Heslo">
                        <div class="input-group-append">
                            <button type="button" class="input-group-text btn random-password-generator" data-password-selector="#password">
                                <i class="mdi mdi-pound"></i>
                            </button>
                        </div>
                    </div>
                    @include('auth._partials._errors', ['column' => 'password'])
                </div>
            </div>
        </div>

    </div>
</div>

@include('system._partials._buttons')
