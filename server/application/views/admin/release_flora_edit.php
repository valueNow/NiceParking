<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>动植物资源修改</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
     <link href="/statics/css/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>
<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>动植物资源修改</h5>
	</div>
	<div class="ibox-content">
		<form method="post" action="/index.php/admin/release/edit_flora" enctype="multipart/form-data" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">动植物分类：</label>
				<div class="col-sm-3">
					<select class="form-control m-b" style="height:35px;width:250px;" name="type_id" required=''>
						<option value="">请选择</option>
						<?php foreach($type as $v){?>
							<option value="<?php echo $v['type_id'];?>" <?php echo  $flora['type_id']==$v['type_id']?"selected":"";?>><?php echo $v['name'];?></option>
						<?php }?>
					</select>
				</div>
				<label class="col-sm-2 control-label">所属景点：</label>
				<div class="col-sm-3">
					<select class="form-control m-b" style="height:35px;width:250px;" name="sp_id" required=''>
						<option value="">请选择</option>
						<?php foreach($spots as $v){?>
							<option value="<?php echo $v['spot_id'];?>" <?php echo  $flora['sp_id']==$v['spot_id']?"selected":"";?> ><?php echo $v['spot_name'];?></option>
						<?php }?>
					</select>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">编号：</label>
				<div class="col-sm-3">
					<input type="text" name="numbering" value="<?php echo $flora['numbering'];?>" class="form-control" required>
				</div>
				<label class="col-sm-2 control-label">数量：</label>
				<div class="col-sm-3">
					<input type="text" name="num" value="<?php echo $flora['num'];?>" class="form-control" required>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">标题：</label>
				<div class="col-sm-3">
					<input type="text" name="title" value="<?php echo $flora['title'];?>" class="form-control" required>
				</div>
			</div>
			
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">描述：</label>
				<div class="col-sm-8">
					<textarea name="description" style="height:100px;width:100%;" required class="form-control"><?php echo $flora['description'];?></textarea>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
			<input type="hidden" style="width:100%;border-style:none;" id="lstPoint" name="lstPoint">
				<label class="col-sm-2 control-label">路线信息：</label>
				<div class="col-sm-8">	
					<table class="table table-striped table-bordered table-hover display nowrap"  cellspacing="0" width="100%" id="editable">
						<thead>
							<tr>
								<th>经度</th>
								<th>纬度</th>
								<th>高度</th>
							</tr>
						</thead>
						<?php if(!empty($ass)): ?>
						<?php foreach($ass as $v){ ?>
						<tr>
							<td><?php echo $v['x'];?></td>
							<td><?php echo $v['y'];?></td>
							<td><?php echo $v['z'];?></td>
						</tr>
						<?php } ?>
						<?php else:?>
						<tr>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<?php endif;?>
					</table>
					<?php if(!empty($ass)){ ?>
						<p><input type="button" id="modifyLine" onclick="__jingweidupanel()" value="修改区域"><button type="button" style="margin-left:20px" onclick="__jingweidupanelLook()"  class="small-button">查看区域</button></p>
					<?php }else{ ?>
						<p><input type="button" id="createLine" onclick="__jingweidupanel()" value="创建区域"><button type="button"   style="margin-left:20px"  onclick="__jingweidupanelLook()"  class="small-button">查看区域</button></p>
					<?php } ?>
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
				<label class="col-sm-2 control-label">视频：</label>
				<div class="col-sm-10">
				<?php foreach($video as $v){?>
					<div><?php echo $v['file_name'];?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/<?php echo $v['file_url'];?>" target="_blank">点击(查看/下载)</a>&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="sq_del(this,'<?php echo $v['aid'];?>')">删除</a></div>
				<?php } ?>
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
				<div class="col-sm-4 col-sm-offset-2">
					<input type="hidden" name="flora_id" value="<?php echo $flora['flora_id'];?>">
					<input class="btn btn-primary" name="dosubmit" type="submit" value="提交">
					<a href="/index.php/admin/release/floralist" class="btn btn-primary">返回列表</a>
				</div>
			</div>
		</form>
	</div>
	<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
	<script type="text/javascript">
		var jsonresult='<?php echo $lstPoint;?>';
    	jsonresult=JSON.parse(jsonresult);
    	$("#lstPoint").val(JSON.stringify(jsonresult));
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
<script type="text/javascript" src="/statics/js/jingweidu.01.js"></script>
<script src="/statics/js/lookImg.js"></script>
</div>
</body>
</html>