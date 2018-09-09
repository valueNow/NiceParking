<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends MY_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('url');
        $this->load->model('user_model','user');
		$this->load->model('public_model','public_model');
    }
	
	//日志列表
	public function index()
	{
		if(empty($_GET)){
			$this->load->view('admin/logs_list');
		}else{
			$serchdata['draw']=$_GET['draw'];
			$serchdata['order_column']=$_GET['order']['0']['column'];
			$serchdata['order_dir']=$_GET['order']['0']['dir'];
			$serchdata['start']=$_GET['start'];
			$serchdata['length']=$_GET['length'];
			//获取自定义的查询条件
			if(isset($_GET['operating'])){
				$serchdata['operating'] = $_GET['operating'];
			}
			if(isset($_GET['username'])){
				$serchdata['username'] = $_GET['username'];
			}
			if(isset($_GET['start_time']) ){
				$serchdata['start_time'] = $_GET['start_time'];
			}
			if(isset($_GET['end_time']) ){
				$serchdata['end_time'] = $_GET['end_time'];
			}
			$res = $this->user->logs_list($serchdata,$serchdata['start'],$serchdata['length']);
			$infos=array();
			foreach ($res['data'] as $k => $v) {
				$obj = array($v['operating'],$v['module'],$v['catname'],$v['username'],date('Y-m-d H:i:s',$v['add_time']),'<p><a  href="/index.php/admin/logs/del_logs/'.$v['log_id'].'" >删除</a> </p>');
				array_push($infos,$obj);
			}
			$returndata= json_encode(array(
			"draw" 				=> intval($serchdata['draw']),
			"recordsTotal" 		=> intval($res ['total']),
			"recordsFiltered" 	=> intval($res ['total']),
			"data" 				=> $infos
			),JSON_UNESCAPED_UNICODE);
			echo $returndata;
		}
	}
	
	//删除日志
	public function del_logs()
	{
		$id = $this->uri->segment(4);
		$result = $this->public_model->del_data('admin_logs',array('log_id' => $id));
		if($result){
			$this->write_log();
			$this->load->view('message',array('msg'=>'操作成功！','url'=>'/index.php/admin/logs/index'));
		}else{
			$this->load->view('message',array('msg'=>'操作失败！','url'=>'/index.php/admin/logs/index'));
		}
	}
	
	//数据备份列表
	public function data_backup_index()
	{
		if(empty($_GET)){
			$this->load->view('admin/data_backup_list');
		}else{
			$serchdata['draw']=$_GET['draw'];
			$serchdata['order_column']=$_GET['order']['0']['column'];
			$serchdata['order_dir']=$_GET['order']['0']['dir'];
			$serchdata['start']=$_GET['start'];
			$serchdata['length']=$_GET['length'];
			//获取自定义的查询条件
			if(isset($_GET['operating'])){
				$serchdata['operating'] = $_GET['operating'];
			}
			if(isset($_GET['username'])){
				$serchdata['username'] = $_GET['username'];
			}
			if(isset($_GET['start_time']) ){
				$serchdata['start_time'] = $_GET['start_time'];
			}
			if(isset($_GET['end_time']) ){
				$serchdata['end_time'] = $_GET['end_time'];
			}
			$res = $this->user->data_backup_list($serchdata,$serchdata['start'],$serchdata['length']);
			$infos=array();
			foreach ($res['data'] as $k => $v) {
				$url = "/uploadfile/backup/".date('Y-m-d',$v['add_time'])."_sql.sql";
				$titlename  ="";
				$url2 ="";
				if($v['catname'] == "data_backup" && mb_substr($v['operating'],0,6) == "数据备份成功"){
					$url2 = "data_restore/".$v['add_time'];
					$titlename = "数据还原";
				}
				$obj = array($v['operating'],$v['module'],$v['catname'],$v['username'],date('Y-m-d H:i:s',$v['add_time']),"<a  href='".$url2."' >".$titlename."</a></p>");
				array_push($infos,$obj);
			}
			$returndata= json_encode(array(
			"draw" 				=> intval($serchdata['draw']),
			"recordsTotal" 		=> intval($res ['total']),
			"recordsFiltered" 	=> intval($res ['total']),
			"data" 				=> $infos
			),JSON_UNESCAPED_UNICODE);
			echo $returndata;
		}
	}
	//数据备份操作
	public function data_backup()
	{
		$this->load->library('databasetool');
		$res = $this->databasetool->backup();
		if($res){//备份成功
			$start = microtime(true);
			$end = $this->databasetool->getBegin();
			$times = $start-$end;
			$this->write_log("数据备份成功!花费时间".$times."ms");
			$this->load->view('message',array('msg'=>'操作成功！','url'=>'/index.php/admin/logs/data_backup_index'));
		}else{//失败原因
			$this->write_log("数据备份失败：".$this->databasetool->getError());
			$this->load->view('message',array('msg'=>'操作失败！','url'=>'/index.php/admin/logs/data_backup_index'));
		}
	}
	
	//数据备份还原操作
	public function data_restore()
	{
		$time = $this->uri->segment(4);
		$fileurl = "uploadfile/backup/".date('Y-m-d',$time)."_sql.sql";
		$this->load->library('databasetool');
		$res = $this->databasetool->restore($fileurl);
		if($res){//还原成功
			$start = microtime(true);
			$end = $this->databasetool->getBegin();
			$times = $start-$end;
			$this->write_log("数据还原成功!花费时间".$times."ms");
			$this->load->view('message',array('msg'=>'操作成功！','url'=>'/index.php/admin/logs/data_backup_index'));
		}else{//还原失败原因
			$this->write_log("数据还原失败：".$this->databasetool->getError());
			$this->load->view('message',array('msg'=>'操作失败！','url'=>'/index.php/admin/logs/data_backup_index'));
		}
	}


}
