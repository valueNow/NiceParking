<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>查看物资</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
    <link rel="stylesheet" href="/statics/css/infobox.css" />
	<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
	<script src="/statics/js/plugins/validate/jquery.validate.min.js"></script>
	<script src="/statics/js/plugins/validate/messages_zh.min.js"></script>
	<script src="/statics/js/plugins/validate/validateExtend.js"></script>
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>查看物资</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">物资名称：</label>
							<div class="col-sm-3">
								<?php echo $material_info['material_name']; ?>
							</div>
							<label class="col-sm-2 control-label">所属类型：</label>
							<div class="col-sm-3">
								<?php echo $event_type[$material_info['eg_type']];?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">所属仓库：</label>
							<div class="col-sm-3">
								<?php echo $storehouse_arr[$material_info['storehouse_id']];?>
							</div>
							<label class="col-sm-2 control-label">物资状态：</label>
							<div class="col-sm-3">
								<?php echo $material_status[$material_info['status']];?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">数量总数：</label>
							<div class="col-sm-3">
								<?php echo $material_info['number']; ?>
							</div>
							<label class="col-sm-2 control-label">单位：</label>
							<div class="col-sm-3">
								<?php echo $material_info['unit']; ?>
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">备注信息：</label>
							<div class="col-sm-6">
								<?php echo $material_info['remark']; ?>
							</div>
						</div>
						<div class="form-group" >
                        	<div class="col-sm-8 col-sm-offset-2">
                        		<a href="<?php echo site_url('admin/emergency_material/index'); ?>"><input class="btn btn-primary" style="margin_right:2px;"     type="button" value="返回列表"></a>
                        	</div>
                        </div>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>