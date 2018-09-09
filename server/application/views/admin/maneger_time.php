<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>信息发布</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
	<link rel="stylesheet" href="/statics/css/time.css"/>
</head>

<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>信息发布</h5>
	</div>
	<div class="container container1">
		<a href="/index.php/admin/release/maneger_video" class="btn btn-primary">+ 视频</a>
		<a href="/index.php/admin/release/maneger_img" class="btn btn-primary">+ 图片</a>
		<a href="/index.php/admin/release/maneger_flora" class="btn btn-primary">+ 动植物</a>
	</div>
<form method="post" action="/index.php/admin/release/maneger_order" class="form-horizontal">
	<div class="ibox-content timeline">
		<?php foreach($maneger as $k=>$v){ ?>
		<div class="timeline-item">
			<div class="row">
				<div class="col-xs-4 date">
					<small class="text-navy"><?php echo $v['duration'];?> 分钟</small>
				</div>
				<div class="col-xs-10 content col-box <?php if($k==0){?>no-top-border<?php }?>">
					<p class="m-b-xs"><strong><?php echo $v['name'];?></strong></p>
					<p><?php echo $v['description'];?></p>
					<a href="javascript:if(confirm('确实要删除吗?'))location='/index.php/admin/release/del_maneger_time/<?php echo $v['id'];?>'" class="btn-primary">删除</a>
					<span class="btn btn-primary fa fa1 fa-long-arrow-up"> ↑ </span>
					<span class="btn btn-primary fa fa2 fa-long-arrow-down"> ↓ </span>
					<input type="hidden" name="id[]" value="<?php echo $v['id'];?>">
				</div>
			</div>
		</div>
		<?php } ?>
		<?php if(empty($maneger)){?>
			<div class="dataTables_empty" style="text-align:center">暂无数据</div>
		<?php }?>
	</div>
	<!--保存、发布、返回按钮-->
    <?php if(!empty($maneger)){?>
    <div class="container container1">
        <div class="row">
            <div class="col-lg-2 col-lg-offset-10 pull-right">
    			<a href="/index.php/admin/release/maneger" class="btn btn-primary">返回</a>
                <button class="btn btn-primary">保存</button>
                <button class="btn btn-primary" onclick="">发布</button>
            </div>
        </div>
    </div>
    <?php }?>
</div>
</form>
<script type="text/javascript" src="/statics/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript">
	function sub(but){
		location.href="/index.php/admin/release/"+but; 
	}
	$(function(){
       $(".fa-long-arrow-up").click(function(){
           var dex=$(this).parents(".timeline-item");
           dex.prev().before(dex);
           $(".content").removeClass("no-top-border");
           $(".timeline-item").first().find(".content").addClass("no-top-border");
       });
        $(".fa-long-arrow-down").click(function(){
            var dex=$(this).parents(".timeline-item");
            dex.next().after(dex);
            $(".content").removeClass("no-top-border");
            $(".timeline-item").first().find(".content").addClass("no-top-border");
        })
    });
</script>
</body>
</html>
