<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改任务</title>
    <link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/statics/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/animate.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
 	<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
	<script src="/statics/js/plugins/layer/laydate/laydate.js"></script>
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>修改任务</h5>
                    </div>
					<form method="post" id="form_info"   class="form-horizontal">
					<input type="hidden" value="1" name="task_Id" >
                    <div class="ibox-content">
						<h5>基本信息</h5>
						<div class="hr-line-dashed"></div>
						<div class="form-group">
							<label class="col-sm-2 control-label">任务名称：</label>
							<div class="col-sm-3">
								<input type="text" value="走进社区任务" name="task_title"  class="form-control" style="width:300px;"  required>
							</div>
							<label class="col-sm-2 control-label">任务状态：</label>
							<div class="col-sm-3">
								<select name="task_status" id = "task_status" style="width:300px;height:30px;" class="form-control">
									<option value="1"   >待启动</option>	
									<option value="2"   >待执行</option>	
									<option value="3"   >执行中</option>	
									<option value="4"   selected>已完成</option>	
									<option value="5"   >已搁置</option>	
									<option value="6"   >已取消</option>	
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">任务类型：</label>
							<div class="col-sm-3">
								<select name="task_type" id = "task_type" style="width:300px;height:30px;" class="form-control">
									<option value="1"  >工作任务</option>	
									<option value="2" selected >行政任务</option>	
									<option value="3"  >其他任务</option>	
								</select>
							</div>
							<label class="col-sm-2 control-label">重要程度：</label>
							<div class="col-sm-4">
								<select name="task_importance" id = "task_importance" style="width:300px;height:30px;" class="form-control">
									<option value="1"    >一般</option>	
									<option value="2"   selected >重要</option>	
									<option value="3"    >关键</option>	
									<option value="4"    >紧急</option>	
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">负责人：</label>
							<div class="col-sm-3">
								<input type="text" name="principal_name" class="form-control"   id="principal_name"  required style="width:300px;height:30px;"  value="李飞">
							</div>
							<label class="col-sm-2 control-label">参与人：</label>
							<div class="col-sm-4">
								<input type="text" name="participants_name" class="form-control"   id="participants_name"   value="沈浪"  required style="width:300px;height:30px;">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">开始时间：</label>
							<div class="col-sm-3">
								<input  value="2017-05-17 00:00:00" class=" form-control layer-date" id="begin_time" name="begin_time" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss',start: laydate.now(0, 'YYYY/MM/DD hh:mm:ss')})" style="width:300px;height:30px;"  >
							</div>
							<label class="col-sm-2 control-label">预计结束时间：</label>
							<div class="col-sm-4">
								<input type="text"  value="2017-05-20 00:00:00" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss',start: laydate.now(0, 'YYYY/MM/DD hh:mm:ss')})" class=" form-control layer-date" id="end_time" name="end_time"   style="width:300px;height:30px;">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">任务详情：</label>
							<div class="col-sm-10">
								<textarea  name="task_comment" class="form-control" style="width:895px;height:150px;" required>走进社区</textarea>
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