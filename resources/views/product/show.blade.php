<x-app-layout>
    <div>
        <a href="/" class="flex items-center font-semibold hover:underline">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="ml-2">All products</span>
        </a>
    </div>

    <livewire:product-show
        :product="$product"
        
    />

{{--     @can('update', $product)
        <livewire:product-edit 
        :product="$product"/>
    @endcan
 --}}
    <livewire:product-edit 
    :product="$product"/>

    <livewire:product-delete :product="$product" />
    
  

    <livewire:product-movements :product="$product" />

     <livewire:movement-edit />
 
    <x-notification-success />
    
</x-app-layout>