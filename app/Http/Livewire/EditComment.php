<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comments;

class EditComment extends Component
{

    public Comments $comment;
    public $body;

    protected $rules = [
        'body' => 'required|min:4',
    ];

    protected $listeners = ['setEditComment'];

    public function setEditComment($commentId)
    {
        $this->comment = Comments::findOrFail($commentId);
        $this->body = $this->comment->body;

        $this->emit('editCommentWasSet');
    }




    public function updateComment()
    {
        if (auth()->guest() || auth()->user()->cannot('update', $this->comment)) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->validate();

        $this->comment->body = $this->body;
        $this->comment->save();

        $this->emit('commentWasUpdated', 'Comment was updated!');
    }



    public function render()
    {
        return view('livewire.edit-comment');
    }
}
