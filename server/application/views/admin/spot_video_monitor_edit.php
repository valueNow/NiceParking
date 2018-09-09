<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>视频监控修改</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
	<style>
		 .to_enlarge{position:absolute;right:24px;top:7px;cursor:pointer;}
	</style>
	<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
</head>
<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>视频监控修改</h5>
	</div>
	<div class="ibox-content">
		<form method="post" action="/index.php/admin/spot_video_monitor/video_monitor_edit" enctype="multipart/form-data" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">所属景点：</label>
				<div class="col-sm-3">
					<select class="form-control m-b" style="height:35px;width:250px;" name="spot_id" required=''>
						<option value="">请选择</option>
						<?php foreach($spot as $k=>$v){?>
							<option value="<?php echo $k;?>" <?php echo  $video_monitor['spot_id']==$k?"selected":"";?> ><?php echo $v;?></option>
						<?php }?>
					</select>
				</div>
				<label class="col-sm-2 control-label">视频监控类型：</label>
				<div class="col-sm-3">
					<select class="form-control m-b" style="height:35px;width:250px;" name="type_id" required=''>
						<option value="">请选择</option>
						<?php foreach($type as $key=>$val){?>
							<option value="<?php echo $key;?>" <?php echo  $video_monitor['type_id']==$key?"selected":"";?> ><?php echo $val;?></option>
						<?php }?>
					</select>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">视频监控名称：</label>
				<div class="col-sm-3">
					<input type="text" name="name" class="form-control" value="<?php echo $video_monitor['name'];?>" required="">
				</div>
				<label class="col-sm-2 control-label">x坐标：</label>
				<div class="col-sm-3">
					<input type="text" name="x_index" id="x_index" class="form-control" value="<?php echo $video_monitor['x_index'];?>" required="">
					<img src="/statics/image/zom.png" class="to_enlarge" onclick="sS()">
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">y坐标：</label>
				<div class="col-sm-3">
					<input type="text" name="y_index" id="y_index" class="form-control" value="<?php echo $video_monitor['y_index'];?>" required="">
					<img src="/statics/image/zom.png" class="to_enlarge" onclick="sS()">
				</div>
				<label class="col-sm-2 control-label">z坐标：</label>
				<div class="col-sm-3">
					<input type="text" name="z_index" id="z_index" class="form-control" value="<?php echo $video_monitor['z_index'];?>" required="">
					<img src="/statics/image/zom.png" class="to_enlarge" onclick="sS()">
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">地理位置：</label>
				<div class="col-sm-3">
					<input type="text" name="address" class="form-control" value="<?php echo $video_monitor['address'];?>" required="">
				</div>
				<label class="col-sm-2 control-label">视频链接：</label>
				<div class="col-sm-3">
					<input type="input" name="url" class="form-control" value="<?php echo $video_monitor['url'];?>">
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-xs-2 control-label">图片：</label>
				<div class="col-xs-3 lookImg-box">
				        <?php if(empty($img)): ?>
                        暂无图片
                        <?php else: ?>
                       <div class="big-lookImg">
                           <img src=""  alt="图片加载失败"/>
                           <div class="big-lookImg-display">
                                  <div>
                                      <a href="" target="_blank" class="aLook">查看</a>
                                      <a href="" target="_blank" class="fileDown">下载</a>
                                  </div>
                           </div>
                       </div>
                       <div class="small-lookImg-bigBox">
                           <ul class="small-lookImg-box">
                                  <?php foreach($img as $v){?>
                                  	<li class="lookImg">
                                  	    <img src="/<?php echo $v['file_url'];?>" alt="图片加载失败"/>
                                  	    <a onclick="sq_del(this,'<?php echo $v['aid'];?>')" class="lookImg-delete fa fa-times"></a>
                                  	</li>
                                  <?php } ?>
                           </ul>
                       </div>
                       <span class="lookImg-prev fa fa-angle-left"></span>
                       <span class="lookImg-next fa fa-angle-right"></span>
                       <?php endif;?>
				<table width="650px;" style="margin-top:20px">
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
					<textarea name="desc" style="height:100px;width:100%;" required class="form-control"><?php echo $video_monitor['desc'];?></textarea>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-2">
					<input type="hidden" name="id" value="<?php echo $video_monitor['id'];?>">
					<input class="btn btn-primary" name="dosubmit" type="submit" value="提交">
					<a href="/index.php/admin/spot_video_monitor/index" class="btn btn-primary">返回列表</a>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- layerDate plugin javascript -->
<script src="/statics/js/plugins/layer/laydate/laydate.js"></script>
<script type="text/javascript" src="/statics/js/jingweidu.01.js"></script>
<script src="/statics/js/lookImg.js"></script>
<script type="text/javascript" >
//点击获取经纬度事件
//参数是点选地图后产生POI的图片路径
//$(function () {
//    __jingweidu("/statics/image/poi/大厦.png","receive",$("#x_index"),$("#y_index"),$("#z_index"));
//})
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
	//ajax删除附件
	function sq_del(obj,id){
		if(confirm('确定要删除吗？')){
			$.ajax({
				url:'/index.php/admin/release/del_annex/'+id,
				dataType:'json',
				success:function(ob){
					if(ob=="no"){
						alert("操作失败！");
					}else{
						var row = obj.parentNode;
						row.remove();
					}
				}
			});
		}
	}
</script>
</body>
</html>