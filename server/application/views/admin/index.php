<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
<meta http-equiv="Access-Control-Allow-Origin" content="*">
<title>智慧旅游</title>
<link rel="stylesheet" type="text/css" href="/statics/css/base.css"/>
<link rel="stylesheet" type="text/css" href="/statics/css/canvas.css"/>
<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
<link href="/statics/css/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
<!-- Data Tables -->
<link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="/statics/css/infobox.css" rel="stylesheet">
<link href="/statics/css/measureBoxStyle.css" rel="stylesheet">
<link href="/statics/css/ionic.css" rel="stylesheet">
<link href="/statics/css/animate.min.css" rel="stylesheet">
<style>@import url(/statics/css/plugins/Cesium/Build/Cesium/Widgets/widgets.css);
@import url(/statics/css/plugins/Cesium/Build/Cesium/Widgets/Navigation.css);
@import url(/statics/js/plugins/Cesium/Source/Widgets/InfoBox/InfoBox.css);</style>
<link rel="stylesheet" type="text/css" href="/statics/css/index.css"/>
<link href="/statics/css/media.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/statics/js/plugins/jstree/themes/default/style.min.css"/>
<style>
/*画布*/

#drawController img,
#chooseColordiv {
	width: 40px;
	height: 40px;
	padding: 10px;
	float:left;
}

#chooseColordiv {
	position: relative;
}
#chooseColordiv>input {
	width: 18px;
	height: 18px;
	cursor: pointer;
	margin-left: 2px;
	margin-top: 1px;
}

#color {
	top: 147px!important;
    left: 5px!important;
    width: 160px;
    height: auto;
    display:block!important;
}
#color>input{
    width:35px;
    height:35px;
    margin:2px;
    float:left;
    /*border-color: #FFF;*/
}
.xiazai,.guanbi{
    position:absolute;
    bottom:5px;
    width: 80px!important;
    padding: 10px 29px!important;
}
.guanbi{
    right:5px;
}
.xiazai{
    left:5px;
}
/*.clearfix{zoom:1}
.clearfix:before{content:'';display:block}
.clearfix:after{content:'';display:table;clear:both}
::after,::before{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}
		
		
			.x-triangle{position:relative;width:0;height:0;margin:0 auto;border-width:80px;border-style:solid;border-color:transparent  transparent #088cb7;  transparent ;}
			.x-triangle:after{content:"";position:absolute;left:-90px;top:80px;  border-bottom: 150px solid #088cb7;border-left: 68px solid transparent;border-right: 68px solid transparent;width: 180px; }*/
			/*@keyframes triangle{
				0%{
					transform: rotateX(0deg);
  				 
				}
				100%{
					transform: rotateX(-60deg);
  				   
				}
				
			}
			.x-triangle{animation:triangle  9s linear infinite;}*/


</style>
<script type="text/javascript" src="/statics/js/jquery.2.1.4.min.js"></script>
<script type="text/javascript" src="/statics/js/plugins/jstree/jstree.min.js"></script>
<script type="text/javascript" src="/statics/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/statics/js/heatmap.js"></script>
<script type="text/javascript" src="/statics/js/super_slider.js"></script>
<script src="/statics/js/require.js" data-main="/statics/js/main"></script>
<script type="text/javascript" src="/statics/js/popwin.js"></script>
<script type="text/javascript" src="/statics/js/drag.js"></script>
<script type="text/javascript" src="/statics/js/drawHelper.js"></script>
<script type="text/javascript" src="/statics/js/dragcen.js"></script>
<script type="text/javascript" src="/statics/js/rem.js"></script>
<script type="text/javascript" src="/statics/js/public.js"></script>
<script type="text/javascript" src="/statics/js/spot_manager.js"></script>
<script type="text/javascript" src="/statics/js/leftBox_manager.js"></script>
<script type="text/javascript" src="/statics/js/bottom/bottom_spjk.js"></script>
<script type="text/javascript" src="/statics/js/bottom/bottom_yj.js"></script>
<script type="text/javascript" src="/statics/js/bottom/bottom_wf.js"></script>
<script type="text/javascript" src="/statics/js/bottom/bottom_lylx.js"></script>
<script type="text/javascript" src="/statics/js/common.js"></script>
<script type="text/javascript">
	//var s=new spot();
	//s.view("111111",1);
	var leftboxmodel=new leftbox();
	var bottomyingji=new bottom_yj();
	var bottomwf=new bottom_wf();
	var bottomspjk=new bottom_spjk();
	var bottomlylx=new bottom_lylx();
	//$('#treespjk').jstree();
	function er_menu(menu_id){
		$.ajax({
			url:'/index.php/admin/index/public_menu/'+menu_id,
			dataType:'json',
			success:function(data){
				if(data=='no'){
					alert("暂无二级菜单");
				}else{
					var html = "";
					 for(var i in data){
						var url = "openiframe('/index.php/"+data[i]['m']+"/"+data[i]['c']+"/"+data[i]['a']+"')";
						html +='<li class="small" style="background:'+data[i]['color']+';"  onclick="'+url+'"><p>'+data[i]['name']+'</p><img style="display:none" src="'+data[i]['img']+'"></li>';
					 }
					 $(".sidebar_dy_l").click(function(){
					    $("#popWinReturn").show();
					 });
					$('.sidebar_dy_l').html(html);
					$(".sidebar_dy").show();
					$(".bmap").show();
					var smallNum=$(".small").length;
					if(smallNum%4 == 1){
						$(".small").last().css({"width":"820px"});
					}else if(smallNum%4 == 2){
						$(".small").last().css({"width":"400px"});
						$(".small").eq(smallNum-2).css({"width":"400px"});
					}else if(smallNum%4 == 3){
						$(".small").eq(smallNum-2).css({"width":"400px"});
					}
			
				}
			}
		});
	}
	function fncreatpolygon() {
    require(['addPolygon'],
     function (model) {
         model.creatPolygonbox();
     }
  );
}
    $(window).resize(function(){
        oWidth=$(window).width();
        oHeight=$(window).height();
        $("#maskTop").css({"top":'0!important','left':'0!important','margin':'0!important',"height":oHeight,"width":oWidth})
    });
    
    var defaultFlyTo={
	x:113.54363057488094,
	y: 22.171333854996035,
	z:1687.0306972108901,
	heading: 6.191831397038952,
	pitch: -0.6169861369777081,
	roll: 6.282083120803016};//系统默认视图位置
</script>
</head>
<body>
	<!--<div class="x-triangle" style="position:absolute;left:500px;top:200px;z-index: 2;"></div>-->
<!--等待加载效果-->
<div class="loading">
	<div class="loading-box">
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
	</div>
</div>
<!--iframePOI点内容显示-->
<div class="tooltipmapcont"  style="position:absolute; height: 250px; width: 320px; display:none;">
    <div class="tooltipmap" style="">
       <iframe id="myframemap" style="position:absolute;margin-top:10px;" scrolling="no" frameborder="no" border="0" >
       </iframe>
    </div>
    <div class="tooltipmap-scrollBox">
       <div class="tooltipmap-scroll"></div>
    </div>
    <div class="tooltipmap_colse"></div>
    <div class="arrowmap"></div>
