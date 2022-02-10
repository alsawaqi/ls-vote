<?php

namespace App\Http\Livewire;

use App\Models\Comments;
use Illuminate\Http\Response;
use Livewire\Component;

class DeleteComment extends Component
{
    public Comments $comment;

    protected $listeners = ['setDeleteComment'];

    public function setDeleteComment($commentId)
    {
        $this->comment = Comments::findOrFail($commentId);

        $this->emit('deleteCommentWasSet');
    }

    public function deleteComment()
    {
        if (auth()->guest() || auth()->user()->cannot('delete', $this->comment)) {
            abort(Response::HTTP_FORBIDDEN);
        }

        Comments::destroy($this->comment->id);

        $this->emit('commentWasDeleted', 'Comment was deleted!');
    }

    public function render()
    {
        return view('livewire.delete-comment');
    }
}
