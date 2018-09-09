<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>游客来源</title>
<style type="text/css">
	*{margin: 0;padding: 0;}
</style>
</head>
<body>
<div id="fk-chart"></div>
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
    $("#fk-chart").css({"height":oHidth+"px","width":oWidth+"px"});

	var fkChart = echarts.init(document.getElementById("fk-chart"));
	var fkoption = {
		//backgroundColor: "#000",
		title: {
			text: '游客来源分析',
			textStyle: {color: '#fff'}
		},
		tooltip: {
			trigger: 'axis',
			axisPointer: {
				type: 'shadow'
			},
			formatter: "{a} <br/>{b} : {c}%"
		},
		grid: {
			left: '3%',
			right: '4%',
			bottom: '3%',
			top:'15%',
			containLabel: true
		},
		xAxis: {
			type: 'value',
			boundaryGap: [0, 0.01],
			axisLabel: {
				interval: 0,
				textStyle: {color: '#fff'},
				formatter: '{value}%',
			}
		},
		yAxis: {
			type: 'category',
			axisLabel: {
                textStyle: {color: '#fff'}
            },
			data: ['其他','购物网站','酒店航空官网','旅游门户网站','旅游论坛','通过搜索引擎']
		},
		series: [{
			name: '2016年占比',
			type: 'bar',
			data: [5, 7, 9, 11, 23, 45],
			itemStyle: {  
				normal: {			
					barBorderRadius: 15,
					color: '#f3a43b'								
				}
			}
		}]
	};
	fkChart.setOption(fkoption);
});
</script>
</body>
</html>