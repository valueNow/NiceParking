<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改景点路线</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
	<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
	<script src="/statics/js/plugins/layer/laydate/laydate.js"></script>
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>修改景点路线</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="/index.php/admin/spot_line/update_spot_line" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">路线名称：</label>
							<div class="col-sm-3">
								<input type="text" name="line_name" class="form-control" required   value="<?php echo $spot_line_info['line_name'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">包含景点：</label>
							<div class="col-sm-8">
								<div class="checkbox" name="spot_ids">
									<?php foreach($spot_arr as $k=>$val): ?>
									<label>
									<input value="<?php echo $k; ?>" onclick="csan()" id="spot_ids" type="checkbox" name="spot_ids[]" <?php if(in_array($k,$spotids)):?>  checked="checked"<?php endif; ?>><?php echo $val['spot_name']; ?> 
									<input type="hidden" value="<?php echo $val['x_index']; ?>" name="x_index[]">
									<input type="hidden" value="<?php echo $val['y_index']; ?>" name="y_index[]">
									<input type="hidden" value="<?php echo $val['z_index']; ?>" name="z_index[]">
									</label> &nbsp&nbsp&nbsp&nbsp&nbsp
									<!--排序:&nbsp&nbsp<input type="text" id="listorder" name="listorder[]" type="text"  <?php if(in_array($k,$spotids)):?> value="<?php echo $listorders[$k] ?>" <?php endif; ?> >
									&nbsp&nbsp&nbsp&nbsp&nbsp
									<br/>-->
									<?php endforeach;?>
								</div>
								<br>
							</div>
						</div>
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
									<?php if(!empty($ass)): ?>
									<?php foreach($ass as $v){ ?>
									<tr>
										<td><?php echo $v['x'];?></td>
										<td><?php echo $v['y'];?></td>
										<td><?php echo $v['z'];?></td>
									</tr>
									<?php } ?>
									<?php else:?>
									<tr>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<?php endif;?>
								</table>
								<?php if(!empty($ass)){ ?>
									<p><input type="button" id="modifyLine" onclick="__jingweidufreeLine();" value="修改路线">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" id="lookLine" class="small-button">预览</button></p>
								<?php }else{ ?>
									<p><input type="button" id="createLine" onclick="__jingweidufreeLine();" value="创建路线">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" id="lookLine" class="small-button">预览</button></p>
								<?php } ?>
								<p></p>
							</div>
						</div>
						<br />
						<div class="form-group">
							<label class="col-sm-2 control-label">状态：</label>
							<div class="col-sm-3">	
								<input type="radio" name="status" value="0" <?php if($spot_line_info['status'] == 0):?> checked<?php endif; ?>/>禁用 
								<input type="radio" name="status" value="1" <?php if($spot_line_info['status'] == 1):?> checked<?php endif; ?>/>启用 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">简介：</label>
							<div class="col-sm-8">
								<textarea id="desc" class="form-control" name="desc" required="" aria-required="true"><?php echo $spot_line_info['desc'];?></textarea>
							</div>
						</div>
						<br />
						<div class="form-group" >
							<div class="col-sm-8 col-sm-offset-2">
								<input  type="hidden" value="<?php echo $spot_line_info['line_id'];?>" name="line_id">
								<input  id="submit" class="btn btn-primary" style="margin_right:40px;" type="submit"    value="保存">
								<a href="<?php echo site_url('admin/spot_line/index'); ?>"><input class="btn btn-primary" style="margin_right:2px;"     type="button" value="返回列表"></a>
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
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
}*/
var jsonresult='<?php echo $lstPoint;?>';
jsonresult=JSON.parse(jsonresult);
$("#lstPoint").val(JSON.stringify(jsonresult));
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
}
</script>
</html>