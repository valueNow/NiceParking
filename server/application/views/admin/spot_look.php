<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>查看景点</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
	<link href="/statics/css/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="/statics/css/infobox.css" rel="stylesheet">
    <!-- Data Tables -->
    <style>
		 .to_enlarge{position:absolute;right:24px;top:0px;cursor:pointer;}
	</style>
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
	<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
	<script src="/statics/js/plugins/layer/laydate/laydate.js"></script>
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-xs-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>查看景点</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="/index.php/admin/spot_management/update_spot" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-xs-2 control-label">景点名称：</label>
							<div class="col-xs-3">
								<?php echo $spot_info['spot_name'];?>
							</div>
							<label class="col-xs-2 control-label">类型：</label>
							<div class="col-xs-3">
								<?php echo $sp_type[$spot_info['sp_type']];?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label">营业开始时间：</label>
							<div class="col-xs-3">
								<?php echo $spot_info['start_time'];?>
							</div>
							<label class="col-xs-2 control-label">营业结束时间：</label>
							<div class="col-xs-3">
								<?php echo $spot_info['end_time'];?>
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label">座机号：</label>
							<div class="col-xs-3">
								<?php echo $spot_info['telephone'];?>
							</div>
							<label class="col-xs-2 control-label">应急电话：</label>
							<div class="col-xs-3">
								<?php echo $spot_info['help_phone'];?>
							</div>
							
						</div>
						<div class="form-group">
							
							<label class="col-xs-2 control-label">地理位置：</label>
							<div class="col-xs-3">
								<?php echo $spot_info['address'];?>
							</div>
							<label class="col-xs-2 control-label">x坐标：</label>
                            	<div class="col-xs-3">
                            		<?php echo $spot_info['x_index'];?>
                            		<img src="/statics/image/zom.png" class="to_enlarge" onclick="sS()">
                            	</div>
						</div>
						<div class="form-group">

						    <label class="col-xs-2 control-label">y坐标：</label>
							<div class="col-xs-3">
								<?php echo $spot_info['y_index'];?>
								<img src="/statics/image/zom.png" class="to_enlarge" onclick="sS()">
							</div>
							<label class="col-xs-2 control-label">z坐标：</label>
                            	<div class="col-xs-3">
                            		<?php echo $spot_info['z_index'];?>
                            		<img src="/statics/image/zom.png" class="to_enlarge" onclick="sS()">
                            	</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label">图片：</label>
							<div class="col-xs-3 lookImg-box">
								<!--<?php foreach($img as $v){?>
									<a href="/<?php echo $v['file_url'];?>" target="_blank"  title="点击(查看/下载)<?php echo $v['file_name'];?>" class="spotLook_img">
									    <img src="/<?php echo $v['file_url'];?>" alt="图片加载失败">
									</a>
								<?php } ?>-->

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
                                        	</li>
                                        <?php } ?>
								    </ul>
								</div>
								 <span class="lookImg-prev fa fa-angle-left"></span>
                                 <span class="lookImg-next fa fa-angle-right"></span>
                                 <?php endif;?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label">状态：</label>
							<div class="col-xs-3">
								<?php if($spot_info['status'] == 0): ?>禁用<?php else: ?> 启用<?php endif; ?>
							</div>
							<label class="col-sm-2 control-label">三维配图：</label>
							<div class="col-sm-2">
								<?php if(!empty($spot_info['img_sign'])): ?>
								<img src="/<?php echo $spot_info['img_sign'];?>" width="60px" height="60px">
								<?php else:?>
								暂无图标		
								<?php endif;?>
							</div>
							<label class="col-sm-2">尺寸：60X60</label>
						</div>
						
						<div class="form-group">
							<label class="col-xs-2 control-label">简介：</label>
							<div class="col-xs-8" id="introduce" title="<?php echo $spot_info['desc'];?>">
								<?php echo $spot_info['desc'];?>
							</div>
						</div>
						<br />
						
						<div class="form-group" >
							<div class="col-xs-8 col-xs-offset-2">
								<input  type="hidden" name="spot_id" value="<?php echo $spot_info['spot_id']; ?>">
								
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
<script type="text/javascript" src="/statics/js/jingweidu.01.js"></script>
<script src="/statics/js/lookImg.js"></script>
<script type="text/javascript" >
//点击获取经纬度事件
//参数是点选地图后产生POI的图片路径
//$(function () {
//    __jingweidu("/statics/image/poi/大厦.png","receive",$("#x_index"),$("#y_index"),$("#z_index"));
//
//})
</script>
</html>