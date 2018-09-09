<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>威宁县从业情况统计</title>
    <link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>
<body>
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>威宁县从业情况统计</h5>
    </div>
    <a href="/index.php/res/prediction/guide" class="btn btn-primary">返回列表</a>
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
		title: {
			text: '威宁县从业情况统计（人）',
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
                name:'从业人员',
                type:'line',
                data:[560,165,209,328,67,603,111,41,61,256],
				itemStyle: {  
					normal: {
						color: '#f9882c',
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