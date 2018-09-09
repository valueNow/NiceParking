<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>编辑日志</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/statics/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/animate.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
	<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
	<script src="/statics/js/plugins/validate/jquery.validate.min.js"></script>
	<script src="/statics/js/plugins/validate/messages_zh.min.js"></script>
	<script src="/statics/js/plugins/layer/laydate/laydate.js"></script>
	<script>
	$(document).ready(function(){
		$('#form_info').validate();
	});
	</script>
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>编辑日志</h5>
                    </div>
					<form method="post" id="form_info"  action="/index.php/work_log/work_log_edit" class="form-horizontal">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">工作开始时间：</label>
							<div class="col-sm-3">
								<input type="text" name="start_time" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" value="2017-05-04 15:03:06"  class="form-control"   required date='true'>
							</div>
							<label class="col-sm-2 control-label">工作结束时间：</label>
							<div class="col-sm-3">
								<input type="text" name="end_time" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" value="2017-05-05 15:09:08	"  class="form-control"   required date='true'>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">工作主题：</label>
							<div class="col-sm-3">
								<input type="text" name="work_title" class="form-control" value="测试数据" required>
							</div>
							<label class="col-sm-2 control-label">工作地点：</label>
							<div class="col-sm-3">
								<input type="text" name="work_address" class="form-control"  value="北京" required>
							</div>

						</div>
						
						
						<div class="form-group">
							<label class="col-sm-2 control-label">工作内容：</label>
							<div class="col-sm-8">
								<textarea  name="work_content"  style="height:400px;" class="form-control" required>测试数据</textarea>
							</div>
						</div>

						<br />
						
						<div class="form-group" >
							<div class="col-sm-4 col-sm-offset-2" style="float:right;">
								<input  id="submit" class="btn btn-primary" style="margin_right:40px;" type="submit" value="保存">
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>