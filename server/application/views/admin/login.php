<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>景区三维可视化系统登录</title>
    <link rel="stylesheet" href="/statics/css/font-awesome-4.7.0/css/font-awesome.css"/>
    <link rel="stylesheet" href="/statics/css/login.css" type="text/css"/>
    <link href="/statics/css/media.css" rel="stylesheet">
    	<style>
    		@import url(/statics/css/plugins/Cesium/Build/Cesium/Widgets/widgets.css);
			@import url(/statics/css/plugins/Cesium/Build/Cesium/Widgets/Navigation.css);
			@import url(/statics/js/plugins/Cesium/Source/Widgets/InfoBox/InfoBox.css);
			.cesium-viewer-bottom{
				display: none;
			}
    	</style>
</head>
<body>
<div class="" id="viewMap"><!--content-->
	<form method="post" action="/index.php/admin/index/login" id="myform" name="myform">
    <div class="content-box">
        <h5 class="login-title">景区三维可视化系统</h5>
        <div>
            <i class="fa fa-user"></i>
            <input type="text" name="userName" class="userName" placeholder="用户名" required="">
        </div>
        <div>
            <i class="fa fa-lock"></i>
            <input type="password" name="passWord" class="passWord" placeholder="密码" required="">
        </div>
        <div><input class="content-btn" name="dosubmit" type="submit" value="提&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;交"></div>
        <p style="display:none;">
            <input type="checkbox" value="记住密码"/><span>记住密码</span>
            <a href="javascript:alert('请联系管理员！')">忘记密码？</a>
        </p>
    </div>
	</form>
</div>
<script src="/statics/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="/statics/js/rem.js"></script>
<script type="text/javascript">
    $(function(){
        var oHeight=$(window).height();
        $(window).resize(function(){
            oHeight=$(window).height();
            $("#viewMap").css("height",oHeight+"px");
        });
        $("#viewMap").css("height",oHeight+"px");
    })
</script>
<script src="/statics/js/require.js" data-main="/statics/js/login"></script>
</body>
</html>