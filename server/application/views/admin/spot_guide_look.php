<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>查看漫游路线</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/infobox.css" rel="stylesheet">
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
	<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
	<script src="/statics/js/plugins/layer/laydate/laydate.js"></script>
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight my-box">
        <div class="row my-smallBox">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>查看漫游路线</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="/index.php/admin/spot_guide/update_spot_guide" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">漫游路线名称：</label>
							<div class="col-sm-3">
								<?php echo $result['guide_name']; ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">上传文档：</label>
							<div class="col-sm-3">	
								<?php if(!empty($result['docx_id'])): ?>
								<a href="/<?php echo $file_result[$result['docx_id']]['file_url']; ?>" target="_blank">点击查看附件</a>
								<?php else: ?>
								暂无附件
								<?php endif; ?>
							</div>
							<label class="col-sm-2 control-label">文档描述：</label>
							<div class="col-sm-3">
								<?php if(!empty($result['docx_id'])): ?>
								<?php echo $file_result[$result['docx_id']]['desc']; ?>
								<?php else: ?>
								暂无文档描述
								<?php endif; ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">上传视频：</label>
							<div class="col-sm-3">	
								<?php if(!empty($result['video_id'])): ?>
								<a href="/<?php echo $file_result[$result['video_id']]['file_url']; ?>" target="_blank">点击查看视频</a>
								<?php else: ?>
								暂无视频
								<?php endif; ?>
							</div>
							<label class="col-sm-2 control-label">视频描述：</label>
							<div class="col-sm-3">
								<?php if(!empty($result['video_id'])): ?>
								<?php echo $file_result[$result['video_id']]['desc']; ?>
								<?php else: ?>
								暂无视频描述
								<?php endif; ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">上传语音：</label>
							<div class="col-sm-3">	
								<?php if(!empty($result['voice_id'])): ?>
								<a href="/<?php echo $file_result[$result['voice_id']]['file_url']; ?>" target="_blank">点击查看语音</a>
								<?php else: ?>
								暂无语音
								<?php endif; ?>
							</div>
							<label class="col-sm-2 control-label">语音描述：</label>
							<div class="col-sm-3">
								<?php if(!empty($result['voice_id'])): ?>
								<?php echo $file_result[$result['voice_id']]['desc']; ?>
								<?php else: ?>
								暂无语音描述
								<?php endif; ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">包含漫游点：</label>
							<div class="col-sm-8">	
								<input type="hidden" style="width:100%;border-style:none;" id="lstPoint" name="lstPoint" >
								<table class="table table-striped table-bordered table-hover display nowrap"  cellspacing="0" width="100%" id="editable">
									<thead>
										<tr>
											<th>角度</th>
											<th>俯仰角</th>
											<th>距离</th>
											<th>速度</th>
											<th>经度</th>
											<th>纬度</th>
											<th>高度</th>
											
										</tr>
									</thead>
									<?php foreach($point_result as $k => $v): ?>
									<tr>
										<td><?php echo $v['heading']; ?></td>
										<td><?php echo $v['pitch']; ?></td>
										<td><?php echo $v['roll']; ?></td>
										<td><?php echo $v['time']; ?></td>
										<td><?php echo $v['x']; ?></td>
										<td><?php echo $v['y']; ?></td>
										<td><?php echo $v['z']; ?></td>
										<!--<td><?php echo $v['point_name']; ?></td>
										<td><?php echo $v['desc']; ?></td>-->
									</tr>
									<?php endforeach; ?>
								
								</table>
								<p><input type="button" onclick="__jingweiduAnimateLook();" value="预览"></p>
							</div>
						</div>
						<br />
						<div class="form-group" >
							<div class="col-sm-8 col-sm-offset-2">
								
								<a href="<?php echo site_url('admin/spot_guide/index'); ?>"><input class="btn btn-primary" style="margin_right:2px;"     type="button" value="返回列表"></a>
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
<script type="text/javascript" src="/statics/js/jingweidu.01.js"></script>
<script type="text/javascript">
var jsonresult='<?php echo $lstPoint;?>';
jsonresult=JSON.parse(jsonresult);
$("#lstPoint").val(JSON.stringify(jsonresult));

</script>