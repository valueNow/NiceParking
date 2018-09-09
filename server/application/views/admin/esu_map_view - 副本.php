<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<style>.__infoBox_p{
		color:white;
		}</style>
		<title>Document</title>
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
.jquery-slider-control-play{
display:none !important;
}
</style>
<script type="text/javascript" src="/statics/js/plugins/carousel/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="/statics/js/plugins/carousel/jquery.slider.min.js"></script>
	</head>
	<body>
			
<div style="width:100px;margin:0 0;">
	<div class="slider">
	
		<div style="width:350px;height:300px;" ><a href="#"><img  style ="width:100%;heigth:100%;"src="/statics/image/s01.jpg" alt=""></a><span style="position:absolute;left:0px;bottom:0px;width: 100%;background-color:rgba(0,0,0,0.5);color:white;height:10%; "   >aaaaa</span></div>
		<div style="width:350px;height:300px;" ><a href="#"><img  style ="width:100%;heigth:100%;"src="/statics/image/s02.jpg" alt=""></a><span style="position:absolute;left:0px;bottom:0px;width: 100%;background-color:rgba(0,0,0,0.5);color:white;height:10%;  " >aaaaa</span></div>
		<div style="width:350px;height:300px;" ><a href="#"><img  style ="width:100%;heigth:100%;"src="/statics/image/s03.jpg" alt=""></a><span style="position:absolute;left:0px;bottom:0px;width: 100%;background-color:rgba(0,0,0,0.5);color:white;height:10%;  " >aaaaa</span></div>
		<div style="width:350px;height:300px;" ><a href="#"><img  style ="width:100%;heigth:100%;"src="/statics/image/s04.jpg" alt=""></a><span style="position:absolute;left:0px;bottom:0px;width: 100%;background-color:rgba(0,0,0,0.5);color:white;height:10%;  " >aaaaa</span></div>
		<div style="width:350px;height:300px;" ><a href="#"><img  style ="width:100%;heigth:100%;"src="/statics/image/s05.jpg" alt=""></a><span style="position:absolute;left:0px;bottom:0px;width: 100%;background-color:rgba(0,0,0,0.5);color:white;height:10%;  " >aaaaa</span></div>
		<div style="width:350px;height:300px;" ><a href="#"><img  style ="width:100%;heigth:100%;"src="/statics/image/s06.jpg" alt=""></a><span style="position:absolute;left:0px;bottom:0px;width: 100%;background-color:rgba(0,0,0,0.5);color:white;height:10%;  " >aaaaa</span></div>      
		<div style="width:350px;height:300px;" ><a href="#"><img  style ="width:100%;heigth:100%;"src="/statics/image/s07.jpg" alt=""></a><span style="position:absolute;left:0px;bottom:0px;width: 100%;background-color:rgba(0,0,0,0.5);color:white;height:10%;  " >aaaaa</span></div>
	</div>
</div>
			<div id="neirong">
			<p class="__infoBox_p">aaaaaaaaaaaa</p>
			</div>
	</body>
	<script type="text/javascript">
	function load(){
		window.parent.document.getElementById("myframemap").style.height=(document.getElementById("neirong").clientHeight+300+"px");
		window.parent.document.getElementById("myframemap").style.width="350px";
	}
	</script>
	<script type="text/javascript">
$(document).ready(function ($) {
$(".slider").slideshow({
		width: 350,
		height: 300,
		transition: ['bar', 'Rain', 'square', 'squareRandom', 'explode'],
		auto: false
	});
	load();
});
</script>
</html>