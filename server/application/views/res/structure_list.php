<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>威宁县旅游企业</title>
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
		<h5>威宁县旅游企业</h5>
	</div>
	<div class="ibox-content" style="padding-top:15px !important;padding-bottom:15px !important;"  id="quary">
		<a href="/index.php/res/prediction/public_structure" class="btn btn-primary pull-right">统计图</a>
		<form role="form" class="form-inline">
			<div class="form-group">
				<label class="sr-only" for="food_name">名称</label>
				<input id="plan_name" class="form-control" placeholder="名称" type="text">
			</div>
			<button class="btn btn-white" type="button" onclick='search()' style="margin:0" >查询</button>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="/index.php/res/prediction/add" id="btnadd" class="btn btn-primary">添加数据</a>
		</form>
	</div>
	<div class="ibox-content" id="result">
		<table class="table table-striped table-bordered table-hover display nowrap"  cellspacing="0" width="100%" id="editable">
			<thead>
				<tr>
					<th>序号</th>
					<th>企业名称</th>
					<th>类型</th>
					<th>等级</th>
					<th>负责人</th>
					<th>添加时间</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>威宁草海自然保护区</td>
					<td>景区</td>
					<td>3A</td>
					<td>赵珊</td>
					<td>2017-06-21 13:22:56</td>
					<td><a href="/index.php/res/prediction/edit">修改</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>2</td>
					<td>回族餐馆</td>
					<td>餐饮</td>
					<td>3A</td>
					<td>邢文武</td>
					<td>2017-06-21 09:22:54</td>
					<td><a href="#">修改</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>3</td>
					<td>涠洲岛农家乐</td>
					<td>旅行社</td>
					<td></td>
					<td>张乐乐</td>
					<td>2017-06-18 16:22:47</td>
					<td><a href="#">修改</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>4</td>
					<td>威宁泰丰花园酒店</td>
					<td>酒店</td>
					<td>4星</td>
					<td>韩琦</td>
					<td>2017-06-11 12:22:23</td>
					<td><a href="#">修改</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>5</td>
					<td>马摆大山景区</td>
					<td>景区</td>
					<td>4A</td>
					<td>林峰</td>
					<td>2017-06-06 10:22:25</td>
					<td><a href="#">修改</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>6</td>
					<td>威宁朗玉草海度假酒店</td>
					<td>酒店</td>
					<td>4星</td>
					<td>楼彩霞</td>
					<td>2017-05-21 13:22:46</td>
					<td><a href="#">修改</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>7</td>
					<td>乌江源百里画廊</td>
					<td>景区</td>
					<td>2A</td>
					<td>杜康宁</td>
					<td>2017-05-17 14:22:45</td>
					<td><a href="#">修改</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>8</td>
					<td>威宁茂龙国际饭店</td>
					<td>餐饮</td>
					<td>5A</td>
					<td>田福贵</td>
					<td>2017-05-14 13:42:41</td>
					<td><a href="#">修改</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>9</td>
					<td>百草坪天然草原</td>
					<td>景区</td>
					<td>3A</td>
					<td>林振</td>
					<td>2017-05-12 14:22:52</td>
					<td><a href="#">修改</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>10</td>
					<td>马街</td>
					<td>景区</td>
					<td>3A</td>
					<td>北战</td>
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
				<li class="paginate_button"><a href="#">78</a></li>
				<li class="paginate_button"><a href="#">79</a></li>
				<li class="paginate_button next" ><a href="#">下一页</a></li>
			</ul>
			</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>