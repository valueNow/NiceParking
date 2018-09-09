<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>威宁县旅游企业经济收入结构图</title>
    <link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>
<body>
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>威宁县旅游企业经济收入结构图</h5>
    </div>
    <a href="/index.php/res/prediction/economic" class="btn btn-primary">返回列表</a>
    <div id="radar-chart" style="width: 1000px; height: 500px; position:absolute;left:50%;top:50%;margin-left:-500px;margin-top:-250px;"></div>
</div>
<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
<script src="/statics/js/plugins/echarts/echarts.min.js"></script>
<script src="/statics/js/plugins/echarts/china.js"></script>
<script type="text/javascript">
$(function () {
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
                    text: '2014经济收入分析',
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
							color: '#5ab1ef',
							label: {textStyle: {fontSize: 22},show: true}
						}
					},
                    data: [35247,29427,32791,126964,37197,23774,13000]
                }]
            },
            {
                title: {
                    text: '2015经济收入分析'
                },
                series: [{
                    data: [35247,29427,32791,44271,43230,190505,1485]
                }]
            },
            {
                title: {
                    text: '2016经济收入分析'
                },
                series: [{
                    data: [103837,1854,32791,44271,43230,190505,75805]
                }]
            },
            {
                title: {
                    text: '2017经济收入分析'
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