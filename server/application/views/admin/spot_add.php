<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增景点</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <style>
		 .to_enlarge{position:absolute;right:24px;top:7px;cursor:pointer;}
	</style>	
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>新增景点</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="/index.php/admin/spot_management/add_spot" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">景点名称：</label>
							<div class="col-sm-3">
								<input type="text" name="spot_name" class="form-control" required   value="">
							</div>
							<label class="col-sm-2 control-label">类型：</label>
							<div class="col-sm-3">
								<select name="sp_type"  id="sp_type" class="form-control" style="font-size:12px;" required>
									<?php foreach($sp_type as $k=>$v){ ?>
										<option value="<?php echo $k;?>"><?php echo $v;?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">营业开始时间：</label>
							<div class="col-sm-3">
								<select style="width:70px;font-size:12px;float:left" class="form-control" name="start_time1">
								<?php for($i=0;$i<24;$i++){?>
									<?php if($i<10){$i="0".$i;}?>
									<option value="<?php echo $i;?>"><?php echo $i;?></option>
								<?php } ?>
								</select>
								<div style="float:left;line-height:30px;margin:0 5px 0 5px">时</div>
								<select  style="width:70px;font-size:12px;float:left" class="form-control" name="start_time2">
									<option value="00">00</option>
									<option value="30">30</option>
								</select>
								<div style="float:left;line-height:30px;margin:0 0 0 5px">分</div>
							</div>
							<label class="col-sm-2 col-xs-12 control-label">营业结束时间：</label>
							<div class="col-sm-3">
								<select style="width:70px;font-size:12px;float:left" class="form-control" name="end_time1">
								<?php for($i=0;$i<24;$i++){?>
									<?php if($i<10){$i="0".$i;}?>
									<option value="<?php echo $i;?>"><?php echo $i;?></option>
								<?php } ?>
								</select>
								<div style="float:left;line-height:30px;margin:0 5px 0 5px">时</div>
								<select  style="width:70px;font-size:12px;float:left" class="form-control" name="end_time2">
									<option value="00">00</option>
									<option value="30">30</option>
								</select>
								<div style="float:left;line-height:30px;margin:0 0 0 5px">分</div>
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">座机号：</label>
							<div class="col-sm-3">
								<input type="text" name="telephone" class="form-control" required value="">
							</div>
							<label class="col-sm-2 control-label">应急电话：</label>
							<div class="col-sm-3">
								<input type="text" name="help_phone" class="form-control" required value="">
							</div>
							
						</div>
						<div class="form-group">
							
							<label class="col-sm-2 control-label">地理位置：</label>
							<div class="col-sm-3">
								<input type="text" name="address" class="form-control" required value="">
							</div>

							
							<label class="col-sm-2 control-label">x坐标：</label>
							<div class="col-sm-3">
								<input type="text"  id="x_index"  name="x_index" class="form-control" required value="<?php echo $x;?>">
							<img src="/statics/image/zom.png" class="to_enlarge">
							</div>
						</div>
						<div class="form-group">
							
							<label class="col-sm-2 control-label">y坐标：</label>
							<div class="col-sm-3">
								<input type="text"  id="y_index"  name="y_index" class="form-control" required value="<?php echo $y;?>">
							<img src="/statics/image/zom.png" class="to_enlarge">
							</div>

							<label class="col-sm-2 control-label">z坐标：</label>
							<div class="col-sm-3">
								<input type="text" id="z_index"  name="z_index" class="form-control" required value="<?php echo $z;?>">
							<img src="/statics/image/zom.png" class="to_enlarge">
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label">状态：</label>
							<div class="col-xs-3">
								<input type="radio" name="status" value="0" />禁用 
								<input type="radio" name="status" value="1" checked/>启用 
							</div>
							<label class="col-xs-2 control-label">三维配图：</label>
							<div class="col-sm-2">
								<input name="img_sign" type="file" required>
							</div>
							<label class="col-sm-2">尺寸：60X60</label>
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
							<label class="col-sm-2 control-label">简介：</label>
							<div class="col-sm-8">
								<textarea id="desc" class="form-control" name="desc" required="" aria-required="true"></textarea>
							</div>
						</div>
						<br />
						
						<div class="form-group" >
							<div class="col-sm-8 col-sm-offset-2">
								<input  id="submit" class="btn btn-primary" type="submit"    value="保存">
								<a href="<?php echo site_url('admin/spot_management/index'); ?>"><input class="btn btn-primary"  type="button" value="返回列表"></a>
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
//点击获取经纬度事件
//参数是点选地图后产生POI的图片路径
$(function () {
    __jingweidu("/statics/image/poi/大厦.png","esu",$("#x_index"),$("#y_index"),$("#z_index"));
})
</script>
<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
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
</html>