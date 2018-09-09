<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>任务列表</title>
    <link rel="shortcut icon" href="/favicon.ico">
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/statics/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/animate.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
	<link href="/statics/css/plugins/iCheck/custom.css" rel="stylesheet">
	<style>
	.table>tbody>tr>td{  
        text-align:center;  
	}  
  
	/* dataTables表头居中 */  
	.table>thead:first-child>tr:first-child>th{  
        text-align:center;      
	}
	</style>
</head>
<body class="gray-bg">
<div class="row wrapper wrapper-content animated fadeInRight" style="padding-top:0px !important;">
	<div class="row">
		<div class="col-sm-12">
			<div class="ibox float-e-margins" style="margin-bottom:0px !important;border-bottom:0px !important;">
				<div class="ibox-title">
					<h5>任务列表</h5>
					<div class="ibox-tools">
						<a class="collapse-link">
							<i class="fa fa-chevron-up" onclick="$('#quary').slideToggle()"></i>
						</a>
					</div>
				</div>
				<div class="ibox-content" style="padding-top:5px !important;padding-bottom:5px !important;" id="quary">
					<form role="form" class="form-inline">
						<div class="form-group">
							<input type="text" placeholder="任务名称" id="task_title" class="form-control">
						</div>
						<div class="form-group ">
							 <select name="task_user" id="task_user" class="form-control" style="padding-top:3px;">
								<option value="0">我的任务</option>
								<option value="1">我发起的任务</option>
								<option value="2">我负责的任务</option>
								<option value="3">我参与的任务</option>
							 </select>
						</div>
						<div class="form-group ">
							 <select name="task_status" id="task_status" class="form-control" style="padding-top:3px;">
								<option value="0">当前状态</option>
								<option value="1">待启动</option>
								<option value="2">待执行</option>
								<option value="3">执行中</option>
								<option value="4">已完成</option>
								<option value="5">已搁置</option>
								<option value="6">已取消</option>
							 </select>
						</div>
						<div class="form-group ">
							 <select name="task_importance" id="task_importance" class="form-control" style="padding-top:3px;">
								<option value="0">重要程度</option>
								<option value="1">一般</option>
								<option value="2">重要</option>
								<option value="3">关键</option>
								<option value="4">紧急</option>
							 </select>
						</div>
						<button class="btn btn-white" type="button" onclick="search()" style="margin:0">查询</button>
					</form>
				</div>
				<div class="ibox-content" id="result">
					<div id="editable_wrapper" class="dataTables_wrapper form-inline" role="grid">
						<div class="row">
							<div class="col-sm-6">
								<a href="/index.php/res/business/t_add" id="btnadd" class="btn btn-primary ">新建任务</a>
								<div class="dataTables_length" id="editable_length" style="float: left;">
									<label>每页 
										<select name="editable_length" aria-controls="editable" class="form-control input-sm">
											<option value="10">10</option>
											<option value="25">25</option>
											<option value="50">50</option>
											<option value="100">100</option>
										</select> 条记录
									</label>
								</div>
							</div>
							<div class="col-sm-6"></div>
						</div>
						<table class="table table-striped table-bordered table-hover display nowrap dataTable no-footer" cellspacing="0" width="100%" id="editable" aria-describedby="editable_info" style="width: 100%;">
						<thead>
							<tr role="row">
								<th width="35%" rowspan="1" colspan="1" style="width: 391px;">标题</th>
								<th width="10%" rowspan="1" colspan="1" style="width: 99px;">负责人</th>
								<th width="10%" rowspan="1" colspan="1" style="width: 99px;">重要程度</th>
								<th width="10%" rowspan="1" colspan="1" style="width: 99px;">任务状态</th>
								<th width="10%" rowspan="1" colspan="1" style="width: 98px;">开始时间</th>
								<th width="10%" rowspan="1" colspan="1" style="width: 98px;">修改时间</th>
								<th width="15%" rowspan="1" colspan="1" style="width: 157px;">操作</th>
							</tr>
						</thead>
						<tbody>
							<tr class="odd">
								<td class=" ">走进社区任务</td>
								<td class=" ">沈浪</td>
								<td class=" ">一般</td>
								<td class=" ">待启动</td>
								<td class=" ">2017-06-28 00:00:00</td>
								<td class=" ">2017-06-28 15:24:26</td>
								<td class=" ">
									<!--<a href="/index.php/task/task_log_add/4">添加日志</a>|-->
									<a href="/index.php/res/business/t_details/4">查看</a>|
									<a href="/index.php/res/business/t_edit/4">编辑</a>|
									<a href="javascript:if(confirm('确定要删除吗?'))alert('删除成功')">删除</a>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="row">
						<div class="col-sm-6">
							<div class="dataTables_info" id="editable_info" role="alert" aria-live="polite" aria-relevant="all">显示 1 到 1 项，共 1 项</div>
						</div>
						<div class="col-sm-6">
							<div class="dataTables_paginate paging_simple_numbers" id="editable_paginate">
								<ul class="pagination">
									<li class="paginate_button previous disabled" aria-controls="editable" tabindex="0" id="editable_previous"><a href="#">上一页</a></li>
									<li class="paginate_button active" aria-controls="editable" tabindex="0"><a href="#">1</a></li>
									<li class="paginate_button next disabled" aria-controls="editable" tabindex="0" id="editable_next"><a href="#">下一页</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
</script>

</body></html>
</html>