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
		<h5>重点节假日草海景区客流量</h5>
	</div>
	<div class="ibox-content" style="padding-top:15px !important;padding-bottom:15px !important;"  id="quary">
		<a href="/index.php/res/prediction/public_traffic" class="btn btn-primary pull-right">统计图</a>
		<form role="form" class="form-inline">
			<div class="form-group">
				<label class="sr-only" for="food_name">名称</label>
				<input id="plan_name" class="form-control" placeholder="名称" type="text">
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
					<th>景点名称</th>
					<th>客流量</th>
					<th>总消费金额</th>
					<th>添加时间</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>威宁文物古迹</td>
					<td>15428</td>
					<td>54241</td>
					<td>2017-07-21 13:22:56</td>
					<td><a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>2</td>
					<td>龙凤山森林公园</td>
					<td>98547</td>
					<td>58746</td>
					<td>2017-07-21 09:22:54</td>
					<td><a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>3</td>
					<td>板底彝族村寨</td>
					<td>6541</td>
					<td>3541</td>
					<td>2017-07-21 16:22:47</td>
					<td><a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>4</td>
					<td>百草坪天然草原</td>
					<td>5412</td>
					<td>65418</td>
					<td>2017-07-21 12:22:23</td>
					<td><a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>5</td>
					<td>马摆大山景区</td>
					<td>6542</td>
					<td>6541</td>
					<td>2017-07-06 10:22:25</td>
					<td><a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>6</td>
					<td>乌江源百里画廊</td>
					<td>65411</td>
					<td>68447</td>
					<td>2017-07-21 13:22:46</td>
					<td><a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>7</td>
					<td>威宁彝族撮泰吉</td>
					<td>685844</td>
					<td>354541</td>
					<td>2017-07-17 14:22:45</td>
					<td><a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>8</td>
					<td>百年石门坎</td>
					<td>325541</td>
					<td>352521</td>
					<td>2017-07-14 13:42:41</td>
					<td><a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>9</td>
					<td>灼甫草场</td>
					<td>85478</td>
					<td>54125</td>
					<td>2017-05-12 14:22:52</td>
					<td><a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
				</tr>
				<tr>
					<td>10</td>
					<td>诗意乡村</td>
					<td>58445</td>
					<td>65842</td>
					<td>2017-07-11 13:22:49</td>
					<td><a href="javascript:if(confirm('确实要删除吗?'))alert('删除成功')">删除</a></td>
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
				<li class="paginate_button"><a href="#">44</a></li>
				<li class="paginate_button"><a href="#">45</a></li>
				<li class="paginate_button next" ><a href="#">下一页</a></li>
			</ul>
			</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>