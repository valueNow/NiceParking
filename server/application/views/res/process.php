<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>流程列表</title>
    <link rel="shortcut icon" href="/favicon.ico">
	<link href="/statics/css/bootstrap.min.css" rel="stylesheet">
    <link href="/statics/css/font-awesome.css" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/animate.css" rel="stylesheet">
    <link href="/statics/css/style.css" rel="stylesheet">
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
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>流程列表</h5>
						<div class="ibox-tools">
							<a class="collapse-link">
								<i class="fa fa-chevron-up" onclick="$('#quary').slideToggle()"></i>
							</a>
						</div>
                    </div>
					<div class="ibox-content" id="quary">
						
						<div class="form-group">
							<div class="col-sm-2" style="padding:0px;">
								<input type="text" placeholder="流程标题" id="chop_title" class="form-control">
							</div>
							<div class="col-sm-2">
								<button class="btn btn-white" type="button" onclick="search()" style="margin:0">查询</button>
							</div>
						</div>
					</div>
                    <div class="ibox-content" id="result">
						<div id="editable_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-6"><a  href="/index.php/res/business/p_add" id="btnadd" class="btn btn-primary ">新增流程</a><div class="dataTables_length" id="editable_length" style="float: left;"><label>每页 <select name="editable_length" aria-controls="editable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> 条记录</label></div></div><div class="col-sm-6"></div><div id="editable_processing" class="dataTables_processing" style="visibility: hidden;">处理中…</div></div><table class="table table-striped table-bordered table-hover display nowrap dataTable no-footer" cellspacing="0" width="100%" id="editable" aria-describedby="editable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                	<th class="text-center" rowspan="1" colspan="1" style="width: 38px;">序号</th>
                                	<th rowspan="1" colspan="1" style="width: 252px;">流程标题</th>
                                	<th rowspan="1" colspan="1" style="width: 72px;">事件等级</th>
                                	<th rowspan="1" colspan="1" style="width: 87px;">申请人</th>
                                	<th rowspan="1" colspan="1" style="width: 166px;">申请时间</th>
                                	<th rowspan="1" colspan="1" style="width: 193px;">申请人部门</th>
                                	<th rowspan="1" colspan="1" style="width: 39px;">操作</th>
                                </tr>
                            </thead>
                        <tbody>
                        	<tr class="odd">
                        		<td class=" text-center">9</td>
                        		<td class=" "><a href="/index.php/res/business/p_details" >用章流程-李飞-2017-06-28 </a></td>
                        		<td class=" ">正常</td>
                        		<td class=" ">李飞</td>
                        		<td class=" ">2017-06-28 15:41:33</td>
                        		<td class=" ">旅游局</td>
                        		<td class=" "><p><a href="/index.php/res/business/p_details/9/20083">查看</a> </p></td>
                        	</tr>
                        	<tr class="even">
                        		<td class=" text-center">8</td>
                        		<td class=" "><a href="/index.php/res/business/p_details/8/20071">请假流程-沈浪-2017-06-28</a></td>
                        		<td class=" ">正常</td>
                        		<td class=" ">沈浪</td>
                        		<td class=" ">2017-06-28 15:17:04</td>
                        		<td class=" ">县旅游局</td>
                        		<td class=" "><p><a href="/index.php/res/business/p_details/8/20071">查看</a> </p></td>
                        	</tr>
                        	<tr class="odd">
                        		<td class=" text-center">7</td>
                        		<td class=" "><a href="/index.php/res/business/p_details/7/12640">用章流程-沈浪-2017-05-15</a></td>
                        		<td class=" ">正常</td>
                        		<td class=" ">沈浪</td>
                        		<td class=" ">2017-05-15 14:17:53</td>
                        		<td class=" ">县旅游局</td>
                        		<td class=" "><p><a href="/index.php/res/business/p_details/7/12640">查看</a> </p></td>
                        	</tr>
                        	<tr class="even">
                        		<td class=" text-center">6</td>
                        		<td class=" "><a href="/index.php/res/business/p_details/6/12605">用章流程-管理员-2017-04-23</a></td>
                        		<td class=" ">正常</td>
                        		<td class=" ">管理员</td>
                        		<td class=" ">2017-04-23 22:36:47</td>
                        		<td class=" "></td><td class=" "><p><a href="/index.php/res/business/p_details/6/12605">查看</a> </p></td></tr><tr class="odd"><td class=" text-center">3</td><td class=" "><a href="/index.php/res/business/p_details/3/">请假流程-管理员-2017-04-23</a></td><td class=" ">正常</td><td class=" ">管理员</td><td class=" ">2017-04-23 22:36:47</td><td class=" "></td>
                        		<td class=" "><p><a href="/index.php/res/business/p_details/3/">查看</a> </p></td>
                        	</tr>
                        	<tr class="even">
                        		<td class=" text-center">2</td>
                        		<td class=" "><a href="/index.php/res/business/p_details/2/">用章流程-测试-2017-04-21</a></td>
                        		<td class=" ">正常</td>
                        		<td class=" ">测试</td>
                        		<td class=" ">2017-04-21 18:40:01</td>
                        		<td class=" "></td><td class=" "><p><a href="/index.php/res/business/p_details/2/">查看</a> </p></td>
                        	</tr>
                        	<tr class="odd">
                        		<td class=" text-center">1</td>
                        		<td class=" "><a href="/index.php/res/business/p_details/1/">请假流程-测试-2017-04-21</a></td>
                        		<td class=" ">正常</td>
                        		<td class=" ">测试</td>
                        		<td class=" ">2017-04-21 15:40:32</td>
                        		<td class=" "></td><td class=" "><p><a href="/index.php/res/business/p_details/1/">查看</a> </p></td>
                        	</tr>
                        </tbody>
                       </table>
                       <div class="row">
                       	<div class="col-sm-6">
                       		<div class="dataTables_info" id="editable_info" role="alert" aria-live="polite" aria-relevant="all">显示 1 到 9 项，共 7 项</div>
                       	</div>
                       <div class="col-sm-6">
                       	<div class="dataTables_paginate paging_simple_numbers" id="editable_paginate">
                       		<ul class="pagination">
                       			<li class="paginate_button previous disabled" aria-controls="editable" tabindex="0" id="editable_previous"><a href="#">上一页</a></li>
                       			<li class="paginate_button active" aria-controls="editable" tabindex="0"><a href="#">1</a></li>
                       			<li class="paginate_button next disabled" aria-controls="editable" tabindex="0" id="editable_next"><a href="#">下一页</a></li>
                       		</ul>
                       	</div></div></div></div>
                    </div>
                </div>
            </div>
        </div>
	</div>

</body></html>