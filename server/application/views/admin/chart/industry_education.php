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
			text: '旅游教育培训分析（万人）',
			textStyle: {color: '#fff'}
		},
	    tooltip : {
            trigger: 'axis'
        },
        grid:{
            x:30,
            x2:10,
			y:35,
            y2:48
        },
        calculable : true,
        xAxis : [
            {
                type : 'category',
                data : ['咨询员','餐饮人员','酒店服务员','部门经理','领队','导游','讲解员','主管','司机','其他'],
                axisLabel:{  
                    interval:0,
                    textStyle: {color: '#fff'},
                    rotate:45
                }
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
                name:'培训人员',
                type:'line',
                data:[22.77,16.95,20.49,32.78,6.27,60.03,11.81,4.21,3.21,2.56],
				itemStyle: {  
					normal: {
						color: '#14c2fd',
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