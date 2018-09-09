<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增用章流程</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/statics/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/animate.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
	<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
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
                        <h5>新增用章流程</h5>
                    </div>
					<form method="post"  id="form_info"   class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">用章标题：</label>
							<div class="col-sm-3">
								<input type="text" name="chop_title" class="form-control" required   value="用章流程">
							</div>
							<label class="col-sm-2 control-label">用章等级：</label>
							<div class="col-sm-3">
								<select name="chop_lever"  id="chop_lever" style="width:100%;height:30px;"    class="form-control">
									<option value="">正常</option>
									<option value="">紧急</option>
									<option value="">重要</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">申请人：</label>
							<div class="col-sm-3">
								<input type="text" name="operate_userid" class="form-control"   required value="李飞">
							</div>
							<label class="col-sm-2 control-label">申请部门：</label>
							<div class="col-sm-3">
								<input type="text" name="operate_department" class="form-control"    required value="财务部">
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">申请时间：</label>
							<div class="col-sm-3">
								<input type="text" name="operate_time" class="form-control"  value="<?php echo date('Y-m-d H:i:s',time()); ?>"  required>
							</div>
							<label class="col-sm-2 control-label">用章所属类型：</label>
							<div class="col-sm-3">
								<select name="type" style="width:100%;height:30px;"  class="form-control">
									<option value="">公事</option>
									<option value="">私事</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">公章名称：</label>
							<div class="col-sm-3">
								<select name="seal_name" style="width:100%;height:30px;"  class="form-control">
									<option>公章</option>
									<option>专用章</option>
									<option>财务科章</option>
									<option>行政办公室章</option>
									<option>人力资源部章</option>	
								</select>
							</div>
							
							<label class="col-sm-2 control-label">是否外带：</label>
							<div class="col-sm-3">	
								<input type="radio" name="is_out" value="0" checked/>否 
								<input type="radio" name="is_out" value="1" />是 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">使用开始时间：</label>
							<div class="col-sm-4">
								<input  name="start_date" class="form-control layer-date" placeholder="YYYY-MM-DD hh:mm:ss" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" required>
								<label class="laydate-icon"></label>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">使用结束时间：</label>
							<div class="col-sm-4">
								<input  name="end_date" class="form-control layer-date" placeholder="YYYY-MM-DD hh:mm:ss" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" required>
								<label class="laydate-icon"></label>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">用章文件：</label>
							<div class="col-sm-8">
								<input type="file" name="docx_url" />
							</div>	
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">用章理由说明：</label>
							<div class="col-sm-8">
								<textarea id="ccomment" class="form-control" name="reason" required="" aria-required="true"></textarea>
							</div>
						</div>
						<br />
						
						<div class="form-group" >
							<div class="col-sm-4 col-sm-offset-2" style="float:right;">
								<input  id="submit" class="btn btn-primary" style="margin_right:40px;" type="submit"    value="保存">
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