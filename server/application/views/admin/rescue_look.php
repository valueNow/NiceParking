<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>查看装备</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="/statics/css/infobox.css"/>
    <style>
		 .to_enlarge{position:absolute;right:24px;top:7px;cursor:pointer;}
	</style>
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>查看装备</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">装备名称：</label>
							<div class="col-sm-3">
								<?php echo $rescue_info['rescue_name'];?>
							</div>
							<label class="col-sm-2 control-label">单位名称：</label>
							<div class="col-sm-3">
								<?php echo $esu_arr[$rescue_info['esu_id']];?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">事件类型：</label>
							<div class="col-sm-3">
								<?php echo $event_type[$rescue_info['eg_type']];?>
							</div>
							<label class="col-sm-2 control-label">类型：</label>
							<div class="col-sm-3">
								<?php echo $rescue_type[$rescue_info['type']];?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">装备总数量：</label>
							<div class="col-sm-3">
								<?php echo $rescue_info['number'];?>
							</div>
							<label class="col-sm-2 control-label">可用数量：</label>
							<div class="col-sm-3">
								<?php echo $rescue_info['useing_number'];?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">设备编号：</label>
							<div class="col-sm-3">
								<?php echo $rescue_info['vesion'];?>
							</div>
							<label class="col-sm-2 control-label">负责人：</label>
							<div class="col-sm-3">
								<?php echo $rescue_info['director'];?>
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">座机：</label>
							<div class="col-sm-3">
								<?php echo $rescue_info['telephone'];?>
							</div>
							<label class="col-sm-2 control-label">手机号：</label>
							<div class="col-sm-3">
								<?php echo $rescue_info['mobile'];?>
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">最后维修时间：</label>
							<div class="col-sm-3">
								<?php echo date('Y-m-d H:i:s',$rescue_info['end_service_time']);?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">描述信息：</label>
							<div class="col-sm-6">
								<?php echo $rescue_info['desc'];?>
							</div>
							</div>
						<div class="form-group" >
                        	<div class="col-sm-8 col-sm-offset-2">
                        		<a href="<?php echo site_url('admin/emergency_rescue/index'); ?>"><input class="btn btn-primary" style="margin_right:2px;"     type="button" value="返回列表"></a>
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