<x-layouts.layout>
    <x-slot name="content">
        <section class="px-2 sm:px-4 py-4 bg-slate-100 rounded-lg">
            <h1 class="font-bold text-2xl mb-4">Gastos registrados</h1>
            <x-table class="grid-cols-3">
                <x-slot name="header">
                    <x-table-cell content="Categoría"/>
                    <x-table-cell content="Monto"/>
                    <x-table-cell content="Fecha"/>
                </x-slot>
                <x-slot name="body">
                    @foreach ($data as $gasto)
                        <x-table-body-row class="grid-cols-3">
                            <x-slot name="labels">
                                <x-table-cell content="Categoría"/>
                                <x-table-cell content="Monto"/>
                                <x-table-cell content="Fecha"/>
                            </x-slot>
                            <x-slot name="cells">
                                <x-table-cell content='{{$gasto->categoria->name}}'/>
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
                                                <div>Inspeccionar</div>
                                                <div>Eliminar</div>
                                                <div></div>
                                            </x-slot>
                                        </x-options>
                                    </x-slot>
                                </x-table-cell>
                            </x-slot>
                        </x-table-body-row>
                    @endforeach
                </x-slot>
            </x-table>
            
            {{$data->links()}}
        </section>
    </x-slot>
</x-layouts.layout>