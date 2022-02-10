<div>


 {{ $comment->body }}

 @if ($comment->user->id == $ideaUserId)
                        <div>OP</div>

                    @endif




                    <br>
                    @auth


                    @can('update', $comment)
                    <li>
                        <a   @click.prevent="
                                isOpen = false
                                Livewire.emit('setEditComment', {{ $comment->id }})

                            "
                            class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3"
                        >
                            Edit Comment
                        </a>
                    </li>


                    @endcan
                    <br>

                    @can('delete', $comment)
                            <li>
                                <a
                                    href="#"
                                    @click.prevent="
                                        isOpen = false
                                        Livewire.emit('setDeleteComment', {{ $comment->id }})
                                    "
                                    class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3"
                                >
                                    Delete Comment
                                </a>
                            </li>
                            @endcan
                    @endauth

</div>