</div>
<!--iframePOI点内容结束-->
<!--中间部分-->	
<div class="warp drag" id="cesiumContainer">
		<dl class="dragcen" style="display: none;"  id="ciclesettingdragcen">
			<div class="dragcen-head">
				<i class='hander'>设置</i>
                <i class="fa fa-times"></i>
			</div>
			<input type="button" id="cicleAdd" value="新增" />
			<div class="dragcen-input">
				<div class="dragcen-divp">高度:</div>
                <input type="textbox" id="cicleSetHeight" class="textbox" value="100"/>
                <i class="addHeight fa fa-plus"></i>
                <i class="removeHeight fa fa-minus"></i></p>
			</div>
			<div class="dragcen-input">
				<div class="dragcen-divp">透明度:</div>
                <input type="textbox" id="cicleSetAlpha" class="textbox" value="0.5"/>
                <i class="addOpacity fa fa-plus"></i>
                <i class="removeOpacity fa fa-minus"></i>
			</div>
		</dl>
		<!--测量工具-->
		<dl class="dragcen" style="display: none;" id="measureBox">
			<div class="dragcen-head">
				<i class='hander' style="width:300px;padding-left:5px;font-size: 15px;">测量工具</i>
                <i class="fa fa-times" onclick="distanceinit(false);"></i>
			</div>
		</dl>
		<!--<dl class="dragcen dragcen-jk" style="display:none;" >
			<div class="dragcen-head">
				<i class='hander'>摄像头监控</i>
                <i class="fa fa-times"></i>
			</div>
			<div class="dragcen-left">
				<div class="video-Sk">
                	<ul class="vide_ul">
                		<li>
                			<p class="video_p">
                			    <video class="video" autoplay muted loop src=""></video>
                			    <em class="fa fa-arrows-alt"></em><i class="fa fa-compress"></i>
                		    </p>
                			<p class="video_p">
                			     <video class="video" autoplay muted loop src=""></video>
                                <em class="fa fa-arrows-alt"></em><i class="fa fa-compress"></i>
                            </p>
                			<p class="video_p">
                			     <video class="video" autoplay muted loop src=""></video>
                                <em class="fa fa-arrows-alt"></em><i class="fa fa-compress"></i>
                            </p>
                			<p class="video_p">
                			     <video class="video" autoplay muted loop src=""></video>
                                <em class="fa fa-arrows-alt"></em><i class="fa fa-compress"></i>
                            </p>
                		</li>
                	</ul>
                </div>
                <div class="video_foot">
                	<ul class="video_uls">
                		<li class="video_uls_o"><i class="fa fa-camera"></i></li>
                		<li class="video_uls_t" ><i class="fa fa-minus"></i></li>
                		<li class="video_uls_f"><i class="fa fa-plus"></i></li>
                		<li class="video_uls_u"><i class="fa fa-chevron-left"></i></li>
                		<li class="video_uls_i"><i class="fa fa-chevron-right"></i></li>
                		<li class="video_uls_s"><i class="fa fa-chevron-up"></i></li>
                		<li class="video_uls_e"><i class="fa fa-chevron-down"></i></li>
                	</ul>
                </div>
			</div>
			<div class="dragcen_box" style="display:none">
                <p style="margin-bottom: 0">选择监控区域</p>
                <div class="dragcen_smallBox">
                	<ul class="dragcen_box_ul">
                		<li>监控区域</li>
                		<li>监控区域</li>
                		<li>监控区域</li>
                		<li>监控区域</li>
                		<li>监控区域</li>
                	</ul>
                	<div class="dragcen-scrollBox">
                		<div class="dragcen-scroll"></div>
                	</div>
                </div>
            </div>
		</dl>-->
		<dl class="dragcen dragcen-jk" style="display:none;" >
        	<div class="dragcen-head">
        		<i class='hander'>摄像头监控</i>
                <i class="fa fa-times"></i>
        	</div>
        	<div class="dragcen-left">
        		<div class="video-Sk">
                	<ul class="vide_ul">
                		<li>
                			<p class="video_p">
                			    <video id="pVideo" class="video" autoplay muted loop src=""></video>
                			    <em class="fa fa-arrows-alt goBig"></em></i>
                		    </p>
                		</li>
                	</ul>
                </div>
                <div class="video_foot">
                	<ul class="video_uls">
                		<li class="video_uls_o"><i class="fa fa-camera"></i></li>
                		<li class="video_uls_t" ><i class="fa fa-minus"></i></li>
                		<li class="video_uls_f"><i class="fa fa-plus"></i></li>
                		<li class="video_uls_u"><i class="fa fa-chevron-left"></i></li>
                		<li class="video_uls_i"><i class="fa fa-chevron-right"></i></li>
                		<li class="video_uls_s"><i class="fa fa-chevron-up"></i></li>
                		<li class="video_uls_e"><i class="fa fa-chevron-down"></i></li>
                	</ul>
                </div>
        	</div>
        	<div class="dragcen_box" style="display:none">
                <p style="margin-bottom: 0">选择监控区域</p>
                <div class="dragcen_smallBox">
                	<ul class="dragcen_box_ul">
                		<li>监控区域</li>
                		<li>监控区域</li>
                		<li>监控区域</li>
                		<li>监控区域</li>
                		<li>监控区域</li>
                	</ul>
                	<div class="dragcen-scrollBox">
                		<div class="dragcen-scroll"></div>
                	</div>
                </div>
            </div>
        </dl>
		<dl  style="display:none;margin-bottom:0" class="dragcon" id="dlAddAnimatePoint">
			<i class='hander'>添加导览</i>
			<em class="Close fa fa-times"></em>
			<input class="dragcon-btn" type="hidden" id="lstPoint" value="">
			<input type="hidden" id="hdAddAnimatePoint" value="">
			<input class="dragcon-btn" onclick="fnAddAnimatePoint('tbAddAnimatePoint','hdAddAnimatePoint');" id="AddAnimatePoint" style="margin_right:40px;" type="submit"    value="新增">
			<!--<input class="dragcon-btn" onclick="fnDelAnimatePoint($('#hdAddAnimatePoint').val())" id="DelAnimatePoint" style="margin_right:40px;" type="submit"    value="删除">-->
			<input class="dragcon-btn" onclick="fnPlayAnimatePoint(JSON.parse($('#hdAddAnimatePoint').val()))" id="PlayAnimatePoint" style="margin_right:40px;" type="submit"    value="播放">
			<table id="tbAddAnimatePoint"  cellspacing="0"  id="editable" style="margin-bottom:0">
                            <thead>
                                <tr style="border-bottom:0">
									<th style="text-align:center">编号</th>
									<th>经度</th>
									<th>纬度</th>
									<th>高度</th>
									<th>pick</th>
									<th>rool</th>
                                    <th>heading</th>
									<th>速度</th>
                                </tr>
                            </thead>
            </table>
		</dl>
</div>
<!--logo-->
<div class="logo">
	<img class="Goimg" src="/statics/image/logo.png"/>
</div>
<!--用户信息-->
<div class="admin">
	<!--<div class="admin-email fa fa-envelope-o" style="display: none;">
		<p>3</p>
		<ul class="admin_email_ul" style="left:-45px">
			<li>吃米饭</li>
			<li>吃米饭</li>
			<li>吃米饭</li>
			<li>吃米饭</li>
		</ul>
	</div>-->
	<div class="admin-div">
		<?php echo $_SESSION['user_name'];?>&nbsp;<i class="fa fa-angle-down"></i>
		<div class="admin-hide">
			<p onclick="openiframe('/index.php/admin/user_role/user_view')" >个人信息</p>
			<p onclick="openiframe('/index.php/admin/index/set_password')" >修改密码</p>
			<a href="/index.php/admin/index/public_logout" style="background:none">退出登录</a>
		</div>
	</div>
	<div class="admin-photo">
		<img src="/statics/image/head.jpg">
	</div>
	<div class="admin-img" onclick="fnFlyTodefault();">
		 <p class="fa fa-home "></p>
		<!--<img src="/statics/image/honebt.png"/>-->
	</div>
