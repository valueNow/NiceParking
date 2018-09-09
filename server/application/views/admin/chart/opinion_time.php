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
		//backgroundColor: '#161627',
		color: ['#00a0e9'],
	    title: {
			text: '舆情事件时间分布',
			textStyle: {color: '#fff'}
		},
		tooltip: {
			trigger: 'axis'
		},
		grid:{
            x2:20,
            y2:24
        },
		textStyle: {color: '#fff'},
		xAxis:  {
			type: 'category',
			boundaryGap: false,
			data: ['元旦', '春节', '清明', '劳动', '端午', '中秋', '国庆']
		},
		yAxis: {
			type: 'value'
		},
		series: [
			{
				name:'舆情(条)',
				type:'line',
				data:[0,6,5,5,7,1,16],
				markPoint: {
					data: [
						{type: 'max', name: '最大值'},
						{type: 'min', name: '最小值'}
					]
				}
			}
		]
	};
	radarChart.setOption(radaroption);
});
</script>
</body>
</html>