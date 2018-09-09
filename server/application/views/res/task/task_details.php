<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>查看任务</title>
    <link rel="shortcut icon" href="/favicon.ico">
	<link href="/statics/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/statics/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/statics/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/statics/css/animate.css" rel="stylesheet">
    <link href="/statics/css/style.css?v=4.1.0" rel="stylesheet">
	<script src="/statics/js/jquery.min.js?v=2.1.4"></script>
	<script src="/statics/js/bootstrap.min.js"></script>
	<script src="/statics/js/plugins/dataTables/jquery.dataTables.js"></script>
	<script type="text/javascript"  src="/statics/js/plugins/dataTables/dataTables.bootstrap.js"></script>
	<style>
	.form-group{
		margin-bottom:5px !important;
	}
	.hr-line-dashed{
		margin: 5px 0 !important;
	}
	.form-control[readonly]
	{
		background-color:#fff;
	}
	.gray-bg{
		overflow:hidden;
	}
	h5{
		color:#d46767
	}
	.str{margin-top:8px;}
	.decp{width:26%;}
	</style>
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight"  >
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
				
				<div class="tabs-container">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active "><a  href="#tab-1" class="showload" >任务信息</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                        <form class="form-horizontal">
						   <input type="hidden" name="hid_id1" id="hid_task_Id" value="5">
							<div class="ibox-content" style="border:none;">
						<h5>基本信息</h5>
						<div class="hr-line-dashed"></div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">任务名称：</label>
							<div class="col-sm-3" style="margin-top:8px;">
								走进社区							</div>
							<label class="col-sm-2 control-label">任务状态：</label>
							<div class="col-sm-3" style="margin-top:8px;">
								待启动							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">任务类型：</label>
							<div class="col-sm-3" style="margin-top:8px;">
								工作任务							</div>
							<label class="col-sm-2 control-label">重要程度：</label>
							<div class="col-sm-4" style="margin-top:8px;">
								一般							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">负责人：</label>
							<div class="col-sm-3" style="margin-top:8px;">
								李飞;							</div>
							<label class="col-sm-2 control-label">参与人：</label>
							<div class="col-sm-4" style="margin-top:8px;">
								沈浪; 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">开始时间：</label>
							<div class="col-sm-3" style="margin-top:8px;">
								2017-06-28 00:00:00							</div>
							<label class="col-sm-2 control-label">预计结束时间：</label>
							<div class="col-sm-4" style="margin-top:8px;">
								2017-06-30 00:00:00							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">任务详情：</label>
							<div class="col-sm-10" style="margin-top:8px;">
							走进社区							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">创建人：</label>
							<div class="col-sm-3" style="margin-top:8px;">
								admin							</div>
							<label class="col-sm-2 control-label">创建时间：</label>
							<div class="col-sm-4" style="margin-top:8px;">
								2017-06-28 15:33:24							</div>
						</div>
					</div>
					
						  </form>
                       </div>
                    </div>

					
                </div>
				
							
				</div>
			</div>
		</div>
	</div>
</body>

</html>