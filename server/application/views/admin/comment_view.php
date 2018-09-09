<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>效果评估</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
		<div class="ibox-title">
			<h5>效果评估</h5>
		</div>
		<form method="post" action="/index.php/admin/emergency/evaluation" name="theForm" onsubmit="return check()">
			<table class="table table-hover" border="0" style="background-color:#fff">
				<tr>
					<td align='right'>用户名：</td>
					<td><input name="realname" type="text" value="<?php echo $_SESSION['realname'];?>" size="30" readonly="true" /></td>
				</tr>
				<tr>
					<td align='right'>评分：</td>
					<td><input name="rank" type="text" size="5" />&nbsp;&nbsp;&nbsp;&nbsp;注：1-10分</td>
				</tr>
				<tr>
					<td align='right'>评估内容：</td>
					<td><textarea name="content" id="content" cols="50" rows="4" wrap="VIRTUAL"></textarea></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
					<input name="submit" type="submit" value=" 确定 " class="button">
					<input type="reset" value=" 返回 " onclick="ons('<?php echo $event_id;?>')" class="button">
					<input type="hidden" name="plan_id" value="<?php echo $plan_id;?>">
					<input type="hidden" name="event_id" value="<?php echo $event_id;?>">
					</td>
				</tr>
			</table>
		</form>
    </div>
	<script src="/statics/js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript">
		function check(){
			if($("#content").val()==''){
				alert("请填写评估内容");
				return false;
			}
		}
		function ons(event_id){
			window.location.href="/index.php/admin/emergency/view_event/"+event_id; 
		}
	</script>
</body>
</html>