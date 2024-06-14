<x-layouts.layout>
    <x-slot name="content">
        <section class="mb-3 flex gap-4">
            @livewire('categories.new-category')
        </section>
        <section class="px-2 sm:px-4 py-4 bg-slate-100 rounded-lg">
            <h1 class="font-bold text-2xl mb-4">Categorías</h1>
            <x-table class="grid-cols-3">
                <x-slot name="header">
                    <x-table-cell content="Nombre"/>
                    <x-table-cell content="Monto total"/>
                    <x-table-cell />
                </x-slot>
                <x-slot name="body">
                    @foreach ($data as $category)
                        <x-table-body-row class="grid-cols-3">
                            <x-slot name="labels">
                                <x-table-cell content="Categoría"/>
                                <x-table-cell content="Monto total"/>
                            </x-slot>
                            <x-slot name="cells">
                                <x-table-cell style="color:{{$category->color}};" class="font-medium" content='{{$category->name}}'/>
                                <x-table-cell content="${{number_format($category->gastos->sum('cantidad')??0,2)}}"/>
                                <x-table-cell class="flex justify-center items-center sm:px-0 absolute top-0 sm:bottom-0 right-0 sm:right-4">
                                    <x-slot name="content">
                                        <x-options>
                                            <x-slot name="button">
                                                <button class="p-1 flex items-center justify-center text-indigo-900 sm:text-indigo-400 hover:text-indigo-900 transition-colors duration-300">
                                                    <x-icons.dots-horizontal class="size-6"/>
                                                </button>
                                            </x-slot>
                                            <x-slot name="options">
                                                @livewire('categories.edit-category',['id'=>$category->id],key('ed'.$category->id))
                                                @livewire('categories.delete-category',['id'=>$category->id],key('el'.$category->id))
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