<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>权限设置</title>
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
</head>
<body>
<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5>权限设置（<?php echo $role['name'];?>）</h5>
	</div>
	<div class="ibox-content">
	<form method="post" action="/index.php/admin/user_role/role_priv">
		<table class="table table-bordered table-hover dataTables-example">
		<?php foreach($menu as $k=>$v){ ?>
		<?php if($v['parentid']==0){ ?>
		 <tr id="node-<?php echo $v['menu_id'];?>">
		  <td width="18%" valign="top">
			<input name="menuid[]" type="checkbox" level="0" value="<?php echo $v['menu_id'];?>" onclick="javascript:checknode(this);" <?php if(in_array($v['menu_id'],$role_priv)){echo "checked";}?> >&nbsp;<?php echo $v['name'];?></td>
		  <td>
			<?php foreach($menu as $key=>$val){ ?>
			<?php if($val['parentid']==$v['menu_id']){ ?>
				<div style="width:200px;float:left;">
					<label><input type="checkbox" name="menuid[]" level="1" value="<?php echo $val['menu_id'];?>" onclick="javascript:checknode(this);" <?php if(in_array($val['menu_id'],$role_priv)){echo "checked";}?> >&nbsp;<?php echo $val['name'];?></label>
				</div>
				<?php foreach($menu as $ke=>$va){ ?>
				<?php if($va['parentid']==$val['menu_id']){ ?>
					<div style="width:200px;float:left;">
						<label><input type="checkbox" name="menuid[]" level="1" value="<?php echo $va['menu_id'];?>" onclick="javascript:checknode(this);" <?php if(in_array($va['menu_id'],$role_priv)){echo "checked";}?> >&nbsp;<?php echo $va['name'];?></label>
					</div>
				<?php } ?>
				<?php } ?>
			<?php } ?>
			<?php } ?>
			</td></tr>
		  <tr>
		  <?php } ?>
		  <?php } ?>
			<td align="center" colspan="2" >
			  <input type="checkbox" name="checkall" value="checkbox" onclick="checkAll(this.form, this);" class="checkbox" />&nbsp;全选&nbsp;&nbsp;&nbsp;&nbsp;
			  <input type="submit" name="dosubmit" value=" 保存 " class="button" />&nbsp;&nbsp;&nbsp;
			  <input type="reset" value=" 重置 " class="button" />
			  <input type="hidden" name="roleid" value="<?php echo $role['roleid'];?>" />
			</td>
		  </tr>
		</table>
	</form>
	</div>
</div>
<script src="/statics/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript">
	function checkAll(frm, checkbox){
	  for (i = 0; i < frm.elements.length; i++){
		if (frm.elements[i].name == 'menuid[]'){
		  frm.elements[i].checked = checkbox.checked;
		}
	  }
	}
	function checknode(obj){
      var chk = $("input[type='checkbox']");
      var count = chk.length;
      var num = chk.index(obj);
      var level_top = level_bottom =  chk.eq(num).attr('level')
      for (var i=num; i>=0; i--)
      {
              var le = chk.eq(i).attr('level');
              if(eval(le) < eval(level_top)) 
              {
                  chk.eq(i).attr("checked",'checked');
                  var level_top = level_top-1;
              }
      }
      for (var j=num+1; j<count; j++)
      {
              var le = chk.eq(j).attr('level');
              if(chk.eq(num).attr("checked")=='checked') {
                  if(eval(le) > eval(level_bottom)) chk.eq(j).attr("checked",'checked');
                  else if(eval(le) == eval(level_bottom)) break;
              }
              else {
                  if(eval(le) > eval(level_bottom)) chk.eq(j).attr("checked",false);
                  else if(eval(le) == eval(level_bottom)) break;
              }
      }
	}
</script>
</body>
</html>