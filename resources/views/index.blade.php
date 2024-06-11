<x-layouts.layout>
    <x-slot name="content">
        <script src="https://cdn.jsdelivr.net/npm/echarts@5.5.0/dist/echarts.min.js"></script>
        @livewire('gastos.new-gasto')
        <div class="p-2 my-4 w-full bg-slate-100 rounded-lg">
            <h2 class="font-medium text-indigo-900 text-xl mb-3 px-2 pb-1 border-b border-indigo-200">Año en curso</h2>
            @livewire('charts.chart-year')
        </div>
        <div class="p-2 my-4 w-full bg-slate-100 rounded-lg">
            <h2 class="font-medium text-indigo-900 text-xl mb-3 px-2 pb-1 border-b border-indigo-200">Datos mensuales</h2>
            @livewire('charts.filter-input-date')
            <br>
            <div class="grid grid-cols-1 grid-rows-2 sm:grid-cols-3 sm:grid-rows-1 w-full">
                @livewire('charts.categories-chart')
                <div class="sm:col-span-2">
                    @livewire('charts.categories-cantity-chart')
                </div>
            </div>
        </div>
    </x-slot>
</x-layouts.layout>