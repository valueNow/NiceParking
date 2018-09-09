<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改特色旅游点</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
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
                        <h5>修改特色旅游点</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="/index.php/admin/spot_feature/update_spot_feature" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">特色旅游点名称：</label>
							<div class="col-sm-3">
								<input type="text" name="feature_name" class="form-control" required   value="<?php echo $feature_info['feature_name']; ?>">
							</div>
							<label class="col-sm-2 control-label">所属景点：</label>
                            <div class="col-sm-3">
                            	<select name="spot_id"  id="spot_id" style="width:100%;height:30px;" class="form-control" required>
                            		<?php foreach($spot_arr as $k=>$v){ ?>
                            			<option value="<?php echo $k;?>" <?php if($feature_info['spot_id'] == $k): ?> <?php endif; ?> ><?php echo $v;?></option>
                            		<?php } ?>
                            	</select>
                            </div>
						</div>
						<div class="form-group">
							
							<label class="col-sm-2 control-label">地理位置：</label>
							<div class="col-sm-3">
								<input type="text" name="address" class="form-control" required value="<?php echo $feature_info['address']; ?>">
							</div>
							<label class="col-sm-2 control-label">x坐标：</label>
                            <div class="col-sm-3">
                            	<input type="text"  id="x_index"  name="x_index" class="form-control" required value="<?php echo $feature_info['x_index']; ?>" >
                            <img src="/statics/image/zom.png" class="to_enlarge" onclick="sS()">
                            </div>
						</div>
						<div class="form-group">
							
							<label class="col-sm-2 control-label">y坐标：</label>
							<div class="col-sm-3">
								<input type="text"  id="y_index"  name="y_index" class="form-control" required value="<?php echo $feature_info['y_index']; ?>">
							<img src="/statics/image/zom.png" class="to_enlarge" onclick="sS()">
							</div>
							<label class="col-sm-2 control-label">z坐标：</label>
                            <div class="col-sm-3">
                            	<input type="text" id="z_index"  name="z_index" class="form-control" required value="<?php echo $feature_info['z_index']; ?>">
                            <img src="/statics/image/zom.png" class="to_enlarge" onclick="sS()">
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
						<div class="form-group">
							<label class="col-sm-2 control-label">上传文档：</label>
							<div class="col-sm-3">	
								<input type="hidden" value="<?php echo $feature_info['docx_id']; ?>"  name="docx_id1" />
								<div>
									<input type="file" name="docx_id" value="" />
								</div>
								<?php if($feature_info['docx_id']): ?>
								<a href="/<?php echo $file_result[$feature_info['docx_id']]['file_url']; ?>" target="_blank">点击查看附件</a>
								<?php endif; ?>
							</div>
							<label class="col-sm-2 control-label">文档描述：</label>
							<div class="col-sm-3">
								<textarea class="form-control" name="docx_desc"  aria-required="true"><?php if($feature_info['docx_id']): ?><?php echo $file_result[$feature_info['docx_id']]['desc']; ?><?php endif; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">上传视频：</label>
							<div class="col-sm-3">	
								<input type="hidden" value="<?php echo $feature_info['video_id']; ?>"  name="video_id1" />
								<div>
									<input type="file" name="video_id" value="" />
								</div>
								<?php if($feature_info['video_id']): ?>
								<a href="/<?php echo $file_result[$feature_info['video_id']]['file_url']; ?>" target="_blank">点击查看附件</a>
								<?php endif;?>
							</div>
							<label class="col-sm-2 control-label">视频描述：</label>
							<div class="col-sm-3">
								<textarea class="form-control" name="video_desc" aria-required="true"><?php if($feature_info['video_id']): ?><?php echo $file_result[$feature_info['video_id']]['desc']; ?><?php endif;?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">上传语音：</label>
							<div class="col-sm-3">
								<input type="hidden" value="<?php echo $feature_info['voice_id']; ?>"  name="voice_id1" />
								<div>
									<input type="file" name="voice_id" value="" />
								</div>
								<?php if($feature_info['voice_id']): ?>
								<a href="/<?php echo $file_result[$feature_info['voice_id']]['file_url']; ?>" target="_blank">点击查看语音</a>
								<?php endif;?>
							</div>
							<label class="col-sm-2 control-label">语音描述：</label>
							<div class="col-sm-3">
								<textarea class="form-control" name="voice_desc"  aria-required="true"><?php if($feature_info['voice_id']): ?><?php echo $file_result[$feature_info['voice_id']]['desc']; ?><?php endif;?></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">简介：</label>
							<div class="col-sm-8">
								<textarea id="desc" class="form-control" name="desc" required aria-required="true"><?php echo $feature_info['desc']; ?></textarea>
							</div>
						</div>
						<br />
						<div class="form-group" >
							<div class="col-sm-8 col-sm-offset-2">
								<input type="hidden"  name="feature_id"  value="<?php echo $feature_info['feature_id']; ?>">
								<input  id="submit" class="btn btn-primary" style="margin_right:40px;" type="submit"    value="保存">
								<a href="<?php echo site_url('admin/spot_feature/index'); ?>"><input class="btn btn-primary" style="margin_right:2px;"     type="button" value="返回列表"></a>
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
<script src="/statics/js/lookImg.js"></script>
<script type="text/javascript" >
//点击获取经纬度事件
//参数是点选地图后产生POI的图片路径
//$(function () {
//    __jingweidu("/statics/image/poi/大厦.png","esu",$("#x_index"),$("#y_index"),$("#z_index"));
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
</html>