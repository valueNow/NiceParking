<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>信息发布</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
	<link rel="stylesheet" href="/statics/css/time.css"/>
</head>

<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>查看信息发布详情</h5>
	</div>
	<div class="container container1">
        <div class="form-group">
        	<label class="col-sm-4 control-label">信息名称：<?php echo $maneger['name'];?></label>
        	<label class="col-sm-3 control-label">版本号：<?php echo $maneger['version_no'];?></label>
        	<label class="col-sm-3 control-label">发布时间：<?php echo $maneger['release_time'];?></label>
        	<label class="col-sm-2 control-label">状态：<?php echo $maneger['is_enabled'];?></label>
        </div>
        <div class="form-group">
        	<label class="col-sm-11 control-label" id="introduce" title="<?php echo $maneger['description'];?>">描述：<?php echo $maneger['description'];?></label>
        </div>
    </div>
	<div class="ibox-content timeline">
		<?php foreach($maneger_time as $k=>$v){ ?>
		<div class="timeline-item">
			<div class="row">
				<div class="col-xs-4 date">
					<small class="text-navy"><?php echo $v['duration'];?> 分钟</small>
				</div>
				<div class="col-xs-10 content <?php if($k==0){?>no-top-border<?php }?>">
					<p class="m-b-xs"><strong><?php echo $v['name'];?></strong></p>
					<p><?php echo $v['description'];?></p>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php if(empty($maneger_time)){?>
			<div class="dataTables_empty" style="text-align:center">暂无数据</div>
		<?php }?>
	</div>
	<div class="container container1">
    	<a href="/index.php/admin/release/maneger" class="btn btn-primary">返回列表</a>
    </div>
</div>
</body>
</html>