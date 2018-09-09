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
	    //color: ["#f9882c", "#24c5fb"],
	    title: {
			text: '游客时间偏好分析',
			x:'left',
			textStyle: {color: "#fff"}
		},
		tooltip: {
	        trigger: 'item',
	        formatter: "{a} <br/>{b}: ({d}%)"
	    },
	    textStyle: {color: "#fff"},
	    grid: {
			left: '1%',
			right: '2%',
			bottom: '3%',
			containLabel: true
		},
	    xAxis: [{
	        type: 'category',
	        //data: ['国庆', '春节', '清明', '劳动', '端午', '中秋', '元旦']
	        data: ['1月', '2月', '3月', '4月', '5月', '6月', '7月','8月','9月','10月','11月','12月']
	    }],
	    yAxis: [{
	        type: 'value',
	        name: "             每月停留时间(天)"
	    }],
	    series: [{
	        name: '停留时间',
	        type: 'bar',
	        data: [5,3,3,4,12,8,7,4,6,16,7,4],
	        itemStyle: {  
				normal: {
					barBorderRadius: 15,
					color: '#1eaede',
					label: {show: true}
				}  
			}
	    }
	    ]
	};
	radarChart.setOption(radaroption);
});
</script>
</body>
</html>