<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改应急保障计划</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>修改应急保障计划</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="/index.php/admin/emergency_safeguard/update_safeguard" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">标题：</label>
							<div class="col-sm-3">
								<input type="text" name="title" class="form-control" required   value="<?php echo $safeguard_info['title'] ?>">
							</div>
							<label class="col-sm-2 control-label">事件类型：</label>
							<div class="col-sm-3">
								<select name="eg_type"  id="eg_type" class="form-control" style="width:100%;height:30px;"   required>
									<?php foreach($event_type as $k=>$v){ ?>
										<option value="<?php echo $k;?>" <?php if($safeguard_info['eg_type'] == $k):?> selected <?php endif; ?>><?php echo $v;?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">所属单位：</label>
							<div class="col-sm-3">
								<select name="esu_id"  id="esu_id" class="form-control" style="width:100%;height:30px;"   required>
									<?php foreach($esu_arr as $k=>$v){ ?>
										<option value="<?php echo $k;?>" <?php if($safeguard_info['esu_id'] == $k):?> selected <?php endif; ?> ><?php echo $v;?></option>
									<?php } ?>
								</select>
							</div>

							<label class="col-sm-2 control-label">上传文件：</label>
							<div class="col-sm-3">
								<div>
									<input type="file" name="docx_id" />
								</div>
								<a href="/<?php echo $safeguard_info['docx_id'];?>" target="_blank">点击查看附件</a>
							</div>	
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">描述信息：</label>
							<div class="col-sm-8">
								<textarea id="desc" class="form-control" name="desc" required="" aria-required="true"><?php echo $safeguard_info['desc'] ?></textarea>
							</div>
							</div>
						<div class="form-group" >
                        	<div class="col-sm-8 col-sm-offset-2">
                        		<input type="hidden" value="<?php echo $safeguard_info['safeguard_id'];?>" name="safeguard_id">
                        		<input  id="submit" class="btn btn-primary" style="margin_right:40px;" type="submit"    value="保存">
                        		<a href="<?php echo site_url('admin/emergency_safeguard/index'); ?>"><input class="btn btn-primary" style="margin_right:2px;"     type="button" value="返回列表"></a>
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