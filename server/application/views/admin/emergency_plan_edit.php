<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改预案</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>
<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>修改预案</h5>
	</div>
	<div class="ibox-content">
		<form method="post" action="/index.php/admin/emergency/edit_plan" enctype="multipart/form-data" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">预案名称：</label>
				<div class="col-sm-10">
					<input type="text" name="plan_name" value="<?php echo $plan['plan_name'];?>" class="form-control" style="width:300px;" required>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">发布单位：</label>
				<div class="col-sm-10">
					<select class="form-control m-b" style="height:35px;width:250px;" name="unit_id" required=''>
						<option value="">请选择</option>
						<?php foreach($bumen as $v){?>
							<option value="<?php echo $v['esu_id'];?>" <?php if($v['esu_id']==$plan['unit_id']){echo "selected";}?> ><?php echo $v['esu_name'];?></option>
						<?php }?>
					</select>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">预案等级：</label>
				<div class="col-sm-10">
					<select class="form-control m-b" style="height:35px;width:250px;" name="grade" required=''>
						<option value="">请选择</option>
						<?php foreach($plan_grade as $k=>$v){?>
							<option value="<?php echo $k;?>" <?php if($k==$plan['grade']){echo "selected";}?> ><?php echo $v;?></option>
						<?php }?>
					</select>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">应对事件类型：</label>
				<div class="col-sm-10">
					<select class="form-control m-b" style="height:35px;width:250px;" name="event_type" required=''>
						<option value="">请选择</option>
						<?php foreach($event_type as $k=>$v){?>
							<option value="<?php echo $k;?>" <?php if($k==$plan['event_type']){echo "selected";}?> ><?php echo $v;?></option>
						<?php }?>
					</select>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">定制日期：</label>
				<div class="col-sm-10">
					<input id="made_time" name="made_time" value="<?php echo $plan['made_time'];?>" readonly  class="laydate-icon form-control layer-date" required=''>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">最后修订日期：</label>
				<div class="col-sm-10">
					<input id="last_revised_time" name="last_revised_time" readonly value="<?php echo $plan['last_revised_time'];?>" class="laydate-icon form-control layer-date" required=''>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">负责人：</label>
				<div class="col-sm-10">
					<input type="text" name="principal" value="<?php echo $plan['principal'];?>" class="form-control" style="width:300px;" required>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">联系电话：</label>
				<div class="col-sm-10">
					 <input type="text" name="mobile" value="<?php echo $plan['mobile'];?>" class="form-control" style="width:300px;" required>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">附件：</label>
				<div class="col-sm-10">
					<input type="file" name="annex_aid">
					<?php if(!empty($plan['annex_aid'])){?><a href="/<?php echo $plan['annex_aid'];?>" target="_blank">点击查看附件</a><?php }?>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">描述：</label>
				<div class="col-sm-10">
					<textarea name="description" style="height:100px;width:500px;" required class="form-control"><?php echo $plan['description'];?></textarea>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-2">
					<input type="hidden" name="plan_id" value="<?php echo $plan['plan_id'];?>">
					<input class="btn btn-primary" name="dosubmit" type="submit" value="提交">
					<a href="/index.php/admin/emergency/plan" class="btn btn-primary">返回</a>
				</div>
			</div>
		</form>
	</div>
</div>
	<!-- layerDate plugin javascript -->
    <script src="/statics/js/plugins/layer/laydate/laydate.js"></script>
    <script>
        //外部js调用
        laydate({elem: '#made_time',event: 'focus'});
		laydate({elem: '#last_revised_time',event: 'focus'});
    </script>
</body>
</html>