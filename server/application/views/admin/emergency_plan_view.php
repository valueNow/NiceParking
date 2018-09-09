<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>预案管理详情</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>

<body >
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="ibox-title">
		<h5>预案管理详情</h5>
	</div>
	<table class="table">
		<tbody>
			<tr>
				<td align='right' style="width:15%">预案名称：</td>
				<td style="width:35%"><?php echo $plan['plan_name'];?></td>
				<td align='right' style="width:15%">发布单位：</td>
				<td style="width:35%"><?php echo $plan['unit_id'];?></td>
			</tr>
			<tr>
				<td align='right'>预案等级：</td>
				<td><?php echo $plan_grade[$plan['grade']];?></td>
				<td align='right'>应对事件类型：</td>
				<td><?php echo $event_type[$plan['event_type']];?></td>
			</tr>
			<tr>
				<td align='right'>预案定制日期：</td>
				<td><?php echo $plan['made_time'];?></td>
				<td align='right'>预案最后修订日期：</td>
				<td><?php echo $plan['last_revised_time'];?></td>
			</tr>
			<tr>
				<td align='right'>负责人：</td>
				<td><?php echo $plan['principal'];?></td>
				<td align='right'>联系电话：</td>
				<td><?php echo $plan['mobile'];?></td>
			</tr>
			<tr>
				<td align='right'>审批状态：</td>
				<td><?php echo $plan['status'];?></td>
				<td align='right'>审批人：</td>
				<td><?php echo $plan['approver'];?></td>
			</tr>
			<tr>
				<td align='right'>附件：</td>
				<td colspan="3"><?php if(!empty($plan['annex_aid'])){?><a href="/<?php echo $plan['annex_aid'];?>" target="_blank">点击查看附件</a><?php } ?></td>
			</tr>
			<tr>
				<td align='right'>描述：</td>
				<td colspan="3"><?php echo $plan['description'];?></td>
			</tr>
			<?php if($sa == "approval"){?>
			<tr>
				<td align='center' colspan="4">
					<a href="/index.php/admin/emergency/view_plan?plan_id=<?php echo $plan['plan_id'];?>&status=1" class="btn btn-primary">通过审批</a>
					<a href="/index.php/admin/emergency/view_plan?plan_id=<?php echo $plan['plan_id'];?>&status=2" class="btn btn-primary">未通过审批</a>
				</td>
			</tr>
			<?php }?>
			<tr>
            	<td align='right'></td>
            	<td colspan="3">	<a href="/index.php/admin/emergency/plan" class="btn btn-primary" style="margin:20px 0">返回列表</a></td>
            </tr>
		</tbody>
	</table>
	<?php if(!empty($eval)){ ?>
	<div class="ibox-title">
		<h5>效果评估</h5>
	</div>
	<table class="table table-bordered" style="background-color:#fff">
	<?php foreach($eval as $v){ ?>
		<tr>
			<td><a><b><?php echo $v['username'];?></b></a>&nbsp;于&nbsp;<?php echo date('Y-m-d H:i:s',$v['add_time']);?>&nbsp;&nbsp;发表评估</td>
		</tr>
		<tr>
			<td><div><?php echo $v['content'];?></div><div align="right"><b>评分：</b> <?php echo $v['rank'];?>&nbsp;&nbsp;</div></td>
		</tr>
	<?php } ?>
	</table>
	<?php } ?>
</div>
</body>
</html>