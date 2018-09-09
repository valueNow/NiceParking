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

	var dataBJ = [
	    [55,9,56,0.46,18,6,1],
	    [25,11,21,0.65,34,9,2],
	    [56,7,63,0.3,14,5,3],
	    [33,7,29,0.33,16,6,4],
	    [99,73,110,2.43,76,48,23],
	    [31,12,30,0.5,32,16,24],
	    [42,27,43,1,53,22,25],
	    [154,117,157,3.05,92,58,26],
	    [234,185,230,4.09,123,69,27],
	    [160,120,186,2.77,91,50,28],
	    [134,96,165,2.76,83,41,29],
	    [52,24,60,1.03,50,21,30],
	    [46,5,49,0.28,10,6,31]
	];
	var lineStyle = {
	    normal: {
	        width: 1,
	        opacity: 0.5
	    }
	};
	var radarChart = echarts.init(document.getElementById("radar-chart"));
	var radaroption = {
		//backgroundColor: '#161627',
	    title: {
	        text: '舆情事件地域分布',
	        textStyle: {color: '#eee'}
	    },
	    radar: {
	        indicator: [
	            {name: '东北', max: 300},
	            {name: '华北', max: 250},
	            {name: '华东', max: 300},
	            {name: '华中', max: 5},
	            {name: '华南', max: 200},
	            {name: '西北', max: 150},
	            {name: '西南', max: 100}
	        ],
	        shape: 'circle',
	        splitNumber: 5,
	        name: {
	            textStyle: {color: 'rgb(238, 197, 102)'}
	        },
	        splitLine: {
	            lineStyle: {
	                color: [
	                    'rgba(238, 197, 102, 0.1)', 'rgba(238, 197, 102, 0.2)'
	                ].reverse()
	            }
	        },
	        splitArea: {
	            show: false
	        }
	    },
	    series: [
	        {
	            type: 'radar',
	            lineStyle: lineStyle,
	            data: dataBJ,
	            symbol: 'none',
	            itemStyle: {
	                normal: {
	                    color: '#F9713C'
	                }
	            },
	            areaStyle: {
	                normal: {
	                    opacity: 0.1
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