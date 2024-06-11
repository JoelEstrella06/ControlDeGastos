<x-modal>
    <x-slot name="button">
        <button class="bg-green-700 text-green-200 px-2 py-1 rounded-md hover:bg-green-800 transition-colors duration-300">Nuevo registro</button>
    </x-slot>
    <x-slot name="form">
        <div class="flex gap-3 flex-wrap sm:flex-nowrap">
            <x-label for="category" value="{{__('Categoría')}}" required>
                <x-slot name="input">
                    <select name="category" id="category" class="border rounded-lg px-2 py-1" wire:model='category'>
                        <option hidden>Seleccionar categoría</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <x-input-error for="category"/>
                </x-slot>
            </x-label>
            <x-label for="cant" value="{{__('Monto invertido')}}" required>
                <x-slot name="input">
                    <x-input type="number" min="1" step="any" wire:model='monto'/>
                    <x-input-error for="monto"/>
                </x-slot>
            </x-label>
        </div>
        <div class="mt-2">
            <x-label for="fecha" value="{{__('Fecha')}}" required>
                <x-slot name="input">
                    <x-input type="date" wire:model='fecha'/>
                    <x-input-error for="fecha"/>
                </x-slot>
            </x-label>
        </div>
        <div>
            <x-label for="description" value="{{__('Descripción')}}">
                <x-slot name="input">
                    <textarea class="border rounded-lg w-full resize-none p-2" name="" id="" cols="20" rows="5" wire:model='description'></textarea>
                </x-slot>
            </x-label>
        </div>
    </x-slot>
    <x-slot name="ButtonAction">
        <button wire:click="newRegistro" type="button" class="bg-green-700 text-green-200 px-2 py-1 rounded-md hover:bg-green-800 transition-colors duration-300">Registrar</button>
    </x-slot>
</x-modal>
