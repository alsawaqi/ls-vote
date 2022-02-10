<div>

    @forelse ($comments as $comment)

    <livewire:idea-comment
    :key="$comment->id"
    :comment="$comment"
    :ideaUserId="$idea->user->id"
    />

    @empty

      nothing

    @endforelse

  {{ $comments->onEachSide(1)->links() }}
</div>
