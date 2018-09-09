<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>威宁县旅游企业结构图</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>
<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>威宁县旅游企业结构图</h5>
	</div>
	<a href="/index.php/res/prediction/structure" class="btn btn-primary">返回列表</a>
	<div id="echarts-pie-chart" style="width: 1000px; height: 500px; position:absolute;left:50%;top:50%;margin-left:-500px;margin-top:-250px;"></div>
</div>
<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
<script src="/statics/js/plugins/echarts/echarts.min.js"></script>
<script src="/statics/js/plugins/echarts/china.js"></script>
<script type="text/javascript">
function randomData() {
	return Math.round(Math.random()*1000);
}
$(function () {
	var pieChart = echarts.init(document.getElementById("echarts-pie-chart"));
	var pieoption = {
		//color:["#f9882c","#10d5f7","#f7b719","#24c5fb","#f1a76c","#58d0f9"],
		//backgroundColor: "#000",
	    tooltip: {
	        trigger: 'item',
	        formatter: "{a} <br/>{b}: ({d}%)"
	    },
	    legend: {
	        orient: 'vertical',
	        x: 'left',
	        data:['景区行业','旅游局','餐饮行业','酒店行业','运营团队','互联网媒体','旅行社'],
	        textStyle: {color: '#fff'}
	    },
	    series: [
	        {
	            name:'数据：',
	            type:'pie',
	            radius: ['30%', '55%'],
	            data:[
	                {value:55, name:'景区行业'},
	                {value:235, name:'旅游局'},
	                {value:310, name:'餐饮行业'},
	                {value:234, name:'酒店行业'},
	                {value:234, name:'运营团队'},
	                {value:148, name:'互联网媒体'},
	                {value:148, name:'旅行社'}
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
	        }
	    ]
	};
	pieChart.setOption(pieoption);
});
</script>
</body>
</html>