<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>查看应急保障计划</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
    <style>
    	.col-sm-3{margin-top:7px;}
    	.col-sm-8{margin-top:7px;}
    	.col-sm-6{margin-top:7px;}
    </style>	
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>查看应急保障计划</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="/index.php/admin/emergency_safeguard/look_safeguard" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">标题：</label>
							<div class="col-sm-3">
								<?php echo $safeguard_info['title']; ?>
							</div>
							<label class="col-sm-2 control-label">事件类型：</label>
							<div class="col-sm-3">
								<?php echo $event_type[$safeguard_info['eg_type']]; ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">所属单位：</label>
							<div class="col-sm-3">
								<?php echo $esu_arr[$safeguard_info['esu_id']]; ?>
							</div>
							<label class="col-sm-2 control-label">添加时间：</label>
							<div class="col-sm-3">
								<?php echo date('Y-m-d H:i:s',$safeguard_info['add_time']); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">上传文件：</label>
							<div class="col-sm-3">
								<a href="/<?php echo $safeguard_info['docx_id'];?>" target="_blank">点击查看附件</a>
							</div>	
							<label class="col-sm-2 control-label">最后操作时间：</label>
							<div class="col-sm-3">
								<?php echo date('Y-m-d H:i:s',$safeguard_info['operate_time']); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">描述信息：</label>
							<div class="col-sm-3" id="introduce" title="<?php echo $safeguard_info['desc'] ?>">
								<?php echo $safeguard_info['desc'] ?>
							</div>
						</div>
						<div class="form-group" >
                        	<div class="col-sm-8 col-sm-offset-2">
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