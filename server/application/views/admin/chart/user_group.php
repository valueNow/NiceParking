<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>商家客群数据分析</title>
<style type="text/css">
	*{margin: 0;padding: 0;}
</style>
</head>
<body>
<div id="echarts-pie-chart"></div>
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
    $("#echarts-pie-chart").css({"height":oHidth+"px","width":oWidth+"px"});

	var pieChart = echarts.init(document.getElementById("echarts-pie-chart"));
	var pieoption = {
		//backgroundColor: "#000",
		color:["#f3a43b"],
		tooltip: {
	        trigger: 'axis',
	    },
	    legend: {
	    	textStyle: {color: "#fff"},
	        data: ['平均消费', '旅游人数'],
	        x:'left'
	    },
	    xAxis: [{
	        type: 'category',
	        axisTick: {
	            alignWithLabel: true
	        },
	        data: ['东北', '西南', '西北', '华南', '华中', '华东', '华东']
	    }],
	    textStyle: {color: "#fff"},
	    yAxis: [{
	        type: 'value',
	        name: '平均消费(元)',
	        min: 0,
	        position: 'left',
	        axisLabel: {
	            formatter: '{value}'
	        }
	    }, {
	        type: 'value',
	        name: '人数（万）',
	        min: 0,
	        position: 'right',
	        axisLabel: {
	            formatter: '{value}'
	        }
	    }],
	    series: [{
	        name: '平均消费',
	        type: 'line',
	        label: {
	            normal: {
	                show: true,
	                position: 'top',
	                barBorderRadius:15,
	            }
	        },
	        data: [500, 800, 400, 700, 600, 300, 400]
	    }, {
	        name: '旅游人数',
	        type: 'bar',
	        yAxisIndex: 1,
	        label: {
	            normal: {
	                show: true,
	                position: 'top'
	            }
	        },
	        data: [95, 34, 23, 77, 60, 45, 55]
	    }]
	};
	pieChart.setOption(pieoption);
});
</script>
</body>
</html>