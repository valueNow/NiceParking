<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>信息接报详情</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
    	<style>
		 .to_enlarge{right:24px;top:7px;cursor:pointer;}</style>
</head>

<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>信息接报详情</h5>
	</div>
	<div class="ibox-content">
		<table class="table">
			<tbody>
				<tr>
					<td align='right' style="width:10%">信息名称：</td>
					<td style="width:30%"><?php echo $rec['rec_name'];?></td>
					<td align='right' style="width:15%">时间：</td>
					<td style="width:45%"><?php echo date('Y-m-d H:i:s',$rec['rec_time']);?></td>
				</tr>
				<tr>
					<td align='right'>报送人：</td>
					<td><?php echo $rec['send_someone'];?></td>
					<td align='right'>报送人联系方式：</td>
					<td><?php echo $rec['mobile'];?></td>
				</tr>
				<tr>
					<td align='right'>信息来源：</td>
					<td><?php echo $rec['source'];?></td>
					<td align='right'>接报人：</td>
					<td><?php echo $rec['receiver'];?></td>
				</tr>
				<tr>
					<td align='right'>x坐标：</td>
					<td><?php echo $rec['x_index'];?>
						
								<input type="hidden" value="<?php echo $rec['x_index']; ?>" id="x_index" />
									<img src="/statics/image/zom.png" class="to_enlarge">
					</td>
					<td align='right'>y坐标：</td>
					<td><?php echo $rec['y_index'];?>
						
								<input type="hidden" value="<?php echo $rec['y_index']; ?>" id="y_index" />
									<img src="/statics/image/zom.png" class="to_enlarge">
					</td>
				</tr>
				<tr>
					<td align='right'>z坐标：</td>
					<td><?php echo $rec['z_index'];?>
						
								<input type="hidden" value="<?php echo $rec['z_index']; ?>" id="z_index" />
									<img src="/statics/image/zom.png" class="to_enlarge">
					</td>
					<td align='right'>配图：</td>
					<td><?php if(!empty($rec['img_url'])){?><a href="/<?php echo $rec['img_url'];?>" target="_blank">点击查看</a><?php } ?></td>
				</tr>
				<tr>
					<td align='right'>地理位置：</td>
					<td colspan="3"><?php echo $rec['address'];?></td>
				</tr>
				<tr>
					<td align='right'>描述：</td>
					<td colspan="3"><?php echo $rec['description'];?></td>
				</tr>
				<tr>
                	<td align='right'></td>
                	<td colspan="3"><a href="/index.php/admin/emergency/received" class="btn btn-primary">返回列表</a></td>
                </tr>
			</tbody>
		</table>

	</div>
</div>
</body>
</html>
<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
<script type="text/javascript" src="/statics/js/jingweidu.01.js"></script>
<script type="text/javascript" >
//点击获取经纬度事件
//参数是点选地图后产生POI的图片路径
$(function () {
    __jingweidu("/statics/image/poi/大厦.png","esu",$("#x_index"),$("#y_index"),$("#z_index"));
})
</script>