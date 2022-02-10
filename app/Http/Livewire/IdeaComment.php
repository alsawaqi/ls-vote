<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comments;
use Propaganistas\LaravelFakeId\RoutesWithFakeIds;

class IdeaComment extends Component
{

    public $comment;
    public $ideaUserId;

    protected $listeners = ['commentWasUpdated'];

    public function commentWasUpdated()
    {
        $this->comment->refresh();
    }

    public function mount(Comments $comment, $ideaUserId)
    {
        $this->comment = $comment;
        $this->ideaUserId = $ideaUserId;
    }
    public function render()
    {
        return view('livewire.idea-comment');
    }
}

