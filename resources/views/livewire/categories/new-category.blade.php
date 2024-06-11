<x-modal tittle="{{__('Nueva categoría')}}">
    <x-slot name="button">
        <button class="bg-green-700 text-green-200 px-2 py-1 rounded-md hover:bg-green-800 transition-colors duration-300">Nueva categoría</button>
    </x-slot>
    <x-slot name="form">
        <div class="flex gap-3 flex-wrap sm:flex-nowrap">
            <x-label for="name" value="{{__('Nombre')}}" required>
                <x-slot name="input">
                    <x-input wire:model='name'/>
                    <x-input-error for="name"/>
                </x-slot>
            </x-label>
        </div>
    </x-slot>
    <x-slot name="ButtonAction">
        <button wire:click="newCategory" type="button" class="bg-green-700 text-green-200 px-2 py-1 rounded-md hover:bg-green-800 transition-colors duration-300">Registrar</button>
    </x-slot>
</x-modal>
