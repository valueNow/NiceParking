<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>旅游景区管理列表</title>
    <link rel="shortcut icon" href="/favicon.ico">
	<link href="/statics/css/bootstrap.min.css" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
     <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">	
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
                        <h5>特色旅游点管理列表</h5>
						<div class="ibox-tools">
							<a class="collapse-link">
								<i class="fa fa-chevron-up" onclick="$('#quary').slideToggle()"></i>
							</a>
						</div>
                    </div>
					<div class="ibox-content" style="padding-top:15px !important;padding-bottom:15px !important;"  id="quary">
						<form role="form" class="form-inline">
							<div class="form-group">
								<input type="text" placeholder="特色旅游点名称" id="feature_name" class="form-control">
							</div>
							<button class="btn btn-white" type="button" onclick='search()' style="margin:0" >查询</button>
						</form>
					</div>
                    <div class="ibox-content" id="result">
						<table class="table table-striped table-bordered table-hover display nowrap"  cellspacing="0" width="100%" id="editable">
                            <thead>
                                <tr>
									<th>特色旅游点名称</th>
									<th>所属景点</th>
									<th>位置</th>
                                    <th>添加时间</th>
									<th>操作</th>
                                </tr>
                            </thead>
							</tbody>
								
							</tbody>
                        </table>
                        <div class="row"><div class="col-sm-6"><div class="dataTables_info" id="schedule_table_info" role="alert" aria-live="polite" aria-relevant="all">显示 7 到 7 项，共 7 项</div></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="schedule_table_paginate"><ul class="pagination"><li class="paginate_button previous disabled" aria-controls="schedule_table" tabindex="0" id="schedule_table_previous"><a href="#">上一页</a></li><li class="paginate_button active" aria-controls="schedule_table" tabindex="0"><a href="#">1</a></li><li class="paginate_button next disabled" aria-controls="schedule_table" tabindex="0" id="schedule_table_next"><a href="#">下一页</a></li></ul></div></div></div></div>
                    </div>
                </div>
            </div>
        </div>
	</div>
<script src="/statics/js/jquery.min.js"></script>
<script src="/statics/js/bootstrap.min.js"></script>
<script src="/statics/js/plugins/jeditable/jquery.jeditable.js"></script>
 <!-- datatables -->
<script src="/statics/js/plugins/dataTables/jquery.dataTables.js"></script>
<script type="text/javascript"  src="/statics/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script type="text/javascript"  >
var table; 
function search(){  
    table.ajax.reload();  
}
</script>
</body>
</html>