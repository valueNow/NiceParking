
<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>个人工作台</title>
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
    <div class="wrapper wrapper-content animated fadeInRight">
	<div class="ibox-title">
				<h5>个人工作台</h5>
				<div class="ibox-tools">
					<a class="collapse-link">
						<i class="fa fa-chevron-up" onclick="$('#quary').slideToggle()"></i>
					</a>
				</div>
        </div>
	
	<div class="col-sm-6">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>待办事项</h5>
				<a href="javascript:;" id="a_todo_task" style="float:right;"><h5>刷新</h5></a>
			</div>
			<div class="ibox-content" style=" font-size: 14px;">
				<div class="title" id="send">
				<a class="more"></a>
				<a href="javascript:" class="set"></a>
				<div class="clear"></div>
				</div>

				<div class="content">
				<table border="0" width="100%" cellpadding="4" cellspacing="0">
				<tbody><tr class="thead">
				<td width="50%">标题</td>
				<td width="20%">当前步骤</td>
				<td width="15%">发送人</td>
				<td width="15%">发送日期</td>
				</tr>
				<tr>
				<td>[用章申请单]<a  href="/index.php/res/business/p_details"><span title="用章申请-黄曲">☉用章申请-黄曲</span></a></td>
				<td>审批</td>
				<td>黄曲</td>
				<td>2017-07-12</td>
				</tr>
				<tr>
				<td>[用章申请表]<a  href="/index.php/res/business/p_details"><span title="">☉用章申请</span></a></td>
				<td>资产确认归还</td>
				<td>黄曲</td>
				<td>2017-06-23</td>
				</tr>
				<tr>
				<td>[用章申请]<a  href="/index.php/res/business/p_details"><span title="">☉XXXXXX</span></a></td>
				<td>行政审批</td>
				<td>黄曲</td>
				<td>2017-06-23</td>
				</tr>
				<tr>
				<td>[用章申请单]<a  href="/index.php/res/business/p_details"><span title="">☉用章申请-黄曲</span></a></td>
				<td>审批</td>
				<td>黄曲</td>
				<td>2017-06-23</td>
				</tr>
				<tr>
				<td>[用章流程]<a  href="/index.php/res/business/p_details">☉用章申请</a></td>
				<td>审批</td>
				<td>黄曲</td>
				<td>2017-06-23</td>
				</tr>
				</tbody></table>
				</div>

		</div>
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>待办任务</h5>
				<a style="float:right;"><h5>more</h5></a>
			</div>
			<div class="ibox-content" style=" font-size: 14px;">
				<div class="task_list">
					<div class="title" id="TaskDesktopControl">
					<a class="more"></a>
					<a href="javascript:" class="set"></a>
					<div class="clear"></div>
					</div>

					<div class="content">
					<table border="0" width="100%" cellpadding="4" cellspacing="0" style="display:">
					<tbody><tr class="thead">
					<td width="35%">任务名称</td>
					<td width="20%">开始日期</td>
					<td width="20%">结束日期</td>
					<td width="15%">进度</td>
					<td width="10%">超期</td>
					</tr>
					<tr>
					<td><a href="/index.php/res/business/t_details/4">销售计划(制定客户沟通细则)</a></td>
					<td>2012-07-12</td>
					<td>2012-08-31</td>
					<td><span class="rank" style="width:100%; background:#efefef" title="0.00%"><span class="rank" style="width:0.00%"></span></span></td>
					<td>1186</td>
					</tr>
					<tr>
					<td><a href="/index.php/res/business/t_details/4">公司年度培训计划(日常英语口语培训)</a></td>
					<td>2012-05-17</td>
					<td>2012-08-24</td>
					<td><span class="rank" style="width:100%; background:#efefef" title="0.00%"><span class="rank" style="width:0.00%"></span></span></td>
					<td>1191</td>
					</tr>
					<tr>
					<td><a href="/index.php/res/business/t_details/4">课题项目研究实施(搜集材料)</a></td>
					<td>2014-06-07</td>
					<td>2014-07-17</td>
					<td><span class="rank" style="width:100%; background:#efefef" title="0.00%"><span class="rank" style="width:0.00%"></span></span></td>
					<td>734</td>
					</tr>
					</tbody></table>
					</div>
					 
				</div>
			</div>
		</div>
	</div>
    </div>
	<div class="col-sm-6">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>通知公告</h5>
				<a style="float:right;"><h5>more</h5></a>
			</div>
			<div class="ibox-content" style=" font-size: 14px;">
				<div class="notice_list">
					 <table border="0" width="100%" cellpadding="4" cellspacing="0" style="display:">
						<tbody><tr class="thead"><td width="16px"></td>
						<td width="58%">
						标题
						</td>
						<td width="20%">状态</td><td width="20%">创建日期</td>
						</tr>
						<tr><td width="16px"></td>
						<td>
						<a href="/index.php/res/business/n_details/10"><span title="薪资核对通知">薪资核对通知</span></a>
						</td>
						<td><font color="red">未读</font></td><td>
						2017-07-07
						</td>
						</tr>
						<tr><td width="16px"></td>
						<td>
						<a href="/index.php/res/business/n_details/10"><span title="是否有网络报错">是否有网络报错</span></a>
						</td>
						<td><font color="red">未读</font></td><td>
						2017-07-19
						</td>
						</tr>
						<tr><td width="16px"></td>
						<td>
						<a href="/index.php/res/business/n_details/10"><span title="7月份薪资发放通知">7月份薪资发放通知</span></a>
						</td>
						<td><font color="#666666">已读
						</font></td><td>
						2017-07-19
						</td>
						</tr>
						<tr><td width="16px"></td>
						<td>
						<a href="/index.php/res/business/n_details/10"><span title="6月份薪资发放通知">6月份薪资发放通知
						</span></a></td><td><font color="red">未读</font></td><td>
						2017-07-19
						</td>
						</tr>
						<tr><td width="16px"></td>
						<td>
						<a href="/index.php/res/business/n_details/10"><span title="全程软件2017.08版升级公告">全程软件2017.08版升级公告</span></a>
						</td>
						<td><font color="red">未读</font></td><td>
						2017-06-27
						</td>
						</tr>
						</tbody>
						</table>
					</div>
				</div>
			</div>

		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>日程事务</h5>
				<a style="float:right;"><h5>more</h5></a>
			</div>
			<div class="ibox-content" style=" font-size: 14px;">
				<div class="content">
						<table border="0" width="100%" cellpadding="4" cellspacing="0" style="display: none;">
						<tbody><tr class="thead">
						<td width="45%">主题</td>
						<td width="15%">重要程度</td>
						<td width="15%">发送人</td>
						<td width="30%">开始日期</td>
						</tr>
						</tbody></table>
						<table border="0" width="100%" cellpadding="4" cellspacing="0" style="display: none;">
						<tbody><tr class="thead">
						<td width="45%">主题</td>
						<td width="15%">重要程度</td>
						<td width="15%">发送人</td>
						<td width="30%">开始日期</td>
						</tr>
						</tbody></table>
						<table border="0" width="100%" cellpadding="4" cellspacing="0" style="display: none;">
						<tbody><tr class="thead">
						<td width="45%">主题</td>
						<td width="15%">重要程度</td>
						<td width="15%">发送人</td>
						<td width="30%">开始日期</td>
						</tr>
						<tr>
						<td><a href="javascript:;" onclick="qc.openWindow('/Common/Schedule/ScheduleEdit.aspx?Operation=2&amp;PK_ID=739',760,500)">产品升级会议</a></td>
						<td></td>
						<td><a href="javascript:;" onclick="showUserInfo(25);">方总监</a></td>
						<td>2017-07-27 08:00:00</td>
						</tr>
						</tbody></table>
						<table border="0" width="100%" cellpadding="4" cellspacing="0" style="display: table;">
						<tbody><tr class="thead">
						<td width="45%">主题</td>
						<td width="15%">重要程度</td>
						<td width="15%">发送人</td>
						<td width="30%">开始日期</td>
						</tr>
						<tr>
						<td><a href="javascript:;" onclick="qc.openWindow('/Common/Schedule/ScheduleEdit.aspx?Operation=2&amp;PK_ID=739',760,500)">产品升级会议</a></td>
						<td></td>
						<td><a href="javascript:;" onclick="showUserInfo(25);">方总监</a></td>
						<td>2017-07-27 08:00:00</td>
						</tr>
						<tr>
						<td><a href="javascript:;" onclick="qc.openWindow('/Common/Schedule/ScheduleEdit.aspx?Operation=2&amp;PK_ID=740',760,500)">公司规章制服</a></td>
						<td></td>
						<td><a href="javascript:;" onclick="showUserInfo(25);">方总监</a></td>
						<td>2017-07-13 13:00:00</td>
						</tr>
						<tr>
						<td><a title="重要"><font color="red">■</font></a> <a href="javascript:;" onclick="qc.openWindow('/Common/Schedule/ScheduleEdit.aspx?Operation=2&amp;PK_ID=737',760,500)">产品测试</a></td>
						<td>重要</td>
						<td><a href="javascript:;" onclick="showUserInfo(2);">林经理</a></td>
						<td>2017-07-13 08:30:00</td>
						</tr>
						<tr>
						<td><a href="javascript:;" onclick="qc.openWindow('/Common/Schedule/ScheduleEdit.aspx?Operation=2&amp;PK_ID=738',760,500)">产品升级会议</a></td>
						<td></td>
						<td><a href="javascript:;" onclick="showUserInfo(25);">方总监</a></td>
						<td>2017-07-13 08:00:00</td>
						</tr>
						<tr>
						<td><a title="重要"><font color="red">■</font></a> <a href="javascript:;" onclick="qc.openWindow('/Common/Schedule/ScheduleEdit.aspx?Operation=2&amp;PK_ID=690',760,500)">第三季度总结</a></td>
						<td>重要</td>
						<td><a href="javascript:;" onclick="showUserInfo(227);">蒋轶</a></td>
						<td>2014-09-30 08:30:00</td>
						</tr>
						</tbody>
						</table>
				</div>
			</div>
		</div>

	</div>
	</div>
	
	

</body>
</html>