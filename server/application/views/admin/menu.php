<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>菜单列表</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>

<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>菜单列表</h5>
	</div>
	<div class="ibox-content">
	<form method="post" action="/index.php/admin/menu/order_menu">
		<div class="">
			<a href="/index.php/admin/menu/add_menu" class="btn btn-primary ">添加菜单</a>
		</div>
		<table class="table table-striped table-bordered table-hover dataTables-example">
			<thead>
				<tr>
					<th>排序</th>
					<th>ID</th>
					<th>菜单名称</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<?php echo $html;?>
				<tr class="gradeX">
					<td colspan="4"><button class="btn btn-primary" type="submit">排序</button></td>
				</tr>
			</tbody>
		</table>
	</form>
	</div>
</div>

</body>
</html>