</div>
<!--右边导航-->
<div class="sidebar">
	<div class="sidebar-title">
		<div class="sidebar-title-div" style="background:rgba(253, 99, 7,0.7);">
		    <p class="fa fa-list-ul"></p>
		    <div>菜单</div>
		</div>
		<div  class="sidebar-title-div">
		    <p class="fa fa-pencil"></p>
		    <div>工具</div>
		</div>
	</div>
	<div class="sidebar_t" id="scrollDiv" style="display:block">
		<ul class="sidebar_list" id="sidebar_list">
		<?php foreach($menu as $k=>$v){ ?>
			<li title="<?php echo $v['name'];?>" onclick="er_menu(<?php echo $v['menu_id'];?>)">
				<span style="background:url(<?php echo $v['img'];?>) no-repeat center; "></span>
			    <div><?php echo $v['name'];?></div>
			</li>
		<?php } ?>
		</ul>
	</div> 
	<div class="sidebar_t">
		<ul class="sidebar_list" id="sidebar_list2">
		    <!--坐标拾取-->
			<li onclick="getPosition(true)"><img src="/statics/image/zbsq.png"><div>坐标拾取</div></li>
            <li onclick="distanceinit(true,1)"><img src="/statics/image/zxjl.png"><div>平面距离</div></li>
            <li onclick="distanceinit(true,2)"><img src="/statics/image/pmzx.png"><div>折线距离</div></li>
            <li onclick="distanceinit(true,3)"><img src="/statics/image/dbmj.png"><div>平面面积</div></li>
            <li onclick="distanceinit(true,4)"><img src="/statics/image/kjzx.png"><div>空间长度</div></li>
            <li onclick="distanceinit(true,5)"><img src="/statics/image/kjmj.png"><div>空间面积</div></li>
            <!--<li onclick="freedraw()"><img src="/statics/image/celiang.png"><div>长度测量</div></li>-->
            <li class="Drag"><img src="/statics/image/huabu.png"><div>画布</div></li>
            <li onclick="useWebVR($(this).attr('vr'));$(this).attr('vr',$(this).attr('vr')=='true'?false:true);"><img src="/statics/image/vr.png"><div>VR模式</div></li>
            <li onclick="ClearMap()"><img src="/statics/image/qingkong.png"><div>清空地图</div></li>
		</ul>
	</div> 
</div>
   <ul class="circleAlert">
   		<li></li>
   		<li></li>
   		<li></li>
   		<li></li>
   		<li></li>
   		<li></li>
   </ul>
<div class="Drag_ing" >
        <div id="drawController">
            <div>
		  	    <img src = '/statics/image/pencel.png' style="cursor: pointer;" width = '20px;' height = '20px;' class="img qianbi" onclick="draw_graph('pencil',this)" class = 'border_nochoose' title = '铅笔'>
		  	    <img src = '/statics/image/handwriting.png' style="cursor: pointer;display:none;"  width = '20px;' height = '20px;' class="img" onclick="draw_graph('handwriting',this)" class = 'border_nochoose' title = '涂鸦'>
		  	    <img src = '/statics/image/line.png' style="cursor: pointer;"  width = '20px;' height = '20px;' class="img" onclick="draw_graph('line',this);" class = 'border_nochoose' title = '画直线'>
                <img src = '/statics/image/circleCanvas.png'  style="cursor: pointer;" width = '20px;' height = '20px;' class="img" onclick="draw_graph('circle',this)" class = 'border_nochoose' title = '圆'>
                <img src = '/statics/image/square.png' style="cursor: pointer;"  width = '20px;' height = '20px;' class="img" onclick="draw_graph('square',this)" class = 'border_nochoose' title = '方形'>
                <img src = '/statics/image/rubber.png'  style="cursor: pointer;" width = '20px;' height = '20px;' class="img" onclick="draw_graph('rubber',this)" class = 'border_nochoose' title = '橡皮擦'>
		  	    <img src = '/statics/image/cancel.png' style="cursor: pointer;"  width = '20px;' height = '20px;' class="img" onclick="cancel(this)" class = 'border_nochoose' title = '撤销上一个操作'>
		  	    <img src = '/statics/image/next.png' style="cursor: pointer;"  width = '20px;' height = '20px;' class="img" onclick="next(this)" class = 'border_nochoose' title = '重做上一个操作'>
		  	    <img src = '/statics/image/cancleCanvas.png' width = '20px;' style="cursor: pointer;"  height = '20px;' class="img qingping" onclick="clearDrawMapPanel();" class = 'border_nochoose' title = '清屏'>
		  	    <!--<div id="chooseColordiv">
		  	    	<input id="chooseColor"  type="button"  style="cursor: pointer;display:none"  class = 'i1 border_nochoose' onclick="showColor(this)" title = '选择颜色'>
		  	       
		  	    </div>-->
		  	     <div id="color" class="color" >
                        <input class="i1" type="button">
                        <input class="i2" type="button">
                        <input class="i3" type="button">
                        <input class="i4" type="button">
                        <input class="i5" type="button">
                        <input class="i6" type="button">
                        <input class="i7" type="button">
                        <input class="i8" type="button">
                        <input class="i9" type="button">
                        <input class="i10" type="button">
                        <input class="i11" type="button">
                        <input class="i12" type="button">
                        <input class="i13" type="button">
                        <input class="i14" type="button">
                        <input class="i15" type="button">
                        <input class="i16" type="button">
                </div>
                <div id="line_size"  class = "border_nochoose" style="z-index:100;display:block!important;">
                	<p class="line_size-p" onclick="chooseLineSize(1);"><span></span></p>
                	<p class="line_size-p" onclick="chooseLineSize(3);"><span></span></p>
                	<p class="line_size-p" onclick="chooseLineSize(7);"><span></span></p>
                	<p class="line_size-p" onclick="chooseLineSize(10);"><span></span></p>
					<!--<img src="/statics/image/line_size_1.png" width = '100%;' height = '12px;' onclick="chooseLineSize(1);">
					<img src="/statics/image/line_size_3.png" width = '100%;' height = '12px;' onclick="chooseLineSize(3);">
					<img src="/statics/image/line_size_5.png" width = '100%;' height = '12px;' onclick="chooseLineSize(5);">
					<img src="/statics/image/line_size_7.png" width = '100%;' height = '12px;' onclick="chooseLineSize(7);">-->
				</div>
<!--		  	    <img  id="chooseSize" src = '/statics/image/line_size.png' onclick="showLineSize(this)" style="cursor: pointer;"   width = '20px;' height = '20px;' class="img" class = 'border_nochoose' title = '线条大小'>-->
		  	    <!--<img src = '/statics/image/save.png' width = '20px;' height = '20px;' class="img" onclick="save()" class = 'border_nochoose' title = '保存'><br/>-->
		  	    <a href="#" id="downloadImage_a">
		  	    	<img src = '/statics/image/downloadCanvas.png' style="cursor: pointer;"  width = '20px;' height = '20px;' class="img xiazai" class = 'border_nochoose' title = '下载' onclick="downloadImage();">
		  	    </a><br/>
		  	    <img src = '/statics/image/colseCanvas.png' style="cursor: pointer;"  width = '20px;' height = '20px;' class="img guanbi" onclick="fnShowOrHidDrawMap(false);" class = 'border_nochoose' title = '关闭'>
		  	    <a href="#" style="display:none" download="picture.png" id="downloadImage_click"></a>
		  	    <br/>
		    </div>
		</div>
		<div style="float:left;width:100%">
			<canvas id="canvasDraw" class="canvasDraw2">
				浏览器不支持哦，亲
			</canvas>
			<canvas id="canvas_bak" class="canvasDraw2"></canvas>
		</div>
