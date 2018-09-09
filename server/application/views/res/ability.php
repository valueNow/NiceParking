<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>威宁县旅游行业接待能力情况</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>
<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>威宁县旅游行业接待能力情况</h5>
	</div>
	<div id="meter-chart" style="width: 1000px; height: 400px; position:absolute;left:50%;top:50%;margin-left:-500px;margin-top:-250px;"></div>
</div>
<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
<script src="/statics/js/plugins/echarts/echarts.min.js"></script>
<script src="/statics/js/plugins/echarts/china.js"></script>
<script type="text/javascript">
$(function () {
	var meterChart = echarts.init(document.getElementById("meter-chart"));
	var meteroption = {
		//backgroundColor: '#000',
	    tooltip : {
	        formatter: "{a} <br/>{c} {b}"
	    },
	    series : [
	        {
	            name: '住宿/餐饮接待能力',
	            type: 'gauge',
	            z: 3,
	            min: 0,
	            max: 100,
	            splitNumber: 10,
	            radius: '90%',
	             axisLine: {            // 坐标轴线
		            lineStyle: {
		                width: 10,
		                color: [[0.2,'#f7b719'],[0.8, '#24c5fb'],[1, '#f9882c']]
		            }
	            },
	            axisTick: {            // 坐标轴小标记
	                length: 15,        // 属性length控制线长
	                lineStyle: {color: 'auto'}
	            },
	            splitLine: {           // 分隔线
	                length: 20,         // 属性length控制线长
	                lineStyle: {color: 'auto'}
	            },
	            title : {
	                textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
	                    fontWeight: 'bolder',
	                    fontSize: 14,
	                    fontStyle: 'italic',
	                    color: '#fff'
	                }
	            },
	            detail : {
	                textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
	                    fontWeight: 'bolder'
	                }
	            },
	            data:[{value: 70, name: '接待能力（%）'}]
	        },
	        {
	            name: '餐饮（人）',
	            type: 'gauge',
	            center: ['26%', '55%'],    // 默认全局居中
	            radius: '80%',
	            min:0,
	            max:8000,
	            endAngle:45,
	            splitNumber:8,
	            axisLine: {            // 坐标轴线
		            lineStyle: {
		                width: 10,
		                color: [[0.2,'#f7b719'],[0.8, '#24c5fb'],[1, '#f9882c']]
		            }
	            },
	            axisTick: {            // 坐标轴小标记
	                length:12,        // 属性length控制线长
	                lineStyle: {       // 属性lineStyle控制线条样式
	                    color: 'auto'
	                }
	            },
	            splitLine: {           // 分隔线
	                length:20,         // 属性length控制线长
	                lineStyle: {       // 属性lineStyle（详见lineStyle）控制线条样式
	                    color: 'auto'
	                }
	            },
	            pointer: {
	                width:5
	            },
	            title: {
	                offsetCenter: [0, '-30%'],       // x, y，单位px
	                textStyle: {color: '#fff'}
	            },
	            detail: {
	                textStyle: {fontWeight: 'bolder',fontSize: 14}
	            },
	            data:[{value: 6458, name: '餐饮(人)'}]
	        },
	         {
	            name: '住宿（人）',
	            type: 'gauge',
	            center: ['75%', '55%'],    // 默认全局居中
	            radius: '80%',
	            min:0,
	            max:20000,
	            startAngle:140,
	            endAngle:-45,
	            splitNumber:8,
	           axisLine: {            // 坐标轴线
		            lineStyle: {
		                width: 10,
		                color: [[0.2,'#f7b719'],[0.8, '#24c5fb'],[1, '#f9882c']]
		            }
	            },
	            axisTick: {            // 坐标轴小标记
	                length:12,        // 属性length控制线长
	                lineStyle: {       // 属性lineStyle控制线条样式
	                    color: 'auto'
	                }
	            },
	            splitLine: {           // 分隔线
	                length:20,         // 属性length控制线长
	                lineStyle: {       // 属性lineStyle（详见lineStyle）控制线条样式
	                    color: 'auto'
	                }
	            },
	            pointer: {width:5},
	            title: {
	                offsetCenter: [0, '-30%'],       // x, y，单位px
	                textStyle: {color: '#fff'}
	            },
	            detail: {
	                textStyle: {fontWeight: 'bolder',fontSize: 14}
	            },
	            data:[{value: 12583, name: '住宿(人)'}]
	        }
	    ]
	};
	meterChart.setOption(meteroption);
});
</script>
</body>
</html>