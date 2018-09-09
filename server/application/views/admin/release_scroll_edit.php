<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>滚动字幕修改</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>
<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>滚动字幕修改</h5>
	</div>
	<div class="ibox-content">
		<form method="post" action="/index.php/admin/release/edit_scroll" enctype="multipart/form-data" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">名称：</label>
				<div class="col-sm-3">
					<input type="text" name="title" value="<?php echo $scroll['title'];?>" class="form-control"required>
				</div>

				<label class="col-sm-2 control-label">速度：</label>
				<div class="col-sm-3">
					<input type="text" name="speed" value="<?php echo $scroll['speed'];?>" class="form-control" required>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">内容：</label>
				<div class="col-sm-8">
					<textarea name="content" style="height:100px;" required class="form-control"><?php echo $scroll['content'];?></textarea>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-2">
					<input type="hidden" name="id" value="<?php echo $scroll['id'];?>">
					<input class="btn btn-primary" name="dosubmit" type="submit" value="提交">
					<a href="/index.php/admin/release/scroll" class="btn btn-primary">返回列表</a>
				</div>
			</div>
		</form>
	</div>
</div>
</body>
</html>