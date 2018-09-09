<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>重点节假日草海景区客流量</title>
    <link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>
<body>
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>重点节假日草海景区客流量</h5>
    </div>
    <a href="/index.php/res/prediction/traffic" class="btn btn-primary">返回列表</a>
    <div id="echarts-pie-chart" style="width: 1000px; height: 500px; position:absolute;left:50%;top:50%;margin-left:-500px;margin-top:-250px;"></div>
</div>
<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
<script src="/statics/js/plugins/echarts/echarts.min.js"></script>
<script src="/statics/js/plugins/echarts/china.js"></script>
<script type="text/javascript">
$(function () {
	var pieChart = echarts.init(document.getElementById("echarts-pie-chart"));
	var pieoption = {
		//backgroundColor: "#000",
		color:["#f3a43b",'#5ab1ef'],
		tooltip: {
	        trigger: 'axis',
	    },
	    legend: {
	    	textStyle: {color: "#fff"},
	        data: ['平均消费', '客流量'],
	        x:'center'
	    },
	    xAxis: [{
	        type: 'category',
	        axisTick: {
	            alignWithLabel: true
	        },
	        data: ['元旦', '春节', '清明', '劳动', '端午', '中秋', '国庆']
	    }],
	    textStyle: {color: "#fff"},
	    yAxis: [{
	        type: 'value',
	        name: '平均消费(元)',
	        min: 0,
	        position: 'left',
	        axisLabel: {
	            formatter: '{value}'
	        }
	    }, {
	        type: 'value',
	        name: '客流量（万）',
	        min: 0,
	        position: 'right',
	        axisLabel: {
	            formatter: '{value}'
	        }
	    }],
	    series: [{
	        name: '平均消费',
	        type: 'line',
	        label: {
	            normal: {
	                show: true,
	                position: 'top',
	                barBorderRadius:15,
	            }
	        },
	        data: [500, 465, 400, 700, 600, 300, 800]
	    }, {
	        name: '客流量',
	        type: 'bar',
	        yAxisIndex: 1,
	        label: {
	            normal: {
	                show: true,
	                position: 'top'
	            }
	        },
	        data: [55, 34, 23, 77, 60, 45, 95]
	    }]
	};
	pieChart.setOption(pieoption);
});
</script>
</body>
</html>