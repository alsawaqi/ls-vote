<div>
    <form wire:submit.prevent="createIdea" method="POST">
        <input wire:model.defer="title" type="text" name="title" value="your idea" />
        @error('title')
               <p>{{ $message }}</p>
        @enderror
        <br>
        <select wire:model.defer="category" name="category_id">
            @foreach($categories as $category)

            <option value="{{ $category->id }}">{{ $category->name }}</option>

            @endforeach
        </select>
        <br>
         <textarea  wire:model.defer="description" name="description">

         </textarea>

         @error('description')
         <p>{{ $message }}</p>
  @enderror
        <br>
        <input type="file" />
        <br>

        <button>submit</button>
    </form>




</div>
