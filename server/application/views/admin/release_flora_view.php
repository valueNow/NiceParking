<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>动植物资源详情</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
    <link href="/statics/css/infobox.css" rel="stylesheet">
</head>
<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>动植物资源详情</h5>
	</div>
	<div class="ibox-content">
		<form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">动植物分类：</label>
				<div class="col-sm-3">
					<?php echo $flora['type_id'];?>
				</div>
				<label class="col-sm-2 control-label">所属景点：</label>
				<div class="col-sm-3">
					<?php echo $flora['sp_id'];?>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">编号：</label>
				<div class="col-sm-3">
					<?php echo $flora['numbering'];?>
				</div>
				<label class="col-sm-2 control-label">数量：</label>
				<div class="col-sm-3">
					<?php echo $flora['num'];?>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">标题：</label>
				<div class="col-sm-3">
					<?php echo $flora['title'];?>
				</div>
			</div>
			
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">描述：</label>
				<div class="col-sm-8" id="introduce" title="<?php echo $flora['description'];?>">
					<?php echo $flora['description'];?>
				</div>
			</div>

			<div class="hr-line-dashed"></div>
			<div class="form-group">
			<input type="hidden" style="width:100%;border-style:none;" id="lstPoint" name="lstPoint">
			<label class="col-sm-2 control-label">路线信息：</label>
			<div class="col-sm-8">
				<div class="checkbox" name="spot_ids">
					<table class="table table-striped table-bordered table-hover display nowrap"  cellspacing="0" width="100%" id="editable">
						<thead>
							<tr>
								<th>经度</th>
								<th>纬度</th>
								<th>高度</th>
							</tr>
						</thead>
						<?php foreach($ass as $val): ?>
						<tr>
							<td><?php echo $val['x']; ?></td>
							<td><?php echo $val['y']; ?></td>
							<td><?php echo $val['z']; ?></td>
						</tr>
						<?php endforeach; ?>
					</table>
					<p><button type="button"  onclick="__jingweidupanelLook()"  class="small-button">查看区域</button></p>
				</div>
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
				<label class="col-sm-2 control-label">视频：</label>
				<div class="col-sm-10">
					<?php foreach($video as $v){?>
						<?php echo $v['file_name'];?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/<?php echo $v['file_url'];?>" target="_blank">点击(查看/下载)</a><br />
					<?php } ?>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-2">
					<a href="/index.php/admin/release/floralist" class="btn btn-primary">返回列表</a>
				</div>
			</div>
		</form>
	</div>
</div>
<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
<script type="text/javascript" src="/statics/js/jingweidu.01.js"></script>
<script src="/statics/js/lookImg.js"></script>
<script>
	var jsonresult='<?php echo $lstPoint;?>';
	jsonresult=JSON.parse(jsonresult);
	$("#lstPoint").val(JSON.stringify(jsonresult));
</script>
</body>
</html>