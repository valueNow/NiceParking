<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会议列表</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
	<link href="/statics/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
	<style>
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
				<h5>会议列表</h5>
				<div class="ibox-tools">
					<a class="collapse-link">
						<i class="fa fa-chevron-up" onclick="$('#quary').slideToggle()"></i>
					</a>
				</div>
			</div>
			<div class="ibox-content" id="quary">
				<div class="form-group">
					<div class="col-sm-2" style="padding:0px;">
						<select id="status" class="form-control" style="padding-top:0px;padding-bottom:0px">
							<option value="">会议状态</option>
							<option value="1">待召开</option>
							<option value="2">已结束</option>
							<option value="3">已取消</option>
						</select>
					</div>
					<div class="col-sm-2">
						<select id="type" class="form-control" style="padding-top:0px;padding-bottom:0px">
							<option value="0">我的会议</option>
							<option value="1">我发起的会议</option>
							<option value="2">我参与的会议</option>
						</select>
					</div>
					<div class="col-sm-2" style="padding:0px;">
						<button class="btn btn-white" type="button" onclick="search()" style="margin:0">查询</button>
					</div>
				</div>
			</div>
			<div class="ibox-content" id="result">
			<form method="post" action="" id="myform" name="myform">
				<div id="editable_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-6">
					<div class="dataTables_length" id="editable_length" style="float: left;"><label>每页 <select name="editable_length" aria-controls="editable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> 条记录</label></div></div><div class="col-sm-6"></div><div id="editable_processing" class="dataTables_processing" style="visibility: hidden;">处理中…</div></div><table class="table table-striped table-bordered table-hover display nowrap dataTable no-footer" cellspacing="0" width="100%" id="editable" aria-describedby="editable_info" style="width: 100%;">
					<thead>
						<tr role="row"><th width="35" rowspan="1" colspan="1" style="width: 34px;"></th><th rowspan="1" colspan="1" style="width: 246px;">会议主题</th><th width="70" class="text-center" rowspan="1" colspan="1" style="width: 69px;">主持人</th><th width="100" class="text-center" rowspan="1" colspan="1" style="width: 99px;">主办部门</th><th width="170" rowspan="1" colspan="1" style="width: 169px;">时间</th><th width="10%" class="text-center" rowspan="1" colspan="1" style="width: 91px;">地点</th><th width="50" class="text-center" rowspan="1" colspan="1" style="width: 49px;">状态</th><th width="80" class="text-center" rowspan="1" colspan="1" style="width: 79px;">纪要</th><th width="100" class="text-center" rowspan="1" colspan="1" style="width: 99px;">操作</th></tr>
					</thead>
				<tbody><tr class="odd"><td valign="top" colspan="9" class="dataTables_empty">没有数据</td></tr></tbody></table><div class="row"><div class="col-sm-6"><div class="dataTables_info" id="editable_info" role="alert" aria-live="polite" aria-relevant="all">显示0项</div></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="editable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" aria-controls="editable" tabindex="0" id="editable_previous"><a href="#">上一页</a></li><li class="paginate_button next disabled" aria-controls="editable" tabindex="0" id="editable_next"><a href="#">下一页</a></li></ul></div></div></div></div>
			</form>
			</div>
		</div>
	   </div>
	</div>
</div>

</body></html>