<div id="categories-pie" class="h-80 w-full px-2" wire:ignore>

</div>

@script
<script>
    const chartDonnut=(data)=>{
        const chartDom = document.getElementById('categories-pie');
        const myChart = echarts.init(chartDom);
        const option = {
            title:{
                    text:'Porcentaje de categorías',
                    padding:[0,5,0,5],
                    textStyle:{
                        fontSize:15
                    }
            },
            tooltip: {
                trigger: 'item',
                formatter: '{b} <b>({d}%)</b>'
            },
            legend: {
                type:'scroll',
                top: '5%',
                left: 'center'
            },
            series: [
                {
                name: 'Access From',
                type: 'pie',
                radius: ['40%', '70%'],
                avoidLabelOverlap: false,
                padAngle:3,
                itemStyle: {
                    borderRadius: 10,
                },
                label: {
                    show: false,
                    position: 'center'
                },
                emphasis: {
                    label: {
                    show: true,
                    fontSize: 20,
                    fontWeight: 'bold'
                    }
                },
                labelLine: {
                    show: false
                },
                data: data
                }
            ]
        };
        option && myChart.setOption(option);
    }
    document.addEventListener('livewire:initialized',()=>{
        chartDonnut($wire.data);
    });
    Livewire.on('setDate',({date})=>{
        let labels = [];
        $wire.watch('data',(val,old)=>{
            chartDonnut(val);
        });
    });
</script>
@endscript