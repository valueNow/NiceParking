<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>信息发布管理</title>
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
		<h5>信息发布管理</h5>
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
					<th>名称</th>
					<th>描述</th>
					<th>发布时间</th>
					<th>状态</th>
					<th>操作</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
<div class="Release">
	<form method="post" action="/index.php/admin/release/release_maneger">
		<?php foreach($server as $v){?>
		<div class="form-Release">
			<input name="sys[]" type="checkbox" value="<?php echo $v['id'];?>">
			<label><?php echo $v['name'];?></label>
		</div>
		<?php }?>
		<div class="btnl">
			<input type="hidden" name="sid" id="sid">
			<input class="Dmine" type="submit" value="确定">
			<a href="javascript:;" class="cancel">取消</a>
		</div>
	</form>
	<div class="colse_Dele"></div>
</div>
<div class="bmapn"></div>
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
            "url": "/index.php/admin/release/maneger",
			"data": function ( d ) {  
                //添加额外的参数传给服务器
				if($('#name').val()!=''){
					d.name = $('#name').val();
				}
            }
        },
		 "drawCallback": function( settings ) {
			$('#editable_length').css('float','left');
			if($('#btnadd').length<=0){
				$(' <a href="/index.php/admin/release/add_maneger" id="btnadd" class="btn btn-primary">添加信息</a>').insertBefore($('#editable_length'));
			}
		}
    } );
} );
function search(){  
    table.ajax.reload();  
}
function open_win(id){
	$("#sid").val(id);
	$(".Release").show(); 
	$(".bmapn").show();
}
//滚动图标关闭
$(".colse_Dele").on("click",function(){
	$(".Release").hide();
	$(".bmapn").hide();
});
//取消事件
$(".cancel").on("click",function(){
	$(".Release").hide();
	$(".bmapn").hide();
});
</script>
</body>
</html>