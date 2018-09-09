<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>娱乐场所列表</title>
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
                        <h5>娱乐场所列表</h5>
						<div class="ibox-tools">
							<a class="collapse-link">
								<i class="fa fa-chevron-up" onclick="$('#quary').slideToggle()"></i>
							</a>
						</div>
                    </div>
					<div class="ibox-content" style="padding-top:15px !important;padding-bottom:15px !important;"  id="quary">
						<form role="form" class="form-inline">
							<div class="form-group">
								<input type="text" placeholder="娱乐场所名称" id="feature_name" class="form-control">
							</div>
							<button class="btn btn-white" type="button" onclick='search()' style="margin:0" >查询</button>
						</form>
					</div>
                    <div class="ibox-content" id="result">
						<div class="row">
							<div class="col-sm-12">
								<a href="/index.php/res/Resources/happy_add" id="btnadd" class="btn btn-primary ">新增娱乐场所</a>
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
									<th>娱乐场所名称</th>
									<th>景点特色</th>
                                    <th>预定电话</th>
									<th>地址</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>澳门水舞间</td>
									<td>全球崭新独特扣人心弦的巨献,东西方独特的娱乐元素，让人叹为观止,多项领先设施，触动人心，感受科技震撼,国际绝技演员惊世鉅献，见证舞艺混搭之美</td>
									<td>010-210032-2123</td>
									<td>澳门特别行政区路凼连贯公路新濠天地水舞间剧院</td>
									<td><a href="/index.php/res/Resources/happy_look">查看</a> | <a href="/index.php/res/Resources/happy_update">修改</a> | <a href="javascript:if(confirm('确定要删除吗?')) alert('删除成功')">删除</a></td>
								</tr>
								<tr>
									<td>2</td>
									<td>澳门威尼斯</td>
									<td>体验手工精巧，是当地特有的和具代表性的传统划船,伴随船夫优雅美妙的歌声，令旅程更添完满,近距离体验意大利威尼斯风情,浪漫和其乐融融尽在贡多拉</td>
									<td>0000-324562-1221</td>
									<td>澳门特别行政区氹仔岛金光大道望德圣母湾大马路</td>
									<td><a href="/index.php/res/Resources/happy_look">查看</a> | <a href="/index.php/res/Resources/happy_update">修改</a> | <a href="javascript:if(confirm('确定要删除吗?')) alert('删除成功')">删除</a></td>
								</tr>
								<tr>
									<td>3</td>
									<td>澳门新濠影汇</td>
									<td>全球较高8字形摩天轮瞩目地标,以DC漫画英雄蝙蝠侠为主题的四维模拟飞行体验【蝙蝠侠夜神飞驰】,【魔幻间】汇聚级棒魔术师联手打造亚洲新一代魔影艺术之都,影汇之星以复古科幻为主的透明观景厢，带您尽览澳门迷人景致</td>
									<td>011-314102-4433</td>
									<td>澳门特别行政区路氹连贯公路新濠影汇酒店</td>
									<td><a href="/index.php/res/Resources/happy_look">查看</a> | <a href="/index.php/res/Resources/happy_update">修改</a> | <a href="javascript:if(confirm('确定要删除吗?')) alert('删除成功')">删除</a></td>
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