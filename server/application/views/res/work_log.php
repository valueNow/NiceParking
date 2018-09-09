<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>工作日志管理</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/statics/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/animate.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
	<style>
	.table>tbody>tr>td{  
		text-align:center;     
		word-break:keep-all;/* 不换行 */  
		white-space:nowrap;/* 不换行 */  
		overflow:hidden;/* 内容超出宽度时隐藏超出部分的内容 */  
		text-overflow:ellipsis;/* 当对象内文本溢出时显示省略标记(...) ；需与overflow:hidden;一起使用*/  
	}  

	/* dataTables表头居中 */  
	.table>thead:first-child>tr:first-child>th{  
        text-align:center;      
	}
	</style>
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>日志管理</h5>
						<div class="ibox-tools">
							<a class="collapse-link">
								<i class="fa fa-chevron-up" onclick="$('#quary').slideToggle()"></i>
							</a>
						</div>
                    </div>
				<div class="ibox-content" id="quary">
						<div class="form-group">
							<div class="col-sm-2" style="padding:0px;">
								<input class="form-control layer-date" id="start_time" placeholder="日志开始时间" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
							</div>
							<div class="col-sm-2">
								<input class="form-control layer-date" id="end_time" placeholder="日志结束时间" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
							</div>
							<div class="col-sm-2">
								<select class="user_name form-control" id="userId" style="padding:0px 12px;">
									<option value="">全部</option>
									<option value="116">本人</option>
																												<option value="112">开发股员</option>
																										</select>
							</div>
							<div class="col-sm-2" style="padding:0px;">
								<button class="btn btn-white" type="button" id="schedule_search" style="margin:0">查询</button>
							</div>
						</div>
				</div>
				<div class="ibox-content">
					<div id="schedule_table_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-6"><a id="btn_add" href="/index.php/res/business/log_add" class="btn btn-primary">新建日志</a>   <a id="btn_delete" onclick="batch_delete()" class="btn btn-primary">批量删除</a><div class="dataTables_length" id="schedule_table_length" style="float: left;"><label>每页 <select name="schedule_table_length" aria-controls="schedule_table" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option></select> 条记录</label></div></div><div class="col-sm-6"></div></div><table class="table table-striped table-bordered table-hover display nowrap dataTable no-footer" cellspacing="0" width="100%" id="schedule_table" style="table-layout: fixed; width: 100%;" aria-describedby="schedule_table_info">
						<thead>
							<tr role="row"><th width="3%" rowspan="1" colspan="1" style="width: 15px;"><input type="checkbox" class="all_chk"></th><th width="5%" rowspan="1" colspan="1" style="width: 37px;">序号</th><th width="27%" rowspan="1" colspan="1" style="width: 279px;">日志标题</th><th width="10%" rowspan="1" colspan="1" style="width: 92px;">工作地点</th><th width="10%" rowspan="1" colspan="1" style="width: 92px;">日志类型</th><th width="10%" rowspan="1" colspan="1" style="width: 92px;">创建人</th><th width="10%" rowspan="1" colspan="1" style="width: 91px;">开始时间</th><th width="10%" rowspan="1" colspan="1" style="width: 91px;">结束时间</th><th width="15%" rowspan="1" colspan="1" style="width: 146px;">操作</th></tr>
						</thead>
					<tbody>
					<tr class="odd"><td class=" "><input type="checkbox" value="27"></td><td class=" ">1</td><td class=" ">会议纪要</td><td class=" ">北京</td><td class=" ">一般</td><td class=" ">沈浪</td><td class=" ">2017-05-04 14:58:44</td><td class=" ">2017-05-05 14:58:45</td><td class=" "><a href="/index.php/res/business/log_details/27">查看</a> | <a href="/index.php/res/business/log_edit/27">修改</a> | <a href="javascript:if(confirm('确定要删除吗?'))alert('删除成功')">删除</a> </td></tr>
					<tr class=""><td class=" "><input type="checkbox" value="27"></td><td class=" ">2</td><td class=" ">工作日报</td><td class=" ">北京</td><td class=" ">一般</td><td class=" ">李飞</td><td class=" ">2017-05-04 14:58:44</td><td class=" ">2017-05-05 14:58:45</td><td class=" "><a href="/index.php/res/business/log_details/27">查看</a> | <a href="/index.php/res/business/log_edit/27">修改</a> | <a href="javascript:if(confirm('确定要删除吗?'))alert('删除成功')">删除</a> </td></tr>
					<tr class="odd"><td class=" "><input type="checkbox" value="27"></td><td class=" ">3</td><td class=" ">客户跟踪</td><td class=" ">北京</td><td class=" ">一般</td><td class=" ">关严</td><td class=" ">2017-05-04 14:58:44</td><td class=" ">2017-05-05 14:58:45</td><td class=" "><a href="/index.php/res/business/log_details/27">查看</a> | <a href="/index.php/res/business/log_edit/27">修改</a> | <a href="javascript:if(confirm('确定要删除吗?'))alert('删除成功')">删除</a> </td></tr>
					<tr class=""><td class=" "><input type="checkbox" value="27"></td><td class=" ">4</td><td class=" ">项目跟进</td><td class=" ">北京</td><td class=" ">一般</td><td class=" ">赵健</td><td class=" ">2017-05-04 14:58:44</td><td class=" ">2017-05-05 14:58:45</td><td class=" "><a href="/index.php/res/business/log_details/27">查看</a> | <a href="/index.php/res/business/log_edit/27">修改</a> | <a href="javascript:if(confirm('确定要删除吗?'))alert('删除成功')">删除</a> </td></tr>
					<tr class="odd"><td class=" "><input type="checkbox" value="27"></td><td class=" ">5</td><td class=" ">外出办事</td><td class=" ">北京</td><td class=" ">一般</td><td class=" ">黑子</td><td class=" ">2017-05-04 14:58:44</td><td class=" ">2017-05-05 14:58:45</td><td class=" "><a href="/index.php/res/business/log_details/27">查看</a> | <a href="/index.php/res/business/log_edit/27">修改</a> | <a href="javascript:if(confirm('确定要删除吗?'))alert('删除成功')">删除</a> </td></tr>
					<tr class=""><td class=" "><input type="checkbox" value="27"></td><td class=" ">6</td><td class=" ">周例会</td><td class=" ">北京</td><td class=" ">一般</td><td class=" ">杜雪</td><td class=" ">2017-05-04 14:58:44</td><td class=" ">2017-05-05 14:58:45</td><td class=" "><a href="/index.php/res/business/log_details/27">查看</a> | <a href="/index.php/res/business/log_edit/27">修改</a> | <a href="javascript:if(confirm('确定要删除吗?'))alert('删除成功')">删除</a> </td></tr>
					<tr class="odd"><td class=" "><input type="checkbox" value="27"></td><td class=" ">7</td><td class=" ">周例会</td><td class=" ">北京</td><td class=" ">一般</td><td class=" ">徐烨</td><td class=" ">2017-05-04 14:58:44</td><td class=" ">2017-05-05 14:58:45</td><td class=" "><a href="/index.php/res/business/log_details/27">查看</a> | <a href="/index.php/res/business/log_edit/27">修改</a> | <a href="javascript:if(confirm('确定要删除吗?'))alert('删除成功')">删除</a> </td></tr>
					</tbody></table>
					<div class="row"><div class="col-sm-6"><div class="dataTables_info" id="schedule_table_info" role="alert" aria-live="polite" aria-relevant="all">显示 7 到 7 项，共 7 项</div></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="schedule_table_paginate"><ul class="pagination"><li class="paginate_button previous disabled" aria-controls="schedule_table" tabindex="0" id="schedule_table_previous"><a href="#">上一页</a></li><li class="paginate_button active" aria-controls="schedule_table" tabindex="0"><a href="#">1</a></li><li class="paginate_button next disabled" aria-controls="schedule_table" tabindex="0" id="schedule_table_next"><a href="#">下一页</a></li></ul></div></div></div></div>
				</div>
			</div>
		</div>
	</div>
</div>


</body></html>