</div>   		
<!--中间内容-->

<div class="sidebar_dy">
	<div class="sidebar_dy_x">
		<div class="sidebar_dy_box">
			<ul class="sidebar_dy_l"></ul>
            <div class="sidebar-scroll-box">
                <div class="sidebar-scroll"></div>
            </div>
		</div>
		<!--<div class="del fa fa-times" id="closeWindow" ></div>-->
	</div>
</div>
<div class="bmap"></div>
<!--中间内容结束-->
<!--景区点-->
<!--<div class="scenic-box">
    <div class="scenic-circle"></div>
    <div class="scenic-circle2"></div>
    <div class="scenic-div animated fadeInRight">
        <p class="animated"><img src="/statics/image/sanjiao.png"></p>
        <div class="scenic-div-sui">
            <div>澳门观光旅游塔</div>
            <p>aomen guanguang ta</p>
        </div>
    </div>
</div>-->
<!--景区信息设施-->
<div class="xin-box animated fadeInLeft xin-box-jingqu">
    <p>整体导览</p>
    <div class="xin-box-div">
        <div class="xin-content">
            <div class="fa fa-plus-square-o jing-fa" id="jingdian-jia"></div>
            景点
            <div class="xin-content-img"><label class="toggle toggle-energized"><input type="checkbox" class="jingAll-check jingdian-all"><button class="track"><div class="handle"></div></button></label></div>
        </div>
        <div class="xin-content2">景点数量：<span id="jingdian-num"></span></div>
        <!--景区信息展开详细-->
        <div class="xin-dis" id="jingdian-dis"></div>
    </div>
    <div class="xin-box-div">
        <div class="xin-content">
            <div class="fa fa-plus-square-o jing-fa"></div>
            地标建筑
            <div class="xin-content-img"><label class="toggle toggle-energized"><input type="checkbox" class="jingAll-check dibiao-all"><button class="track"><div class="handle"></div></button></label></div>
        </div>
        <div class="xin-content2">建筑数量：<span id="dibiao-num"></span></div>
        <!--景区信息展开详细-->
        <div class="xin-dis" id="dibiao-dis"></div>
    </div>
    <div class="xin-box-div xin-box-shebei">
        <div class="xin-content">
            <div class="fa fa-plus-square-o shebei-jia jing-fa"></div>
            设施
            <div class="xin-content-img"><label class="toggle toggle-energized"><input type="checkbox" class="jingAll-check ztdl-shebei-all"><button class="track"><div class="handle"></div></button></label></div>
        </div>
        <div class="xin-content2">设备数量：<span class="shebei-num"></span></div>
        <!--景区信息展开详细-->
        <div class="xin-dis xin-dis-ztdl-sheshi" id="shebei-dis"></div>
    </div> 
    <div class="xin-box-div xin-box-tese">
        <div class="xin-content">
            <div class="fa fa-plus-square-o jing-fa" id="tese-jia"></div>
            特色旅游点
            <div class="xin-content-img"><label class="toggle toggle-energized"><input type="checkbox" class="jingAll-check tese-all"><button class="track"><div class="handle"></div></button></label></div>
        </div>
        <div class="xin-content2">数量：<span id="tese-num"></span></div>
        <!--景区信息展开详细-->
        <div class="xin-dis" id="tese-dis"></div>
    </div>
    <div class="xin-box-div xin-box-piao">
        <div class="xin-content">
            <div class="fa fa-plus-square-o jing-fa"></div>
            票务
            <div class="xin-content-img"><label class="toggle toggle-energized"><input type="checkbox" class="jingAll-check paio-all"><button class="track"><div class="handle"></div></button></label></div>
        </div>
        <div class="xin-content2">票务数量：<span id="piao-num"></span></div>
        <div class="xin-dis" id="piao-dis"></div>
    </div>
    <div class="xin-box-div xin-box-parking">
        <div class="xin-content">
            <div class="fa fa-plus-square-o jing-fa"></div>
            停车场
            <div class="xin-content-img"><label class="toggle toggle-energized"><input type="checkbox" class="jingAll-check park-all"><button class="track"><div class="handle"></div></button></label></div>
        </div>
        <div class="xin-content2">停车场数量：<span id="park-num"></span></div>
        <div class="xin-dis" id="park-dis"></div>
    </div>
</div>
<!--应急左边box-->
<div class="xin-box animated fadeInLeft xin-box-yingji">
    <p>应急可视化</p>
    <div class="xin-box-div">
        <div class="xin-content ">
            <div class="fa fa-plus-square-o yingji-shijian-jia yingji-fa"></div>
            事件
            <div class="xin-content-img"><label class="toggle toggle-energized"><input type="checkbox" class="yingjiAll-check shijian-all"><button class="track"><div class="handle"></div></button></label></div>
        </div>
        <div class="xin-content2">事件数量：<span class="span-yingji-shijian"></span></div>
        <!--景区信息展开详细-->
        <div class="xin-dis xin-dis-yingji-shijian">

        </div>
    </div>
    <div class="xin-box-div xin-box-shebei">
        <div class="xin-content">
            <div class="fa fa-plus-square-o yingji-sheshi-jia yingji-fa"></div>
            设施
            <div class="xin-content-img"><label class="toggle toggle-energized"><input type="checkbox" class="yingjiAll-check yingji-shebei-all"><button class="track"><div class="handle"></div></button></label></div>
        </div>
        <div class="xin-content2">设备数量：<span class="shebei-num"></span></div>
        <!--景区信息展开详细-->
        <div class="xin-dis xin-dis-yingji-sheshi">

        </div>
    </div> 
    <div class="xin-box-div">
        <div class="xin-content">
            <div class="fa fa-plus-square-o  yingji-luxian-jia yingji-fa"></div>
            应急路线
            <div class="xin-content-img"><label class="toggle toggle-energized"><input type="checkbox" class="yingjiAll-check luxian-all"><button class="track"><div class="handle"></div></button></label></div>
        </div>
        <div class="xin-content2">路线数量：<span  class="span-yingji-luxian"></span></div>
        <!--景区信息展开详细-->
        <div class="xin-dis xin-dis-yingji-luxian">

        </div>
    </div>
    <div class="xin-box-div">
        <div class="xin-content">
            <div class="fa fa-plus-square-o duiwu yingji-fa"></div>
            应急队伍
        </div>
        <div class="xin-content2">队伍数量：<span>16</span></div>
        <!--景区信息展开详细-->
        <div class="xin-dis xin-dis-yingji-duiwu">

        </div>
    </div>
    <div class="xin-box-div">
        <div class="xin-content">
            <div class="fa fa-plus-square-o yingji-fa" onclick="bottomyingji.yuan();"></div>
            应急预案
        </div>
        <div class="xin-content2">预案数量：<span>32</span></div>
        <!--景区信息展开详细-->
        <div class="xin-dis xin-dis-yingji-yuan">

        </div>
    </div>
    <div class="xin-box-div">
        <div class="xin-content">
            <div class="fa fa-plus-square-o yingji-fa" onclick="bottomyingji.spjk('.xin-dis-yingji-spjk');"></div>
            视频监控
        </div>
        <div class="xin-content2">视频监控数量：<span  class="span-yingji-spjk"></span></div>
        
        <div class="xin-dis xin-dis-yingji-spjk" id="treespjk">
  
		</div>
        
    </div>
