<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改路线信息</title>
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
                        <h5>修改路线信息</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="/index.php/admin/emergecy_esu/update_esu" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">旅行社名称：</label>
							<div class="col-sm-3">
								<input type="text" name="esu_name" class="form-control" required   value="北京惠众旅行社">
							</div>
							<label class="col-sm-2 control-label">路线名称：</label>
							<div class="col-sm-3">
								<input type="text" name="director" class="form-control" required   value="春季特价上海迪士尼乐园狂欢巴士1日当地游">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">游玩天数：</label>
							<div class="col-sm-3">
								<input type="text" name="telephone" class="form-control" required value="1">
							</div>
							<label class="col-sm-2 control-label">开始日期：</label>
							<div class="col-sm-3">
								<input type="text" name="mobile" class="form-control" required value="2017-7-17">
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">结束日期：</label>
							<div class="col-sm-3">
								<input type="text" name="mobile" class="form-control" required value="2017-7-18">
							</div>					
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">简介：</label>
							<div class="col-sm-8">
								<textarea id="esu_desc" class="form-control" name="esu_desc" required="" aria-required="true">暑期亲子游：嗨翻迪士尼 迪士尼对孩子来说是梦幻般的王国，各种卡通人物，各种公主王子，在这里都可以与小朋友亲密邂逅。</textarea>
							</div>
						</div>
						<br />
						
						<div class="form-group" >
							<div class="col-sm-8 col-sm-offset-2">
								<input  id="submit" class="btn btn-primary" style="margin_right:40px;"  type="submit"    value="保存">
								<a href="/index.php/res/Resources/res_line"><input class="btn btn-primary" style="margin_right:2px;"     type="button" value="返回列表"></a>
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