<div  class="border my-4 h-80 w-full bg-slate-100 rounded-lg">
    <div id="categories-pie" class="my-4 h-80 w-full px-2" wire:ignore>

    </div>
</div>

@script
<script>
    const chartDom = document.getElementById('categories-pie');
    const myChart = echarts.init(chartDom);
    let option;
    option = {
    tooltip: {
        trigger: 'item',
        formatter: '{b} : {c} ({d}%)'
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
        data: [
            { value: 1048, name: 'Search Engine' },
            { value: 735, name: 'Direct' },
            { value: 580, name: 'Email' },
            { value: 484, name: 'Union Ads' },
            { value: 300, name: 'Video Ads' }
        ]
        }
    ]
    };

option && myChart.setOption(option);
</script>
@endscript