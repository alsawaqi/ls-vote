<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use App\Models\Category;
use Symfony\Component\HttpFoundation\Response;

class CreateIdea extends Component
{

     public $title;
     public $category = 1;
     public $description;

     protected $rules= [

        'title' => 'required|min:4',
        'category' => 'required|integer|exists:categories,id',
        'description' => 'required|min:4',


    ];


     public function createIdea(){

        if (auth()->guest()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->validate();


              $idea = Idea::create([
                'user_id' => auth()->id(),
                'category_id' => $this->category,
                'status_id' => 1,
                'title' => $this->title,
                'description' => $this->description,
            ]);

            $idea->vote(auth()->user());

              session()->flash('success_message','Idea was added Successfully');

              $this->reset();



            return redirect()->route('idea.index');

     }



    public function render()
    {
        return view('livewire.create-idea',[
                'categories'=>Category::all()

        ]);
    }
}