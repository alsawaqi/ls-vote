<x-app-layout>
<a href="{{ $backurl }}" >back</a>


<livewire:idea-show  :idea="$idea" :votesCount="$votesCount"/>

<livewire:add-comment :idea="$idea"/>

<livewire:idea-comments :idea="$idea"/>


<x-notification-success />

<x-modals-container :idea="$idea" />




</x-app-layout>

