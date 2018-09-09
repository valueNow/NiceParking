<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改图片</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>
<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>修改图片信息</h5>
	</div>
	<div class="ibox-content">
		<form method="post" action="/index.php/admin/release/edit_img" enctype="multipart/form-data" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">名称：</label>
				<div class="col-sm-3">
					<input type="text" name="img_name" value="<?php echo $img['img_name'];?>" class="form-control" required>
				</div>

				<label class="col-sm-2 control-label">图片：</label>
				<div class="col-sm-3">
					<div>
						<input name="img_url" type="file">
					</div>
					<?php if(!empty($img['img_url'])){?><a href="/<?php echo $img['img_url'];?>" target="_blank">点击查看</a><?php }?>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">描述：</label>
				<div class="col-sm-8">
					<textarea name="description" style="height:100px;" required class="form-control"><?php echo $img['description'];?></textarea>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-2">
					<input type="hidden" name="img_id" value="<?php echo $img['img_id'];?>">
					<input class="btn btn-primary" name="dosubmit" type="submit" value="提交">
					<a href="/index.php/admin/release/imglist" class="btn btn-primary">返回列表</a>
				</div>
			</div>
		</form>
	</div>
</div>
</body>
</html>