<div
    x-data="{
        isOpen: false
    }"
    x-init="
        Livewire.on('movementWasAdded', () => {
            isOpen=false
        })
    "
    class="relative"
>
    <div class="flex flex-grow">
        <button
            type="button"
            @click="
                isOpen = !isOpen
            
                if (isOpen) {
                    $nextTick(() => $refs.description.focus())
                }
            "
            class="flex items-center justify-center h-11 w-32 text-sm bg-blue text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3 ml-4"
        >
            Añadir Movimiento
        </button>
        
    </div>
  






    
    <div
       
    class="absolute z-10 w-64 md:w-104 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2"
    x-cloak
        x-show.transition.origin.top.left="isOpen"
        @click.away="isOpen = false"
        @keydown.escape.window="isOpen = false"
    >
        @auth
            <form wire:submit.prevent="addMovement" action="#" class="space-y-4 px-4 py-6">
            
                <div class="flex flex-wrap -mx-3 mb-2">

                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label for="ral">Ral</label>
                    
                        <div class="w-full font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2">
                        {{$product->code}}
                        </div>
                    </div>

                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label for="producto">Producto</label>
                         
                        <div class="w-full" id="producto">
                         {{$product->name}}
                         </div>
                    </div>
               

                   

                    <div class="w-full  md:w-1/3 px-3 mb-6 md:mb-0">
                        <label for="categoria">Categoria </label>
                         
                        <div class="w-full" id="categoria">
                         {{$category_name}}
                         </div>
                    </div>
                </div>

              
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full  md:w-2/3 px-3 mb-6 md:mb-0">

                       <label for="tipo" > Seleccione Tipo de:  </label>
                   

                        <select x-ref="tipo" wire:model="tipo" name="tipo" id="tipo" class="w-full md:w-3/5 rounded-xl border-none px-4 py-2 mr-2">
                            <option  value="">Movimiento</option>
                            <option  value="entrada">Entrada</option>
                            <option value="salida">Salida</option>
                       
                        </select>
                            @error('tipo')
                            <p class="text-red text-xs mt-1">{{ $message }}</p>
                            @enderror
                    </div>   
                    @if($tipo==='entrada')
                        <div class="w-full md:w-1/2 ml-4"  >
                        
                        
                            <label for="cantidad" >    {{$product->medida}}  </label>
                                <input x-ref="cantidad" wire:model.defer="cantidad" 
                                type="number" class="w-full text-sm bg-gray-100 border-none rounded-xl placeholder-gray-900 px-4 py-2 mb-4" placeholder="Kg" >
                                
                                
                                @error('cantidad')
                                    <p class="text-red text-xs mt-1">{{ $message }}</p>
                                @enderror
                            
                            
                        </div>
                    @else 
                        <div class="w-full md:w-1/2 ml-4"  >
                        
                        
                            <label for="cantidad" >    {{$product->medida}}  </label>
                            <div x-ref="cantidad" wire:model.defer="cantidad" 
                            type="number" step="0.01" 
                            class="w-full text-sm bg-gray-100 border-none rounded-xl placeholder-gray-900 px-4 py-2 mb-4" placeholder="Kg" >
                            {{$cantidad}}
                            
                            </div>
            
                            
                            
                        </div>

                    @endif

                       
                </div>
                  @if($tipo==='salida')
                    <div class="flex flex-wrap -mx-3 mb-2">
                        
                        <div  class="w-full  md:w-2/5 px-2 mb-6 md:mb-0">
                        
                                <label for="metros" > Seleccione  m2 o ml:  </label>
                            
        
                                <select x-ref="metros" wire:model="metros" name="metros" id="metros" class="w-full md:w-2/3 rounded-xl border-none px-2 py-2 mr-2">
                                    <option  value=0>m2 o ml</option>
                                    <option  value=2.5>m2</option>
                                    <option value=5>ml</option>
        
                                </select>
                                @error('metros')
                                <p class="text-red text-xs mt-1">{{ $message }}</p>
                                @enderror
                        
                        </div>

                        <div class="w-full  md:w-1/2 px-3 mb-6 md:mb-0">

                        <label for="pintada" > Cantidad Pintada  </label>
                    

                        <input x-ref="pintada" wire:model.defer="pintada" 
                        type="number" 
                        wire:change="calcularCantidad({{$pintada}}, {{$metros}})"
                        class="w-full text-sm bg-gray-100 border-none rounded-xl placeholder-gray-900 px-4 py-2 mb-4" placeholder="pintada" type="number" step="0.01" required>
                        @error('pintada')
                            <p class="text-red text-xs mt-1">{{ $message }}</p>
                        @enderror
                        @error('pintada')
                            <p class="text-red text-xs mt-1">{{ $message }}</p>
                        @enderror
                        </div>   
                    
                    {{--   <div class="w-full md:w-1/2 ml-4"  >
                        
                        
                            <label for="cantidad" >    {{$product->medida}}  </label>
                                <div x-ref="cantidad" wire:model.defer="cantidad" 
                                type="number" step="0.01" 
                                class="w-full text-sm bg-gray-100 border-none rounded-xl placeholder-gray-900 px-4 py-2 mb-4" placeholder="Kg" >
                                ooooo{{$cantidad}}
                                
                                </div>
                                ccccc{{$cantidad}}<br>
                                ppppp{{$pintada}}<br>
                                mmmmm{{$metros}}<br>

                                @error('cantidad')
                                    <p class="text-red text-xs mt-1">{{ $message }}</p>
                                @enderror
                            
                            
                        </div> --}}
                    
                    </div>

                @endif
                <div>
                   
                    Lote: 
                         <input x-ref="lote" wire:model.defer="lote" type="text" class="w-full text-sm bg-gray-100 border-none rounded-xl placeholder-gray-900 px-4 py-2 mb-4" placeholder="lote" >
                         @error('lote')
                             <p class="text-red text-xs mt-1">{{ $message }}</p>
                         @enderror
                        
                     
                </div>

                <div>
                    <textarea x-ref="description" wire:model="description" name="post_description" id="post_description" cols="30" rows="2" class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2" placeholder="Descripción de movimiento." ></textarea>

                    @error('description')
                        <p class="text-red text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col md:flex-row items-center md:space-x-3">
                    <button
                        type="submit"
                        class="flex items-center justify-center h-11 w-full md:w-1/2 text-sm bg-blue text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                    >
                        Crear
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
