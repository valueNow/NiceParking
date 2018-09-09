<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>值班信息详情</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>

<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>值班信息详情</h5>
	</div>
	<div class="ibox-content">
		<table class="table">
			<tbody>
				<tr>
					<td align='right'>单位：</td>
					<td colspan="3"><?php echo $duty['unit_id'];?></td>
				</tr>
				<tr>
					<td align='right' style="width:15%">值班人：</td>
					<td style="width:35%"><?php echo $duty['duty_name'];?></td>
					<td align='right' style="width:15%">值班人电话：</td>
					<td style="width:35%"><?php echo $duty['duty_mobile'];?></td>
				</tr>
				<tr>
					<td align='right'>值班点：</td>
					<td><?php echo $duty['duty_address'];?></td>
					<td align='right'>值班时间：</td>
					<td><?php echo $duty['duty_date'];?></td>
				</tr>
				<tr>
					<td align='right'>带班领导：</td>
					<td><?php echo $duty['leadership'];?></td>
					<td align='right'>领导电话：</td>
					<td><?php echo $duty['ship_mobile'];?></td>
				</tr>
				<tr>
					<td align='right'>备注：</td>
					<td colspan="3"><?php echo $duty['description'];?></td>
				</tr>
				<tr>
                	<td align='right'></td>
                	<td colspan="3"><a href="/index.php/admin/emergency/duty" class="btn btn-primary">返回列表</a></td>
                </tr>
			</tbody>
		</table>

	</div>
</div>
</body>
</html>