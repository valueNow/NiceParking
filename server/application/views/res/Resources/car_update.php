<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改汽车公司信息</title>
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
                        <h5>修改汽车公司信息</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="/index.php/admin/emergecy_esu/update_esu" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">汽车公司名称：</label>
							<div class="col-sm-3">
								<input type="text" name="esu_name" class="form-control" required   value="北京新月旅游汽车公司">
							</div>
							<label class="col-sm-2 control-label">所属市：</label>
							<div class="col-sm-3">
								<input type="text" name="director" class="form-control" required   value="北京">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">详细地址：</label>
							<div class="col-sm-3">
								<input type="text" name="telephone" class="form-control" required value="朝阳区王四营马房寺368号">
							</div>
							<label class="col-sm-2 control-label">联系电话：</label>
							<div class="col-sm-3">
								<input type="text" name="mobile" class="form-control" required value="010-010-84903477">
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">填报单位：</label>
							<div class="col-sm-3">
								<input type="text" name="address" class="form-control" required value="伟景行">
							</div>		
							
							<label class="col-sm-2 control-label">时间：</label>
							<div class="col-sm-3">
								<input type="text" name="address" class="form-control" required value="2017-05-11 13:22:49">
							</div>							
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">简介：</label>
							<div class="col-sm-8">
								<textarea id="esu_desc" class="form-control" name="esu_desc" required="" aria-required="true">北京新月旅游汽车公司成立于1983年,是一家主营汽车租赁的现代化公司,公司坐落于中国 北京 北京市 朝阳区 朝阳区 王四营马房寺368号</textarea>
							</div>
						</div>
						<br />
						
						<div class="form-group" >
							<div class="col-sm-8 col-sm-offset-2">
								<input  id="submit" class="btn btn-primary" style="margin_right:40px;"  type="submit"    value="保存">
								<a href="/index.php/res/Resources/res_car"><input class="btn btn-primary" style="margin_right:2px;"     type="button" value="返回列表"></a>
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