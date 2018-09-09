<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>威宁县游客投诉事件统计</title>
    <link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>
<body>
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>威宁县游客投诉事件统计</h5>
    </div>
    <a href="/index.php/res/prediction/complaints" class="btn btn-primary">返回列表</a>
    <div id="radar-chart" style="width: 1000px; height: 500px; position:absolute;left:50%;top:50%;margin-left:-500px;margin-top:-250px;"></div>
</div>
<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
<script src="/statics/js/plugins/echarts/echarts.min.js"></script>
<script src="/statics/js/plugins/echarts/china.js"></script>
<script type="text/javascript">
$(function () {
	var radarChart = echarts.init(document.getElementById("radar-chart"));
	var radaroption = {
		//backgroundColor: "#000",
        tooltip: {
            trigger: 'item',
            formatter: "{a} <br/>{b}: ({d}%)"
        },
        legend: {
            orient: 'vertical',
            x: 'left',
            textStyle: {color: '#fff'},
            data:['景点','旅行社','酒店','餐饮','交通','购物','其他']
        },
        textStyle: {color: '#fff'},
        series: [
            {
                name:'投诉来源',
                type:'pie',
                radius: ['40%', '80%'],
                center: ['45%', '55%'],
                data:[
                    {value:335, name:'景点'},
                    {value:310, name:'旅行社'},
                    {value:234, name:'酒店'},
                    {value:135, name:'餐饮'},
                    {value:148, name:'交通'},
                    {value:251, name:'购物'},
                    {value:102, name:'其他'}
                ],
                itemStyle:{ 
                    normal:{ 
                      label:{ 
                        show: true, 
                        formatter: '{b} {d}%' 
                      }, 
                      labelLine :{show:true} 
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