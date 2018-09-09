<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改角色</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>
<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>修改角色</h5>
	</div>
	<div class="ibox-content">
		<form method="post" action="/index.php/admin/user_role/edit_role" enctype="multipart/form-data" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">角色名称：</label>

				<div class="col-sm-3">
					<input type="text" name="name" value="<?php echo $role['name'];?>" class="form-control" required>
				</div>
				<label class="col-sm-2 control-label">排序：</label>

                <div class="col-sm-3">
                	<input type="text" name="listorder" value="<?php echo $role['listorder'];?>" class="form-control" >
                </div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">角色描述：</label>

				<div class="col-sm-8">
					 <textarea name="description" class="form-control"><?php echo $role['description'];?></textarea>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">是否启用：</label>
				<div class="col-sm-10">
					<div class="radio">
					<label><input value="0" name="status" <?php if($role['status']==0){echo "checked";}?> type="radio">启用</label>
					<label><input value="1" name="status" <?php if($role['status']==1){echo "checked";}?> type="radio">禁用</label>
					</div>
				</div>
			</div>
			<div class="hr-line-dashed"></div>

			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-2">
					<input type="hidden" name="roleid" value="<?php echo $role['roleid'];?>">
					<input class="btn btn-primary" name="dosubmit" type="submit" value="提交">
					<a href="/index.php/admin/user_role/role_list" class="btn btn-primary ">返回列表</a>
				</div>
			</div>
		</form>
	</div>
</div>
</body>
</html>