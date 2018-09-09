<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>兴趣点添加</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
	<style>
		 .to_enlarge{position:absolute;right:24px;top:7px;cursor:pointer;}
	</style>
	<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
</head>
<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>兴趣点添加</h5>
	</div>
	<div class="ibox-content">
		<form method="post" action="/index.php/admin/spot_interest/interest_add" enctype="multipart/form-data" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">所属景点：</label>
				<div class="col-sm-3">
					<select class="form-control m-b" style="height:35px;width:250px;" name="spot_id" required=''>
						<option value="">请选择</option>
						<?php foreach($spot as $k=>$v){?>
							<option value="<?php echo $k;?>"><?php echo $v;?></option>
						<?php }?>
					</select>
				</div>
				<label class="col-sm-2 control-label">兴趣点类型：</label>
				<div class="col-sm-3">
					<select class="form-control m-b" style="height:35px;width:250px;" name="type_id" required=''>
						<option value="">请选择</option>
						<?php foreach($type as $key=>$val){?>
							<option value="<?php echo $key;?>"><?php echo $val;?></option>
						<?php }?>
					</select>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">兴趣点名称：</label>
				<div class="col-sm-3">
					<input type="text" name="interest_name" class="form-control" required="">
				</div>
				<label class="col-sm-2 control-label">x坐标：</label>
				<div class="col-sm-3">
					<input type="text" name="x_index" id="x_index" class="form-control" required="">
					<img src="/statics/image/zom.png" class="to_enlarge">
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">y坐标：</label>
				<div class="col-sm-3">
					<input type="text" name="y_index" id="y_index" class="form-control" required="">
					<img src="/statics/image/zom.png" class="to_enlarge">
				</div>
				<label class="col-sm-2 control-label">z坐标：</label>
				<div class="col-sm-3">
					<input type="text" name="z_index" id="z_index" class="form-control" required="">
					<img src="/statics/image/zom.png" class="to_enlarge">
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">地理位置：</label>
				<div class="col-sm-3">
					<input type="text" name="address" class="form-control" required="">
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
				<label class="col-sm-2 control-label">描述：</label>
				<div class="col-sm-8">
					<textarea name="desc" style="height:100px;width:100%;" required class="form-control"></textarea>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-2">
					<input class="btn btn-primary" name="dosubmit" type="submit" value="提交">
					<a href="/index.php/admin/spot_interest/interest" class="btn btn-primary">返回列表</a>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- layerDate plugin javascript -->
<script src="/statics/js/plugins/layer/laydate/laydate.js"></script>
<script type="text/javascript" src="/statics/js/jingweidu.01.js"></script>
<script type="text/javascript" >
//点击获取经纬度事件
//参数是点选地图后产生POI的图片路径
$(function () {
    __jingweidu("/statics/image/poi/大厦.png","receive",$("#x_index"),$("#y_index"),$("#z_index"));
})
</script>
<script type="text/javascript">
	//添加元素
	function addImg(){
		var html = '<tr><td><a href="javascript:;" onclick="removeImg(this)">[-]</a>名称 <input type="text" name="img_name[]" size="20" />上传文件</td><td><input type="file" name="img_url[]" /></td></tr>';
		$("#tbody").append(html);
	}
	//删除元素
	function removeImg(obj){
		var row = obj.parentNode.parentNode;
		row.remove();
	}
</script>
</body>
</html>