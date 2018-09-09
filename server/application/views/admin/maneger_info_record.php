<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>信息发布记录</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="/statics/css/index.css"/>
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
	<style>
	.table>tbody>tr>td{  
        text-align:center;  
	}
	.table>thead:first-child>tr:first-child>th{  
        text-align:center;      
	}
	.colse_Dele{cursor:pointer;position:absolute;right: -24px;top: -16px;background:url(/statics/image/delete.png) no-repeat;width:32px;height:32px;}
	label{color:#fff;}
	.form-Release{float:left;margin:5px 25px 0 15px;}
	</style>
</head>

<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>信息发布记录</h5>
	</div>
	<div class="ibox-content" style="padding-top:15px !important;padding-bottom:15px !important;"  id="quary">
		<form role="form" class="form-inline">
			<div class="form-group">
				<label class="sr-only" for="food_name">名称</label>
				<input id="name" class="form-control" placeholder="名称" type="text">
			</div>
			<button class="btn btn-white" type="button" onclick='search()' style="margin:0" >查询</button>
		</form>
	</div>
	<div class="ibox-content" id="result">
		<table class="table table-striped table-bordered table-hover display nowrap"  cellspacing="0" width="100%" id="editable">
			<thead>
				<tr>
					<th>目标主机</th>
					<th>名称</th>
					<th>发布类型</th>
					<th>发布时间</th>
					<th>发布人</th>
				</tr>
			</thead>
		</table>
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
            "url": "/index.php/admin/release/record",
			"data": function ( d ) {  
                //添加额外的参数传给服务器
				if($('#name').val()!=''){
					d.name = $('#name').val();
				}
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