<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加信息</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>
<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>添加/修改信息</h5>
	</div>
	<div class="ibox-content">
		<form method="post" action="/index.php/admin/release/<?php echo $c;?>" enctype="multipart/form-data" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">名称：</label>
				<div class="col-sm-3">
					<input type="text" name="name" value="<?php if(isset($info['name'])){echo $info['name'];}?>" class="form-control" required>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">描述：</label>
				<div class="col-sm-8">
					<textarea name="description" style="height:100px;" required class="form-control"><?php if(isset($info['description'])){echo $info['description'];}?></textarea>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			 <div class="form-group">
				<label class="col-sm-2 control-label">是否可用：</label>
				<div class="col-sm-10">
					<div class="radio">
						<?php if(isset($info['is_enabled'])){?>
						<label><input type="radio" <?php if($info['is_enabled']==1){echo "checked";}?> value="1" name="is_enabled">启用</label>
						<label><input type="radio" <?php if($info['is_enabled']==0){echo "checked";}?> value="0" name="is_enabled">禁用</label>
						<?php }else{ ?>
						<label><input type="radio" checked value="1" name="is_enabled">启用</label>
						<label><input type="radio" value="0" name="is_enabled">禁用</label>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-2">
				<?php if(isset($info['id'])){?>
					<input type="hidden" name="id" value="<?php echo $info['id'];?>">
				<?php } ?>
					<a href="/index.php/admin/release/maneger" class="btn btn-primary">返回列表</a>
					<input class="btn btn-primary" name="dosubmit" type="submit" value="下一步">
				</div>
			</div>
		</form>
	</div>
</div>
</body>
</html>