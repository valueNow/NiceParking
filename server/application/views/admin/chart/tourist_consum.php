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

	var pie2Chart = echarts.init(document.getElementById("echarts-pie2-chart"));
	var pie2option = {		 		 
		  color:["#f9882c","#10d5f7","#f7b719","#24c5fb","#f1a76c","#58d0f9"],
		//backgroundColor: "#000",
        title : {
			text: '游客消费偏好分析',
			x:'left',
			textStyle: {color: '#fff'}
		},
		tooltip: {
			trigger: 'item',
			formatter: "{a} <br/>{b}：({d}%)"
		},
		series: [
			{
				name:'消费类型',
				type:'pie',
				center: ['50%', '56%'],
				radius: ['30%', '65%'],
				data:[
//					{value:335, name:'酒店'},
					{value:310, name:'景点'},
					{value:234, name:'餐饮'},
					{value:251, name:'购物'},
					{value:848, name:'娱乐'},
					{value:235, name:'交通'},
					{value:102, name:'其他'}
				]
			}
		]
    };
	pie2Chart.setOption(pie2option);
});
</script>
</body>
</html>