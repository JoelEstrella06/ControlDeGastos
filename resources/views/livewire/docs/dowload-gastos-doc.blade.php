<x-modal>
    <x-slot name="button">
        <button class="p-2 bg-white rounded-lg border hover:bg-slate-200 transition-colors duration-300">
            <x-icons.excel class="size-6"/>
        </button>
    </x-slot>
    <x-slot name="form">
        <div class="flex flex-wrap gap-2 justify-center sm:justify-start">
            <x-label for="start" value="Fecha de inicio" required>
                <x-slot name="input">
                    <x-input id="start" type="date" wire:model='start'/>
                </x-slot>
            </x-label>
            <x-label for="end" value="Fecha de término" required>
                <x-slot name="input">
                    <x-input id="end" type="date" wire:model='end'/>
                </x-slot>
            </x-label>
        </div>
        <x-input-error for='date'/>
        
    </x-slot>
    <x-slot name="ButtonAction">
        <button wire:click="genDoc" wire:loading.attr='disabled' type="button" class="bg-green-700 text-green-200 px-2 py-1 rounded-md hover:bg-green-800 transition-colors duration-300">
            <x-icons.spinner class="size-5 fill-green-400 text-green-900 animate-spin" wire:loading wire:target='categoryUpdate'/>
            <span>Actualizar</span>
        </button>
    </x-slot>
</x-modal>
