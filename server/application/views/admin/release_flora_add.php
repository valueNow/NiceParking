<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>动植物资源添加</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
    <style>
    	td{text-align:center;}
    </style>
</head>
<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>动植物资源添加</h5>
	</div>
	<div class="ibox-content">
		<form method="post" action="/index.php/admin/release/add_flora" enctype="multipart/form-data" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">动植物分类：</label>
				<div class="col-sm-3">
					<select class="form-control m-b" style="height:35px;width:250px;" name="type_id" required=''>
						<option value="">请选择</option>
						<?php foreach($type as $v){?>
							<option value="<?php echo $v['type_id'];?>"><?php echo $v['name'];?></option>
						<?php }?>
					</select>
				</div>
				<label class="col-sm-2 control-label">所属景点：</label>
				<div class="col-sm-3">
					<select class="form-control m-b" style="height:35px;width:250px;" name="sp_id" required=''>
						<option value="">请选择</option>
						<?php foreach($spots as $v){?>
							<option value="<?php echo $v['spot_id'];?>"><?php echo $v['spot_name'];?></option>
						<?php }?>
					</select>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">编号：</label>
				<div class="col-sm-3">
					<input type="text" name="numbering" class="form-control" required>
				</div>
				<label class="col-sm-2 control-label">数量：</label>
				<div class="col-sm-3">
					<input type="text" name="num" class="form-control" required>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">标题：</label>
				<div class="col-sm-3">
					<input type="text" name="title" class="form-control" required>
				</div>
			</div>
			
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">描述：</label>
				<div class="col-sm-8">
					<textarea name="description" style="height:100px;width:100%;" required class="form-control"></textarea>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
			<input type="hidden" style="width:100%;border-style:none;" id="lstPoint" name="lstPoint">
				<label class="col-sm-2 control-label">分布区域：</label>
				<div class="col-sm-8">	
					<table class="table table-striped table-bordered table-hover display nowrap"  cellspacing="0" width="100%" id="editable">
						<thead>
							<tr>
								<th>经度</th>
								<th>纬度</th>
								<th>高度</th>
							</tr>
						</thead>
						<tr>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</table>
					<p><input type="button" id="createLine" onclick="__jingweidupanel();"  class="small-button" value="创建区域"></p>
					<p><input type="button" id="modifyLine"  style="display: none;" onclick="__jingweidupanel();" value="修改区域"></p>
					<p><input type="button" id="lookPanel" onclick="__jingweidupanelLook()" value="查看区域"></p>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
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
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">视频：</label>
				<div class="col-sm-10">
				<table width="650px;">
					<tbody id="tbody2">
						<tr>
							<td>
							  <a href="javascript:;" onclick="addImg2()">[+]</a>
							  名称 <input type="text" name="video_name[]" size="20" />
							  上传文件
							</td>
							<td><input type="file" name="video_url[]" /></td>
						</tr>
					</tbody>
				</table>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<div class="col-sm-8 col-sm-offset-2">
					<input class="btn btn-primary" name="dosubmit" type="submit" value="提交">
					<a href="/index.php/admin/release/floralist" class="btn btn-primary">返回列表</a>
				</div>
			</div>
		</form>
	</div>
	<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
	<script type="text/javascript">
		//添加元素
		function addImg(){
			var html = '<tr><td><a href="javascript:;" onclick="removeImg(this)">[-]</a>名称 <input type="text" name="img_name[]" size="20" />上传文件</td><td><input type="file" name="img_url[]" /></td></tr>';
			$("#tbody").append(html);
		}
		//添加元素
		function addImg2(){
			var html = '<tr><td><a href="javascript:;" onclick="removeImg(this)">[-]</a>名称 <input type="text" name="video_name[]" size="20" />上传文件</td><td><input type="file" name="video_url[]" /></td></tr>';
			$("#tbody2").append(html);
		}
		//删除元素
		function removeImg(obj){
			var row = obj.parentNode.parentNode;
			row.remove();
		}
	</script>
<script type="text/javascript" src="/statics/js/jingweidu.01.js"></script>
</div>
</body>
</html>