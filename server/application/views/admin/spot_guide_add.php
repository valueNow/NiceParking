<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增漫游路线</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
	<script src="/statics/js/plugins/layer/laydate/laydate.js"></script>
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>新增漫游路线</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="/index.php/admin/spot_guide/add_spot_guide" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">漫游路线名称：</label>
							<div class="col-sm-3">
								<input type="text" name="guide_name" class="form-control" required   value="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">上传文档：</label>
							<div class="col-sm-3">
								<div>
									<input type="file" name="docx_id" >
								</div>
							</div>
							<label class="col-sm-2 control-label">文档描述：</label>
							<div class="col-sm-3">
								<textarea class="form-control" name="docx_desc" aria-required="true"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">上传视频：</label>
							<div class="col-sm-3">
								<div>
									<input type="file" name="video_id" >
								</div>
							</div>
							<label class="col-sm-2 control-label">视频描述：</label>
							<div class="col-sm-3">
								<textarea class="form-control" name="video_desc"  aria-required="true"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">上传语音：</label>
							<div class="col-sm-3">
								<div>
									<input type="file" name="voice_id" >
								</div>
							</div>
							<label class="col-sm-2 control-label">语音描述：</label>
							<div class="col-sm-3">
								<textarea class="form-control" name="voice_desc" aria-required="true"></textarea>
							</div>
						</div>
						<div class="form-group">
						<input type="hidden" style="width:100%;border-style:none;" id="lstPoint" name="lstPoint">
							<label class="col-sm-2 control-label">包含漫游点：</label>
							<div class="col-sm-8">	
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
											<th>排序</th>
										</tr>
									</thead>
									<tr>
										<td><!--<input type="hidden" style="width:100%;border-style:none;" name="point_heading[]">--></td>
										<td><!--<input type="text" style="width:100%;border-style:none;" name="point_pitch[]">--></td>
										<td><!--<input type="text" style="width:100%;border-style:none;" name="point_range[]">--></td>
										<td><!--<input type="text" style="width:100%;border-style:none;" name="point_speed[]">--></td>
										<td><!--<input type="text" style="width:100%;border-style:none;" name="x_index[]">--></td>
										<td><!--<input type="text" style="width:100%;border-style:none;" name="y_index[]">--></td>
										<td><!--<input type="text" style="width:100%;border-style:none;" name="z_index[]">--></td>
										<td><!--<input type="text" style="width:100%;border-style:none;">--></td>
									</tr>
									
								</table>
								<p>
									<input type="button" onclick="__jingweiduAnimate();" id="inputBtn" value="选点">
									<!--<input type="button" onclick="__jingweiduAnimateX();" id="inputBtnX" value="修改点" style="margin-left: 10px;display: none;">-->
								</p>
							</div>
						</div>
						<br />
						<div class="form-group" >
							<div class="col-sm-8 col-sm-offset-2">
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
<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
<script type="text/javascript" src="/statics/js/jingweidu.01.js"></script>
</html>