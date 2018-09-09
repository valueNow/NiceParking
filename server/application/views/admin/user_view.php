<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>个人信息</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
    <style>
    .col-sm-3{line-height:30px;}
    </style>
</head>
<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>个人信息</h5>
	</div>
	<div class="ibox-content">
		<form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">用户名：</label>
				<div class="col-sm-3">
					<?php echo $user['username'];?>
				</div>
				<label class="col-sm-2 control-label">所属角色：</label>
				<div class="col-sm-3">
					<?php echo $user['roleid'];?>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">真实姓名：</label>
				<div class="col-sm-3">
					<?php echo $user['realname'];?>
				</div>
				<label class="col-sm-2 control-label">状态：</label>
				<div class="col-sm-3">
					<?php if($user['status']=='0'){echo "正常";}else{echo "锁定";}?>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">电话：</label>
				<div class="col-sm-3">
					<?php echo $user['mobile'];?>
				</div>
				<label class="col-sm-2 control-label">邮箱：</label>
				<div class="col-sm-3">
					<?php echo $user['email'];?>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">添加时间：</label>
				<div class="col-sm-3">
					<?php echo date('Y-m-d H:i:s',$user['add_time']);?>
				</div>
				<label class="col-sm-2 control-label">最后登录ip：</label>
				<div class="col-sm-3">
					<?php echo $user['lastloginip'];?>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">最后登录时间：</label>
				<div class="col-sm-3">
					<?php echo date('Y-m-d H:i:s',$user['lastlogintime']);?>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
		</form>
	</div>
</div>
</body>
</html>