</div>
<!--视频监控左边box-->
<div class="xin-box animated fadeInLeft xin-box-spjk">
    <p>安全服务</p>
    <div class="xin-box-div xin-box-div-spjk"  >
       <div id="treespjk"  class="xin-dis-spjk-spjk" >
  <ul>
    <li>Root node 1
      <ul>
        <li>Child node 1</li>
        <li><a href="#">Child node 2</a></li>
      </ul>
    </li>
  </ul>
</div>
    </div>
</div>

<!--导游导览（周边推荐）-->
<div class="xin-box animated fadeInLeft xin-box-zhoubian">
    <p>导游导览</p>
    <div class="xin-box-div zhoubian-box-div" type="7">
        <div class="xin-content ">
            <!--<div class="fa fa-plus-square-o zhoubian-fa"></div>-->
                     澳门维多利亚酒店
            <div class="xin-content-img">
                <img src="/statics/image/jpg/7riyou.jpg">
                <p class="zhoubian-p"><img src="/statics/image/bf.png"></p>
            </div>
        </div>
        <div class="xin-content2">受欢迎程度：<span>80</span></div>
        <!--景区信息展开详细-->
        <div class="xin-dis">
		<!--1、葡京娱乐场-东望洋炮台-圣母雪地殿圣堂-东望洋灯塔-卢廉若公园-葡京娱乐场</br>
	 2、义顺牛奶公司-新马路-议事亭前地-玫瑰圣母堂-恒友鱼蛋-主教座堂-卢家大屋-大三巴牌坊</br>
	 3、新濠天地-威尼斯人度假村</br>
	 4、渔人码头-金莲花广场-澳门艺术博物馆-观音堂-妈阁庙-海事博物馆-妈阁炮台-澳门旅游塔</br>
	 5、官也街-晃记饼家-龙环葡韵-澳门银河酒店</br>6、路环圣方济各圣堂-黑沙踏浪-->
        </div>
    </div>
    <div class="xin-box-div zhoubian-box-div" type="6">
        <div class="xin-content">
            <!--<div class="fa fa-plus-square-o zhoubian-fa"></div>-->
            	澳门英皇酒店
            <div class="xin-content-img">
                <img src="/statics/image/jpg/6riyou.jpg">
                <p class="zhoubian-p"><img src="/statics/image/bf.png"></p>
            </div>
        </div>
        <div class="xin-content2">受欢迎程度：<span>56</span></div>
        <!--景区信息展开详细-->
        <div class="xin-dis">
<!--1、星光大道</br>
2、铜锣湾</br>
3、尖沙咀 -香港迪士尼乐园 -维多利亚港</br>
4、兰桂坊 -庙街 -香港科学馆 -金紫荆广场 -黄大仙</br>
5、香港杜莎夫人蜡像馆 -大三巴牌坊 -玫瑰圣母堂 -威尼斯人度假村 -澳门民政总署大楼 -澳凼大桥</br>
6、主教座堂 -关帝庙</br>-->
        </div>
    </div>
    <div class="xin-box-div zhoubian-box-div" type="3">
        <div class="xin-content">
            <!--<div class="fa fa-plus-square-o zhoubian-fa"></div>-->
            	澳门博物馆
            <div class="xin-content-img">
                <img src="/statics/image/jpg/3riyou.jpg">
                <p class="zhoubian-p"><img src="/statics/image/bf.png"></p>
            </div>
        </div>
        <div class="xin-content2">受欢迎程度：<span>56</span></div>
        <!--景区信息展开详细-->
        <div class="xin-dis">
<!--1、玫瑰圣母堂 -议事亭前地 -大三巴牌坊 -葡京娱乐场</br>
2、新马路 -妈阁庙 -澳门旅游塔</br>
3、威尼斯人度假村</br>-->
        </div>
    </div>
    <div class="xin-box-div zhoubian-box-div" type="2">
        <div class="xin-content">
            <!--<div class="fa fa-plus-square-o zhoubian-fa"></div>-->
            	澳门葡京酒店
            <div class="xin-content-img">
                <img src="/statics/image/jpg/2riyou.jpg">
                <p class="zhoubian-p"><img src="/statics/image/bf.png"></p>
            </div>
        </div>
        <div class="xin-content2">受欢迎程度：<span>16</span></div>
         <!--景区信息展开详细-->
         <div class="xin-dis">
<!--1、玫瑰圣母堂 -议事亭前地 -大三巴牌坊 -葡京娱乐场</br>
2、妈阁庙 -澳门旅游塔 -威尼斯人度假村</br>-->
         </div>
    </div>
    <div class="xin-box-div zhoubian-box-div" type="1">
        <div class="xin-content">
            <!--<div class="fa fa-plus-square-o zhoubian-fa"></div>-->
            	澳门广场
            <div class="xin-content-img">
                <img src="/statics/image/jpg/1riyou.jpg">
                <p class="zhoubian-p"><img src="/statics/image/bf.png"></p>
            </div>
        </div>
        <div class="xin-content2">受欢迎程度：<span>32</span></div>
         <!--景区信息展开详细-->
         <div class="xin-dis">
<!--1、葡京酒店 -玛嘉烈蛋挞 -议事亭前地 -仁慈堂 -主教座堂 -圣方济各教堂 -玫瑰圣母堂 -三盏灯小吃-->
         </div>
    </div>
    
