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
		color: ["#f9882c", "#24c5fb","#f7b719"],
		title: {
			text: '商户行业分析',
			textStyle: {color: '#fff'}
		},
	    tooltip : {
            trigger: 'axis'
        },
        legend: {
	    	textStyle: {color: "#fff"},
	    	left: 'right',
	        data: ['人均消费', '交易笔数','交易排名']
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
                data : ['酒店','景区','餐饮','购物','娱乐','交通','其他']
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
                name:'人均消费',
                type:'bar',
                data:[213, 85, 145, 198, 254, 124, 21]
            },
            {
                name:'交易笔数',
                type:'bar',
                data:[281, 254, 290, 177, 136, 344, 271]
            },
            {
                name:'交易排名',
                type:'bar',
                data:[5, 3, 2, 4, 1, 6, 7]
            }
        ]
	};
	pieChart.setOption(pieoption);
});
</script>
</body>
</html>