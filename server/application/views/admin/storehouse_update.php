<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>仓库修改</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
    <style>
		 .to_enlarge{position:absolute;right:24px;top:7px;cursor:pointer;}
    </style>
	<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
	<script src="/statics/js/plugins/validate/jquery.validate.min.js"></script>
	<script src="/statics/js/plugins/validate/messages_zh.min.js"></script>
	<script src="/statics/js/plugins/validate/validateExtend.js"></script>
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>仓库修改</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="/index.php/admin/emergency_material_storehouse/update_storehouse" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">仓库姓名：</label>
							<div class="col-sm-3">
								<input type="text" name="storehouse_name" class="form-control" required   value="<?php echo $storehouse_info['storehouse_name']; ?>">
							</div>
							<label class="col-sm-2 control-label">所属单位：</label>
							<div class="col-sm-3">
								<select name="esu_id"  id="esu_id" class="form-control" style="width:100%;height:30px;"   required>
									<?php foreach($esu_arr as $k=>$v){ ?>
										<option value="<?php echo $k;?>" <?php if($k == $storehouse_info['esu_id']): ?>selected<?php endif; ?> ><?php echo $v;?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">状态：</label>
							<div class="col-sm-3">
								<select name="status"  id="status" class="form-control" style="width:100%;height:30px;"   required>
									<?php foreach($storehouse_status as $k=>$v){ ?>
										<option value="<?php echo $k;?>"  <?php if($k == $storehouse_info['status']): ?>selected<?php endif; ?>><?php echo $v;?></option>
									<?php } ?>
								</select>
							</div>
							<label class="col-sm-2 control-label">剩余容纳量：</label>
							<div class="col-sm-3">
								<input type="text" name="lave" class="form-control" required value="<?php echo $storehouse_info['lave']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">库容(立方米)：</label>
							<div class="col-sm-3">
								<input type="text" name="capacity" class="form-control" required value="<?php echo $storehouse_info['capacity']; ?>">
							</div>
							<label class="col-sm-2 control-label">负责人：</label>
							<div class="col-sm-3">
								<input type="text" name="director" class="form-control" required value="<?php echo $storehouse_info['director']; ?>">
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">手机号：</label>
							<div class="col-sm-3">
								<input type="text" name="mobile" class="form-control" required value="<?php echo $storehouse_info['mobile']; ?>">
							</div>
							<label class="col-sm-2 control-label">座机：</label>
							<div class="col-sm-3">
								<input type="text" name="telephone" class="form-control" required value="<?php echo $storehouse_info['telephone']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">地理位置：</label>
							<div class="col-sm-3">
								<input type="text" name="address" class="form-control" required value="<?php echo $storehouse_info['address']; ?>">
							</div>
							<label class="col-sm-2 control-label">x坐标：</label>
                            <div class="col-sm-3">
                            	<input type="text" id="x_index"  name="x_index" class="form-control" required value="<?php echo $storehouse_info['x_index']; ?>">
                            <img src="/statics/image/zom.png" class="to_enlarge">
                            </div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">y坐标：</label>
							<div class="col-sm-3">
								<input type="text" id="y_index"  name="y_index" class="form-control" required value="<?php echo $storehouse_info['y_index']; ?>">
								<img src="/statics/image/zom.png" class="to_enlarge">
							</div>
							<label class="col-sm-2 control-label">z坐标：</label>
                            <div class="col-sm-3">
                            	<input type="text" id="z_index"   name="z_index" class="form-control" required value="<?php echo $storehouse_info['z_index']; ?>">
                            	<img src="/statics/image/zom.png" class="to_enlarge">
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
						<div class="form-group" >
							<div class="col-sm-8 col-sm-offset-2">
								<input type="hidden" value="<?php echo $storehouse_info['storehouse_id'];?>" name="storehouse_id">
								<input  id="submit" class="btn btn-primary" style="margin_right:40px;" type="submit"    value="保存">
								<a href="<?php echo site_url('admin/emergency_material_storehouse/index'); ?>"><input class="btn btn-primary" style="margin_right:2px;"     type="button" value="返回列表"></a>
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
<script src="/statics/js/lookImg.js"></script>
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
					console.log(ob)
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
<script type="text/javascript" src="/statics/js/jingweidu.01.js"></script>
<script type="text/javascript" >
//点击获取经纬度事件
//参数是点选地图后产生POI的图片路径
$(function () {
    __jingweidu("/statics/image/poi/大厦.png","esu",$("#x_index"),$("#y_index"),$("#z_index"));
})
</script>

</html>