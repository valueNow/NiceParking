<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>查看专家详情</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
    <link rel="stylesheet" href="/statics/css/infobox.css" />
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>查看专家详情</h5>
                    </div>
					<form method="post"  id="form_info"  action="" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">专家姓名：</label>
							<div class="col-sm-3">
								<?php echo $person_info['person_name']; ?>
							</div>
							<label class="col-sm-2 control-label">性别：</label>
							<div class="col-sm-3">
								<?php if($person_info['sex'] == 1){echo "男";}else{echo "女";} ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">所属队伍：</label>
							<div class="col-sm-3">
								<?php echo $person_info['team_id']; ?>
							</div>
							<label class="col-sm-2 control-label">人员类型：</label>
							<div class="col-sm-3">
								<?php echo $person_info['eg_type']; ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">年龄：</label>
							<div class="col-sm-3">
								<?php echo $person_info['age']; ?>
							</div>
							<label class="col-sm-2 control-label">手机号：</label>
							<div class="col-sm-3">
								<?php echo $person_info['mobile']; ?>
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">家人号码：</label>
							<div class="col-sm-6">
								<?php echo $person_info['family_phone']; ?>
							</div>
						</div>
						<div class="form-group" >
							<div class="col-sm-8 col-sm-offset-2">
								<a href="/index.php/admin/emergecy_person/index" id="closeZj"><input class="btn btn-primary" style="margin_right:2px;"     type="button" value="返回列表"></a>
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