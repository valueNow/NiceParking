<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>视频监控详情</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
	<link href="/statics/css/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/infobox.css" rel="stylesheet">
    <style>
		 .to_enlarge{position:absolute;right:24px;top:0px;cursor:pointer;}
	</style>
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>
<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>视频监控详情</h5>
	</div>
	<div class="ibox-content">
		<form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">所属景点：</label>
				<div class="col-sm-3">
					<?php echo $video_monitor['spot_name'];?>
				</div>
				<label class="col-sm-2 control-label">视频监控类型：</label>
				<div class="col-sm-3">
					<?php echo $video_monitor['type_name'];?>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">视频监控名称：</label>
				<div class="col-sm-3">
					<?php echo $video_monitor['name'];?>
				</div>
				<label class="col-sm-2 control-label">x坐标：</label>
				<div class="col-sm-3">
					<?php echo $video_monitor['x_index'];?>
					<img src="/statics/image/zom.png" class="to_enlarge" onclick="sS()">
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">	
				<label class="col-sm-2 control-label">y坐标：</label>
				<div class="col-sm-3">
					<?php echo $video_monitor['y_index'];?>
					<img src="/statics/image/zom.png" class="to_enlarge" onclick="sS()">
				</div>
				<label class="col-sm-2 control-label">z坐标：</label>
				<div class="col-sm-3">
					<?php echo $video_monitor['z_index'];?>	
					<img src="/statics/image/zom.png" class="to_enlarge" onclick="sS()">
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">地理位置：</label>
				<div class="col-sm-10">
					<?php echo $video_monitor['address'];?>
				</div>
				<label class="col-sm-2 control-label">视频链接：</label>
				<div class="col-sm-3">
					<?php echo $video_monitor['url'];?>
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
                            	</li>
                            <?php } ?>
                        </ul>
                    </div>
                     <span class="lookImg-prev fa fa-angle-left"></span>
                     <span class="lookImg-next fa fa-angle-right"></span>
                     <?php endif;?>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">描述：</label>
				<div class="col-sm-10" title="<?php echo $video_monitor['desc'];?>" id="introduce">
					<?php echo $video_monitor['desc'];?>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-2">
					<a href="/index.php/admin/spot_video_monitor/index" class="btn btn-primary">返回列表</a>
				</div>
			</div>
		</form>
	</div>
</div>
<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
<script type="text/javascript" src="/statics/js/jingweidu.01.js"></script>
<script src="/statics/js/lookImg.js"></script>
<script type="text/javascript" >
//点击获取经纬度事件
//参数是点选地图后产生POI的图片路径
//$(function(){
//	  __jingweidu("/statics/image/poi/大厦.png","receive",$("#x_index"),$("#y_index"),$("#z_index"));
//})
</script>
</body>
</html>