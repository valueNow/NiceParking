<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>数据备份列表</title>
    <link rel="shortcut icon" href="/favicon.ico">
	<link href="/statics/css/bootstrap.min.css" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css" rel="stylesheet">
	<script src="/statics/js/plugins/layer/laydate/laydate.js"></script>
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
                        <h5>数据备份列表</h5>
						<div class="ibox-tools">
							<a class="collapse-link">
								<i class="fa fa-chevron-up" onclick="$('#quary').slideToggle()"></i>
							</a>
						</div>
                    </div>
					<div class="ibox-content" style="padding-top:15px !important;padding-bottom:15px !important;"  id="quary">
						<form role="form" class="form-inline">
							<!--<div class="form-group">
								<input type="text" placeholder="操作步骤" id="operating" class="form-control">
							</div>-->
							<div class="form-group">
								<input type="text" placeholder="操作人" id="username" class="form-control">
							</div>
							<div class="form-group">
								开始时间：<input  id="start_time" class="form-control layer-date" placeholder="YYYY-MM-DD hh:mm:ss" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" placeholder="开始时间">
								
								结束时间：<input  id="end_time" class="form-control layer-date" placeholder="YYYY-MM-DD hh:mm:ss" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" placeholder="结束时间">

							</div>
							<button class="btn btn-white" type="button" onclick='search()' style="margin:0" >查询</button>
						</form>
					</div>
                    <div class="ibox-content" id="result">
						<table class="table table-striped table-bordered table-hover display nowrap"  cellspacing="0" width="100%" id="editable">
                            <thead>
                                <tr>
									<th>操作步骤</th>
									<th>控制器</th>
									<th>方法</th>
									<th>操作者</th>
                                    <th>添加时间</th>
									<th>操作</th>
                                </tr>
                            </thead>
                        </table>
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
$(document).ready(function() {
   table= $('#editable').DataTable( {
        "processing": true,
        "serverSide": true,
		"ordering":false,
		"searching": false,//是否允许Datatables开启本地搜索
        "ajax": {
            "url": "/index.php/admin/logs/data_backup_index",
			"data": function ( d ) {  
                //添加额外的参数传给服务器
				d.operating = $('#operating').val();
				d.username = $('#username').val();
				d.start_time = $('#start_time').val();
				d.end_time = $('#end_time').val();
            }
        },
		"order": [[ 1, "desc" ]],
		"columnDefs": [
            {
			  "sClass": "text-center",
			  "bSortable": false,
              "targets": [ 0 ]
            },
			{
			  "sClass": "text-center",
			  "bSortable": false,
              "targets": [ 5 ]
            }
		],
		 "drawCallback": function( settings ) {
			$('#editable_length').css('float','left');
			if($('#btnadd').length<=0){
				$('<a href="/index.php/admin/logs/data_backup" id="btnadd" class="btn btn-primary ">新增数据备份</a>').insertBefore($('#editable_length'));
			}
		}
    });
});
function search(){  
    table.ajax.reload();  
}
</script>
</body>
</html>