<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改密码</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>
<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>修改密码</h5>
	</div>
	<div class="ibox-content">
		<form method="post" action="/index.php/admin/index/set_password" onsubmit="return sub()" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">原密码：</label>
				<div class="col-sm-10">
					<input type="password" name="y_password" class="form-control" style="width:200px;">
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">新密码：</label>
				<div class="col-sm-10">
					<input type="password" name="password" id="password" class="form-control" style="width:200px;">
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">确认密码：</label>
				<div class="col-sm-10">
					<input type="password" name="pwd" id="pwd" class="form-control" style="width:200px;">
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-2">
					<input class="btn btn-primary" type="submit" value="确定">
					<input class="btn btn-primary" type="reset">
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript" src="/statics/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript"  >
function sub(){
	if($("#password").val() != $("#pwd").val()){
		alert("提示：新密码和确认密码不一致!");
		return false;
	}
}
</script>
</body>
</html>