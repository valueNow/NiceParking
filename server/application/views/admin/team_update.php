<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改队伍信息</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
	<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
	<script src="/statics/js/plugins/validate/jquery.validate.min.js"></script>
	<script src="/statics/js/plugins/validate/messages_zh.min.js"></script>
	<script src="/statics/js/plugins/validate/validateExtend.js"></script>
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>修改队伍信息</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="/index.php/admin/emergecy_team/update_team" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">队伍名称：</label>
							<div class="col-sm-3">
								<input type="text" name="team_name" class="form-control" required   value="<?php echo $team_info['team_name']; ?>">
							</div>
							<label class="col-sm-2 control-label">负责人：</label>
							<div class="col-sm-3">
								<input type="text" name="director" class="form-control" required   value="<?php echo $team_info['director']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">所属单位：</label>
							<div class="col-sm-3">
								<select name="esu_id"  id="esu_id" class="form-control" style="width:100%;height:30px;"   required>
									<?php foreach($esu_arr as $k=>$v){ ?>
										<option value="<?php echo $k;?>" <?php if($k == $team_info['esu_id']): ?>selected<?php endif; ?> ><?php echo $v;?></option>
									<?php } ?>
								</select>
							</div>
							<label class="col-sm-2 control-label">队伍类型：</label>
							<div class="col-sm-3">
								<select name="team_type"  id="team_type" class="form-control" style="width:100%;height:30px;"   required>
									<?php foreach($team_type as $k=>$v){ ?>
										<option value="<?php echo $k;?>"  <?php if($k == $team_info['team_type']): ?>selected<?php endif; ?> ><?php echo $v;?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">座机号：</label>
							<div class="col-sm-3">
								<input type="text" name="telephone" class="form-control" required value="<?php echo $team_info['telephone']; ?>">
							</div>
							<label class="col-sm-2 control-label">手机号：</label>
							<div class="col-sm-3">
								<input type="text" name="mobile" class="form-control" required value="<?php echo $team_info['mobile']; ?>">
							</div>
							
						</div>
						<div class="form-group">
							
							<label class="col-sm-2 control-label">地理位置：</label>
							<div class="col-sm-3">
								<input type="text" name="address" class="form-control" required value="<?php echo $team_info['address']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">状态：</label>
							<div class="col-sm-3">	
								<input type="radio" name="status" value="0" <?php if($team_info['status'] == 0):?>checked<?php endif; ?>/>禁用 
								<input type="radio" name="status" value="1" <?php if($team_info['status'] == 1):?>checked<?php endif; ?>/>启用 
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">简介：</label>
							<div class="col-sm-8">
								<textarea id="team_desc" class="form-control" name="team_desc" required="" aria-required="true"><?php echo $team_info['team_desc']; ?></textarea>
							</div>
						</div>
						<br />
						
						<div class="form-group" >
							<div class="col-sm-8 col-sm-offset-2">
								<input type="hidden" value="<?php echo $team_info['team_id'];?>" name="team_id">
								<input  id="submit" class="btn btn-primary" style="margin_right:40px;" type="submit"    value="保存">
								<a href="<?php echo site_url('admin/emergecy_team/index'); ?>"><input class="btn btn-primary" style="margin_right:2px;"     type="button" value="返回列表"></a>
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