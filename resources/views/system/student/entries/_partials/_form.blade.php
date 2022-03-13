@csrf

<div class="row mb-2">
    <div class="col-sm-12 col-md-9">

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="text">Text</label>
                    <textarea name="text" id="" cols="30" rows="5" class="form-control {{ $errors->has('text') ? 'parsley-error' : '' }}" id="text">{{ old('text', isset($entry) ? $entry->text : '') }}</textarea>
                    @include('auth._partials._errors', ['column' => 'text'])
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="file">Dokument</label>
                    <input class="form-control filestyle" type="file" name="file" id="file">
                    @include('auth._partials._errors', ['column' => 'file'])
                </div>
            </div>
        </div>

    </div>
</div>

@include('system._partials._buttons')
