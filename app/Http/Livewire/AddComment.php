<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use App\Models\Comments;
use Illuminate\Http\Response;
use App\Notifications\CommentAdded;

class AddComment extends Component
{
    public $idea;
    public $comment;
    protected $rules = [
        'comment' => 'required|min:4',
    ];

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function addComment()
    {
        if (auth()->guest()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->validate();

        $newComment=  Comments::create([
            'user_id' => auth()->id(),
            'idea_id' => $this->idea->id,
            'body' => $this->comment,
        ]);

        $this->reset('comment');

        $this->idea->user->notify(new CommentAdded($newComment));

        $this->emit('commentWasAdded', 'Comment was posted!');
    }

    public function render()
    {
        return view('livewire.add-comment');
    }
}
