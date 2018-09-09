<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改漫游路线</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
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
                        <h5>修改漫游路线</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="/index.php/admin/spot_guide/update_spot_guide" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">漫游路线名称：</label>
							<div class="col-sm-3">
								<input type="text" name="guide_name" class="form-control" required   value="<?php echo $result['guide_name']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">上传文档：</label>
							<div class="col-sm-3">	
								<input type="hidden" value="<?php echo $result['docx_id']; ?>"  name="docx_id1" />
								<input type="file" name="docx_id" value="" />
								<?php if(!empty($result['docx_id'])): ?>
								<a href="/<?php echo $file_result[$result['docx_id']]['file_url']; ?>" target="_blank">点击查看附件</a>
								<?php else: ?>
								暂无附件
								<?php endif; ?>
							</div>
							<label class="col-sm-2 control-label">文档描述：</label>
							<div class="col-sm-3">
								<?php if(!empty($result['docx_id'])): ?>
								<textarea class="form-control" name="docx_desc"  aria-required="true"><?php echo $file_result[$result['docx_id']]['desc']; ?></textarea>
								<?php else: ?>
								<textarea class="form-control" name="docx_desc"  aria-required="true"></textarea>
								<?php endif; ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">上传视频：</label>
							<div class="col-sm-3">	
								<input type="hidden" value="<?php echo $result['video_id']; ?>"  name="video_id1" />
								<input type="file" name="video_id" value="">
								<?php if(!empty($result['video_id'])): ?>
								<a href="/<?php echo $file_result[$result['video_id']]['file_url']; ?>" target="_blank">点击查看视频</a>
								<?php else: ?>
								暂无视频
								<?php endif; ?>
							</div>
							<label class="col-sm-2 control-label">视频描述：</label>
							<div class="col-sm-3">
								<?php if(!empty($result['video_id'])): ?>
								<textarea class="form-control" name="video_desc"  aria-required="true"><?php echo $file_result[$result['video_id']]['desc']; ?></textarea>
								<?php else: ?>
								<textarea class="form-control" name="video_desc"  aria-required="true"></textarea>
								<?php endif; ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">上传语音：</label>
							<div class="col-sm-3">	
								<input type="hidden" value="<?php echo $result['voice_id']; ?>"  name="voice_id1" />
								<input type="file" name="voice_id" >
								<?php if(!empty($result['voice_id'])): ?>
								<a href="/<?php echo $file_result[$result['voice_id']]['file_url']; ?>" target="_blank">点击查看语音</a>
								<?php else: ?>
								暂无语音
								<?php endif; ?>
							</div>
							<label class="col-sm-2 control-label">语音描述：</label>
							<div class="col-sm-3">
								<?php if(!empty($result['voice_id'])): ?>
								<textarea class="form-control" name="voice_desc"  aria-required="true"><?php echo $file_result[$result['voice_id']]['desc']; ?></textarea>
								<?php else: ?>
								<textarea class="form-control" name="voice_desc"  aria-required="true"></textarea>
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
											<!--<th>point_name</th>
											<th>desc</th>-->
										</tr>
									</thead>
									<?php foreach($point_result as $k => $v): ?>
									<tr>
										<td><!--<input type="text" style="width:100%;border-style:none;" name="point_heading[]" value="<?php echo $v['point_heading']; ?>">--><?php echo $v['heading']; ?></td>
										<td><!--<input type="text" style="width:100%;border-style:none;" name="point_pitch[]"  value="<?php echo $v['point_pitch']; ?>" >--><?php echo $v['pitch']; ?></td>
										<td><!--<input type="text" style="width:100%;border-style:none;" name="point_range[]"  value="<?php echo $v['point_range']; ?>">--><?php echo $v['roll']; ?></td>
										<td><!--<input type="text" style="width:100%;border-style:none;" name="point_speed[]" value="<?php echo $v['point_speed']; ?>">--><?php echo $v['time']; ?></td>
										<td><!--<input type="text" style="width:100%;border-style:none;" name="x_index[]" value="<?php echo $v['x_index']; ?>" >--><?php echo $v['x']; ?></td>
										<td><!--<input type="text" style="width:100%;border-style:none;" name="y_index[]" value="<?php echo $v['y_index']; ?>">--><?php echo $v['y']; ?></td>
										<td><!--<input type="text" style="width:100%;border-style:none;" name="z_index[]" value="<?php echo $v['z_index']; ?>">--><?php echo $v['z']; ?></td>
										<!--<td><input type="text" style="width:100%;border-style:none;" name="point_name[]"  value="<?php echo $v['point_name']; ?>"></td>
										<td><input type="text" style="width:100%;border-style:none;" name="desc[]" value="<?php echo $v['desc']; ?>"></td>
										<input type="hidden" name="point_id[]" value="<?php echo $v['point_id']; ?>" ?>-->
									</tr>
									<?php endforeach; ?>
								</table>
								<p><input type="button" onclick="__jingweiduAnimate();" value="选点"></p>
								<p><input type="button" onclick="__jingweiduAnimateLook();" value="预览"></p>
							</div>
						</div>
						<br />
						<div class="form-group" >
							<div class="col-sm-8 col-sm-offset-2">
								<input type="hidden" value="<?php echo $result['guide_id']; ?>" name="guide_id"/>
								<input  id="submit" class="btn btn-primary" style="margin_right:40px;" type="submit"    value="保存">
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
<script type="text/javascript" src="/statics/js/jingweidu.01.js"></script>
<script type="text/javascript">
var jsonresult='<?php echo $lstPoint;?>';
jsonresult=JSON.parse(jsonresult);
$("#lstPoint").val(JSON.stringify(jsonresult));

</script>
</html>