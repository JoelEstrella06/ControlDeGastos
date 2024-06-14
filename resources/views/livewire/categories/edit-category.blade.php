<x-modal>
    <x-slot name="button">
        <button class="flex gap-2 items-center text-indigo-900 hover:text-blue-500 transition-colors duration-300">
            <x-icons.edit class="size-4"/>
            <span>Editar</span>
        </button>
    </x-slot>
    <x-slot name="form">
        <div class="flex gap-3 flex-wrap sm:flex-nowrap">
            <x-label for="name" value="{{__('Nombre')}}" required>
                <x-slot name="input">
                    <x-input wire:model='name'/>
                    <x-input-error for="name"/>
                </x-slot>
            </x-label>
            <x-label for="color" value="{{__('Etiqueta')}}">
                <x-slot name="input">
                    <input wire:model='color' type="color" id="color" class="p-0 overflow-hidden bg-transparent cursor-pointer w-full">
                    <x-input-error for="color"/>
                </x-slot>
            </x-label>
        </div>
        <x-slot name="ButtonAction">
            <button wire:click="categoryUpdate" wire:loading.attr='disabled' type="button" class="bg-green-700 text-green-200 px-2 py-1 rounded-md hover:bg-green-800 transition-colors duration-300">
                <x-icons.spinner class="size-5 fill-green-400 text-green-900 animate-spin" wire:loading wire:target='categoryUpdate'/>
                <span>Actualizar</span>
            </button>
        </x-slot>
    </x-slot>
</x-modal>
