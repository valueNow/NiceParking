<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加事件</title>
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
		<h5>添加事件</h5>
	</div>
	<div class="ibox-content">
		<form method="post" action="/index.php/admin/emergency/add_event" enctype="multipart/form-data" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">事件名称：</label>
				<div class="col-sm-3">
					<input type="text" name="event_name" class="form-control" required="">
				</div>

				<label class="col-sm-2 control-label">使用预案：</label>
				<div class="col-sm-3">
					<select class="form-control m-b" style="height:35px;width:250px;" name="plan_id">
						<option value="0">请选择</option>
						<?php foreach($planlist as $v){?>
							<option value="<?php echo $v['plan_id'];?>"><?php echo $v['plan_name'];?></option>
						<?php }?>
					</select>
				</div>
				<label class="col-sm-2 control-label" style="color:red;">未使用则不选</label>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">事件类型：</label>
				<div class="col-sm-3">
					<select class="form-control m-b" style="height:35px;width:250px;" name="event_type" required=''>
						<option value="">请选择</option>
						<?php foreach($event_type as $k=>$v){?>
							<option value="<?php echo $k;?>"><?php echo $v;?></option>
						<?php }?>
					</select>
				</div>

				<label class="col-sm-2 control-label">负责单位：</label>
				<div class="col-sm-3">
					<select class="form-control m-b" style="height:35px;width:250px;" name="charge_unit" required=''>
						<option value="">请选择</option>
						<?php foreach($bumen as $v){?>
							<option value="<?php echo $v['esu_id'];?>"><?php echo $v['esu_name'];?></option>
						<?php }?>
					</select>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">x坐标：</label>
				<div class="col-sm-3">
					<input type="text" name="x_index" id="x_index" class="form-control" required="">
					<img src="/statics/image/zom.png" class="to_enlarge">
				</div>
				<label class="col-sm-2 control-label">y坐标：</label>
				<div class="col-sm-3">
					<input type="text" name="y_index" id="y_index" class="form-control" required="">
					<img src="/statics/image/zom.png" class="to_enlarge">
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">z坐标：</label>
				<div class="col-sm-3">
					<input type="text" name="z_index" id="z_index" class="form-control" required="">
					<img src="/statics/image/zom.png" class="to_enlarge">
				</div>

				<label class="col-sm-2 control-label">地理位置：</label>
                <div class="col-sm-3">
                	<input type="text" name="address" class="form-control" required="">
                </div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">已造成后果：</label>
				<div class="col-sm-3">
					<input type="text" name="aftermath" class="form-control" required="">
				</div>

				<label class="col-sm-2 control-label">已采取措施：</label>
				<div class="col-sm-3">
					<input type="text" name="measures" class="form-control" required="">
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">发生时间：</label>
				<div class="col-sm-3">
					<input class="laydate-icon form-control layer-date" name="occur_time" placeholder="YYYY-MM-DD hh:mm:ss" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" required="">
				</div>
				<label class="col-sm-2 control-label">处置时间：</label>
				<div class="col-sm-3">
					<input class="laydate-icon form-control layer-date" name="end_time" placeholder="YYYY-MM-DD hh:mm:ss" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" required="">
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">负责人：</label>
				<div class="col-sm-3">
					<input type="text" name="reporter" class="form-control" required="">
				</div>
				<label class="col-sm-2 control-label">联系方式：</label>
				<div class="col-sm-3">
					<input type="text" name="mobile" class="form-control" required="">
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">

            	<label class="col-sm-2 control-label">配图：</label>
                <div class="col-sm-3">
                	<div>
                		<input type="file" name="img_url">
                	</div>
                </div>
            </div>
			<div class="form-group">
				<label class="col-sm-2 control-label">事件描述：</label>
				<div class="col-sm-8">
					<textarea name="description" style="height:100px;width:100%;" required class="form-control"></textarea>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-2">
					<input class="btn btn-primary" name="dosubmit" type="submit" value="提交">
					<a href="/index.php/admin/emergency/event" class="btn btn-primary">返回列表</a>
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
    __jingweidu("/statics/image/poi/大厦.png","event",$("#x_index"),$("#y_index"),$("#z_index"));
})
</script>
</body>
</html>