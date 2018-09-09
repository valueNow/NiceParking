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
<div id="meter-chart"></div>
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
    $("#meter-chart").css({"height":oHidth+"px","width":oWidth+"px"});

	var meterChart = echarts.init(document.getElementById("meter-chart"));
	var meteroption = {
		//backgroundColor: '#000',
	    tooltip : {
	        formatter: "{a} <br/>{c} {b}"
	    },
	   /* toolbox: {
	        show: true,
	        feature: {
	            restore: {show: true},
	            saveAsImage: {show: true}
	        }
	    },  */
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
//	            endAngle:0,
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
//	            startAngle:140,
//	            endAngle:,
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