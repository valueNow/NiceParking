<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增专家</title>
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
                        <h5>新增专家</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="/index.php/admin/emergecy_person/add_person" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">专家姓名：</label>
							<div class="col-sm-3">
								<input type="text" name="person_name" class="form-control" required   value="">
							</div>
							<label class="col-sm-2 control-label">性别：</label>
							<div class="col-sm-3">
								<input type="radio" name="sex" value="1" checked/>男 
								<input type="radio" name="sex" value="2" />女 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">所属队伍：</label>
							<div class="col-sm-3">
								<select name="team_id"  id="team_id" class="form-control" style="width:100%;height:30px;line-height:30px;font-size:12px;"   required>
									<?php foreach($team_arr as $k=>$v){ ?>
										<option value="<?php echo $k;?>"><?php echo $v;?></option>
									<?php } ?>
								</select>
							</div>
							<label class="col-sm-2 control-label">人员类型：</label>
							<div class="col-sm-3">
								<select name="eg_type" class="form-control" id="team_type" style="width:100%;height:30px;line-height:30px;font-size:12px;"   required>
									<?php foreach($event_type as $k=>$v){ ?>
										<option value="<?php echo $k;?>"><?php echo $v;?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">年龄：</label>
							<div class="col-sm-3">
								<input type="text" name="age" class="form-control" required value="">
							</div>
							<label class="col-sm-2 control-label">手机号：</label>
							<div class="col-sm-3">
								<input type="text" name="mobile" class="form-control" required value="">
							</div>
							
						</div>
						<div class="form-group">
							
							<label class="col-sm-2 control-label">家人号码：</label>
							<div class="col-sm-3">
								<input type="text" name="family_phone" class="form-control" required value="">
							</div>
						</div>
						<div class="form-group" >
							<div class="col-sm-8 col-sm-offset-2">
								<input  id="submit" class="btn btn-primary" style="margin_right:40px;" type="submit"    value="保存">
								<a href="<?php echo site_url('admin/emergecy_person/index'); ?>"><input class="btn btn-primary" style="margin_right:2px;"     type="button" value="返回列表"></a>
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