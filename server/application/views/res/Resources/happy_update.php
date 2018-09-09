<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改农家乐信息</title>
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
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>修改农家乐信息</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="/index.php/admin/emergecy_esu/update_esu" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">农家乐名称：</label>
							<div class="col-sm-3">
								<input type="text" name="esu_name" class="form-control" required   value="玉凤农家院">
							</div>
							<label class="col-sm-2 control-label">等级：</label>
							<div class="col-sm-3">
								<input type="text" name="director" class="form-control" required   value="A">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">预订电话：</label>
							<div class="col-sm-3">
								<input type="text" name="telephone" class="form-control" required value="010-210032-2123">
							</div>
							<label class="col-sm-2 control-label">地址：</label>
							<div class="col-sm-3">
								<input type="text" name="mobile" class="form-control" required value="北京房山区十渡镇七渡村孤山寨风景区内">
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">简介：</label>
							<div class="col-sm-8">
								<textarea id="esu_desc" class="form-control" name="esu_desc" required="" aria-required="true">玉凤山水农家院（蓟县下营镇段庄村北店）地处石龙峡景区段庄村，这里不仅提供地道可口的农家饭菜，还提供停车场，更有各类活动区域，如烧烤区，垂钓区，采摘区等。周围景色秀丽，能够让宾客充分享受与自然近距离接触的舒适感,是一家主营汽车租赁的现代化公司,公司坐落于中国 北京 北京市 朝阳区 朝阳区 王四营马房寺368号</textarea>
							</div>
						</div>
						<br />
						
						<div class="form-group" >
							<div class="col-sm-8 col-sm-offset-2">
								<input  id="submit" class="btn btn-primary" style="margin_right:40px;"  type="submit"    value="保存">
								<a href="/index.php/res/Resources/res_happy"><input class="btn btn-primary" style="margin_right:2px;"     type="button" value="返回列表"></a>
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
<script type="text/javascript" >
    
</script>
</html>