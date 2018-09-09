<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>角色管理列表</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>
<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>角色管理</h5>
	</div>
	<div class="ibox-content">
		<div class="">
			<a href="/index.php/admin/user_role/add_role" class="btn btn-primary ">添加角色</a>
		</div>
		<form method="post" action="/index.php/admin/user_role/listorder">
		<table class="table table-striped table-bordered table-hover dataTables-example">
			<thead>
				<tr>
					<th>排序</th>
					<th>ID</th>
					<th>角色名称</th>
					<th>角色描述</th>
					<th>状态</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($infos as $k=>$v){ ?>
				<tr class="gradeX">
					<td align='center'><input type="text" style="text-align:center" name="listorders[<?php echo $v['roleid'];?>]" value="<?php echo $v['listorder'];?>" size='1'></td>
					<td align='center'><?php echo $v['roleid'];?></td>
					<td align='center'><?php echo $v['name'];?></td>
					<td align='center'><?php echo $v['description'];?></td>
					<td align='center'>
						<?php if($v['status']==1){ ?>
							<a href="/index.php/admin/user_role/change_status/<?php echo $v['roleid'];?>/<?php echo $v['status'];?>">
							<font color="blue">×</font></a>
						<?php }else{ ?>
							<a href="/index.php/admin/user_role/change_status/<?php echo $v['roleid'];?>/<?php echo $v['status'];?>">
							<font color="red">√</font></a>
						<?php } ?>
					</td>
					<?php if($v['roleid']==1){?>
						<td align='center'><font color="#cccccc">权限设置</font> | <a href="/index.php/admin/user_role/edit_role/<?php echo $v['roleid'];?>">修改</a> | <font color="#cccccc">删除</font></td>
					<?php }else{ ?>
						<td align='center'><a href="/index.php/admin/user_role/role_priv/<?php echo $v['roleid'];?>">权限设置</a> | <a href="/index.php/admin/user_role/edit_role/<?php echo $v['roleid'];?>">修改</a> | <a href="javascript:if(confirm('确定要删除吗?'))location='/index.php/admin/user_role/role_del/<?php echo $v['roleid'];?>'">删除</a></td>
					<?php }?>
				</tr>
			<?php } ?>
				<tr>
					<td colspan="6">
						<button class="btn btn-primary" type="submit"> 排序 </button>
					</td>
				</tr>
			</tbody>
		</table>
		</form>
	</div>
</div>
</body>
</html>