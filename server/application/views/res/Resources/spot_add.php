<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增景区</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
	<style>
		 .to_enlarge{position:absolute;right:24px;top:7px;cursor:pointer;}
	</style>
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
	<script src="/statics/js/plugins/layer/laydate/laydate.js"></script>
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>新增景区</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="/index.php/admin/spot_feature/add_spot_feature" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">景区名称：</label>
							<div class="col-sm-3">
								<input type="text" name="feature_name" class="form-control" required   value="">
							</div>
							
							<label class="col-sm-2 control-label">导游人数：</label>
							<div class="col-sm-3">
								<input type="text" name="feature_name" class="form-control" required   value="">
							</div>
						</div>
						<div class="form-group">
							
							<label class="col-sm-2 control-label">地理位置：</label>
							<div class="col-sm-3">
								<input type="text" name="address" class="form-control" required value="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">图片：</label>
							<div class="col-sm-10">
							<table width="650px;">
								<tbody id="tbody">
									<tr>
										<td>
										  <a href="javascript:;" onclick="addImg()">[+]</a>
										  名称 <input type="text" name="img_name[]" size="20" />
										  上传文件
										</td>
										<td><input type="file" name="img_url[]" /></td>
									</tr>
								</tbody>
							</table>
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
								<textarea class="form-control" name="docx_desc" required="" aria-required="true"></textarea>
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
								<textarea class="form-control" name="video_desc" required="" aria-required="true"></textarea>
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
								<textarea class="form-control" name="voice_desc" required="" aria-required="true"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">简介：</label>
							<div class="col-sm-8">
								<textarea id="desc" class="form-control" name="desc" required aria-required="true"></textarea>
							</div>
						</div>
						<br />
						<div class="form-group" >
							<div class="col-sm-8 col-sm-offset-2">
								<input  id="submit" class="btn btn-primary" style="margin_right:40px;" type="submit"    value="保存">
								<a href="/index.php/res/Resources/res_list"><input class="btn btn-primary" style="margin_right:2px;"     type="button" value="返回列表"></a>
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
<script type="text/javascript" >
</script>
</html>