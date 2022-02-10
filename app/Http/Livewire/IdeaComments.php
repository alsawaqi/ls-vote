<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use App\Models\Comments;
use Livewire\WithPagination;

class IdeaComments extends Component
{

    use WithPagination;

   public Idea $idea;


   protected $listeners = ['commentWasAdded', 'commentWasDeleted'];

   public function commentWasAdded()
   {
       $this->idea->refresh();
       $this->goToPage($this->idea->comments()->paginate()->lastpage());



   }



   public function commentWasDeleted()
   {
       $this->idea->refresh();
       $this->goToPage(1);
   }

   public function mount($idea){

     $this->idea = $idea;
   }

    public function render()
    {
        return view('livewire.idea-comments',[

            'comments' => Comments::with('user')->where('idea_id', $this->idea->id)->paginate()->withQueryString(),

        ]);
    }
}
