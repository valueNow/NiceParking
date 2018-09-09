<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增医疗卫生站</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
    <style>
		 .to_enlarge{position:absolute;right:24px;top:7px;cursor:pointer;}
	</style>
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>新增医疗卫生站</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="/index.php/admin/emergency_heal/add_heal" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">卫生站名称：</label>
							<div class="col-sm-3">
								<input type="text" name="heal_name" class="form-control" required   value="">
							</div>
							<label class="col-sm-2 control-label">所属单位：</label>
							<div class="col-sm-3">
								<select name="esu_id"  id="esu_id" class="form-control" style="width:100%;height:30px;line-height:30px;font-size:12px;"   required>
									<?php foreach($esu_arr as $k=>$v){ ?>
										<option value="<?php echo $k;?>"><?php echo $v;?></option>
									<?php } ?>
								</select>
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">座机号：</label>
							<div class="col-sm-3">
								<input type="text" name="telephone" class="form-control" required value="">
							</div>
							<label class="col-sm-2 control-label">手机号：</label>
							<div class="col-sm-3">
								<input type="text" name="mobile" class="form-control" required value="">
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">最多容纳人数：</label>
							<div class="col-sm-3">
								<input type="text" name="max_hold_people" class="form-control" required value="">
							</div>
							<label class="col-sm-2 control-label">负责人：</label>
							<div class="col-sm-3">
								<input type="text" name="director" class="form-control" required   value="">
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">地理位置：</label>
							<div class="col-sm-3">
								<input type="text" name="address" class="form-control" required value="">
							</div>
							<label class="col-sm-2 control-label">x坐标：</label>
                            <div class="col-sm-3">
                            	<input type="text" name="x_index" id="x_index"  class="form-control" required value="<?php echo $x;?>">
                            	<img src="/statics/image/zom.png" class="to_enlarge">
                            </div>
						</div>
						<div class="form-group">
							
							<label class="col-sm-2 control-label">y坐标：</label>
							<div class="col-sm-3">
								<input type="text" name="y_index" id="y_index"  class="form-control" required value="<?php echo $y;?>">
								<img src="/statics/image/zom.png" class="to_enlarge">
							</div>
							<label class="col-sm-2 control-label">z坐标：</label>
                            <div class="col-sm-3">
                            	<input type="text" name="z_index"  id="z_index" class="form-control" required value="<?php echo $z;?>">
                            	<img src="/statics/image/zom.png" class="to_enlarge">
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
							<label class="col-sm-2 control-label">简介：</label>
							<div class="col-sm-8">
								<textarea id="desc" class="form-control" name="desc" required="" aria-required="true"></textarea>
							</div>
						</div>
						<br />
						
						<div class="form-group" >
							<div class="col-sm-8 col-sm-offset-2">
								<input  id="submit" class="btn btn-primary" style="margin_right:40px;" type="submit"    value="保存">
								<a href="<?php echo site_url('admin/emergency_heal/index'); ?>"><input class="btn btn-primary" style="margin_right:2px;"     type="button" value="返回列表"></a>
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
<script type="text/javascript" src="/statics/js/jingweidu.01.js"></script>
<script type="text/javascript" >
//点击获取经纬度事件
//参数是点选地图后产生POI的图片路径
$(function () {
    __jingweidu("/statics/image/poi/大厦.png","esu",$("#x_index"),$("#y_index"),$("#z_index"));
})
</script>
</html>