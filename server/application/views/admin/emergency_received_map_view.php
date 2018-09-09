<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<style>
			.__infoBox_p {
				color: white;
				margin-top: 8px;
			}
		</style>
		<title>信息接报POI</title>
		<link rel="stylesheet" type="text/css" href="/statics/css/plugins/carousel/jquery.slider.css" />
		<style>
			.jquery-slider-selectors {
				display: block;
				overflow: hidden;
				position: absolute;
				bottom: 20%;
				right: 10px;
				z-index: 3;
			}
			
			.jquery-slider-control-play {
				display: none !important;
			}
		</style>
		<script type="text/javascript" src="/statics/js/plugins/carousel/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="/statics/js/plugins/carousel/jquery.slider.min.js"></script>
	</head>

	<body>
		<!--<div style="width:100px;margin:0 0;">
			<div class="slider">
				<?php foreach($img as $value){?>
				<div style="width:300px;height:150px;">
					<a href="#"><img style="width:100%;heigth:100%;" src="/<?php echo $value['file_url'];?>" alt=""></a>
					<span style="position:absolute;left:0px;bottom:0px;width: 100%;background-color:rgba(0,0,0,0.5);color:white;height:15%;">
						<?php echo $value['file_name'];?>
						</span></div>
				<?php }?>
			</div>
		</div>-->
		<div id="neirong">
			<p class="__infoBox_p">名称:&nbsp;&nbsp;
				<?php echo $rec['rec_name'];?>
			</p>
			<p class="__infoBox_p">负责人:&nbsp;&nbsp;
				<?php echo $rec['send_someone'];?>
			</p>
			<p class="__infoBox_p">电话:&nbsp;&nbsp;
				<?php echo $rec['mobile'];?>
			</p>
			<p class="__infoBox_p">地址:&nbsp;&nbsp;
				<?php echo $rec['address'];?>
			</p>
			<p class="__infoBox_p">简介:&nbsp;&nbsp;
				<?php echo $rec['description'];?>
			</p>
		</div>
	</body>
	<script type="text/javascript">
		function load() {
			window.parent.document.getElementById("myframemap").style.height = (document.getElementById("neirong").clientHeight + 150 + "px");
			window.parent.document.getElementById("myframemap").style.width = "300px";
			window.parent.document.getElementsByClassName("tooltipmap")[0].style.width = "320px";
			window.parent.document.getElementsByClassName("tooltipmapcont")[0].style.width = "320px";
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function($) {
			$(".slider").slideshow({
				width: 300,
				height: 150,
				transition: ['bar', 'Rain', 'square', 'squareRandom', 'explode'],
				auto: false
			});
			load();
		});
	</script>

</html>