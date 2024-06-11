<x-modal>
    <x-slot name="button">
        <button class="flex gap-2 items-center text-indigo-900 hover:text-blue-500 transition-colors duration-300">
            <x-icons.info class="size-4"/>
            <span>Detalles</span>
        </button>
    </x-slot>
    <x-slot name="form">
        <div>
            <div class="flex flex-wrap gap-3">
                <div class="felx gap-2">
                    <span class="font-medium">Categoría: </span>
                    <span>{{$data->categoria->name}}</span>
                </div>
                <div class="felx gap-2">
                    <span class="font-medium">Fecha: </span>
                    <span>{{$data->date}}</span>
                </div>
                <div class="felx gap-2">
                    <span class="font-medium">Monto: </span>
                    <span>${{number_format($data->cantidad,2)}}</span>
                </div>
            </div>
            <div class="mt-2">
                <span class="font-medium">Descripción:</span>
                <p class="text-slate-700">{{$data->description!=''?$data->description:'Sin descripción'}}</p>
            </div>
        </div>
    </x-slot>
</x-modal>
