<div
    x-data="{ isOpen: false }"
    x-init="  Livewire.on('editMovementWasSet', () => {
        isOpen = true
        $nextTick(() => $refs.cantidad.focus())
    })"
  
    class="relative"
>
   
    <div
        class="absolute z-10 w-64 md:w-104 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2"
        x-cloak
        x-show.transition.origin.top.left="isOpen"
        @click.away="isOpen = false"
        @keydown.escape.window="isOpen = false"
    >
        @auth
            <form wire:submit.prevent="addMovement" action="#" class="space-y-4 px-4 py-6">
                <div>
                   Producto :
                   <div>
                    {{$product}}
                    </div>
                </div>

                <div>
                    
                    <div>
                    {{$tipo}}
                     </div>
                 </div>
                <div>
                    Tipo de Movimiento : 

                        <select wire:model="tipo" name="tipo" id="tipo" class="w-full rounded-xl border-none px-4 py-2">
                            <option  value="entrada">Entrada</option>
                            <option value="salida">Salida</option>
                            <option  value="recuento">Recuento</option>
                        {{--  @admin
                                <option value="Spam Productos">Spam Productos</option>
                                <option value="Spam Comments">Spam Comments</option>
                            @endadmin --}}
                        </select>
                  
                </div>
                <div class="w-full md:w-1/3"  >
                   
                   Cantidad: 
                        <input x-ref="cantidad" wire:model.defer="cantidad" type="number" class="w-full text-sm bg-gray-100 border-none rounded-xl placeholder-gray-900 px-4 py-2 mb-4" placeholder="Cantidad" required>
                        @error('cantidad')
                            <p class="text-red text-xs mt-1">{{ $message }}</p>
                        @enderror
                       
                    
                </div>
                <div class="w-full md:w-1/3">
                    {{$medida}} 
                </div> 
                <div>
                   
                    Lote: 
                         <input wire:model.defer="lote" type="text" class="w-full text-sm bg-gray-100 border-none rounded-xl placeholder-gray-900 px-4 py-2 mb-4" placeholder="lote" required>
                         @error('lote')
                             <p class="text-red text-xs mt-1">{{ $message }}</p>
                         @enderror
                        
                     
                 </div>

                <div>
                    <textarea wire:model="description" name="post_description" id="post_description" cols="30" rows="4" class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2" placeholder="Descripción de movimiento." required></textarea>

                    @error('description')
                        <p class="text-red text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col md:flex-row items-center md:space-x-3">
                    <button
                        type="submit"
                        class="flex items-center justify-center h-11 w-full md:w-1/2 text-sm bg-blue text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                    >
                        Post Comment
                    </button>
                   {{--  <button
                        type="button"
                        class="flex items-center justify-center w-full md:w-32 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3 mt-2 md:mt-0"
                    >
                        <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                        </svg>
                        <span class="ml-1">Attach</span>
                    </button> --}}
                </div>

            </form>
        @else
            <div class="px-4 py-6">
                <p class="font-normal">Please login or create an account to post a comment.</p>
                <div class="flex items-center space-x-3 mt-8">
                    <a
                        wire:click.prevent="redirectToLogin"
                        href="{{ route('login') }}"
                        class="w-1/2 h-11 text-sm text-center bg-blue text-white font-semibold rounded-xl hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                    >
                        Login
                    </a>
                    <a
                        wire:click.prevent="redirectToRegister"
                        href="{{ route('register') }}"
                        class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3"
                    >
                        Sign Up
                    </a>
                </div>
            </div>
        @endauth
    </div>
</div>