</div>
<!--旅游路线-->
<div class="xin-box animated fadeInLeft xin-box-lvyouluxian">
    <p>旅游路线</p>
    <div class="xin-box-div zhoubian-box-div xin-box-div-lvyouluxian" type="5">
        <div class="xin-content ">
            <div class="fa fa-plus-square-o luxian-fa"></div>
            7日游
            <div class="xin-content-img">
                <img src="/statics/image/jpg/7riyou.jpg">
            </div>
        </div>
        <div class="xin-content2">受欢迎程度：<span>80</span></div>
        <!--景区信息展开详细-->
        <div class="xin-dis">
			 1、葡京娱乐场-东望洋炮台-圣母雪地殿圣堂-东望洋灯塔-卢廉若公园-葡京娱乐场</br>
			 2、义顺牛奶公司-新马路-议事亭前地-玫瑰圣母堂-恒友鱼蛋-主教座堂-卢家大屋-大三巴牌坊</br>
			 3、新濠天地-威尼斯人度假村</br>
			 4、渔人码头-金莲花广场-澳门艺术博物馆-观音堂-妈阁庙-海事博物馆-妈阁炮台-澳门旅游塔</br>
			 5、官也街-晃记饼家-龙环葡韵-澳门银河酒店</br>6、路环圣方济各圣堂-黑沙踏浪
        </div>
    </div>
    <div class="xin-box-div zhoubian-box-div xin-box-div-lvyouluxian" type="4">
        <div class="xin-content">
            <div class="fa fa-plus-square-o luxian-fa"></div>
            	5日游
            <div class="xin-content-img">
                <img src="/statics/image/jpg/6riyou.jpg">
            </div>
        </div>
        <div class="xin-content2">受欢迎程度：<span>65</span></div>
        <!--景区信息展开详细-->
        <div class="xin-dis">
			1、星光大道</br>
			2、铜锣湾</br>
			3、尖沙咀 -香港迪士尼乐园 -维多利亚港</br>
			4、兰桂坊 -庙街 -香港科学馆 -金紫荆广场 -黄大仙</br>
			5、香港杜莎夫人蜡像馆 -大三巴牌坊 -玫瑰圣母堂 -威尼斯人度假村 -澳门民政总署大楼 -澳凼大桥</br>
			6、主教座堂 -关帝庙</br>
        </div>
    </div>
    <div class="xin-box-div zhoubian-box-div xin-box-div-lvyouluxian" type="3">
        <div class="xin-content">
            <div class="fa fa-plus-square-o luxian-fa"></div>
            	3日游
            <div class="xin-content-img">
                <img src="/statics/image/jpg/3riyou.jpg">
            </div>
        </div>
        <div class="xin-content2">受欢迎程度：<span>56</span></div>
        <!--景区信息展开详细-->
        <div class="xin-dis">
				1、玫瑰圣母堂 -议事亭前地 -大三巴牌坊 -葡京娱乐场</br>
				2、新马路 -妈阁庙 -澳门旅游塔</br>
				3、威尼斯人度假村</br>
        </div>
    </div>
    <div class="xin-box-div zhoubian-box-div xin-box-div-lvyouluxian" type="2">
        <div class="xin-content">
            <div class="fa fa-plus-square-o luxian-fa"></div>
            2日游
            <div class="xin-content-img">
                <img src="/statics/image/jpg/2riyou.jpg">
            </div>
        </div>
        <div class="xin-content2">受欢迎程度：<span>50</span></div>
         <!--景区信息展开详细-->
         <div class="xin-dis">
				1、玫瑰圣母堂 -议事亭前地 -大三巴牌坊 -葡京娱乐场</br>
				2、妈阁庙 -澳门旅游塔 -威尼斯人度假村</br>
         </div>
    </div>
    <div class="xin-box-div zhoubian-box-div xin-box-div-lvyouluxian" type="1">
        <div class="xin-content">
            <div class="fa fa-plus-square-o luxian-fa"></div>
            1日游
            <div class="xin-content-img">
                <img src="/statics/image/jpg/1riyou.jpg">
            </div>
        </div>
        <div class="xin-content2">受欢迎程度：<span>45</span></div>
         <!--景区信息展开详细-->
         <div class="xin-dis">
				1、葡京酒店 -玛嘉烈蛋挞 -议事亭前地 -仁慈堂 -主教座堂 -圣方济各教堂 -玫瑰圣母堂 -三盏灯小吃
         </div>
    </div>

</div>
<!--功能模块提示-->
<div class="ti-box animated fadeInDown">
    <div class="animated fadeInLeft">
        <div class="ti-bg"></div>
        <img class="ti-img" src="/statics/image/close.png">
    </div>
    <p class="ti-box-p"></p>
</div>
<!--地点-->
<!--
<div class="di-box animated fadeInDown">
    <div class="di-dian"></div>
    <div class="di-xian"></div>
    <div class="di-fang">
        <p>澳门蛤蛤</p>
        <div class="fa fa-cab"></div>
    </div>
</div>
<div class="di-box animated fadeInDown">
    <div class="di-dian"></div>
    <div class="di-xian"></div>
    <div class="di-fang2">
        <div class="di-fang2-top">
            <p>12</p>
            <div>澳门特别行政区澳门特别行政区</div>
        </div>
    </div>
</div>-->
<!--地点信息-->
<div class="diXin-box animated">
    <img class="diXin-close" src="/statics/image/colse_f.png">
    <p class="diXin-title">
        澳门蛤蛤
    </p>
    <div class="diXin-content"></div>
    <div class="diXin-foot">
        <div>修改</div>
        <div>删除</div>
        <div>查看</div>
    </div>
</div>
<!--鼠标滑过POI显示内容-->
<div class="moveDiv hover-poi" style="display:none;">
	<p class="hover-poi-title"></p>
	<p >经度：<span class="hover-poi-jing"></span></p>
	<p >纬度：<span class="hover-poi-wei"></span></p>
	<!--<p >高度：<span class="hover-poi-height"></span></p>-->
	<div class="moveDiv_triangle">
	</div>
</div>
<!--景点介绍-->
<!--<div class="scenic-introduce-box animated fadeInDown">
    <div class="scenic-introduce-sanjiao"><img src="/statics/image/bsanjiao.png"></div>
    <div class="scenic-introduce">
        <p class="scenic-title">澳门旅游塔</p>
        <p class="scenic-huanying">受欢迎程度:43%</p>
        <div class="scenic-introduce-div">
            <div class="scenic-introduce-wenzi">澳门旅游塔澳门旅游塔澳门旅游塔</div>
            <div class="scenic-introduce-img"><img src="/statics/image/location7.jpg"></div>
        </div>
    </div>
</div>-->

<!--底部-->
<div class="foot">
	<div class="sli_don">
		<span class="fa fa-angle-down"></span>
	</div>
	<div class="vide">
		<img id="smallMap" src="/statics/image/mapLeft.jpg">
		<img id="smallMapHe" src="/statics/image/move.png">
		<div class="fa fa-expand"></div>
		<div class="znz">
        	<img id="compass" src="/statics/image/z.png" alt="">
    	</div>
	</div>
	<div class="foot-right">
	    <div class="foot-right-prev fa fa-angle-left"></div>
        <div class="foot-right-div">
            <ul class="foot-right-ul">
                <li id="foot-right-ul-li">
                    <img src="/statics/image/jingqujingdian.png">
                    <p>整体导览</p>
                </li>
                <li onclick="bottomyingji.showLeftBox();bottomyingji.event();bottomyingji.sheshi();bottomyingji.luxian();">
                    <img src="/statics/image/yingjichuzhi.png">
                    <p>应急可视化</p>
                </li>
                <li onclick="bottomspjk.AllSpjk('.xin-dis-spjk-spjk');bottomspjk.showLeftBox();bottomyingji.delete();leftboxmodel.delete();">
                    <img src="/statics/image/shipinjiankong.png">
                    <p>安全服务</p>
                </li>
                <li onclick="bottomwf.showLeftBox();bottomwf.roat();bottomyingji.delete();leftboxmodel.delete();">
                    <img src="/statics/image/daoyoudaolan.png">
                    <p>导游导览</p>
                </li>
                <li onclick="bottomlylx.showLeftBox();bottomlylx.lines();">
                    <img src="/statics/image/lvyouluxian.png">
                    <p>旅游路线</p>
                </li>
                <li class="report">
                    <img src="/statics/image/fenxiyuce.png">
                    <p>旅游大数据</p>
                </li>
                <li>
                    <img src="/statics/image/jingqujingdian.png">
                    <p>游客分析</p>
                </li>
                <li>
                    <img src="/statics/image/jingqujingdian.png">
                    <p>推广分析</p>
                </li>
                <li>
                    <img src="/statics/image/jingqujingdian.png">
                    <p>监测分析</p>
                </li>
                <li>
                    <img src="/statics/image/jingqujingdian.png">
                    <p>商家分析</p>
                </li>
                <li>
                    <img src="/statics/image/jingqujingdian.png">
                    <p>气象分析</p>
                </li>
            </ul>
        </div>
        <div class="foot-right-next fa fa-angle-right"></div>
	</div>
</div>
<div id="heatmap" style="display:none;"></div>

