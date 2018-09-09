<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>旅游商品列表</title>
    <link rel="shortcut icon" href="/favicon.ico">
	<link href="/statics/css/bootstrap.min.css" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
     <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">	
	<style>
	.table>tbody>tr>td{  
        text-align:center;  
	}  
  
	/* dataTables表头居中 */  
	.table>thead:first-child>tr:first-child>th{  
        text-align:center;      
	}
	</style>
</head>
<body class="gray-bg">
	<div class="row wrapper wrapper-content animated fadeInRight" style="padding-top:0px !important;">
		<div class="row">
			<div class="col-sm-12">
				<div class="ibox float-e-margins" style="margin-bottom:0px !important;border-bottom:0px !important;">
                    <div class="ibox-title">
                        <h5>旅游商品列表</h5>
						<div class="ibox-tools">
							<a class="collapse-link">
								<i class="fa fa-chevron-up" onclick="$('#quary').slideToggle()"></i>
							</a>
						</div>
                    </div>
					<div class="ibox-content" style="padding-top:15px !important;padding-bottom:15px !important;"  id="quary">
						<form role="form" class="form-inline">
							<div class="form-group">
								<input type="text" placeholder="旅游商品名称" id="feature_name" class="form-control">
							</div>
							<button class="btn btn-white" type="button" onclick='search()' style="margin:0" >查询</button>
						</form>
					</div>
                    <div class="ibox-content" id="result">
						<div class="row">
							<div class="col-sm-12">
								<a href="/index.php/res/Resources/commodity_add" id="btnadd" class="btn btn-primary ">新增商品</a>
								<div class="dataTables_length" id="editable_length" style="float: left;">
									<label>每页 
										<select name="editable_length" aria-controls="editable" class="form-control input-sm">
											<option value="10">10</option>
											<option value="25">25</option>
											<option value="50">50</option>
											<option value="100">100</option>
										</select> 条记录
									</label>
								</div>
							</div>
						</div>
						<table class="table table-striped table-bordered table-hover display nowrap"  cellspacing="0" width="100%" id="editable">
                            <thead>
                                <tr>
									<th>序号</th>
									<th>商品名称</th>
									<th>省</th>
                                    <th>市</th>
									<th>商品类型</th>
									<th>参考价格</th>
									<th>填报单位</th>
									<th>时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>青花瓷</td>
									<td>江西</td>
									<td>景德镇</td>
									<td>工艺品</td>
									<td>700</td>
									<td>伟景行</td>
									<td>2017-05-11 13:22:49</td>
									<td><a href="/index.php/res/Resources/commodity_look">查看</a> | <a href="/index.php/res/Resources/commodity_update">修改</a> | <a href="javascript:if(confirm('确定要删除吗?')) alert('删除成功')">删除</a></td>
								</tr>
								<tr>
									<td>2</td>
									<td>人参</td>
									<td>吉林</td>
									<td>白山市</td>
									<td>中草药</td>
									<td>300</td>
									<td>伟景行</td>
									<td>2017-06-23 8:9:43</td>
									<td><a href="/index.php/res/Resources/commodity_look">查看</a> | <a href="/index.php/res/Resources/commodity_update">修改</a> | <a href="javascript:if(confirm('确定要删除吗?')) alert('删除成功')">删除</a></td>
								</tr>
								<tr>
									<td>3</td>
									<td>肉蘑</td>
									<td>承德</td>
									<td>平泉</td>
									<td>土特产</td>
									<td>100</td>
									<td>伟景行</td>
									<td>2017-07-12 14:23:1</td>
									<td><a href="/index.php/res/Resources/commodity_look">查看</a> | <a href="/index.php/res/Resources/commodity_update">修改</a> | <a href="javascript:if(confirm('确定要删除吗?')) alert('删除成功')">删除</a></td>
								</tr>
							</tbody>
                        </table>
                        <div class="row"><div class="col-sm-6"><div class="dataTables_info" id="schedule_table_info" role="alert" aria-live="polite" aria-relevant="all">显示 7 到 7 项，共 7 项</div></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="schedule_table_paginate"><ul class="pagination"><li class="paginate_button previous disabled" aria-controls="schedule_table" tabindex="0" id="schedule_table_previous"><a href="#">上一页</a></li><li class="paginate_button active" aria-controls="schedule_table" tabindex="0"><a href="#">1</a></li><li class="paginate_button next disabled" aria-controls="schedule_table" tabindex="0" id="schedule_table_next"><a href="#">下一页</a></li></ul></div></div></div></div>
                    </div>
                </div>
            </div>
        </div>
	</div>
<script src="/statics/js/jquery.min.js"></script>
<script src="/statics/js/bootstrap.min.js"></script>
<script src="/statics/js/plugins/jeditable/jquery.jeditable.js"></script>
 <!-- datatables -->
<script src="/statics/js/plugins/dataTables/jquery.dataTables.js"></script>
<script type="text/javascript"  src="/statics/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script type="text/javascript"  >
var table; 
function search(){  
    table.ajax.reload();  
}
</script>
</body>
</html>