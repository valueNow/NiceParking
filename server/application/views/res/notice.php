<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>通知公告管理</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/statics/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/animate.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
	<script src="/statics/js/jquery.min.js"></script>
	<script src="/statics/js/bootstrap.min.js"></script>
	<script src="/statics/js/plugins/dataTables/jquery.dataTables.js"></script>
	<script src="/statics/js/plugins/dataTables/dataTables.bootstrap.js"></script>
	<script src="/statics/js/plugins/layer/laydate/laydate.js"></script>
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
                        <h5>通知公告</h5>
						<div class="ibox-tools">
							<a class="collapse-link">
								<i class="fa fa-chevron-up" onclick="$('#quary').slideToggle()"></i>
							</a>
						</div>
                    </div>
			     	<div class="ibox-content" id="quary">
						<div class="form-group">
							<div class="col-sm-2" style="padding:0px;">
							<select class="user_name form-control" id="userId" style="padding:0px 12px;">
								<option value="">全部</option>
								<option value="116">本人</option>
								<option value="112">下属</option>
							</select>
							</div>
						
						<div class="col-sm-3">
							<button class="btn btn-white" type="button" id="work_search" style="margin:0">查询</button>
						</div>
					</div>
						
				</div>
				<div class="ibox-content">
						<div id="work_table_wrapper" class="dataTables_wrapper form-inline" role="grid">
							<div class="row">
								<div class="col-sm-6">
									<a id="btn_add" href="/index.php/res/business/n_add" class="btn btn-primary">新增公告</a>   
									<a id="btn_delete" onclick="batch_delete()" class="btn btn-primary">批量删除</a>
									<div class="dataTables_length" id="work_table_length" style="float: left;">
										<label>每页 <select name="work_table_length" aria-controls="work_table" class="form-control input-sm">
											<option value="10">10</option>
											<option value="25">25</option>
											<option value="50">50</option>
											</select> 条记录</label>
									</div></div><div class="col-sm-6"></div></div><table class="table table-striped table-bordered table-hover display nowrap dataTable no-footer" cellspacing="0" width="100%" id="work_table" style="table-layout: fixed; width: 100%;" aria-describedby="work_table_info">
						<thead>
							<tr role="row"><th width="3%" rowspan="1" colspan="1" style="width: 17px;"><input type="checkbox" class="all_chk"></th><th width="5%" rowspan="1" colspan="1" style="width: 39px;">序号</th><th width="22%" rowspan="1" colspan="1" style="width: 233px;">公告主题</th><th width="45%" rowspan="1" colspan="1" style="width: 493px;">公告内容</th><th width="10%" rowspan="1" colspan="1" style="width: 95px;">创建人</th><th width="15%" rowspan="1" colspan="1" style="width: 152px;">操作</th></tr>
						</thead>
					<tbody>
						<tr class="odd">
						<td class=" "><input type="checkbox" value="12"></td>
						<td class=" ">1</td><td class=" ">系统通知</td>
						<td class=" ">测试公告</td><td class=" ">admin</td>
						<td class=" "><a href="/index.php/res/business/n_details/10">查看</a> </td>
						</tr>
						<tr class="even">
							<td class=" "><input type="checkbox" value="13"></td>
							<td class=" ">2</td>
							<td class=" ">年中总结汇报</td>
							<td class=" ">年中总结汇报</td>
							<td class=" ">admin</td>
							<td class=" "><a href="/index.php/res/business/n_details/10">查看</a> </td>
						</tr>
						<tr class="odd">
							<td class=" "><input type="checkbox" value="14"></td>
							<td class=" ">3</td>
							<td class=" ">年度体检计划</td>
							<td class=" ">年度体检计划</td>
							<td class=" ">admin</td>
							<td class=" "><a href="/index.php/res/business/n_details/10">查看</a> </td>
						</tr>
						<tr class="even">
							<td class=" "><input type="checkbox" value="10"></td>
							<td class=" ">4</td>
							<td class=" ">假期值班计划</td>
							<td class=" ">假期值班计划</td>
							<td class=" ">admin</td>
							<td class=" "><a href="/index.php/res/business/n_details/10">查看</a></td>
						</tr>
						</tbody>
						</table><div class="row"><div class="col-sm-6"><div class="dataTables_info" id="work_table_info" role="alert" aria-live="polite" aria-relevant="all">显示 1 到 4 项，共 4 项</div></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="work_table_paginate"><ul class="pagination"><li class="paginate_button previous disabled" aria-controls="work_table" tabindex="0" id="work_table_previous"><a href="#">上一页</a></li><li class="paginate_button active" aria-controls="work_table" tabindex="0"><a href="#">1</a></li><li class="paginate_button next disabled" aria-controls="work_table" tabindex="0" id="work_table_next"><a href="#">下一页</a></li></ul></div></div></div></div>
				</div>
			</div>
		</div>
	</div>
</div>


</body></html>