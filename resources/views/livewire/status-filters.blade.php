<nav class="hidden md:flex items-center justify-between text-gray-400 text-xs">
    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
        <li><a wire:click.prevent="setStatus('All')" href="#" class="border-b-4 pb-3 hover:border-blue @if ($status === 'All') border-blue text-gray-900 @endif">Todos Los Movimientos (87)</a></li>
        <li><a wire:click.prevent="setStatus('entradas')" href="#" class=" transition duration-150 ease-in border-b-4 pb-3 hover:border-blue @if ($status === 'entradas') border-blue text-gray-900 @endif">Entradas (6)</a></li>
        <li><a wire:click.prevent="setStatus('salidas')" href="#" class=" transition duration-150 ease-in border-b-4 pb-3 hover:border-blue @if ($status === 'salidas') border-blue text-gray-900 @endif">Salidas (1)</a></li>
    </ul>

    {{-- <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
        <li><a wire:click.prevent="setStatus('Implemented')" href="#" class=" transition duration-150 ease-in border-b-4 pb-3 hover:border-blue @if ($status === 'Implemented') border-blue text-gray-900 @endif">Implemented (10)</a></li>
        <li><a wire:click.prevent="setStatus('Closed')" href="#" class=" transition duration-150 ease-in border-b-4 pb-3 hover:border-blue @if ($status === 'Closed') border-blue text-gray-900 @endif">Closed (55)</a></li>
    </ul> --}}
</nav>