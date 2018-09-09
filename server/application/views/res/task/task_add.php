<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新建任务</title>
    <link rel="shortcut icon" href="/favicon.ico">
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/statics/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/animate.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
	<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
	<script src="/statics/js/plugins/validate/jquery.validate.min.js"></script>
	<script src="/statics/js/plugins/validate/messages_zh.min.js"></script>
	<script src="/statics/js/plugins/validate/validateExtend.js"></script>
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
                        <h5>新建任务</h5>
                    </div>
					<form method="post" id="form_info"   class="form-horizontal">
                    <div class="ibox-content">
						<h5>基本信息</h5>
						<div class="hr-line-dashed"></div>
						<div class="form-group">
							<label class="col-sm-2 control-label">任务名称：</label>
							<div class="col-sm-3">
								<input type="text" value="" name="task_title"  class="form-control" style="width:300px;"  required>
							</div>
							<label class="col-sm-2 control-label">任务状态：</label>
							<div class="col-sm-3">
								<select name="task_status" id = "task_status" style="width:300px;height:30px;" class="form-control">
									<option value="1"   >待启动</option>	
									<option value="2"   >待执行</option>	
									<option value="3"   >执行中</option>	
									<option value="4"   >已完成</option>	
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
								<input type="text" name="principal_name" class="form-control"   id="principal_name"   required style="width:300px;height:30px;">
								<input type="hidden"  id="task_principal" name="task_principal"    required>
							</div>
							<label class="col-sm-2 control-label">参与人：</label>
							<div class="col-sm-4">
								<input type="text" name="participants_name" class="form-control"   id="participants_name"   required style="width:300px;height:30px;">
								<input type="hidden"  id="task_participants" name="task_participants" class="form-control"     required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">开始时间：</label>
							<div class="col-sm-3">
								<input  placeholder="YYYY-MM-DD hh:mm:ss" class=" form-control layer-date" id="begin_time" name="begin_time" required style="width:300px;height:30px;">
							</div>
							<label class="col-sm-2 control-label">预计结束时间：</label>
							<div class="col-sm-4">
								<input type="text"  placeholder="YYYY-MM-DD hh:mm:ss" class="form-control layer-date" id="end_time" name="end_time" required  style="width:300px;height:30px;">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">任务详情：</label>
							<div class="col-sm-10">
								<textarea  name="task_comment" class="form-control" style="width:895px;height:150px;" required></textarea>
							</div>
						</div>
						
						
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-2" style="float:right;margin-top:15px;">
								<input class="btn btn-primary" style="margin_right:40px;" type="submit" value="保存">
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="/statics/js/plugins/layer/laydate/laydate.js"></script>
<script type="text/javascript">
	 //日期范围限制
        var start = {
            elem: '#begin_time',
            format: 'YYYY-MM-DD hh:mm:ss',
            min: laydate.now(), //设定最小日期为当前日期
            max: '2099-06-16 23:59:59', //最大日期
            istime: true,
            istoday: false,
            choose: function (datas) {
                end.min = datas; //开始日选好后，重置结束日的最小日期
                end.start = datas //将结束日的初始值设定为开始日
            }
        };
        var end = {
            elem: '#end_time',
            format: 'YYYY-MM-DD hh:mm:ss',
            min: laydate.now(),
            max: '2099-06-16 23:59:59',
            istime: true,
            istoday: false,
            choose: function (datas) {
                start.max = datas; //结束日选好后，重置开始日的最大日期
            }
        };
        laydate(start);
        laydate(end);
		
		var  userflag;
		function openwindow(flag)  
		{   
			userflag=flag;
			var uids;
			if(flag=="user")
			{
				uids= $("#task_participants").val();
			}else
			{
				uids=  $("#task_principal").val();
			}
		    var url = "/index.php/meeting/select_users/"+uids;
			window.open(url,'_blank','width=1000,height=800,menubar=no,toolbar=no,status=no,scrollbars=yes');	
		} 
		
		function assignment(content)  
		{  
			var row = Array();
			row = content.split("|");	
			if(userflag=="user")
			{
				document.getElementById("participants_name").value = row[1];//赋值 	
				document.getElementById("task_participants").value = row[0];//赋值 				

			}else
			{
				document.getElementById("principal_name").value = row[1];//赋值  
				document.getElementById("task_principal").value = row[0];//赋值  
			}
		
			
		} 
	 
</script>

</html>