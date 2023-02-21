<div
    id="comment-{{ $movement->id }}"
    class="
comment-container relative bg-white rounded-xl flex transition duration-500 ease-in mt-4"
>
    <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
        <div class="flex-none">
            <a href="#">
               {{--  <img src="{{ $movement->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl"> --}}
            </a>
           {{--  @if ($movement->user->isAdmin())
                <div class="md:text-center uppercase text-blue text-xxs font-bold mt-1">Admin</div>
            @endif --}}
        </div>
        <div class="w-full md:mx-4">
            <div class="flex items-center justify-between mt-6 text-gray-600">
              {{--   @admin
                    @if ($movement->spam_reports > 0)
                        <div class="text-red mb-2">Spam Reports: {{ $movement->spam_reports }}</div>
                    @endif
                @endadmin --}}

              {{--   @if ($movement->is_status_update)
                    <h4 class="text-xl font-semibold mb-3">
                        Status Changed to "{{ $movement->status->name }}"
                    </h4>
                @endif --}}
                <h4 class="text-xl font-semibold mb-3">
                    Tipo :  "{{ $movement->tipo }}"
                </h4>
            
                @if($movement->tipo==="entrada")
                <div class="text-green mb-2">Cantidad: {{ $movement->cantidad }}</div>

                @else
                <div class="text-red mb-2">Cantidad: {{ $movement->cantidad }}</div>

                @endif
                

            </div>

            <div class="w-full md:mx-4">
                <div class="flex items-center justify-between mt-6 text-gray-600">
              
                
                    <div class="mt-4 md:mt-0">
    
                      
                        {{ $movement->code}}
                    
                    </div>
                    <div class="mt-4 md:mt-0">
                        
                        {!! nl2br(e($movement->description)) !!}
                    
                    </div>
                    <div class="mt-4 md:mt-0">
                        
                        {{ $movement->lote}}
                    
                    </div>
    
    
                </div>
            </div>

            <div class="flex items-center justify-between mt-6">
                <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                    <div class="@if ($movement->is_status_update) text-blue @endif font-bold text-gray-900">{{ $movement->user->name }}</div>
                    <div>&bull;</div>
                    {{-- @if ($movement->user->id === $movement->idea->user->id) --}}
                    @if ($movement->user->id === $productUserId)
                        <div class="rounded-full border bg-gray-100 px-3 py-1">OP</div>
                        <div>&bull;</div>
                    @endif
                    <div>{{ $movement->created_at->diffForHumans() }}</div>
                </div>
                @auth
             <div
                    class="text-gray-900 flex items-center space-x-2"
                    x-data="{ isOpen: false }"
                >
                    <div class="relative">
                       
                        <button
                            class="relative bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in py-2 px-3"
                            @click="isOpen = !isOpen"
                        >
                            <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                        </button>
                        
                        <ul
                            class="absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl z-10 py-3 md:ml-8 top-8 md:top-6 right-0 md:left-0"
                            x-cloak
                            x-show.transition.origin.top.left="isOpen"
                            @click.away="isOpen = false"
                            @keydown.escape.window="isOpen = false"
                        >
                          {{--   @can('update', $movement) --}}
                            <li>
                                <a
                                    href="#"
                                    @click.prevent="
                                        isOpen = false
                                        Livewire.emit('setEditMovement', {{ $movement->id }})
                                    "
                                    class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3"
                                >
                                    Edit Movement
                                </a>
                            </li>
                           {{--  @endcan --}}

                         {{--    @can('delete', $movement)
                            <li>
                                <a
                                    href="#"
                                    @click.prevent="
                                        isOpen = false
                                        Livewire.emit('setDeleteMovement', {{ $movement->id }})
                                    "
                                    class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3"
                                >
                                    Delete Movement
                                </a>
                            </li>
                            @endcan

                            <li>
                                <a
                                    href="#"
                                    @click.prevent="
                                        isOpen = false
                                        Livewire.emit('setMarkAsSpamMovement', {{ $movement->id }})
                                    "
                                    class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3"
                                >
                                    Mark as Spam
                                </a>
                            </li>

                            @admin
                                @if ($movement->spam_reports > 0)
                                <li>
                                    <a
                                        href="#"
                                        @click.prevent="
                                            isOpen = false
                                            Livewire.emit('setMarkAsNotSpamMovement', {{ $movement->id }})
                                        "
                                        class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3"
                                    >
                                        Not Spam
                                    </a>
                                </li>
                                @endif
                            @endadmin --}}
                        </ul>
                    
                    </div>
                </div> 
                @endauth
            </div>
        </div>
    </div>
</div> <!-- end movement-container -->
