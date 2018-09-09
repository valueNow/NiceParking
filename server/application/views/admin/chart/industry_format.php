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
 		color:["#f9882c","#10d5f7","#f7b719","#ff715e","#f1a76c","#58d0f9"],
        title: {
            text: '新增业态分析',
            textStyle: {color: '#fff'}
        },
		tooltip: {
            trigger: 'item',
            formatter: "{a} <br/>{b}: {c} ({d}%)"
        },
        series: [{
            name:'新增业态',
            type:'pie',
            radius: [0, '60%'],
            selectedMode: 'single',
            data:[
                {value:154, name:'休闲娱乐', selected:true},
                {value:75, name:'餐饮业'},
                {value:108, name:'服务业'},
                {value:54, name:'消费品'},
//              {value:126, name:'工艺品'},
                {value:32, name:'配套行业'},
//              {value:23, name:'票务'},
              {value:126, name:'其他'}
            ],
            itemStyle: {
                normal: {
                    label:{ 
                        show: true,
                        formatter: '{b} : {d}%' 
                    }
                },
                labelLine :{show:true}
            }
        }]
	};
	radarChart.setOption(radaroption);
});
</script>
</body>
</html>