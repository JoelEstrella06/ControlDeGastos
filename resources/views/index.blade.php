<x-layouts.layout>
    <x-slot name="content">
        <script src="https://cdn.jsdelivr.net/npm/echarts@5.5.0/dist/echarts.min.js"></script>
        @livewire('new-gasto')
        @livewire('charts.chart-year')
        @livewire('charts.categories-chart')
    </x-slot>
</x-layouts.layout>