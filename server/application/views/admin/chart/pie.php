<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>到达方式分析</title>
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
	//饼图
	var pieChart = echarts.init(document.getElementById("echarts-pie-chart"));
	var pieoption = {
		color:["#f9882c","#10d5f7","#f7b719","#24c5fb","#f1a76c","#58d0f9"],
		//backgroundColor: "#000",
		title: {
			text: '到达方式分析',
			left: 'left',
			textStyle: {color: '#fff'}
		},
	    tooltip: {
	        trigger: 'item',
	        formatter: "{a} <br/>{b}: ({d}%)"
	    },
	    legend: {
	        orient: 'vertical',
	        x: 'right',
	        data:['公共交通','飞机','火车','自驾','骑行','租车'],
	        textStyle: {color: '#fff'}
	    },
	    series: [
	        {
	            name:'到达方式：',
	            type:'pie',
	            radius: ['30%', '55%'],
	            data:[
	                {value:55, name:'飞机'},
	                {value:235, name:'公共交通'},
	                {value:310, name:'火车'},
	                {value:234, name:'自驾'},
	                {value:234, name:'骑行'},
	                {value:148, name:'租车'}
	            ]
	        }
	    ]
	};
	pieChart.setOption(pieoption);
});
</script>
</body>
</html>