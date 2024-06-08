<div id="category-cantity" class="h-80 w-full px-2" wire:ignore>
</div>
@script
<script>
    const chartCategoryCantity=(data)=>{
        const chartDom = document.getElementById('category-cantity');
        const myChart = echarts.init(chartDom);
        const option = {
            title:{
                text:'Gasto por categoría',
                padding:[0,5,0,5],
                textStyle:{
                    fontSize:15
                }
            },
            tooltip:{
                trigger:'axis',
                axisPointer: {
                    type: 'shadow'
                }
            },
            xAxis: {
                type: 'category',
                data: $wire.labels
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                data: data,
                type: 'bar'
            }]
        };

        option && myChart.setOption(option);
    }
    document.addEventListener('livewire:initialized',()=>{
        chartCategoryCantity($wire.data);
    });
    Livewire.on('setDate',({date})=>{
        $wire.watch('data',(val,old)=>{
            chartCategoryCantity(val);
        });
    });
</script>
@endscript