<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>事件信息详情</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
    	<style>
		 .to_enlarge{right:24px;top:7px;cursor:pointer;}</style>
</head>

<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>事件信息详情</h5>
	</div>
	<div class="ibox-content">
		<table class="table">
			<tbody>
				<tr>
					<td align='right' style="width:10%">事件名称：</td>
					<td style="width:30%"><?php echo $event['event_name'];?></td>
					<td align='right' style="width:15%">使用预案：</td>
					<td style="width:45%"><?php echo $event['plan_name'];?>&nbsp;&nbsp;&nbsp;&nbsp;
					<?php if($event['is_eval']=="0" && $event['userid']==$_SESSION['user_id'] && $event['plan_id']!="0"){?>
						<a href="/index.php/admin/emergency/evaluation?plan_id=<?php echo $event['plan_id'];?>&event_id=<?php echo $event['event_id'];?>" class="btn btn-primary">效果评估</a>
					<?php }?>
					</td>
				</tr>
				<tr>
					<td align='right'>事件类型：</td>
					<td><?php echo $event['event_type'];?></td>
					<td align='right'>负责单位：</td>
					<td><?php echo $event['charge_unit'];?></td>
				</tr>
				<tr>
					<td align='right'>发生时间：</td>
					<td><?php echo date('Y-m-d H:i:s',$event['occur_time']);?></td>
					<td align='right'>处置时间：</td>
					<td><?php echo date('Y-m-d H:i:s',$event['end_time']);?></td>
				</tr>
				<tr>
					<td align='right'>负责人：</td>
					<td><?php echo $event['reporter'];?></td>
					<td align='right'>联系方式：</td>
					<td><?php echo $event['mobile'];?></td>
				</tr>
				<tr>
					<td align='right'>x坐标：</td>
					<td><?php echo $event['x_index'];?>	<input type="hidden" value="<?php echo $event['x_index']; ?>" id="x_index" />
									<img src="/statics/image/zom.png" class="to_enlarge"></td>
					<td align='right'>y坐标：</td>
					<td><?php echo $event['y_index'];?>	<input type="hidden" value="<?php echo $event['y_index']; ?>" id="y_index" />
									<img src="/statics/image/zom.png" class="to_enlarge"></td>
				</tr>
				<tr>
					<td align='right'>z坐标：</td>
					<td><?php echo $event['z_index'];?>	<input type="hidden" value="<?php echo $event['z_index']; ?>" id="z_index" />
									<img src="/statics/image/zom.png" class="to_enlarge"></td>
					<td align='right'>配图：</td>
					<td><?php if(!empty($event['img_url'])){?><a href="/<?php echo $event['img_url'];?>" target="_blank">点击查看</a><?php } ?></td>
				</tr>
				<tr>
					<td align='right'>地理位置：</td>
					<td><?php echo $event['address'];?></td>
					<td align='right'>已造成后果：</td>
                    <td><?php echo $event['aftermath'];?></td>
				</tr>
				<tr>
					<td align='right'>已采取措施：</td>
					<td><?php echo $event['measures'];?></td>
				</tr>
				<tr>
					<td align='right'>描述：</td>
					<td colspan="3"><?php echo $event['description'];?></td>
				</tr>
				<tr>
                	<td align='right'></td>
                	<td colspan="3">
                	    <a href="/index.php/admin/emergency/event" class="btn btn-primary">返回列表</a>
                	</td>
                </tr>
			</tbody>
		</table>

	</div>
</div>
</body>
</html><script src="/statics/js/jquery.min.js?v=2.1.4"></script>
<script type="text/javascript" src="/statics/js/jingweidu.01.js"></script>
<script type="text/javascript" >
//点击获取经纬度事件
//参数是点选地图后产生POI的图片路径
$(function () {
    __jingweidu("/statics/image/poi/大厦.png","esu",$("#x_index"),$("#y_index"),$("#z_index"));
})
</script>