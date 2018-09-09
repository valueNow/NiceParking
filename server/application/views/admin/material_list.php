<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>应急物资管理</title>
    <link rel="shortcut icon" href="/favicon.ico">
	<link href="/statics/css/bootstrap.min.css" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css" rel="stylesheet">
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
                        <h5>应急物资管理</h5>
						<div class="ibox-tools">
							<a class="collapse-link">
								<i class="fa fa-chevron-up" onclick="$('#quary').slideToggle()"></i>
							</a>
						</div>
                    </div>
					<div class="ibox-content" style="padding-top:15px !important;padding-bottom:15px !important;"  id="quary">
						<form role="form" class="form-inline">
							<div class="form-group">
								<input type="text" placeholder="物资名称" id="material_name" class="form-control">
							</div>
							<div class="form-group">
								<select id="status" class="form-control" style="padding-top:0px;padding-bottom:0px" >
									<option value="">物资状态</option>
									<?php foreach($material_status as $k => $v): ?>
										<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
									<?php endforeach;?>
								</select>
							</div>
							<div class="form-group">
								<select id="eg_type" class="form-control" style="padding-top:0px;padding-bottom:0px" >
									<option value="">事件类型</option>
									<?php foreach($event_type as $k => $v): ?>
										<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
									<?php endforeach;?>
								</select>
							</div>
							<button class="btn btn-white" type="button" onclick='search()' style="margin:0" >查询</button>
						</form>
					</div>
                    <div class="ibox-content" id="result">
						<table class="table table-striped table-bordered table-hover display nowrap"  cellspacing="0" width="100%" id="editable">
                            <thead>
                                <tr>
									<th>物资名称</th>
									<th>所属类型</th>
									<th>状态</th>
									<th>数量总数(单位)</th>
									<th>所属仓库</th>
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
            "url": "/index.php/admin/emergency_material/index",
			"data": function ( d ) {  
                //添加额外的参数传给服务器
				d.material_name = $('#material_name').val();
				if($('#status').val()!=''){
					d.status = $('#status').val();
				}
				if($('#eg_type').val()!=''){
					d.eg_type = $('#eg_type').val();
				}
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
              "targets": [ 6 ]
            }
		],
		 "drawCallback": function( settings ) {
			$('#editable_length').css('float','left');
			if($('#btnadd').length<=0){
				$('<a href="/index.php/admin/emergency_material/add_material" id="btnadd" class="btn btn-primary ">新增物资</a>').insertBefore($('#editable_length'));
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