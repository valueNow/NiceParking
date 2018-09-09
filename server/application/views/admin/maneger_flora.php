<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>动植物资源列表</title>
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
		<h5>动植物资源列表</h5>
	</div>
	<div class="ibox-content" style="padding-top:5px !important;padding-bottom:5px !important;"  id="quary">
		<form role="form" class="form-inline">
			<div class="form-group">
				<label class="sr-only" for="food_name">名称</label>
				<input id="title" class="form-control" placeholder="标题" type="text">
			</div>
			<button class="btn btn-white" type="button" onclick='search()' style="margin:0" >查询</button>
		</form>
	</div>
	<form method="post" action="/index.php/admin/release/add_maneger_flora" class="form-horizontal" onsubmit="return sub()">
	<div class="ibox-content" id="result">
		<table class="table table-striped table-bordered table-hover display nowrap"  cellspacing="0" width="100%" id="editable">
			<thead>
				<tr>
					<th></th>
					<th>标题</th>
					<th>编号</th>
					<th>数量</th>
					<th>分类</th>
				</tr>
			</thead>
		</table>
		<table class="table" border="0">
			<tbody>
				<tr>
					<th colspan="4" style="text-align:left;"><strong>基本信息填写：</strong></th>
				</tr>
				<tr>
					<td>名称:</td>
					<td style="text-align:left;width:25%">
						<input name="name" size="30" required type="text">
					</td>
					<td>时长:</td>
					<td style="text-align:left;">
						<input name="duration" size="30" required type="text">
					</td>
				</tr>
				<tr>
					<td>备注:</td>
					<td colspan="3" style="text-align:left;">
						<textarea name="description" cols="60" rows="4" required wrap="VIRTUAL" style="background:transparent;outline:none"></textarea>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<input class="btn btn-primary" name="submit" value=" 确定 " type="submit">
						<a href="/index.php/admin/release/maneger_time" class="btn btn-primary">返回</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	</form>
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
            "url": "/index.php/admin/release/maneger_flora",
			"data": function ( d ) {  
                //添加额外的参数传给服务器
				if($('#title').val()!=''){
					d.title = $('#title').val();
				}
            }
        }
    } );
} );
function search(){  
    table.ajax.reload();  
}
function sub(){
	var flora_id = $('input[name="flora_id"]:checked').val();
	if(typeof(flora_id)=="undefined"){
		alert("请选择动植物信息");
		return false;
	}
}
</script>
</body>
</html>