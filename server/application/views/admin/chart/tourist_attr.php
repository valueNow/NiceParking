<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>威宁景点热度top10</title>
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
			text: '威宁景点热度top10',
            x:'left',
			textStyle: {color: '#fff'}
		},
	    tooltip : {
            trigger: 'axis'
        },
        grid:{
            x:30,
            x2:10,
			y:45,
            y2:54
        },
        calculable : true,
        xAxis : [
            {
                type : 'category',
                axisLabel: {
	                textStyle: {color: '#fff'},
                    interval:0,
                    rotate:45
	            },
                data : ['草海','涌珠泉','灼甫草场','中水遗址','马街','阳光城','诗意乡村','涌珠泉','石门坎','石缸洞']
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
                name:'(万人)',
                type:'bar',
                data:[344,290,281,271,254,177,145,136,85,54],
				itemStyle: {  
					normal: {
						barBorderRadius: 15,
						color: '#f69140',
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