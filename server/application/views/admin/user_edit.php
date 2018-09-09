<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改管理员</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>

<body>

<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>修改管理员</h5>
	</div>
	<div class="ibox-content">
		<form method="post" action="/index.php/admin/user_role/edit_admin" enctype="multipart/form-data" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">用户名：</label>
				<label class="control-label"><?php echo $admin['username'];?></label>

			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">密码：</label>
				<div class="col-sm-3">
					<input type="password" name="password" class="form-control" placeholder="密码不为空则不修改">
				</div>

				<label class="col-sm-2 control-label">确认密码：</label>
				<div class="col-sm-3">
					 <input type="password" class="form-control">
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">真实姓名：</label>
				<div class="col-sm-3">
					 <input type="text" name="realname" value="<?php echo $admin['realname'];?>" class="form-control" required>
				</div>

				<label class="col-sm-2 control-label">电话：</label>
				<div class="col-sm-3">
					<input type="text" name="mobile" value="<?php echo $admin['mobile'];?>" class="form-control" required>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">E-mail：</label>
				<div class="col-sm-3">
					<input type="text" name="email" value="<?php echo $admin['email'];?>" class="form-control" required>
				</div>

				<label class="col-sm-2 control-label">所属角色：</label>
				<div class="col-sm-3">
					<select  style="height:35px;" class="form-control" name="roleid">
						<?php foreach($roles as $k=>$v){ ?>
						<option value="<?php echo $k;?>" <?php if($k==$admin['roleid']){echo "selected";}?>><?php echo $v;?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-2">
					<input type="hidden" name="userid" value="<?php echo $admin['userid'];?>">
					<input class="btn btn-primary" name="dosubmit" type="submit" value="提交">
					<a href="/index.php/admin/user_role/init" class="btn btn-primary">返回列表</a>
				</div>
			</div>
		</form>
	</div>
</div>


</body>
</html>