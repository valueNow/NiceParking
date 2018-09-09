<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改商品信息</title>
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
                        <h5>修改商品信息</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="/index.php/admin/emergecy_esu/update_esu" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">商品名称：</label>
							<div class="col-sm-3">
								<input type="text" name="esu_name" class="form-control" required   value="青花瓷">
							</div>
							<label class="col-sm-2 control-label">省：</label>
							<div class="col-sm-3">
								<input type="text" name="director" class="form-control" required   value="江西">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">市：</label>
							<div class="col-sm-3">
								<input type="text" name="telephone" class="form-control" required value="景德镇">
							</div>
							<label class="col-sm-2 control-label">商品类型：</label>
							<div class="col-sm-3">
								<input type="text" name="mobile" class="form-control" required value="工艺品">
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">参考价格：</label>
							<div class="col-sm-3">
								<input type="text" name="mobile" class="form-control" required value="700">
							</div>
							
							<label class="col-sm-2 control-label">填报单位：</label>
							<div class="col-sm-3">
								<input type="text" name="address" class="form-control" required value="伟景行">
							</div>							
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">简介：</label>
							<div class="col-sm-8">
								<textarea id="esu_desc" class="form-control" name="esu_desc" required="" aria-required="true">青花瓷又称白地青花瓷，常简称青花，中华陶瓷烧制工艺的珍品。是中国瓷器的主流品种之一，属釉下彩瓷。青花瓷是用含氧化钴的钴矿为原料，在陶瓷坯体上描绘纹饰，再罩上一层透明釉，经高温还原焰一次烧成。钴料烧成后呈蓝色，具有着色力强、发色鲜艳、烧成率高、呈色稳定的特点。原始青花瓷于唐宋已见端倪，成熟的青花瓷则出现在元代景德镇的湖田窑。明代青花成为瓷器的主流。清康熙时发展到了顶峰。明清时期，还创烧了青花五彩、孔雀绿釉青花、豆青釉青花、青花红彩、黄地青花、哥釉青花等衍生品种。</textarea>
							</div>
						</div>
						<br />
						
						<div class="form-group" >
							<div class="col-sm-8 col-sm-offset-2">
								<input  id="submit" class="btn btn-primary" style="margin_right:40px;"  type="submit"    value="保存">
								<a href="/index.php/res/Resources/res_commodity"><input class="btn btn-primary" style="margin_right:2px;"     type="button" value="返回列表"></a>
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