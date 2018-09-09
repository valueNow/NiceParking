<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>景区信息</title>
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
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>景区信息</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">景区名称：</label>
							<div class="col-sm-3">
								澳门观光塔
							</div>
							<label class="col-sm-2 control-label">导游人数：</label>
							<div class="col-sm-3">
								3
							</div>
						</div>
						<div class="form-group">
							
							<label class="col-sm-2 control-label">位置：</label>
							<div class="col-sm-3">
								澳门特别行政区澳门观光塔
							</div>
							<label class="col-sm-2 control-label">填报单位：</label>
							<div class="col-sm-3">
								伟景行
							</div>
						</div>
						<div class="form-group">
							
							<label class="col-sm-2 control-label">时间：</label>
							<div class="col-sm-3">
								2017-05-11 13:22:49
							</div>
						</div>
						<div class="form-group" >
							<div class="col-sm-8 col-sm-offset-2">
								<a href="/index.php/res/Resources/res_list" ><input class="btn btn-primary" style="margin_right:2px;"     type="button" value="返回列表"></a>
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
</script>
</html>