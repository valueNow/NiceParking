<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>队伍信息</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
    <link href="/statics/css/infobox.css" rel="stylesheet">	
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
                        <h5>队伍信息</h5>
                    </div>
					<form method="post"  id="form_info"  onsubmit="return dosubmit();"  action="/index.php/admin/emergecy_team/update_team" class="form-horizontal" enctype="multipart/form-data">
                    <div class="ibox-content">
						<div class="form-group">
							<label class="col-sm-2 control-label">队伍名称：</label>
							<div class="col-sm-3">
								<?php echo $team_info['team_name']; ?>
							</div>
							<label class="col-sm-2 control-label">负责人：</label>
							<div class="col-sm-3">
								<?php echo $team_info['director']; ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">所属单位：</label>
							<div class="col-sm-3">
								<?php echo $esu_arr[$team_info['esu_id']]; ?>
							</div>
							<label class="col-sm-2 control-label">队伍类型：</label>
							<div class="col-sm-3">
							<?php echo $team_type[$team_info['team_type']]; ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">座机号：</label>
							<div class="col-sm-3">
								<?php echo $team_info['telephone']; ?>
							</div>
							<label class="col-sm-2 control-label">手机号：</label>
							<div class="col-sm-3">
								<?php echo $team_info['mobile']; ?>
							</div>
							
						</div>
						<div class="form-group">
							
							<label class="col-sm-2 control-label">地理位置：</label>
							<div class="col-sm-6">
								<?php echo $team_info['address']; ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">状态：</label>
							<div class="col-sm-3">	
								<?php if($team_info['status'] == 0): ?>禁用<?php else: ?>启用<?php endif; ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">简介：</label>
							<div class="col-sm-8" id="introduce" title="<?php echo $team_info['team_desc']; ?>">
								<?php echo $team_info['team_desc']; ?>
							</div>
						</div>
						<br />
						
						<div class="form-group" >
							<div class="col-sm-8 col-sm-offset-2">
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