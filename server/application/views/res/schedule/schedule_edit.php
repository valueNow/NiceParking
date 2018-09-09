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
                        <h5>编辑日程</h5>
                    </div>
					<form method="post" id="form_info"  action="/index.php/schedule/schedule_edit" class="form-horizontal">
					<div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">开始时间：</label>
							<div class="col-sm-3">
								<input type="text" name="start_time" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss',start: laydate.now(0, 'YYYY/MM/DD hh:mm:ss')})"   value="2017-06-28 17:54:02	"  class="form-control"   required date='true'>
							</div>
							<label class="col-sm-2 control-label">结束时间：</label>
							<div class="col-sm-3">
								<input type="text" name="end_time" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss',start: laydate.now(0, 'YYYY/MM/DD hh:mm:ss')})"  value="2017-06-28 17:54:02"  class="form-control"   required date='true'>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">日程主题：</label>
							<div class="col-sm-3">
								<input type="text" name="schedule_title" class="form-control" value="测试日志" required>
							</div>
							<label class="col-sm-2 control-label">工作地点：</label>
							<div class="col-sm-3">
								<input type="text" name="schedule_address" class="form-control"  value="北京" required>
							</div>

						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">紧急程度：</label>
							<div class="col-sm-3" style="padding-top:7px;">
								<input type="radio" name="schedule_status" value="紧急"  checked required>紧急
								<input type="radio" name="schedule_status" value="一般" required>一般
							</div>
							<label class="col-sm-2 control-label">全天事件：</label>
							<div class="col-sm-3" style="padding-top:7px;">
							<input type="radio" name="is_all_day"  value="1" checked  required>是
							<input type="radio" name="is_all_day"  value="0" required>否	  
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">内容：</label>
							<div class="col-sm-8">
								<textarea  name="schedule_content"  style="height:400px;" class="form-control" required>测试内容
								</textarea>
							</div>
						</div>

						<br />
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>