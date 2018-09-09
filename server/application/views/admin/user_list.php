<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理员列表</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
	<style>
	.table>tbody>tr>td{  
        text-align:center;  
	}
	.table>thead:first-child>tr:first-child>th{  
        text-align:center;      
	}
	</style>
</head>

<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>管理员列表</h5>
	</div>
	<div style="padding-top:5px !important;padding:20px !important;background:rgba(8, 77, 103,0.5)"  id="quary">
		<form role="form" class="form-inline">
			<div class="form-group">
				<label class="sr-only" for="food_name">名称</label>
				<input id="username" class="form-control" placeholder="用户名" type="text">
			</div>
			<button class="btn btn-primary" type="button" onclick='search()' style="margin:0" >查询</button>
		</form>
	</div>
	<div class="ibox-content" id="result">
	<form method="post" action="/index.php/admin/release/public_listorder" id="myform" name="myform">
		<table class="table table-striped table-bordered table-hover display nowrap"  cellspacing="0" width="100%" id="editable">
			<thead>
				<tr>
					<th>用户名</th>
					<th>所属角色</th>
					<th>手机</th>
					<th>真实姓名</th>
					<th>状态</th>
					<th>添加时间</th>
					<th>操作</th>
				</tr>
			</thead>
		</table>
	</form>
	</div>
</div>
<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
<script src="/statics/js/bootstrap.min.js?v=3.3.6"></script>
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
            "url": "/index.php/admin/user_role/init",
			"data": function ( d ) {  
                //添加额外的参数传给服务器
				if($('#username').val()!=''){
					d.username = $('#username').val();
				}
            }
        },
		 "drawCallback": function( settings ) {
			$('#editable_length').css('float','left');
			if($('#btnadd').length<=0){
				$(' <a href="/index.php/admin/user_role/add_admin" id="btnadd" class="btn btn-primary">添加管理员</a>').insertBefore($('#editable_length'));
			}
		}
    } );
} );
function search(){  
    table.ajax.reload();  
}
</script>
</body>
</html>