<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增应急路线</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/statics/css/index.css"/>
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
	<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>新增应急路线</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="/index.php/admin/emergency/add_emergency_route" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">路线名称：</label>
							<div class="col-sm-3">
								<input type="text" name="line_name" class="form-control" required   value="">
							</div>
						</div>
						<!--<div class="form-group">
							<label class="col-sm-2 control-label">包含应急：</label>
							<div class="col-sm-8">
								<div class="checkbox" >
									<?php foreach($spot_arr as $k=>$val): ?>
									<label>
									<input value="<?php echo $k; ?>" id="spot_ids" type="checkbox" name="spot_ids[]"><?php echo $val['spot_name']; ?> 
									<input typheatmape="hidden" value="<?php echo $val['x_index']; ?>" name="x_index[]">
									<input type="hidden" value="<?php echo $val['y_index']; ?>" name="y_index[]">
									<input type="hidden" value="<?php echo $val['z_index']; ?>" name="z_index[]">
									&nbsp&nbsp&nbsp&nbsp&nbsp
									排序:&nbsp&nbsp<input type="text" id="listorder" name="listorder[]" value="">
									&nbsp&nbsp&nbsp&nbsp&nbsp
									</label> 
									<br/>
									<?php endforeach;?>
								</div>
								<br>
								<button type="button" onclick="lookline()" style="background:#7266ba;border-color:#7266ba;">查看路线</button>
							</div>
							
						</div>-->
						<div class="form-group">
							<input type="hidden" style="width:100%;border-style:none;" id="lstPoint" name="lstPoint">
							<label class="col-sm-2 control-label">路线信息：</label>
							<div class="col-sm-8">	
								<table class="table table-striped table-bordered table-hover display nowrap"  cellspacing="0" width="100%" id="editable">
									<thead>
										<tr>
											<th>经度</th>
											<th>纬度</th>
											<th>高度</th>
										</tr>
									</thead>
									<tr>
										<td></td>
										<td></td>
										<td></td>
									</tr>
								</table>
								<p><input type="button" id="createLine" onclick="__jingweidufreeLine();" style="background:#7266ba;border-color:#7266ba;" value="创建路线">
								<input type="button" id="modifyLine"  style="display: none;" onclick="__jingweidufreeLine();" value="修改路线">
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								<button type="button" id="lookLine" class="small-button">查看路线</button></p>
							</div>
						</div>
						<br />
						<div class="form-group">
							<label class="col-sm-2 control-label">状态：</label>
							<div class="col-sm-3">	
								<input type="radio" name="status" value="0" />禁用 
								<input type="radio" name="status" value="1" checked/>启用 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">简介：</label>
							<div class="col-sm-8">
								<textarea id="desc" class="form-control" name="desc" required="" aria-required="true"></textarea>
							</div>
						</div>
						<br />
						<div class="form-group" >
							<div class="col-sm-8 col-sm-offset-2">
								<input  id="submit" class="btn btn-primary" style="margin_right:40px;" type="submit"    value="保存">
								<a href="<?php echo site_url('admin/emergency/emergency_route/'); ?>"><input class="btn btn-primary" style="margin_right:2px;"     type="button" value="返回列表"></a>
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="/statics/js/preventb.js"></script>
<script type="text/javascript" src="/statics/js/jingweidu.01.js"></script>
<script type="text/javascript">
/*function csan(){
var id2=document.getElementByName("spot_ids[]");
	if(id2.checked){
	　　 document.getElementByName("listorder[]").style.border="1px solid #000000";
	　　 document.getElementByName("listorder[]").readOnly=false;
	}else{
	     document.getElementByName("listorder[]").style.border="0px solid #000000";
	　　 document.getElementByName("listorder[]").readOnly=true;
	}
}
function lookline(){
	var chk_value =[];
	$('input[name="spot_ids[]"]:checked').each(function(){
		alert($(this).val());
		alert($(this).parent().find('input[name="x_index[]"]').val());
		alert($(this).parent().find('input[name="listorder[]"]').val());
	});
}
function lookline() {
    var checkBoxs = document.getElementsByName("spot_ids[]");
    var lstGuid = [];
    $(checkBoxs).each(function () {
        if ($(this).is(":checked")) {
            var x = $(this).parent().find('input[name="x_index[]"]').val();
            var y = $(this).parent().find('input[name="y_index[]"]').val();
            var z = $(this).parent().find('input[name="z_index[]"]').val();
            lstGuid.push({ guid: $(this).attr("value"), x: x, y: y, z: z });
        }
    })
    __jingweidufreeLineView("/statics/image/poi/ktv.png", lstGuid);
}*/
</script>
</html>