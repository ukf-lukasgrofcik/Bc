<div data-simplebar style="max-height: 430px;">
    @forelse($comments as $comment)
        <div class="media border-bottom py-4">
            <img class="mr-2 rounded-circle avatar-xs" src="{{ asset('assets/images/users/avatar-3.jpg')}}" alt="">
            <div class="media-body">
                <h5 class="font-size-15 mt-0 mb-1">{{ $comment->user->name }} {{ $comment->user->surname }} <small class="text-muted float-right">{{ $comment->created_at->diffForHumans() }}</small></h5>
                <p class="text-muted">{{ $comment->text }}</p>
            </div>
        </div>
    @empty
        <p class="text-muted">V tejto konverzácii nie sú žiadne nové správy.</p>
    @endforelse

</div>
