<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增物资</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">s
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
                        <h5>新增物资</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="/index.php/admin/emergency_material/add_material" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">物资名称：</label>
							<div class="col-sm-3">
								<input type="text" name="material_name" class="form-control" required   value="">
							</div>
							<label class="col-sm-2 control-label">所属类型：</label>
							<div class="col-sm-3">
								<select name="eg_type"  id="eg_type" class="form-control" style="width:100%;height:30px;line-height:30px;font-size:12px;"   required>
									<?php foreach($event_type as $k=>$v){ ?>
										<option value="<?php echo $k;?>"><?php echo $v;?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">所属仓库：</label>
							<div class="col-sm-3">
								<select name="storehouse_id"  id="storehouse_id" class="form-control" style="width:100%;height:30px;line-height:30px;font-size:12px;"   required>
									<?php foreach($storehouse_arr as $k=>$v){ ?>
										<option value="<?php echo $k;?>"><?php echo $v;?></option>
									<?php } ?>
								</select>
							</div>
							<label class="col-sm-2 control-label">物资状态：</label>
							<div class="col-sm-3">
								<select name="status"  id="status" class="form-control" style="width:100%;height:30px;line-height:30px;font-size:12px;"   required>
									<?php foreach($material_status as $k=>$v){ ?>
										<option value="<?php echo $k;?>"><?php echo $v;?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">数量总数：</label>
							<div class="col-sm-3">
								<input type="text" name="number" class="form-control" required value="">
							</div>
							<label class="col-sm-2 control-label">单位：</label>
							<div class="col-sm-3">
								<input type="text" name="unit" class="form-control" required value="">
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">备注信息：</label>
							<div class="col-sm-8">
								<textarea id="remark" class="form-control" name="remark" required="" aria-required="true"></textarea>
							</div>
						</div>
						<div class="form-group" >
                        	<div class="col-sm-8 col-sm-offset-2">
                        		<input  id="submit" class="btn btn-primary" style="margin_right:40px;" type="submit"    value="保存">
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