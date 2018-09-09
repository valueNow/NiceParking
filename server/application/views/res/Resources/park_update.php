<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改停车场信息</title>
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
                        <h5>修改停车场信息</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="/index.php/admin/emergecy_esu/update_esu" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">停车场名称：</label>
							<div class="col-sm-3">
								<input type="text" name="esu_name" class="form-control" required   value="青松大厦停车场">
							</div>
							<label class="col-sm-2 control-label">车位数：</label>
							<div class="col-sm-3">
								<input type="text" name="director" class="form-control" required   value="700">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">地址：</label>
							<div class="col-sm-3">
								<input type="text" name="telephone" class="form-control" required value="澳门青松大厦">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">简介：</label>
							<div class="col-sm-8">
								<textarea id="esu_desc" class="form-control" name="esu_desc" required="" aria-required="true">澳门青松大厦停车场位于澳门轻松大厦，其最多可容纳700辆车</textarea>
							</div>
						</div>
						<br />
						
						<div class="form-group" >
							<div class="col-sm-8 col-sm-offset-2">
								<input  id="submit" class="btn btn-primary" style="margin_right:40px;"  type="submit"    value="保存">
								<a href="/index.php/res/Resources/res_parking"><input class="btn btn-primary" style="margin_right:2px;"     type="button" value="返回列表"></a>
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