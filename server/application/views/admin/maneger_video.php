<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>视频列表</title>
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
		<h5>视频列表</h5>
	</div>
	<div class="ibox-content" style="padding-top:5px !important;padding-bottom:5px !important;"  id="quary">
		<form role="form" class="form-inline">
			<div class="form-group">
				<label class="sr-only" for="food_name">名称</label>
				<input id="video_name" class="form-control" placeholder="名称" type="text">
			</div>
			<button class="btn btn-white" type="button" onclick='search()' style="margin:0" >查询</button>
		</form>
	</div>
	<div class="ibox-content" id="result">
		<form method="post" action="/index.php/admin/release/add_maneger_video" class="form-horizontal" onsubmit="return sub()">
		<table class="table table-striped table-bordered table-hover display nowrap"  cellspacing="0" width="100%" id="editable">
			<thead>
				<tr>
					<th></th>
					<th>名称</th>
					<th>播放时长</th>
					<th>简介</th>
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
            "url": "/index.php/admin/release/maneger_video",
			"data": function ( d ) {  
                //添加额外的参数传给服务器
				if($('#video_name').val()!=''){
					d.video_name = $('#video_name').val();
				}
            }
        },
		 "drawCallback": function( settings ) {
			$('#editable_length').css('float','left');
			if($('#btnadd').length<=0){
				$(' <a href="/index.php/admin/release/add_video/maneger_video" id="btnadd" class="btn btn-primary">添加视频</a>').insertBefore($('#editable_length'));
			}
			if($('#btnstatuelst').length<=0){
				$('<div class="col-sm-12" id="btnstatuelst"><div class="row" style="margin: 0;"><button class="btn btn-primary" style="margin: 0;">确定</button></div></div>').insertBefore($('#editable_info').parent());
			}
		}
    } );
} );
function search(){  
    table.ajax.reload();  
}
function sub(){
	var video_id = $('input[name="video_id"]:checked').val();
	if(typeof(video_id)=="undefined"){
		alert("请选择视频");
		return false;
	}
}
</script>
</body>
</html>