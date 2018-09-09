<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>提示信息</title>

<style type="text/css">
*{ padding:0; margin:0; font-size:12px}
.showMsg-box{position:fixed;top:0;left:0;background:#000;width:100%;height:100%;}
.showMsg .guery {white-space: pre-wrap; /* css-3 */white-space: -moz-pre-wrap; /* Mozilla, since 1999 */white-space: -pre-wrap; /* Opera 4-6 */white-space: -o-pre-wrap; /* Opera 7 */	word-wrap: break-word; /* Internet Explorer 5.5+ */}
a:link,a:visited{text-decoration:none;color:#FFF}
a:hover,a:active{color:#FFF;text-decoration: underline}
.showMsg{border: 1px solid #ccc; zoom:1; width:450px;height:160px;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%); background: rgba(8, 77, 103,0.7);}
.showMsg h5{color:#fff; padding-left:20px; height:30px; line-height:30px;overflow:hidden;font-size:14px; text-align:left;background:rgba(8, 77, 103,0.8);border-bottom:1px solid #ccc}
.showMsg .content{height:100px; font-size:15px;line-height: 40px;color:#fff;zoom:1;width:100%;text-align:center}
.showMsg .bottom{line-height:30px; height:30px; text-align:center;letter-spacing: 2px}
.showMsg .ok,.showMsg .guery{<!--background: url(/statics/image/msg_bg.png) no-repeat 0px -108px;-->}
.showMsg .guery{background-position: left -460px;}
@media screen and (max-width: 1200px) and (min-width: 320px){
.showMsg{width:600px;height:340px}
.showMsg h5{height:60px;font-size:35px;line-height:60px;}
.showMsg .content{height:218px;font-size:40px;line-height:80px}
.showMsg .bottom{height: 60px;line-height: 60px;}
.showMsg .bottom a{font-size:26px}
}
</style>
</head>
<body>
<div class="showMsg-box">
    <div class="showMsg" style="text-align:center">
    	<h5>提示信息</h5>
        <div class="content guery">
            <?php echo $msg;?>
        </div>
        <div class="bottom">

    	    <a  href="JavaScript:redirect('<?php echo $url;?>')">如果您的浏览器没有自动跳转，请点击这里</a>
    	    <script language="javascript">setTimeout("redirect('<?php echo $url;?>');",2000);</script>
        </div>
    </div>
</div>
<script type="text/javascript" src="/statics/js/jquery-1.7.1.min.js"></script>
<script style="text/javascript">
	function redirect(url) {
		if(url == "logout"){
			window.parent.location="/index.php/admin/index/login";
		}else{
			if(url == "histor"){
				history.back();
			}else{
				window.location.href=url;
			}
		}
	}
	$(function(){
	    var oHeight=$(window).height();
        $(window).resize(function(){
            oHeight=$(window).height();
            $(".showMsg-box").css("height",oHeight+"px");
        });
        $(".showMsg-box").css("height",oHeight+"px");
	})
</script>
</body>
</html>
<?php exit;?>