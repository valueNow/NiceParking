<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加值班信息</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>
<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>添加值班信息</h5>
	</div>
	<div class="ibox-content">
		<form method="post" action="/index.php/admin/emergency/add_duty" enctype="multipart/form-data" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">值班人姓名：</label>
				<div class="col-sm-3">
					<input type="text" name="duty_name" class="form-control" required>
				</div>

				<label class="col-sm-2 control-label">值班人联系电话：</label>
				<div class="col-sm-3">
					<input type="text" name="duty_mobile" class="form-control" required>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">值班点：</label>
				<div class="col-sm-3">
					<input type="text" name="duty_address" class="form-control" required=''>
				</div>

				<label class="col-sm-2 control-label">单位：</label>
				<div class="col-sm-3">
					<select class="form-control m-b" style="height:35px;" name="unit_id" required=''>
						<option value="">请选择</option>
						<?php foreach($bumen as $v){?>
							<option value="<?php echo $v['esu_id'];?>"><?php echo $v['esu_name'];?></option>
						<?php }?>
					</select>
				</div>
			</div>
            <div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">值班时间：</label>
				<div class="col-sm-3">
					<input id="made_time" name="duty_date" readonly placeholder="YYYY-MM-DD" class="laydate-icon form-control layer-date" required=''>
				</div>

				<label class="col-sm-2 control-label">带班领导：</label>
				<div class="col-sm-3">
					<input type="text" name="leadership" class="form-control" required>
				</div>
			</div>
            <div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">领导电话：</label>
				<div class="col-sm-3">
					<input type="text" name="ship_mobile" class="form-control"  required>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">备注：</label>
				<div class="col-sm-8">
					<textarea name="description" style="height:100px" required class="form-control"></textarea>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-2">
					<input class="btn btn-primary" name="dosubmit" type="submit" value="提交">
					<a href="/index.php/admin/emergency/duty" class="btn btn-primary">返回列表</a>
				</div>
			</div>
		</form>
	</div>
</div>
	<!-- layerDate plugin javascript -->
    <script src="/statics/js/plugins/layer/laydate/laydate.js"></script>
    <script>
        //外部js调用
        laydate({elem: '#made_time',event: 'focus'});
    </script>
</body>
</html>