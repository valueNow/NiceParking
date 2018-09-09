<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>广告推广力度</title>
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
	    color:["#f9882c","#10d5f7","#d8a320","#24c5fb","#f1a76c","#58d0f9"],
		//backgroundColor: "#000",
        title : {
			text: '广告推广',
			x:'left',
			textStyle: {color: '#fff'}
		},
		tooltip: {
			trigger: 'item',
			formatter: "{a} <br/>{b}: {c} ({d}%)"
		},
//			legend: {
//				orient: 'vertical',
//				x: 'left',
//				data:['直达','营销广告','搜索引擎','邮件营销','联盟广告','视频广告','百度','谷歌','必应','其他']
//			},
		series: [
			{
				name:'推广方式',
				type:'pie',
				selectedMode: 'single',
				radius: [0, '30%'],
				label: {
					normal: {
						position: 'inner'
					}
				},
				data:[
					{value:335, name:'直达', selected:true},
					{value:679, name:'营销广告'},
					{value:1548, name:'搜索引擎'}
				]
			},
			{
				name:'推广渠道',
				type:'pie',
				radius: ['40%', '65%'],
				data:[
//					{value:335, name:'直达'},
					{value:310, name:'邮件营销'},
					{value:234, name:'联盟广告'},
					{value:135, name:'视频广告'},
					{value:1048, name:'百度'},
					{value:251, name:'谷歌'},
//					{value:147, name:'必应'},
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