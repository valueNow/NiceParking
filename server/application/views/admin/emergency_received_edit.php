<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改信息接报</title>
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
		<h5>修改信息接报</h5>
	</div>
	<div class="ibox-content">
		<form method="post" action="/index.php/admin/emergency/edit_received" enctype="multipart/form-data" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">信息名称：</label>
				<div class="col-sm-3">
					<input type="text" name="rec_name" class="form-control" required="" value="<?php echo $rec['rec_name'];?>">
				</div>
				<label class="col-sm-2 control-label">时间：</label>
				<div class="col-sm-3">
					<input class="laydate-icon form-control layer-date" name="rec_time" value="<?php echo date('Y-m-d H:i:s',$rec['rec_time']);?>" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" required="">
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">x坐标：</label>
				<div class="col-sm-3">
					<input type="text" name="x_index" id="x_index" class="form-control" required="" value="<?php echo $rec['x_index'];?>">
					<img src="/statics/image/zom.png" class="to_enlarge">
				</div>
				<label class="col-sm-2 control-label">y坐标：</label>
				<div class="col-sm-3">
					<input type="text" name="y_index" id="y_index" class="form-control" required="" value="<?php echo $rec['y_index'];?>">
					<img src="/statics/image/zom.png" class="to_enlarge">
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">z坐标：</label>
				<div class="col-sm-3">
					<input type="text" name="z_index" id="z_index" class="form-control" required="" value="<?php echo $rec['z_index'];?>">
					<img src="/statics/image/zom.png" class="to_enlarge">
				</div>

				<label class="col-sm-2 control-label">地理位置：</label>
                <div class="col-sm-3">
                	<input type="text" name="address" class="form-control" required="" value="<?php echo $rec['address'];?>">
                </div>

			</div>
			<div class="form-group">
            	<label class="col-sm-2 control-label">报送人：</label>
            	<div class="col-sm-3">
            		<input type="text" name="send_someone" class="form-control" required="" value="<?php echo $rec['send_someone'];?>">
            	</div>
            	<label class="col-sm-2 control-label">报送人联系方式：</label>
            	<div class="col-sm-3">
            		<input type="text" name="mobile" class="form-control" required="" value="<?php echo $rec['mobile'];?>">
            	</div>
            </div>
            <div class="form-group">
            	<label class="col-sm-2 control-label">信息来源：</label>
            	<div class="col-sm-3">
            		<input type="text" name="source" class="form-control" required="" value="<?php echo $rec['source'];?>">
            	</div>
            	<label class="col-sm-2 control-label">接报人：</label>
            	<div class="col-sm-3">
            		<input type="text" name="receiver" class="form-control" required="" value="<?php echo $rec['receiver'];?>">
            	</div>
            </div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">配图：</label>
                <div class="col-sm-3">
                	<div>
                		<input type="file" name="img_url">
                	</div>
                	<?php if(!empty($rec['img_url'])){?><a href="/<?php echo $rec['img_url'];?>" target="_blank">点击查看原图</a><?php }?>
                </div>
			</div>

			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">描述：</label>
				<div class="col-sm-8">
					<textarea name="description" style="height:100px;width:100%;" required class="form-control"><?php echo $rec['description'];?></textarea>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-2">
					<input type="hidden" name="rec_id" value="<?php echo $rec['rec_id'];?>">
					<input class="btn btn-primary" name="dosubmit" type="submit" value="提交">
					<a href="/index.php/admin/emergency/received" class="btn btn-primary">返回列表</a>
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
</body>
</html>