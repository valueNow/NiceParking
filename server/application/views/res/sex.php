<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>草海游客性别、年龄结构</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
    <style>
    	.x_man_y{position:absolute;left:25%;top:35%;}
    	.x_man_y span{display:block;margin-top:20px;}
        .x_man_y span img{width:80px}

    </style>
</head>
<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>草海游客性别、年龄结构</h5>
	</div>
	<div id="echarts-pie-chart" style="width: 1000px; height: 500px; position:absolute;left:50%;top:50%;margin-left:-500px;margin-top:-250px;"></div>
	<div class="x_man_y">
        	<span>
        		 <i>61.8%</i>
        		 <img src="/statics/image/woman2.png"/>       		
        	</span>
        	<span>
        		 <i>38.2%</i>	
        		 <img src="/statics/image/man2.png"/>       	
        	</span>
        </div>
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
		//backgroundColor: "#000",
		color:["#f9882c","#10d5f7","#f7b719","#ff715e","#f1a76c","#58d0f9"],
	    tooltip: {
	        trigger: 'item',
	        formatter: "{a} <br/>{b}: ({d}%)"
	    },
	    legend: {
	        orient: 'vertical',
	        x: 'right',
	        data:['15岁以下','15-24岁','25-34岁','35-44岁','45-59岁','60岁以上'],
	        textStyle: {color: '#fff'}
	    },
	    series: [
	        {
	            name:'年龄段：',
	            type:'pie',
	            center: ['55%', '45%'],
	            radius: [0, '90%'],
	            data:[
	                {value:1, name:'15岁以下'},
	                {value:15.9, name:'15-24岁'},
	                {value:37.1, name:'25-34岁'},
	                {value:27.9, name:'35-44岁'},
	                {value:16.1, name:'45-59岁'},
	                {value:2, name:'60岁以上'}
	            ],
	            itemStyle: {
	                normal: {
	                    label:{
	                    	position: 'inner',
	                        formatter: '{d}%' 
	                    }
	                }
	            }
	        }
	    ]
	};
	pieChart.setOption(pieoption);
});
</script>
</body>
</html>