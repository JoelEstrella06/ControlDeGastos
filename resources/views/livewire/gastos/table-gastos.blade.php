<div>
    <div class="flex flex-wrap justify-between items-center">
        <h1 class="font-bold text-2xl mb-4">Gastos registrados</h1>
        <div class="flex gap-2">
            <livewire:docs.dowload-gastos-doc/>
            <select name="category" id="category" wire:model.live='category' class="border p-1 rounded-lg">
                <option value="">Todos</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    @if ($this->data->count() > 0)
        <x-table class="grid-cols-3">
            <x-slot name="header">
                <x-table-cell content="Categoría"/>
                <x-table-cell content="Monto"/>
                <x-table-cell content="Fecha"/>
            </x-slot>
            <x-slot name="body">
                @foreach ($this->data as $gasto)
                    <div wire:key='row_{{$gasto->id}}'>
                        <x-table-body-row class="grid-cols-3">
                            <x-slot name="labels">
                                <x-table-cell content="Categoría"/>
                                <x-table-cell content="Monto"/>
                                <x-table-cell content="Fecha"/>
                            </x-slot>
                            <x-slot name="cells">
                                <x-table-cell style="color: {{$gasto->categoria->color}};" class="font-medium" content='{{$gasto->categoria->name}}'/>
                                <x-table-cell content="${{number_format($gasto->cantidad,2)}}"/>
                                <x-table-cell content="{{$gasto->date}}"/>
                                <x-table-cell class="flex justify-center items-center sm:px-0 absolute top-0 sm:bottom-0 right-0 sm:right-4">
                                    <x-slot name="content">
                                        <x-options>
                                            <x-slot name="button">
                                                <button class="p-1 flex items-center justify-center text-indigo-900 sm:text-indigo-400 hover:text-indigo-900 transition-colors duration-300">
                                                    <x-icons.dots-horizontal class="size-6"/>
                                                </button>
                                            </x-slot>
                                            <x-slot name="options">
                                                <livewire:gastos.detail-gasto :id="$gasto->id" :key="'info'.$gasto->id"/>
                                                <livewire:gastos.delete-gasto :id="$gasto->id" :key="'del'.$gasto->id"/>
                                            </x-slot>
                                        </x-options>
                                    </x-slot>
                                </x-table-cell>
                            </x-slot>
                        </x-table-body-row>
                    </div>
                @endforeach
            </x-slot>
        </x-table>
    @else
        <div class="text-slate-400 flex flex-col items-center">
            <x-icons.folder-open class="size-32"/>
            <h3 class="font-medium text-xl">No se encontraron registros asociados.</h3>
        </div>
    @endif
    {{$this->data->links()}}
</div>
