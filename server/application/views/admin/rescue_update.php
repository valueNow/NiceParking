<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改装备</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
	<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
	<script src="/statics/js/plugins/layer/laydate/laydate.js"></script>
</head>
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>修改装备</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="/index.php/admin/emergency_rescue/update_rescue" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">装备名称：</label>
							<div class="col-sm-3">
								<input type="text" name="rescue_name" class="form-control" required   value="<?php echo $rescue_info['rescue_name'];?>">
							</div>
							<label class="col-sm-2 control-label">单位名称：</label>
							<div class="col-sm-3">
								<select name="esu_id"  id="esu_id" class="form-control" style="width:100%;height:30px;"   required>
									<?php foreach($esu_arr as $k=>$v){ ?>
										<option value="<?php echo $k;?>" <?php if($rescue_info['esu_id'] == $k):?> selected <?php endif; ?> ><?php echo $v;?></option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">事件类型：</label>
							<div class="col-sm-3">
								<select name="eg_type"  id="eg_type" class="form-control" style="width:100%;height:30px;"   required>
									<?php foreach($event_type as $k=>$v){ ?>
										<option value="<?php echo $k;?>" <?php if($rescue_info['eg_type'] == $k):?> selected <?php endif; ?> ><?php echo $v;?></option>
									<?php } ?>
								</select>
							</div>
							<label class="col-sm-2 control-label">类型：</label>
							<div class="col-sm-3">
								<select name="type"  id="type" class="form-control" style="width:100%;height:30px;"   required>
									<?php foreach($rescue_type as $k=>$v){ ?>
										<option value="<?php echo $k;?>" <?php if($rescue_info['type'] == $k):?> selected <?php endif; ?> ><?php echo $v;?></option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">装备总数量：</label>
							<div class="col-sm-3">
								<input type="text" name="number" class="form-control" required   value="<?php echo $rescue_info['number'];?>">
							</div>
							<label class="col-sm-2 control-label">可用数量：</label>
							<div class="col-sm-3">
								<input type="text" name="useing_number" class="form-control" required   value="<?php echo $rescue_info['useing_number'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">设备编号：</label>
							<div class="col-sm-3">
								<input type="text" name="vesion" class="form-control" required value="<?php echo $rescue_info['vesion'];?>">
							</div>
							<label class="col-sm-2 control-label">负责人：</label>
							<div class="col-sm-3">
								<input type="text" name="director" class="form-control" required value="<?php echo $rescue_info['director'];?>">
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">座机：</label>
							<div class="col-sm-3">
								<input type="text" name="telephone" class="form-control" required value="<?php echo $rescue_info['telephone'];?>">
							</div>
							<label class="col-sm-2 control-label">手机号：</label>
							<div class="col-sm-3">
								<input type="text" name="mobile" class="form-control" required value="<?php echo $rescue_info['mobile'];?>">
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">最后维修时间：</label>
							<div class="col-sm-3">
								<input  name="end_service_time" class="laydate-icon form-control layer-date" placeholder="<?php echo date('Y-m-d H:i:s',$rescue_info['end_service_time']);?>" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">

							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">描述信息：</label>
							<div class="col-sm-8">
								<textarea id="desc" class="form-control" name="desc" required="" aria-required="true"><?php echo $rescue_info['desc'];?></textarea>
							</div>
							</div>
							
						</div>

						<div class="form-group" >
							<div class="col-sm-8 col-sm-offset-2">
								<input type="hidden" value="<?php echo $rescue_info['rescue_id'];?>" name="rescue_id">
								<input  id="submit" class="btn btn-primary" style="margin_right:40px;" type="submit"    value="保存">
								<a href="<?php echo site_url('admin/emergency_rescue/index'); ?>"><input class="btn btn-primary" style="margin_right:2px;"     type="button" value="返回列表"></a>
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