<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>商家经营数据分析</title>
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
		//backgroundColor: "#000",
		color:["#5ab1ef"],
		title: {
	        text: '商家经营数据分析',
	        textStyle: {
	            color: '#fff'
	        }
	    },
	    textStyle: {color: "#fff"},
	    grid: {
	        left: '1%',
	        right: '2%',
	        top: '16%',
	        bottom: '9%',
	        containLabel: true
	    },
	    xAxis: {
	        type: 'category',
	        axisLabel: {
	            textStyle: {color: '#fff'},
                interval:0,
                rotate:45
	        },
	        data: ['0-200','200-400','400-600','600-800','800-1000','>1000']
	    },
	    yAxis: {
	        type: 'value',
            axisLabel: {
                formatter: '{value}%',
            }
	    },
	    series: [
	        {
	            type: 'bar',
	            barWidth: 40,
	            label: {
			        normal: {
			            show: true,
			            position: 'inside',
			            barBorderRadius:15,
			            formatter: '{c}%'
			        }
			    },
	            data: [17.60, 29.80, 23.90, 11.70, 13.00, 3.90]
	        }
	    ]
	};
	pieChart.setOption(pieoption);
});
</script>
</body>
</html>