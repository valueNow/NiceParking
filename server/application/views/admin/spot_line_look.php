<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>查看景点路线</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
      <link href="/statics/css/infobox.css" rel="stylesheet">
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
                        <h5>查看景点路线</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="/index.php/admin/spot_line/update_spot_line" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">路线名称：</label>
							<div class="col-sm-3">
								<?php echo $spot_line_info['line_name'];?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">包含景点：</label>
							<div class="col-sm-8">
								<div class="checkbox" name="spot_ids">
									<table class="table table-striped table-bordered table-hover display nowrap"  cellspacing="0" width="100%" id="editable">
										<thead>
											<tr>
												<!--<th>spot_id</th>-->
												<th>景点名称</th>
												<th>经度</th>
												<th>纬度</th>
												<th>高度</th>
												<!--<th>listorder</th>-->
											</tr>
										</thead>
										<?php foreach($spots_arr as $k => $v): ?>
										<tr>
											<!--<td><?php echo $v['spot_id']; ?></td>-->
											<td><?php echo $v['spot_name']; ?></td>
											<td><?php echo $v['x_index']; ?></td>
											<td><?php echo $v['y_index']; ?></td>
											<td><?php echo $v['z_index']; ?></td>
											<!--<td><?php echo $v['listorder']; ?></td>-->
										</tr>
										<?php endforeach; ?>
									</table>
								</div>
								<br>
								
							</div>
							
						</div>
						<div class="form-group">
							<input type="hidden" style="width:100%;border-style:none;" id="lstPoint" name="lstPoint">
							<label class="col-sm-2 control-label">路线信息：</label>
							<div class="col-sm-8">
								<div class="checkbox" name="spot_ids">
									<table class="table table-striped table-bordered table-hover display nowrap"  cellspacing="0" width="100%" id="editable">
										<thead>
											<tr>
												<th>经度</th>
												<th>纬度</th>
												<th>高度</th>
											</tr>
										</thead>
										<?php foreach($ass as $val): ?>
										<tr>
											<td><?php echo $val['x']; ?></td>
											<td><?php echo $val['y']; ?></td>
											<td><?php echo $val['z']; ?></td>
										</tr>
										<?php endforeach; ?>
									</table>
									<p><button type="button" id="lookLine" class="small-button">预览</button></p>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label">状态：</label>
							<div class="col-xs-3">
								<?php if($spot_line_info['status'] == 0):?>禁用<?php else: ?>启用<?php endif; ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label">简介：</label>
							<div class="col-xs-8" id="introduce" title="<?php echo $spot_line_info['desc'];?>">
								<?php echo $spot_line_info['desc'];?>
							</div>
						</div>
						<br />
						<div class="form-group" >
							<div class="col-sm-8 col-sm-offset-2">
								
								<a href="<?php echo site_url('admin/spot_line/index'); ?>"><input class="btn btn-primary" style="margin_right:2px;"     type="button" value="返回列表"></a>
							</div>
						</div>
					</div>
					</form>
				</div>
			</div
		</div>
	</div>
</body>
<script type="text/javascript" src="/statics/js/jingweidu.01.js"></script>
<script type="text/javascript">
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