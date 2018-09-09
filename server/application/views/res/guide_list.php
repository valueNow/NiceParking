<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>威宁县从业情况</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
	<style>
	.table>tbody>tr>td{  
        text-align:center;  
	}
	.table>thead:first-child>tr:first-child>th{  
        text-align:center;      
	}
	</style>
</head>

<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>威宁县从业情况</h5>
	</div>
	<div class="ibox-content" style="padding-top:15px !important;padding-bottom:15px !important;"  id="quary">
		<a href="/index.php/res/prediction/public_guide" class="btn btn-primary pull-right">统计图</a>
		<form role="form" class="form-inline">
			<div class="form-group">
				<label class="sr-only" for="food_name">名称</label>
				<input id="plan_name" class="form-control" placeholder="姓名" type="text">
			</div>
			<button class="btn btn-white" type="button" onclick='search()' style="margin:0" >查询</button>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="#" id="btnadd" class="btn btn-primary">添加数据</a>
		</form>
	</div>
	<div class="ibox-content" id="result">
		<table class="table table-striped table-bordered table-hover display nowrap"  cellspacing="0" width="100%" id="editable">
			<thead>
				<tr>
					<th>序号</th>
					<th>姓名</th>
					<th>电话</th>
					<th>邮箱</th>
					<th>职位</th>
					<th>添加时间</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>贝俊艾</td>
					<td>13954874568</td>
					<td>854741654@qq.com</td>
					<td>咨询员</td>
					<td>2017-06-21 13:22:56</td>
					<td><a href="#">修改</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>2</td>
					<td>焦易蓉</td>
					<td>15325475845</td>
					<td>5468547125@qq.com</td>
					<td>导游</td>
					<td>2017-06-21 09:22:54</td>
					<td><a href="#">修改</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>3</td>
					<td>卢欣跃</td>
					<td>13565478545</td>
					<td>5421454785@qq.com</td>
					<td>领队</td>
					<td>2017-06-18 16:22:47</td>
					<td><a href="#">修改</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>4</td>
					<td>守艳卉</td>
					<td>13654785421</td>
					<td>563254125@qq.com</td>
					<td>讲解员</td>
					<td>2017-06-11 12:22:23</td>
					<td><a href="#">修改</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>5</td>
					<td>栾承平</td>
					<td>18352014587</td>
					<td>254123659@qq.com</td>
					<td>司机</td>
					<td>2017-06-06 10:22:25</td>
					<td><a href="#">修改</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>6</td>
					<td>王昊然</td>
					<td>17054222845</td>
					<td>965478542@qq.com</td>
					<td>主管</td>
					<td>2017-05-21 13:22:46</td>
					<td><a href="#">修改</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>7</td>
					<td>张文赋</td>
					<td>13547896545</td>
					<td>zhangwenfu@163.com</td>
					<td>咨询员</td>
					<td>2017-05-17 14:22:45</td>
					<td><a href="#">修改</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>8</td>
					<td>王承业</td>
					<td>15865478542</td>
					<td>wangchengye@163.com</td>
					<td>讲解员</td>
					<td>2017-05-14 13:42:41</td>
					<td><a href="#">修改</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>9</td>
					<td>张曜瑞</td>
					<td>13854625412</td>
					<td>547854126@qq.com</td>
					<td>导游</td>
					<td>2017-05-12 14:22:52</td>
					<td><a href="#">修改</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>10</td>
					<td>张霞辉</td>
					<td>13521637054</td>
					<td>13521637054@qq.com</td>
					<td>领队</td>
					<td>2017-05-11 13:22:49</td>
					<td><a href="#">修改</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
			</tbody>
		</table>
		<div class="row">
			<div class="col-sm-6">
			
			</div>
			<div class="col-sm-6">
			<div id="editable_paginate" class="dataTables_paginate paging_simple_numbers">
			<ul class="pagination">
				<li class="paginate_button previous disabled" ><a href="#">上一页</a></li>
				<li class="paginate_button"><a href="#">1</a></li>
				<li class="paginate_button"><a href="#">2</a></li>
				<li class="paginate_button"><a href="#">3</a></li>
				<li class="paginate_button"><a href="#">4</a></li>
				<li class="paginate_button"><a href="#">...</a></li>
				<li class="paginate_button"><a href="#">122</a></li>
				<li class="paginate_button"><a href="#">123</a></li>
				<li class="paginate_button next" ><a href="#">下一页</a></li>
			</ul>
			</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>