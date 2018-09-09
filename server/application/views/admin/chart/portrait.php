<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>游客画像数据分析</title>
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
		color:["#f9882c","#10d5f7","#f7b719","#ff715e","#f1a76c","#58d0f9"],
		title: {
			text: '游客年龄段分析',
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
	        data:['15岁以下','15-24岁','25-34岁','35-44岁','45-59岁','60岁以上'],
	        textStyle: {color: '#fff'}
	    },
	    series: [
	        {
	            name:'年龄段：',
	            type:'pie',
	            center: ['35%', '45%'],
	            radius: [0, '60%'],
	            data:[
	                {value:1, name:'15岁以下'},
	                {value:15.9, name:'15-24岁'},
	                {value:37.1, name:'25-34岁'},
	                {value:27.9, name:'35-44岁'},
	                {value:16.1, name:'45-59岁'},
	                {value:2, name:'60岁以上'}
	            ],
	            itemStyle: {
	                normal: {
	                    label:{
	                    	position: 'inner',
	                        formatter: '{d}%' 
	                    }
	                }
	            }
	        }
	    ]
	};
	pieChart.setOption(pieoption);
});
</script>
</body>
</html>