<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>本周气温变化</title>
<style type="text/css">
	*{margin: 0;padding: 0;}
</style>
</head>
<body>
<div id="echarts-pie2-chart"></div>
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
    $("#echarts-pie2-chart").css({"height":oHidth+"px","width":oWidth+"px"});
	//饼图
	var pie2Chart = echarts.init(document.getElementById("echarts-pie2-chart"));
	var pie2option = {
		//backgroundColor: "#000",
		color:["#f9882c","#24c5fb"],
        title: {
        	textStyle: {color: '#fff'},
	        text: '本周气温变化'
	    },
	    tooltip: {
	        trigger: 'axis'
	    },
	    legend: {
	    	left: 'right',
	    	textStyle: {color: '#fff'},
	        data:['最高气温','最低气温']
	    },
	    grid:{
            x:50,
            x2:50
        },
	    xAxis:  {
	        type: 'category',
	        data: ['周一','周二','周三','周四','周五','周六','周日']
	    },
	    yAxis: {
	        type: 'value',
	        axisLabel: {
	            formatter: '{value} °C'
	        }
	    },
	    textStyle: {color: '#fff'},
	    series: [
	        {
	            name:'最高气温',
	            type:'line',
	            data:[23, 24, 25, 25, 26, 25,25],
	            markPoint: {
	                data: [
	                    {type: 'max', name: '最大值'},
	                    {type: 'min', name: '最小值'}
	                ]
	            },
	            markLine: {
	                data: [
	                    {type: 'average', name: '平均值'}
	                ]
	            }
	        },
	        {
	            name:'最低气温',
	            type:'line',
	            data:[13, 13, 15, 15, 15, 14, 15],
	            markPoint: {
	                data: [
	                    {name: '周最低', value: -2, xAxis: 1, yAxis: -1.5}
	                ]
	            },
	            markLine: {
	                data: [
	                    {type: 'average', name: '平均值'}
	                ]
	            }
	        }
	    ]
    };
	pie2Chart.setOption(pie2option);
});
</script>
</body>
</html>