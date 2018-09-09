<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改旅游企业</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
	<style>
		 .to_enlarge{position:absolute;right:24px;top:7px;cursor:pointer;}
	</style>
</head>
<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>修改旅游企业</h5>
	</div>
	<div class="ibox-content">
		<form method="post" action="/index.php/res/prediction/edit" enctype="multipart/form-data" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">企业名称：</label>
				<div class="col-sm-3">
					<input type="text" name="event_name" class="form-control" value="威宁草海自然保护区">
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">类型：</label>
				<div class="col-sm-3">
					<select class="form-control m-b" style="height:35px;width:250px;" name="plan_id">
						<option value="0">请选择</option>
						<option selected>景区</option>
						<option value="">旅游局</option>
						<option value="">餐饮</option>
						<option value="">酒店</option>
						<option value="">运营</option>
						<option value="">互联网媒体</option>
						<option value="">旅行社</option>
						<option value="">其他</option>
					</select>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">等级：</label>
				<div class="col-sm-3">
					<input type="text" name="x_index" id="x_index" class="form-control" value="3A">
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">负责人：</label>
				<div class="col-sm-3">
					<input type="text" name="reporter" class="form-control" value="赵珊">
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">联系方式：</label>
				<div class="col-sm-3">
					<input type="text" name="mobile" class="form-control" value="15965478512">
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-2">
					<input class="btn btn-primary" name="dosubmit" type="submit" value="提交">
					<a href="/index.php/res/prediction/structure" class="btn btn-primary">返回列表</a>
				</div>
			</div>
		</form>
	</div>
</div>
</body>
</html>