<div class="s-right3 animated fadeInRightBig">
    <div class="s-btnContent">
        <div class="s-btnContent-div s-btnContent-div1 s-btnContent-div-bg">
            <span class="y0">游</span>
            <span class="y1">客</span>         
        </div>
        <div class="s-btnContent-div s-btnContent-div2">
            <span class="y0">产</span>
            <span class="y1">业</span>          
        </div>
        <div class="s-btnContent-div s-btnContent-div3">
            <span class="y0">营</span>
            <span class="y1">销</span>           
        </div>
        <div class="s-btnContent-div s-btnContent-div4">
            <span class="y0">监</span>
            <span class="y1">测</span>          
        </div>
        <div class="s-btnContent-div s-btnContent-div5">
            <span class="y0">商</span>
            <span class="y1">家</span>         
        </div>
         <div class="s-btnContent-div s-btnContent-div6">
            <span class="y0">气</span>
            <span class="y1">象</span>        
        </div>
       <div class="s-btnContent-circle">退出</div>
    </div>
</div>
<!--游客分析-->
<div class="s-content">
    <div class="s-content-titleYK">
        <h3 class="s-content-title animated fadeInDown">游客分析</h3>
        <div class="s-content-box">
            <div class="s-content-h3Box animated fadeInLeft">
                <div class="s-content-h3Background"></div>
                <h3 style="margin-top:0">游客数量</h3>
            </div>
            <div class="s-box animated fadeInRight">
                <div>
                    <p>一小时内</p>
                    <p class="s-box-p s-box-p1"></p>
                </div>
                <div>
                    <p>一天内</p>
                    <p class="s-box-p s-box-p2"></p>
                </div>
                <div>
                    <p>一周内</p>
                    <p class="s-box-p s-box-p3"></p>
                </div>
                <div>
                    <p>一月内</p>
                    <p class="s-box-p s-box-p4"></p>
                </div>
                <div>
                    <p>一季内</p>
                    <p class="s-box-p s-box-p5"></p>
                </div>
                <div>
                    <p>一年内</p>
                    <p class="s-box-p s-box-p6"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="s-iframe-box s-left animated fadeInLeftBig">
        <iframe src=""></iframe>
    </div>
    <div class="s-iframe-box s-left2 animated fadeInUpBig">
        <iframe src=""></iframe>
    </div>
    <div class="s-iframe-box s-right animated fadeInRightBig">
        <iframe src=""></iframe>
    </div>
    <div class="s-iframe-box s-right2 animated fadeInRightBig">
        <iframe src=""></iframe>
    </div>
    <div class="s-bottom animated fadeInUpBig">
        <iframe src=""></iframe>
    </div>
</div>
<!--产业分析-->
<div class="x_contwo">
	 <h3 class="s-content-title x_content_title animated fadeInDown">产业分析</h3>
    <div class="x_iframe_box x_left animated fadeInLeftBig">
        <iframe src=""></iframe>
    </div>
    <div class="x_iframe_box x_left2 animated fadeInUpBig">
        <iframe src=""></iframe>
    </div>
    <div class="x_iframe_box x_right animated fadeInRightBig">
        <iframe src=""></iframe>
    </div>
    <div class="x_bottom animated fadeInUpBig">
        <iframe src=""></iframe>
    </div>
</div>
<!--推广分析-->
<div class="x_tension">
	<h3 class="s-content-title x_content_title animated fadeInDown">营销分析</h3>
    <div class="x_iframe_box sT-left animated fadeInLeftBig">
        <iframe src=""></iframe>
    </div>
    <div class="x_iframe_box sT-left2 animated fadeInUpBig">
        <iframe src=""></iframe>
    </div>
    <div class="x_iframe_box sT-right animated fadeInRightBig">
        <iframe src=""></iframe>
    </div>
    <div class="x_iframe_box sT-right2 animated fadeInRightBig">
        <iframe src=""></iframe>
    </div>
    <div class="sT_bottom animated fadeInUpBig">
        <iframe src=""></iframe>
    </div>
</div>
<!--监测分析-->
<div class="x_Ming">
	<h3 class="s-content-title x_content_title animated fadeInDown">监测分析</h3>
	 <div class="x_iframe_box sJ-left animated fadeInLeftBig">
          <iframe src=""></iframe>
    </div>
    <div class="x_iframe_box sJ-left2  animated fadeInUpBig">
        <iframe src=""></iframe>
    </div>
    <div class="x_iframe_box sJ-right animated fadeInRightBig">
          <img src="/statics/image/Cytu.png"/>
    </div>
    <div class="xJ_bottom animated fadeInUpBig">
        <iframe src=""></iframe>
    </div>
</div>
<!--商家分析-->
<div class="x_Mat">
	<h3 class="s-content-title x_content_title animated fadeInDown">商家分析</h3>
    <div class="x_iframe_box  xM-left animated fadeInLeftBig">
          <iframe src=""></iframe>
    </div>
    <div class="x_iframe_box xM-left2  animated fadeInUpBig">
    	<div class="x_man">
        	<span>
        		 <i>61.8%</i>
        		 <img src="/statics/image/woman2.png"/>       		
        	</span>
        	<span>
        		 <img src="/statics/image/man2.png"/>       	
        		 <i>38.2%</i>	
        	</span>
        </div>
        <iframe src=""></iframe>
    </div>
    <div class="x_iframe_box xM-right animated fadeInRightBig">
    	<iframe src=""></iframe>
    </div>
    <div class="xM_bottom animated fadeInUpBig">
        <iframe src=""></iframe>
    </div>
</div>
<!--气象分析-->
<div class="x_Met">
	<h3 class="s-content-title x_content_title animated fadeInDown">气象分析</h3>
	<div class="x_iframe_box xT-left animated fadeInUpBig" >	
	   <iframe src=""></iframe>
	</div>
    <div class="x_iframe_box xT-left2 animated fadeInUpBig">
       <iframe src=""></iframe>
    </div>
    <div class="x_iframe_box xT-right animated fadeInRightBig">
        <!--<iframe src=""></iframe>-->
         <img src="/statics/image/wn.png"/>       	
    </div>
    <div class="x_iframe_box xT-right2  animated fadeInRightBig">
     <div class="tqbox">
		<div class="boxleft">
		<ul>
		<li class="t1"><h4>今日天气</h4><h2><a target="_blank" href="http://www.tianqi.com/data/html/code_city.html" title="修改城市">威宁</a></h2></li>
		<li class="t2"><h5><span class="f1">21</span>~<span class="f2">15</span></h5><p><span style="font-size:12px;">℃</span><span style="font-size:14px;width: 70px;line-height: 18px;height: 18px;overflow: hidden;">多云</span></p></li>
		<li class="t3">07/20丁酉年六月廿七</li>
		</ul>
		</div>
		<div class="boxright"><a class="box_a" target="_blank"   href="http://bijie.tianqi.com/weining/?tq" title="多云"><img class='pngtqico' align='absmiddle' src='http://img.tianqi.com/static/images/tqicon1/b1.png' style='border:0;width:46px;height:46px'/></a></div>
		<div class="boxtab">
		<div class="tab"><a target="_blank"  href="http://bijie.tianqi.com/weining/?tq" title="紫外线强度很弱，建议出门前涂擦SPF在6-7之间、PA+的防晒护肤品。"><img class="pic" src="http://www.tianqi.com/static/images/code/tq_xs_1.gif" style="border:0;width:36px;height:36px"><h4>紫外线指数</h4><p>很弱</p></a></div>
		<div class="tab tab1"><a target="_blank"  href="http://weining.tianqi.com/" title="建议穿薄型套装等服装。"><img class="pic" src="http://www.tianqi.com/static/images/code/tq_xs_2.gif" style="border:0;width:36px;height:36px"><h4>穿衣指数</h4><p>较舒适</p></a></div>
		<div class="tab"><a target="_blank"  href="http://bijie.tianqi.com/weining/?tq" title="降雨会淋湿晾晒的衣物，不适宜晾晒。请随时注意天气变化。"><img class="pic" src="http://www.tianqi.com/static/images/code/tq_xs_3.gif" style="border:0;width:36px;height:36px"><h4>晾晒指数</h4><p>不适宜</p></a></div>
		<div class="tab tab1"><a target="_blank"  href="http://bijie.tianqi.com/weining/?tq" title="天气条件差，可能对您的出行产生一定的影响，若外出请注意防风。"><img class="pic" src="http://www.tianqi.com/static/images/code/tq_xs_4.gif" style="border:0;width:36px;height:36px"><h4>旅游指数</h4><p>不建议</p></a></div>
		<div class="tab"><a target="_blank"  href="http://bijie.tianqi.com/weining/?tq" title="风力较大，较不宜晨练，建议年老体弱人群适当减少晨练时间，若坚持室外锻炼，请选择避风的地点。"><img class="pic" src="http://www.tianqi.com/static/images/code/tq_xs_5.gif" style="border:0;width:36px;height:36px"><h4>晨练指数</h4><p>较不宜</p></a></div>
		<div class="tab tab1"><a target="_blank"  href="http://bijie.tianqi.com/weining/?tq" title="不宜洗车，未来24小时内有雨，如果在此期间洗车，雨水和路上的泥水可能会再次弄脏您的爱车。"><img class="pic" src="http://www.tianqi.com/static/images/code/tq_xs_6.gif" style="border:0;width:36px;height:36px"><h4>洗车指数</h4><p>不宜</p></a></div>
		</div>
