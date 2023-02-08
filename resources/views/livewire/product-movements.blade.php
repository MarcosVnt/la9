<div>
    @if ($movements->isNotEmpty())

        <div class="comments-container relative space-y-6 md:ml-22 pt-4 my-8 mt-1">

            @foreach ($movements as $movement)

       
             <livewire:product-movement
                    :key="$movement->id"
                    :movement="$movement"
                    :productUserId="$movement->user->id"
                />  
                
            @endforeach
        </div>

        <div class="my-8 md:ml-22">
           {{--  {{ $movements->onEachSide(1)->links() }} --}}
        </div>
    @else
        <div class="mx-auto w-70 mt-12">
            <img src="{{ asset('img/no-ideas.svg') }}" alt="No Movements" class="mx-auto mix-blend-luminosity">
            <div class="text-gray-400 text-center font-bold mt-6">No movements yet...</div>
        </div>
    @endif
</div>
