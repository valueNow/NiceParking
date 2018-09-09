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
		color:["#38bbeb","#ffb980","#58d0f9","#f9882c","#f7b719"],
	    title: [{
	        text: '房价水平分析',
	        textStyle: {
	            color: '#fff'
	        }
	    }, {
	        text: '住宿倾向分析',
	        left: '76%',
	        textAlign: 'center',
	        textStyle: {
	            color: '#fff'
	        }
	    }],
	    legend: {
	    	orient: 'vertical',
	        x: 'right',
	        data:['星级酒店','经济型酒店','精品酒店','客栈民宿','其他'],
	        textStyle: {color: '#fff'}
	    },
	    textStyle: {color: "#fff"},
	    grid: {
	        left: '1%',
	        right: '35%',
	        top: '16%',
	        bottom: '6%',
	        containLabel: true
	    },
	    xAxis: {
	        type: 'category',
	        data: ['100以下','100-200','200-400','400-600','600-700','>700']
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
			            formatter: '{c}%'
			        }
			    },
	            data: [17.60, 29.80, 23.90, 11.70, 13.00, 3.90]
	        },
	        {
	        	name: '住宿',
	        	type: 'pie',
	        	center: ['78%', '58%'],
	        	radius: [0, '60%'],
	            data:[
	                {value:26, name:'星级酒店'},
	                {value:34, name:'经济型酒店'},
	                {value:13, name:'精品酒店'},
	                {value:25, name:'客栈民宿'},
	                {value:2, name:'其他'}
	            ],
	            itemStyle: {
	                normal: {
	                    label:{	                    	
	                    	position: 'inner',
	                        formatter: '{d}%' 
	                    }
	                }
	            }
	    }]
	};
	radarChart.setOption(radaroption);
});
</script>
</body>
</html>
