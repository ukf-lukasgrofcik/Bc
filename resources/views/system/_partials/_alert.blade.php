@if(session('type') && session('message'))
<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-{{ session('type') }} alert-dismissible" role="alert">
            {!! session('message') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    </div>
</div>
@endif
