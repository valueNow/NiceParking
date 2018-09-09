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
		color:["#f7b719","#10d5f7","#f9882c","#58d0f9"],
		title: {
			text: '舆情话语权分布',
			textStyle: {color: '#fff'}
		},
	    tooltip: {
	        trigger: 'item',
	        formatter: "{a} <br/>{b}: ({d}%)"
	    },

	    series: [
	        {
	            name:'舆情话语权：',
	            type:'pie',
	            radius: [0, '75%'],
	            label: {
					normal: {
						position: 'inner'
					}
				},
	            data:[
	                {value:13, name:'普通网民'},
	                {value:24, name:'意见领袖微博'},
	                {value:21, name:'政务微博'},
	                {value:42, name:'媒体微博'}
	            ],
	            itemStyle: {
                normal: {
                    label:{ 
                        show: true,
                        formatter: '{b}\n{d}%' 
                    }
                },
                labelLine :{show:true}
            }
	        }
	    ]
	};
	radarChart.setOption(radaroption);
});
</script>
</body>
</html>