<div id="year" class="my-4 h-80 w-full" wire:ignore>

</div>
@script
<script>
    const chartBase=()=>{
        const chartDom = document.getElementById('year');
        const myChart = echarts.init(chartDom);
        const option={
                title:{
                    text:'Desglose por mes',
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
                    data: ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre']
                },
                yAxis: {
                    type: 'value'
                },
                series: [
                    {
                    data: $wire.data,
                    type: 'line'
                    }
                ]
            };
        option && myChart.setOption(option);
    }
    document.addEventListener('livewire:initialized', () => {     
        chartBase();
    })
    /* Livewire.on('setDate',({date})=>{
        let labels = [];
        chartBase();
    }); */
</script>
@endscript