</div>
    </div>
    <div class="xT_bottom animated fadeInUpBig">
    	<iframe src="" style="padding-left:120px;padding-top:80px;"></iframe>
       <!--<div style="PADDING-RIGHT:0px; PADDING-LEFT:0px; PADDING-BOTTOM:0px; PADDING-TOP:0px;  border:1px solid #cacaca;">
    <div style="WIDTH:100%; clear:both; height:31px; background-image:url(/statics/image/bg_13 (1).gif); background-repeat:repeat-x; border-bottom:1px solid #cacaca;">
        <div style="float:left; height:31px; color:#9e0905; font-weight:bold; line-height:31px; margin-left:20px; font-size:14px;color:#fff;">城市天气预报</div>
        <div style="float:right; height:31px; margin-right:30px; line-height:31px;">
            <a href="http://www.tianqi.com/data/html/code_city.html" title="修改城市"><strong>威宁</strong></a> [<a href="http://www.tianqi.com/data/html/code_city.html" class="cc30"><u>定制城市</u></a>]
        </div>
    </div>
    <a target="_blank"  href="http://bijie.tianqi.com/weining/?tq" title="威宁天气预报,点击查看威宁未来七天天气预报 ">
        <div style="clear:both; PADDING-TOP:8px; padding-left:10px; height:180px;">
            <div style="FLOAT:left; width:760px; height:170px;" class="bd">
                <div style="margin:10px 5px auto 5px;">
                    <table id="info" width="100%" border="0" cellspacing="1" cellpadding="0">
                        <tr  align="center" style=" height:24px;">
                            <td>
                                <span id="Label0">07月19日</span>
                            </td>
                            <td>
                                <span id="Label1">07月20日</span>
                            </td>
                            <td>
                                <span id="Label2">07月21日</span>
                            </td>
                        </tr>
                        <tr align="center" style=" height:72px;">
                            <td id="tdPic0">
                                <img class='pngtqico' align='absmiddle' src='http://img.tianqi.com/static/images/tianqibig/b7.png' style='border:0;width:46px;height:46px'/>&nbsp;
                                <img class='pngtqico' align='absmiddle' src='http://img.tianqi.com/static/images/tianqibig/b7.png' style='border:0;width:46px;height:46px'/></td>
                            <td id="tdPic1">
                                <img class='pngtqico' align='absmiddle' src='http://img.tianqi.com/static/images/tianqibig/b3.png' style='border:0;width:46px;height:46px'/> &nbsp;
                                <img class='pngtqico' align='absmiddle' src='http://img.tianqi.com/static/images/tianqibig/b7.png' style='border:0;width:46px;height:46px'/></td>
                            <td id="tdPic2">
                                <img class='pngtqico' align='absmiddle' src='http://img.tianqi.com/static/images/tianqibig/b3.png' style='border:0;width:46px;height:46px'/> &nbsp;
                                <img class='pngtqico' align='absmiddle' src='http://img.tianqi.com/static/images/tianqibig/b3.png' style='border:0;width:46px;height:46px'/></td>
                        </tr>
                        <tr  align="center" style=" height:24px;">
                            <td height="17">
                                <div id="date"> 小雨 23℃～14℃  </div>                                 
                            </td>
                            <td height="17">
                                <div id="Div5">小雨 21℃～14℃</div>
                            </td>
                            <td height="17">
                                <div id="Div6">阵雨 22℃～13℃</div>
                            </td>
                        </tr>
                        <tr align="center" style=" height:24px;">
                            <td height="17">
                                <div id="Wind">微风</div>
                            </td>
                            <td height="17">
                                <div id="Div3">东南风 1-2级</div>
                            </td>
                            <td height="17">
                                <div id="Div4">南风 1-2级</div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div style="FLOAT:left; width:115px; height:160px; margin-left:7px; padding:5px;"
                 class="bd">
                <table id="Table1" width="100%" cellpadding="0" cellspacing="0" style="text-align:center;background-image:url(/statics/image/001_13.gif); background-repeat:no-repeat; background-position:20px 58px;">
                    <tr>
                        <td colspan="2" style="height:19px; color:#fff;">当前天气</td>
                    </tr>
                    <tr>
                        <td style="height:19px; color:#fff;" align="center" > 温度</td>
                        <td style=" color:#fff;">湿度</td>
                    </tr>
                    <tr>
                        <td style="height:19px" align="center">
                                <span id="Label4" style=" color:#fff;">
                                    19.8℃
                                </span>
                        </td>
                        <td>
                            <span id="Label5" style=" color:#fff;">
                                82%  
                             </span>
                        </td>
                    </tr>
                    <tr style="" valign="bottom">
                        <td colspan="2" style="height:63px;" align="left">
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="width:33px;">
                                    </td>
                                    <td valign="bottom" style="height:63px;">
                                        <img src="/statics/image/wd_13 (1).gif" id="wdPic" width="7" height="31.185" alt="温度：19.8℃" />
                                    </td>
                                    <td style="width:33px;">
                                    </td>
                                    <td valign="bottom" style="height:63px;">
                                        <img src="/statics/image/sd_13 (1).gif" id="sdPic" width="7" height="51.66" alt="湿度：82%" />
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td id="tdsk" style="PADDING-TOP:25px; vertical-align:bottom" colspan="2">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </a>
</div>
    </div>-->
</div>
</body>
<script>
    window.onload=function(){
        var oUl=document.getElementById("roll2");
        var oAudio=document.getElementsByClassName("box_audio")[0];
        oUl.onclick=function(){
            setTimeout(function(){
                if(oAudio.paused){
                    oAudio.play();
                }
            },500)
        }
    }
</script>
</html>

			    
			