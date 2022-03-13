
<div class="mt-4">
    <form method="post" action="{{ route('student.internship.comments.store', $internship) }}">
        @csrf

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <textarea name="text" rows="3" class="form-control resize-none" placeholder="Pridajte komentár"></textarea>
                    @include('system._partials._error', ['error' => "text"])
                </div>
            </div>
        </div>

        @include('system._partials._buttons')

    </form>
</div>
