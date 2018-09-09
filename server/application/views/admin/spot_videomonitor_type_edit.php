<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>视频监控类型修改</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>
<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>视频监控类型修改</h5>
	</div>
	<div class="ibox-content">
		<form method="post" action="/index.php/admin/spot_video_monitor/stype_edit" enctype="multipart/form-data" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">类型名称：</label>
				<div class="col-sm-3">
					<input type="text" name="type_name" value="<?php echo $type['type_name'];?>" class="form-control" style="width:300px;" required>
				</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">图片：</label>
				<div class="col-sm-3">
					<div>
						<input name="img_url" type="file">
					</div>
					<?php if(!empty($type['img_url'])){?><a href="/<?php echo $type['img_url'];?>" target="_blank">点击查看原图</a><?php }?>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">描述：</label>
				<div class="col-sm-8">
					<textarea name="desc" style="height:100px;width:100%;" required class="form-control"><?php echo $type['desc'];?></textarea>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-2">
					<input type="hidden" name="type_id" value="<?php echo $type['type_id'];?>">
					<input class="btn btn-primary" name="dosubmit" type="submit" value="提交">
					<a href="/index.php/admin/spot_interest/stype_index" class="btn btn-primary">返回列表</a>
				</div>
			</div>
		</form>
	</div>
</div>
</body>
</html>