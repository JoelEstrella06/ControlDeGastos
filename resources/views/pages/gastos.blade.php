<x-layouts.layout>
    <x-slot name="content">
        <section class="mb-3 flex gap-4">
            @livewire('gastos.newgasto')
        </section>
        <section class="px-2 sm:px-4 py-4 bg-slate-100 rounded-lg">
            <livewire:gastos.table-gastos />
            {{-- <form action="{{to_route('gastos.search')}}">
                <select name="category" id="category" wire:model.live='category'>
                    <option value="">Todos</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </form>
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
                                                @livewire('gastos.detail-gasto',['id'=>$gasto->id],key($gasto->id))
                                                @livewire('gastos.delete-gasto',['id'=>$gasto->id],key($gasto->id))
                                            </x-slot>
                                        </x-options>
                                    </x-slot>
                                </x-table-cell>
                            </x-slot>
                        </x-table-body-row>
                    @endforeach
                </x-slot>
            </x-table> --}}
            
            {{-- {{$data->links()}} --}}
        </section>
    </x-slot>
</x-layouts.layout>