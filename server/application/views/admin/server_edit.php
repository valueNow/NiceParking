<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加服务器</title>
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
                        <h5>修改服务器</h5>
                    </div>
					<form method="post"  id="form_info" action="/index.php/admin/monitor/server_edit" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">名称：</label>
							<div class="col-sm-3">
								<input type="text" name="name" class="form-control" required value="<?php echo $ser['name'];?>">
							</div>

							<label class="col-sm-2 control-label">IP：</label>
							<div class="col-sm-3">
								<input type="text" name="ip" class="form-control" required value="<?php echo $ser['ip'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">端口号：</label>
							<div class="col-sm-3">
								<input type="text" name="port" class="form-control" required value="<?php echo $ser['port'];?>">
							</div>

							<label class="col-sm-2 control-label">负责人：</label>
							<div class="col-sm-3">
								<input type="text" name="principal" class="form-control" required value="<?php echo $ser['principal'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">手机号：</label>
							<div class="col-sm-3">
								<input type="text" name="mobile" class="form-control" required value="<?php echo $ser['mobile'];?>">
							</div>

							<label class="col-sm-2 control-label">状态：</label>
							<div class="col-sm-3">	
								<input type="radio" name="status" <?php if($ser['status']==0){echo "checked";}?> value="0" />禁用 
								<input type="radio" name="status" <?php if($ser['status']==1){echo "checked";}?> value="1" />启用 
							</div>
						</div>
						<div class="form-group" >
							<div class="col-sm-4 col-sm-offset-2">
								<input type="hidden" name="id" value="<?php echo $ser['id'];?>">
								<input  id="submit" class="btn btn-primary" style="margin_right:40px;" type="submit" value="保存">
								<a href="/index.php/admin/monitor/server_list" class="btn btn-primary">返回列表</a>
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>