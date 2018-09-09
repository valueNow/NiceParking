<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>导游列表</title>
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
                        <h5>导游列表</h5>
						<div class="ibox-tools">
							<a class="collapse-link">
								<i class="fa fa-chevron-up" onclick="$('#quary').slideToggle()"></i>
							</a>
						</div>
                    </div>
					<div class="ibox-content" style="padding-top:15px !important;padding-bottom:15px !important;"  id="quary">
						<form role="form" class="form-inline">
							<div class="form-group">
								<input type="text" placeholder="导游名称" id="feature_name" class="form-control">
							</div>
							<button class="btn btn-white" type="button" onclick='search()' style="margin:0" >查询</button>
						</form>
					</div>
                    <div class="ibox-content" id="result">
						<table class="table table-striped table-bordered table-hover display nowrap"  cellspacing="0" width="100%" id="editable">
                            <thead>
                                <tr>
									<th>序号</th>
									<th>姓名</th>
									<th>性别</th>
                                    <th>所属景区</th>
                                    <th>手机号</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>李娜</td>
									<td>女</td>
									<td>澳门观光塔</td>
									<td>18426473849</td>
									<td><a>删除</a></td>
								</tr>
								<tr>
									<td>2</td>
									<td>乔司</td>
									<td>男</td>
									<td>澳门观光塔</td>
									<td>13827456783</td>
									<td><a>删除</a></td>
								</tr>
								<tr>
									<td>3</td>
									<td>安智</td>
									<td>女</td>
									<td>故宫</td>
									<td>15847394857</td>
									<td><a>删除</a></td>
								</tr>
								<tr>
									<td>4</td>
									<td>李恩全</td>
									<td>男</td>
									<td>故宫</td>
									<td>13847567382</td>
									<td><a>删除</a></td>
								</tr>
								<tr>
									<td>5</td>
									<td>安琪</td>
									<td>女</td>
									<td>故宫</td>
									<td>18236748573</td>
									<td><a>删除</a></td>
								</tr>
								<tr>
									<td>6</td>
									<td>王倩倩</td>
									<td>女</td>
									<td>澳门观光塔</td>
									<td>18827348576</td>
									<td><a>删除</a></td>
								</tr>
								<tr>
									<td>7</td>
									<td>张涵</td>
									<td>女</td>
									<td>动物园</td>
									<td>18673628473</td>
									<td><a>删除</a></td>
								</tr>
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