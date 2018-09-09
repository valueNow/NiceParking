<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>发布规章制度</title>
    <link rel="shortcut icon" href="/favicon.ico">
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>发布规章制度</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post"  class="form-horizontal" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">标题：</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" style="width:300px;">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
							<div class="form-group">
                                <label class="col-sm-2 control-label">描述：</label>
                                <div class="col-sm-10">
									<textarea name="description" style="width:300px;" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
							<div class="form-group">
                                <label class="col-sm-2 control-label">负责人：</label>
                                <div class="col-sm-10">
                                    <input type="text" name="principal" class="form-control" style="width:200px;">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
							<div class="form-group">
                                <label class="col-sm-2 control-label">联系电话：</label>
                                <div class="col-sm-10">
                                    <input type="text" name="mobile" class="form-control" style="width:200px;">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
							<div class="form-group">
                                <label class="col-sm-2 control-label">附件：</label>
                                <div class="col-sm-10">
									<input type="file" name="annex" />
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <input class="btn btn-primary" type="submit" value="提交">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>