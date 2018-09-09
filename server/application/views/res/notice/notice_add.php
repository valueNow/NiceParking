<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增日志</title>
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
                        <h5>新增公告</h5>
                    </div>
					<form method="post" id="form_info"  action="/index.php/notice/notice_add" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">公告主题：</label>
							<div class="col-sm-9">
								<input type="text" name="notice_title" class="form-control"  required>
							</div>
						</div>
						
						<div class="hr-line-dashed"></div>
						<div class="form-group">
							<label class="col-sm-2 control-label">公告内容：</label>
							<div class="col-sm-8">
								<textarea  name="notice_content"  style="height:400px;" class="form-control" required></textarea>
							</div>
						</div>

						<div class="hr-line-dashed"></div>
							<div class="form-group">
                                <label class="col-sm-2 control-label">附件：</label>
                                <div class="col-sm-10">
									<input type="file" name="notice_attr" />
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