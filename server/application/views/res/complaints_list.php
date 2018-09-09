<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>威宁县游客投诉事件</title>
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
		<h5>威宁县游客投诉事件</h5>
	</div>
	<div class="ibox-content" style="padding-top:15px !important;padding-bottom:15px !important;"  id="quary">
		<a href="/index.php/res/prediction/public_complaints" class="btn btn-primary pull-right">统计图</a>
		<form role="form" class="form-inline">
			<div class="form-group">
				<label class="sr-only" for="food_name">名称</label>
				<input id="plan_name" class="form-control" placeholder="事件名称" type="text">
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
					<th>事件名称</th>
					<th>投诉来源</th>
					<th>类型</th>
					<th>记录人</th>
					<th>记录时间</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>售票员态度很差</td>
					<td>电话</td>
					<td>景点</td>
					<td>zhaosan</td>
					<td>2017-04-21</td>
					<td><a href="#">查看详情</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>2</td>
					<td>车站到景区很不方便</td>
					<td>网络</td>
					<td>交通</td>
					<td>xingwenwu</td>
					<td>2017-03-15</td>
					<td><a href="#">查看详情</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>3</td>
					<td>饭不好吃还很贵</td>
					<td>微博</td>
					<td>餐饮</td>
					<td>zhanglele</td>
					<td>2017-01-02</td>
					<td><a href="#">查看详情</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>4</td>
					<td>购买物品质量太差</td>
					<td>电话</td>
					<td>购物</td>
					<td>hanqi</td>
					<td>2016-12-24</td>
					<td><a href="#">查看详情</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>5</td>
					<td>酒店条件差收费贵</td>
					<td>网络</td>
					<td>酒店</td>
					<td>linfeng</td>
					<td>2016-10-12</td>
					<td><a href="#">查看详情</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>6</td>
					<td>景点到处是垃圾</td>
					<td>网络</td>
					<td>景点</td>
					<td>loucaixia</td>
					<td>2016-10-10</td>
					<td><a href="#">查看详情</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>7</td>
					<td>游客吃坏肚子</td>
					<td>电话</td>
					<td>餐饮</td>
					<td>dukangning</td>
					<td>2016-10-08</td>
					<td><a href="#">查看详情</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>8</td>
					<td>威宁茂龙国际饭店</td>
					<td>网络</td>
					<td>其他</td>
					<td>tianfugui</td>
					<td>2016-10-06</td>
					<td><a href="#">查看详情</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>9</td>
					<td>景区停车位管理不规范，车乱停</td>
					<td>电话</td>
					<td>交通</td>
					<td>linzhen</td>
					<td>2016-10-06</td>
					<td><a href="#">查看详情</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>10</td>
					<td>景区内的东西有过期的</td>
					<td>微博</td>
					<td>购物</td>
					<td>beizhan</td>
					<td>2016-10-05</td>
					<td><a href="#">查看详情</a> | <a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
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
				<li class="paginate_button"><a href="#">57</a></li>
				<li class="paginate_button"><a href="#">58</a></li>
				<li class="paginate_button next" ><a href="#">下一页</a></li>
			</ul>
			</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>