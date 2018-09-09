<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改菜单</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/statics/css/base.css"/> 
    <link rel="stylesheet" type="text/css" href="/statics/css/index.css"/>
	<link rel="stylesheet" type="text/css" href="/statics/css/jquery.bigcolorpicker.css" />
	<script type="text/javascript" src="/statics/js/jquery-1.7.1.min.js"></script>
</head>

<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>修改菜单</h5>
	</div>
	<div class="ibox-content">
		<form method="post" action="/index.php/admin/menu/edit_menu" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">上级菜单：</label>
				<div class="col-sm-3">
					<select class="form-control m-b" name="parentid">
						<option value="0">作为一级菜单</option>
						<?php echo $str;?>
					</select>
				</div>

				<label class="col-sm-2 control-label">菜单名：</label>
				<div class="col-sm-3">
					<input type="text" name="name" value="<?php echo $menu['name'];?>" class="form-control">
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">模块名：</label>

				<div class="col-sm-3">
					<input type="text" name="m" value="<?php echo $menu['m'];?>" class="form-control" >
				</div>

				<label class="col-sm-2 control-label">文件名：</label>
				<div class="col-sm-3">
					<input type="text" name="c" value="<?php echo $menu['c'];?>" class="form-control" >
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">方法名：</label>
				<div class="col-sm-3">
					<input type="text" name="a" value="<?php echo $menu['a'];?>" class="form-control">
				</div>

			<script type="text/javascript" src="/statics/js/jquery.bigcolorpicker.min.js"></script>
			<script type="text/javascript">
				$(function(){
					$("#btncolor").bigColorpicker("color");
				});
			</script>

				<label class="col-sm-2 control-label">背景色：</label>
				<div class="col-sm-3">
					<input type="text" value="<?php echo $menu['color'];?>" name="color" id="color" class="form-control" style="width:280px;float:left;margin-right:10px">
					<input id="btncolor" type="button" value="选色" style="background:#0b577b;padding:5px;border:none;border-radius:2px" />
				</div>
			</div>

			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label class="col-sm-2 control-label">附加参数：</label>

				<div class="col-sm-3">
					<input type="text" name="data" value="<?php echo $menu['data'];?>" class="form-control">
				</div>

				<label class="col-sm-2 control-label">是否显示菜单：</label>
				<div class="col-sm-3">
					<div class="radio">
						<label><input type="radio" <?php if($menu['display']==1){echo "checked";}?> value="1" name="display">是</label>
						<label><input type="radio" <?php if($menu['display']==0){echo "checked";}?> value="0" name="display">否</label>
					</div>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
            <div class="form-group">
            	<label class="col-sm-2 control-label">系统图标：</label>
            	<div class="col-sm-10">
            	<?php if(empty($menu['img'])){$menu['img'] = '/statics/image/upload-pic.png';$img='';}else{$img=$menu['img'];}?>
            		<a class="lcon"><img width="60px" height="60px" src="<?php echo $menu['img'];?>" id="img"></a>
            		<input type="hidden" name="img" id="imgurl" value="<?php echo $img;?>">
            	</div>
            </div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-2">
					<input type="hidden" name="menu_id" value="<?php echo $menu['menu_id'];?>">
					<input class="btn btn-primary" type="submit" value="提交">
					<a href="/index.php/admin/menu/init" class="btn btn-primary ">返回列表</a>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="round_Icon">
	<ul class="round_Icon_s">
		<li>
		<?php foreach($imgurl as $k=>$v){?>
			<p><img src="/<?php echo $v;?>" ><em></em></p>
			<?php if(($k+1)%10==0 &&($k+1)!=count($imgurl)){echo "</li><li>";}?>
		<?php }?>
		</li>
	</ul>
	<div class="btnl">
		<a href="javascript:;" class="Dmine">确定</a>
		<a href="javascript:;" class="cancel">取消</a>
	</div>
	<div class="dele"></div>
</div>
<div class="bmapn"></div>
<script type="text/javascript">
	$(function(){
		//菜单图标显示
		$(".lcon").on("click",function(){
			$(".round_Icon").show();
			$(".bmapn").show();
		});
		//菜单图标隐藏
		$(".dele").on("click",function(){
			$(".round_Icon").hide();
			$(".bmapn").hide();
		});
		$(".Dmine").on("click",function(){
			var url = $(".selected").children("img:eq(0)").attr('src');
			$('#img').attr('src',url);
			$('#imgurl').val(url);
			$(".round_Icon").hide();
			$(".bmapn").hide();
		});
		$(".cancel").on("click",function(){
			$(".round_Icon").hide();
			$(".bmapn").hide();
		});
//		图标选中
		$(".round_Icon_s li p").on("click",function(){
		if($(this).hasClass("selected")){
			$(this).removeClass("selected");
		}else{
			$(".round_Icon_s li p").removeClass("selected");
			$(this).addClass("selected");
		}
	});
	});
</script>
</body>
</html>