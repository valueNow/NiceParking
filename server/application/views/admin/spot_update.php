<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改景点</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <style>
		 .to_enlarge{position:absolute;right:24px;top:7px;cursor:pointer;}
	</style>
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
	<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
	<script src="/statics/js/plugins/layer/laydate/laydate.js"></script>
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>修改景点</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="/index.php/admin/spot_management/update_spot" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">景点名称：</label>
							<div class="col-sm-3">
								<input type="text" name="spot_name" class="form-control" required   value="<?php echo $spot_info['spot_name'];?>">
							</div>
							<label class="col-sm-2 control-label">类型：</label>
							<div class="col-sm-3">
								<select name="sp_type" class="form-control"  id="sp_type" rgba(8, 77, 103,0.5)  required>
									<?php foreach($sp_type as $k=>$v){ ?>
										<option value="<?php echo $k;?>" <?php if($k == $spot_info['sp_type']): ?>selected<?php endif; ?> ><?php echo $v;?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">营业开始时间：</label>
							<div class="col-sm-3">
								<select style="width:70px;float:left" class="form-control" name="start_time1">
								<?php for($i=0;$i<24;$i++){?>
									<?php if($i<10){$i="0".$i;}?>
									<option value="<?php echo $i;?>" <?php if($i == $start_time[0]): ?>selected<?php endif; ?>><?php echo $i;?></option>
								<?php } ?>
								</select>
								<div style="float:left;line-height:30px;margin:0 5px 0 5px">时</div>
								<select  style="width:70px;float:left" class="form-control" name="start_time2">
									<option value="00" <?php if('00' == $start_time[1]): ?>selected<?php endif; ?>>00</option>
									<option value="30" <?php if('30' == $start_time[1]): ?>selected<?php endif; ?>>30</option>
								</select>
								<div style="float:left;line-height:30px;margin:0 0 0 5px">分</div>
							</div>
							<label class="col-sm-2 col-xs-12 control-label">营业结束时间：</label>
							<div class="col-sm-3">
								<select style="width:70px;float:left" class="form-control" name="end_time1">
								<?php for($i=0;$i<24;$i++){?>
									<?php if($i<10){$i="0".$i;}?>
									<option value="<?php echo $i;?>"  <?php if($i == $end_time[0]): ?>selected<?php endif; ?> ><?php echo $i;?></option>
								<?php } ?>
								</select>
								<div style="float:left;line-height:30px;margin:0 5px 0 5px">时</div>
								<select  style="width:70px;float:left" class="form-control" name="end_time2">
									<option value="00"  <?php if('00' == $end_time[1]): ?>selected<?php endif; ?>>00</option>
									<option value="30" <?php if('30' == $end_time[1]): ?>selected<?php endif; ?>>30</option>
								</select>
								<div style="float:left;line-height:30px;margin:0 0 0 5px">分</div>
							</div>

						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">座机号：</label>
							<div class="col-sm-3">
								<input type="text" name="telephone" class="form-control" required value="<?php echo $spot_info['telephone'];?>">
							</div>
							<label class="col-sm-2 control-label">应急电话：</label>
							<div class="col-sm-3">
								<input type="text" name="help_phone" class="form-control" required value="<?php echo $spot_info['help_phone'];?>">
							</div>

						</div>
						<div class="form-group">

							<label class="col-sm-2 control-label">地理位置：</label>
							<div class="col-sm-3">
								<input type="text" name="address" class="form-control" required value="<?php echo $spot_info['address'];?>">
							</div>

							<label class="col-sm-2 control-label">x坐标：</label>
							<div class="col-sm-3">
								<input type="text" id="x_index" name="x_index" class="form-control" required value="<?php echo $spot_info['x_index'];?>">
							    <img src="/statics/image/zom.png" class="to_enlarge" onclick="sS()">
							</div>
						</div>
						<div class="form-group">

							<label class="col-sm-2 control-label">y坐标：</label>
							<div class="col-sm-3">
								<input type="text" id="y_index"  name="y_index" class="form-control" required value="<?php echo $spot_info['y_index'];?>">
							    <img src="/statics/image/zom.png" class="to_enlarge"  onclick="sS()">
							</div>

							<label class="col-sm-2 control-label">z坐标：</label>
							<div class="col-sm-3">
								<input type="text" id="z_index"  name="z_index" class="form-control" required value="<?php echo $spot_info['z_index'];?>">
							    <img src="/statics/image/zom.png" class="to_enlarge"  onclick="sS()">
							</div>
						</div>
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
							<table width="650px;"  style="margin-top:20px">
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
							<label class="col-sm-2 control-label">状态：</label>
							<div class="col-sm-3">
								<input type="radio" name="status" value="0" <?php if($spot_info['status'] == 0): ?> checked <?php endif; ?>/>禁用
								<input type="radio" name="status" value="1" <?php if($spot_info['status'] == 1): ?> checked <?php endif; ?>/>启用
							</div>
							<label class="col-sm-2 control-label">三维配图：</label>
							<div class="col-sm-2">
								<?php if(!empty($spot_info['img_sign'])){?><img src="/<?php echo $spot_info['img_sign'];?>" width="60px" height="60px"><?php }?>
								<input name="img_sign" type="file" required>
							</div>
							<label class="col-sm-2">尺寸：60X60</label>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">简介：</label>
							<div class="col-sm-8">
								<textarea id="desc" class="form-control" name="desc" required="" aria-required="true"><?php echo $spot_info['desc'];?></textarea>
							</div>
						</div>
						<br />

						<div class="form-group" >
							<div class="col-sm-8 col-sm-offset-2">
								<input  type="hidden" name="spot_id" value="<?php echo $spot_info['spot_id']; ?>">
								<input  id="submit" class="btn btn-primary" style="margin_right:40px;" type="submit"    value="保存">
								<a href="<?php echo site_url('admin/spot_management/index'); ?>"><input class="btn btn-primary" style="margin_right:2px;"     type="button" value="返回列表"></a>
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
<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
<script src="/statics/js/lookImg.js"></script>
<script type="text/javascript">
    //点击获取经纬度事件
    //参数是点选地图后产生POI的图片路径
    //$(function () {
    //    __jingweidu("/statics/image/poi/大厦.png","esu",$("#x_index"),$("#y_index"),$("#z_index"));
    //})

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
</html>