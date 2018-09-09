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
		//backgroundColor: "#000",
	    color: ['#24c5fb', '#f9882c', '#f9882c'],
	    title: [{
	        text: '每天各时间点客流情况',
	        textStyle: {
	            color: '#fff',
	            fontSize: '16'
	        }
	    }],
	    tooltip: {
	        trigger: 'axis'
	    },
	    grid: {
	        left: '1%',
	        right: '35%',
	        top: '16%',
	        bottom: '6%',
	        containLabel: true
	    },
	    xAxis: {
	        type: 'category',
	        "axisLine": {
	            lineStyle: {
	                color: '#FFF'
	            }
	        },
	        "axisTick": {
	            "show": false
	        },
	        axisLabel: {
	            textStyle: {
	                color: '#fff'
	            }
	        },
	        boundaryGap: false,
	        data: ['6:00', '9:00', '12:00', '14:00', '16:00', '18:00']
	    },
	    yAxis: {
	        "axisLine": {
	            lineStyle: {
	                color: '#FFF'
	            }
	        },
	        splitLine: {
	            show: true,
	            lineStyle: {
	                color: '#FFF'
	            }
	        },
	        "axisTick": {
	            "show": false
	        },
	        axisLabel: {
	            textStyle: {
	                color: '#fff'
	            }
	        },
	        type: 'value'
	    },
	    series: [{
	        name: '人次',
	        smooth: true,
	        type: 'line',
	        symbolSize: 8,
	      	symbol: 'circle',
	        data: [125, 1254, 214, 85, 854, 985]
	    },
	    {
	        type: 'pie',
	        center: ['83%', '23%'],
	        radius: ['45%', '30%'],
	        label: {
	            normal: {
	                position: 'center'
	            }
	        },
	        data: [{
	            value: 1685,
	            label: {
	                normal: {
	                    formatter: '{d} %',
	                    textStyle: {
	                        color: '#FFF',
	                        fontSize: 14

	                    }
	                }
	            }
	        }, {
	            value: 8547,
	            tooltip: {
	                show: false
	            },
	            label: {
	                normal: {
	                    textStyle: {
	                        color: '#FFF',
	                    },
	                    formatter: '\n周占比'
	                }
	            }
	        }]
	    },


	    {
	        type: 'pie',
	        center: ['83%', '72%'],
	        radius: ['45%', '30%'],
	        label: {
	            normal: {
	                position: 'center'
	            }
	        },
	        data: [{
	            value: 1685,
	            label: {
	                normal: {
	                    formatter: '{d} %',
	                    textStyle: {
	                        color: '#FFF',
	                        fontSize: 14
	                    }
	                }
	            }
	        }, {
	            value: 58547,
	            tooltip: {
	                show: false
	            },
	            label: {
	                normal: {
	                    textStyle: {
	                        color: '#FFF',
	                    },
	                    formatter: '\n月占比'
	                }
	            }
	        }]
	    }]
	};
	radarChart.setOption(radaroption);
});
</script>
</body>
</html>