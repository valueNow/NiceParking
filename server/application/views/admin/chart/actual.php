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
	    color: ["#f9882c", "#24c5fb"],
	    title: {
			text: '客流量分析',
			textStyle: {color: "#fff"}
		},
	    textStyle: {color: "#fff"},
	    legend: {
	        orient: 'vertical',
	        x: 'right',
	        textStyle: {color: "#FFF"},
	        data: ['预期人数', '实到人数']
	    },
	    grid: {
			left: '3%',
			right: '4%',
			bottom: '3%',
			containLabel: true
		},
	    xAxis: [{
	        type: 'category',
	        data: ['1月', '2月', '3月', '4月', '5月', '6月', '7月']
	    }],
	    yAxis: [{
	        type: 'value',
	        name: "单位：(万人)"
	    }],
	    tooltip: {
	        trigger: 'axis',
	        axisPointer: { // 坐标轴指示器，坐标轴触发有效
	            type: 'line' // 默认为直线，可选为：'line' | 'shadow'
	        }
	    },
	    series: [{
	        name: '预期人数',
	        type: 'bar',
	        barWidth: 10,
	        itemStyle: {
	            normal: {
	                barBorderRadius: 6
	            }
	        },
	        data: [120, 50, 60, 50, 230, 190,170]
	    }, {
	        name: '实到人数',
	        type: 'bar',
	        barWidth: 10,
	        itemStyle: {
	            normal: {
	                barBorderRadius: 5
	            }
	        },
	        data: [66, 35, 58, 68, 267, 230,0]
	    }, ]
	};
	radarChart.setOption(radaroption);
});
</script>
</body>
</html>