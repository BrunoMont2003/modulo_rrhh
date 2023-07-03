<button wire:click="toggle" class="w-full flex items-center justify-center">
    @if ($theme == 'dark')
        @livewire('icons.sun')
    @else
        @livewire('icons.moon')
    @endif

</button>
