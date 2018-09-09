<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
<style type="text/css">
    *{margin: 0;padding: 0;}
</style>
</head>
<body>
<div id="radar-chart"></div>
<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
<script src="/statics/js/plugins/echarts/echarts.min.js"></script>
<script src="/statics/js/plugins/echarts/china.js"></script>
<script type="text/javascript">
function randomData() {
    return Math.round(Math.random()*1000);
}
$(function () {
    //设置div宽高
    var oWidth=$(window).width();
    var oHidth=$(window).height();
    $("#radar-chart").css({"height":oHidth+"px","width":oWidth+"px"});

    var radarChart = echarts.init(document.getElementById("radar-chart"));
    var radaroption = {
        timeline: {
            axisType: 'category',
            autoPlay: true,
            playInterval: 5000,
            label: {
                normal: {
                    textStyle: {color: '#ddd'}
                }
            },
            controlStyle: {
                normal: {
                    color: '#fff',
                    borderColor: '#fff'
                },
                emphasis: {
                    color: '#fff',
                    borderColor: '#fff'
                }
            },
            data: ['2014', '2015', '2016', '2017']
        },

        options: [{
             //backgroundColor: "#000",
                title: {
                    text: '2014财务状况分析',
                    textStyle: {color: '#fff'},
                    left: 'left'
                },
                textStyle: {color: "#fff"},
                tooltip: {
                    trigger: 'axis'
                },

                calculable: true,
                grid: {
                    y: 50,
                    x: 60,
                    x2: 20,
                    y2: 80
                },
                xAxis: [{
                    type: 'category',
                    axisLabel: {
                        interval: 0
                    },
                    data: ['餐饮','酒店','景点','游乐场','农家乐','停车场','租车',]
                }],
                yAxis: [{
                    type: 'value',
                    textStyle: {color: '#fff'}
                }],
                series: [{
                    name: '盈利',
                    type: 'bar',
                    markLine: {
                        symbol: ['arrow', 'none'],
                        symbolSize: [4, 2],
                        itemStyle: {
                            normal: {
                                lineStyle: {
                                    color: 'orange'
                                },
                                barBorderColor: 'orange',
                                label: {
                                    position: 'left',
                                    formatter: function (params) {
                                        return Math.round(params.value);
                                    },
                                    textStyle: {
                                        color: 'orange'
                                    }
                                }
                            }
                        },
                        data: [{
                            type: 'average',
                            name: '平均值'
                        }]
                        
                    },
                    itemStyle: {  
                        normal: {
                        	barBorderRadius: 15,
                            color: '#5ab1ef'
                        }  
                    },
                    data: [35247,29427,32791,126964,37197,23774,13000]
                }]
            },
            {
                title: {
                    text: '2015财务状况分析'
                },
                series: [{
                    data: [35247,29427,32791,44271,43230,190505,0]
                }]
            },
            {
                title: {
                    text: '2016财务状况分析'
                },
                series: [{
                    data: [103837,0,32791,44271,43230,190505,75805]
                }]
            },
            {
                title: {
                    text: '2017财务状况分析'
                },
                series: [{
                    data: [106691,35247,29427,32791,44271,43230,75805]
                }]
            }
        ]
    };
    radarChart.setOption(radaroption);
});
</script>
</body>
</html>