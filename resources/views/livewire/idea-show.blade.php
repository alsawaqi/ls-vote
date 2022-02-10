<div
    x-data="{ isOpen:false}"
    x-init="window.livewire.on('statusWasUpdated',()=>{
                 isOpen = false
                })"
    >


    <img src="{{ $idea->user->getAvatar() }}"  class="w-14 h-14 rounded-xl" />
    <br>
    {{ $idea->title }}
    <br>
    @admin
    @if ($idea->spam_reports > 0)
        <div class="text-red mb-2">Spam Reports: {{ $idea->spam_reports }}</div>
    @endif
@endadmin
<br>
    {{ $idea->description }}
    <br>

    {{ $idea->status->classes }}
    <br>
    {{ $idea->category->name}}
    <br>
    <div class="text-gray-900">{{ $idea->comments()->count() }} comments</div>
    <br>
    {{ $idea->user->name }}

    <br>
    <p>{{ $idea->created_at->diffForHumans() }}</p>

    <br>
    @if($hasVoted)
     yes he did vote

    @else
    no he didnt

    @endif


    <p>{{ $votesCount }}</p>


    <br>

    <p>{{ $idea->status->name }}</p>


    <br>

    <button type="button" wire:click.prevent="vote">vote</button>



    <br>
    @auth


        @can('update', $idea)
            <button  @click.prevent="isOpen= false
             $dispatch('custom-show-edit-modal')">Edit</button>

             @endcan


             @can('delete', $idea)
             <button @click.prevent="isOpen= false
                      $dispatch('custom-show-delete-modal')">Delete</button>
             @endcan

             <br>


                      <button
                            @click.prevent="
                                isOpen = false
                                $dispatch('custom-show-mark-idea-as-spam-modal')
                            "

                        >
                            Mark as Spam
                        </button>
                        <br>


                    @admin
                        @if ($idea->spam_reports > 0)
                        <button
                                @click.prevent="
                                    isOpen = false
                                    $dispatch('custom-show-mark-idea-as-not-spam-modal')
                                "

                            >
                                Not Spam
                            </button>
                        @endif
                    @endadmin

   @endauth
    <br>
    <br>
     @admin
           <livewire:set-status  :idea="$idea"/>
     @endadmin

</div>
