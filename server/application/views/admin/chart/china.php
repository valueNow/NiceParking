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
<div id="echarts-map-chart"></div>
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
    $("#echarts-map-chart").css({"height":oHidth+"px","width":oWidth+"px"});
	//地图
	var data = [{
		"time": 2014,
		"data": [{
			"name": "北京",
			"value": [92000, "北京"]
		}, {
			"name": "上海",
			"value": [43412, "上海"]
		}, {
			"name": "天津",
			"value": [20071, "天津"]
		}, {
			"name": "广东",
			"value": [28867, "广东"]
		}, {
			"name": "青海",
			"value": [16982, "青海"]
		}, {
			"name": "重庆",
			"value": [14970, "重庆"]
		}, {
			"name": "河南",
			"value": [19260, "河南"]
		}, {
			"name": "河北",
			"value": [9506, "河北"]
		}, {
			"name": "辽宁",
			"value": [8633, "辽宁"]
		}, {
			"name": "新疆",
			"value": [6470, "新疆"]
		}]
	},{
		"time": 2015,
		"data": [{
			"name": "上海",
			"value": [92500, "上海"]
		}, {
			"name": "青海",
			"value": [43342, "青海"]
		}, {
			"name": "河南",
			"value": [20971, "河南"]
		}, {
			"name": "北京",
			"value": [20867, "北京"]
		}, {
			"name": "天津",
			"value": [14682, "天津"]
		}, {
			"name": "新疆",
			"value": [12970, "新疆"]
		}, {
			"name": "河北",
			"value": [10260, "河北"]
		}, {
			"name": "重庆",
			"value": [9106, "重庆"]
		}, {
			"name": "辽宁",
			"value": [8603, "辽宁"]
		}, {
			"name": "广东",
			"value": [6170, "广东"]
		}]
	},{
		"time": 2016,
		"data": [{
			"name": "北京",
			"value": [92000, "北京"]
		}, {
			"name": "青海",
			"value": [43412, "青海"]
		}, {
			"name": "天津",
			"value": [20071, "天津"]
		}, {
			"name": "广东",
			"value": [20867, "广东"]
		}, {
			"name": "河南",
			"value": [14982, "河南"]
		}, {
			"name": "重庆",
			"value": [12970, "重庆"]
		}, {
			"name": "上海",
			"value": [10260, "上海"]
		}, {
			"name": "河北",
			"value": [9106, "河北"]
		}, {
			"name": "辽宁",
			"value": [8603, "辽宁"]
		}, {
			"name": "新疆",
			"value": [1470, "新疆"]
		}]
	}]
	var mapChart = echarts.init(document.getElementById("echarts-map-chart"));
	var mapoption = {
		baseOption: {
			animationDurationUpdate: 1000,
			animationEasingUpdate: 'quinticInOut',
			timeline: {   //时间轴配置
				//show:false,
				axisType: 'category',
				orient: 'vertical',
				autoPlay: true,
				inverse: true,
				playInterval: 5000,  //变换时间
				left: null,
				right: 5,
				top: 20,
				bottom: 20,
				width: 46,
				height: null,
				label: {
					normal: {
						textStyle: {
							color: '#ddd'
						}
					},
					emphasis: {
						textStyle: {
							color: '#fff'
						}
					}
				},
				symbol: 'none',
				lineStyle: {
					color: '#555'
				},
				checkpointStyle: {
					color: '#bbb',
					borderColor: '#777',
					borderWidth: 1
				},
				controlStyle: {
					//禁用上一页下一页
					showNextBtn: false,
					showPrevBtn: false,
					normal: {
						color: '#666',
						borderColor: '#666'
					},
					emphasis: {
						color: '#aaa',
						borderColor: '#aaa'
					}
				},
				data: data.map(function(ele) {
					return ele.time
				})
			},
			backgroundColor: "#000",
			title: {
				text: '客源地分析',
				subtext: '单位:(万人)',
				left: 'center',
				top: 'top',
				textStyle: {
					fontSize: 25,
					color: 'rgba(255,255,255, 0.9)'
				}
			},
			tooltip: {   //鼠标移上显示内容
				formatter: function(params) {
					if ('value' in params.data) {
						return params.data.value[1] + ': ' + params.data.value[0];
					}
				}
			},
			grid: {
				left: 10,
				right: '45%',
				top: '70%',
				bottom: 5
			},
			xAxis: {},
			yAxis: {},
			series: [{
				id: 'map',
				type: 'map',
				mapType: 'china',
				top: '5%',
				//bottom: '25%',
				//left: '5%',
				//right: '10%',

				label: {  //设置显示城市
					normal: {
						show: true,
						textStyle: {color: '#fff'}
					},
					emphasis: {
						show: true
					}
				},
				itemStyle: {  //设置地图颜色
					normal: {
						areaColor: '#323c48',
						borderColor: '#404a59'
					},
					emphasis: {
						label: {
							show: true
						},
						areaColor: 'rgba(255,255,255, 0.5)'
					}
				},
				data: []
			}, {
				id: 'bar',
				type: 'bar',
				tooltip: {
					show: false
				},
				label: {
					normal: {
						show: true,
						position: 'right',
						textStyle: {
							color: '#ddd'
						}
					}
				},
				data: []
			}, {
				id: 'pie',
				type: 'pie',
				radius: ['12%', '20%'],
				center: ['85%', '65%'],
				//roseType: 'area',
				tooltip: {
					formatter: '{b} {d}%'
				},
				data: [],
				label: {
					normal: {
						textStyle: {
							color: '#ddd'
						}
					}
				},
				labelLine: {
					normal: {
						lineStyle: {
							color: '#ddd'
						}
					}
				},
				itemStyle: {
					normal: {
						borderColor: 'rgba(0,0,0,0.3)',
						borderSize: 1
					}
				}
			}]
		},
		options: []
	}

	for (var i = 0; i < data.length; i++) {
		mapoption.options.push({
			visualMap: [{
				calculable: true,
				dimension: 0,
				left: 10,
				top: 'center',
				itemWidth: 12,
				min: data[i].data[9].value[0],
				max: data[i].data[0].value[0],
				text: ['高', '低'],
				textStyle: {
					color: '#ddd'
				},
				inRange: {
					//color: ['lightskyblue', 'yellow', 'orangered', 'red']
					color: ['lightskyblue', 'yellow', 'orangered']
				}
			}],
			xAxis: {
				type: 'value',
				boundaryGap: [0, 0.1],
				axisLabel: {
					show: false,
				},
				splitLine: {
					show: false
				}
			},
			yAxis: {
				type: 'category',
				axisLabel: {
					show: false,
					textStyle: {
						color: '#fff'
					}
				},

				data: data[i].data.map(function(ele) {
					return ele.value[1]
				}).reverse()
			},
			series: [{
				id: 'map',
				data: data[i].data
			}, {
				id: 'bar',
				label: {
					normal: {
						position: 'right',
						formatter: '{b} : {c}'
					}
				},
				data: data[i].data.map(function(ele) {
					return ele.value[0]
				}).sort(function(a, b) {
					return a > b
				})
			}, {
				id: 'pie',
				data: data[i].data.map(function(ele) {
					return {
						name: ele.value[1],
						value: ele.value
					}
				})
			}]
		})
	};
	mapChart.setOption(mapoption);
});
</script>
</body>
</html>