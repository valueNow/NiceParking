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
		title: {
			text: '客源地分析（万人）',
			textStyle: {color: '#fff'}
		},
	    tooltip : {
            trigger: 'axis'
        },
        grid:{
            x:30,
            x2:10,
			y:35,
            y2:24
        },
        calculable : true,
        xAxis : [
            {
                type : 'category',
                axisLabel: {
	                textStyle: {color: '#fff'}
	            },
                data : ['北京','上海','广东','天津','重庆','河南','河北','辽宁','湖南','贵州']
            }
        ],
        yAxis : [
            {
                type : 'value',
				axisLabel: {
	                textStyle: {color: '#fff'}
	            }
            }
        ], 
        series : [
            {
                name:'客流量',
                type:'bar',
                data:[281, 254, 290, 177, 136, 344, 271, 145, 95, 85],
				itemStyle: {  
					normal: {											
						color: '#38bbeb',
						barBorderRadius:25,
						label: {textStyle: {fontSize: 22},show: true}
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