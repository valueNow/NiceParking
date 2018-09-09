<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>查看医疗卫生站</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
    <link rel="stylesheet" href="/statics/css/infobox.css" />
    <style>
		 .to_enlarge{position:absolute;right:24px;top:0px;cursor:pointer;}
    </style>	
	<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
	<script src="/statics/js/plugins/validate/jquery.validate.min.js"></script>
	<script src="/statics/js/plugins/validate/messages_zh.min.js"></script>
	<script src="/statics/js/plugins/validate/validateExtend.js"></script>
	<script src="/statics/js/lookImg.js"></script>
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>查看医疗卫生站</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">卫生站名称：</label>
							<div class="col-sm-3">
								<?php echo $heal_info['heal_name']; ?>
							</div>
							<label class="col-sm-2 control-label">所属单位：</label>
							<div class="col-sm-3">
								<?php echo $esu_arr[$heal_info['esu_id']];?>
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">座机号：</label>
							<div class="col-sm-3">
								<?php echo $heal_info['telephone']; ?>
							</div>
							<label class="col-sm-2 control-label">手机号：</label>
							<div class="col-sm-3">
								<?php echo $heal_info['mobile']; ?>
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">最多容纳人数：</label>
							<div class="col-sm-3">
								<?php echo $heal_info['max_hold_people']; ?>
							</div>
							<label class="col-sm-2 control-label">负责人：</label>
							<div class="col-sm-3">
								<?php echo $heal_info['director']; ?>
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">地理位置：</label>
							<div class="col-sm-3">
								<?php echo $heal_info['address']; ?>
							</div>

							<label class="col-sm-2 control-label">x坐标：</label>
							<div class="col-sm-3">
								<?php echo $heal_info['x_index']; ?>
								<input type="hidden" value="<?php echo $heal_info['x_index']; ?>" id="x_index" />
									<img src="/statics/image/zom.png" class="to_enlarge">
							</div>
						</div>
						<div class="form-group">
							
							<label class="col-sm-2 control-label">y坐标：</label>
							<div class="col-sm-3">
								<?php echo $heal_info['y_index']; ?><input type="hidden" value="<?php echo $heal_info['y_index']; ?>" id="y_index" />
									<img src="/statics/image/zom.png" class="to_enlarge">
							</div>

							<label class="col-sm-2 control-label">z坐标：</label>
							<div class="col-sm-3">
								<?php echo $heal_info['z_index']; ?><input type="hidden" value="<?php echo $heal_info['z_index']; ?>" id="z_index" />
									<img src="/statics/image/zom.png" class="to_enlarge">
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
							<label class="col-sm-2 control-label">简介：</label>
							<div class="col-sm-8" id="introduce" title="<?php echo $heal_info['desc']; ?>">
								<?php echo $heal_info['desc']; ?>
							</div>
						</div>
						<br />
						
						<div class="form-group" >
							<div class="col-sm-8 col-sm-offset-2">
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
<script type="text/javascript" src="/statics/js/jingweidu.01.js"></script>
<script type="text/javascript" >
//点击获取经纬度事件
//参数是点选地图后产生POI的图片路径
$(function () {
    __jingweidu("/statics/image/poi/大厦.png","esu",$("#x_index"),$("#y_index"),$("#z_index"));
})
</script>
</html>