<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->helper('url');
        $this->load->model('user_model','user');
		$this->load->model('public_model','public_model');
    }
	
	//列表页面
	function index()
	{
		if(empty($_GET)){
			$this->load->view('admin/monitor_list');
		}else{
			$serchdata['draw']=$_GET['draw'];
			$serchdata['order_column']=$_GET['order']['0']['column'];
			$serchdata['order_dir']=$_GET['order']['0']['dir'];
			$serchdata['start']=$_GET['start'];
			$serchdata['length']=$_GET['length'];
			$res = $this->user->monitor_list($serchdata,$serchdata['start'],$serchdata['length']);
			$infos=array();
			foreach ($res['data'] as $k => $v) {
				$operate = $v['status']?"禁用":"启用";
				$statushtml='<span class="label label-danger">启用</span>';
				switch($v['status']){
					case '1':
						$statushtml='<span class="label label-success">启用</span>';
						break;  
					case '0':
						$statushtml='<span class="label label-danger">禁用</span>';
						break;    
					default:
						$statushtml='<span class="label label-danger">禁用</span>';
				}
				if($this->pingAddress($v['IP'])){
					$run_status = '正常运行..';
				}else{
					$run_status = '运行异常..';
				}
				$obj = array($v['host_name'],$v['IP'],$run_status,$v['director'],$v['mobile'],$statushtml,$v['username'],date('Y-m-d H:i:s',$v['add_time']),'<p><a  href="/index.php/admin/monitor/del_host/'.$v['guid'].'" >删除</a> | <a onclick="updateStatus(\'/index.php/admin/monitor/monitor_status_update/'.$v['guid'].'/'.$v['status'].'\')" href="#">'.$operate.' </a>|<a  href="" >远端查看</a> </p>');
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
	
	//状态修改
	public function monitor_status_update()
	{
		$guid = $this->uri->segment(4);
		$status = $this->uri->segment(5);
		$status = $status? 0:1;
		$update = array(
			'status'		=> $status,
		);
		$where = array(
			'guid' => $guid,
		);
		$result = $this->public_model->update_table('admin_monitor',$update,$where);
		if($result){
			$this->write_log();
			$res=array('status' => 'ok');
            echo json_encode($res);exit;
			//redirect('admin/monitor/index');
		}else{
		    $res=array('status' => 'err');
            echo json_encode($res);exit;
			//show_error('修改失败或无修改内容,点击<a href="'. site_url('admin/monitor/index') .'">返回列表</a>');
		}
	}
	
	//添加主机
	function add_host()
	{
		if(!empty($_POST)){
			$nowtime = time();
			$arr = array(
				'guid' => $this->Guid(),
				'host_name' => $this->input->post('host_name',TRUE),
				'IP' => $this->input->post('IP',TRUE),
				'status' => $this->input->post('status',TRUE),
				'director' => $this->input->post('director',TRUE),
				'address' => $this->input->post('address',TRUE),
				'desc' => $this->input->post('desc',TRUE),
				'mobile' => $this->input->post('mobile',TRUE),
				'add_time' => $nowtime,
				'username' => $_SESSION['user_name'],
				'userid' => $_SESSION['user_id'],
			);
			$result = $this->public_model->table_add('admin_monitor',$arr);
			if($result){
				$this->write_log();
				$this->load->view('message',array('msg'=>'操作成功！','url'=>'/index.php/admin/monitor/index'));
			}else{
				$this->load->view('message',array('msg'=>'操作失败！','url'=>'/index.php/admin/monitor/index'));
			}
		}else{
			$this->load->view('admin/monitor_add');
		}
	}
	
	
	//检查host运行情况
	function check($host) 
	{
		$fp = @fsockopen($host, 80, $errno, $errstr, 10);
		if (!$fp) 
		{
			return array('status'=>false,'errstr'=> $errstr."(".$errno.")");
		} else 
		{
		   /*$header = "GET / HTTP/1.1\r\n";
		   $header .= "Host: $host\r\n";
		   $header .= "Connection: close\r\n\r\n";
		   fputs($fp, $header);
		   while (!feof($fp)) 
		   {
			   $str .= fgets($fp, 1024);
		   }*/
		   fclose($fp);
		   return array('status'=>true);
		}
	}
	
	/** 
	 * 使用PHP检测能否ping通IP或域名 
	 * @param type $address 
	 * @return boolean 
	 */  
	function pingAddress($address) {  
		$status = -1;  
		if (strcasecmp(PHP_OS, 'WINNT') === 0) {  
			// Windows 服务器下  
			$pingresult = exec("ping -n 1 {$address}", $outcome, $status);  
		} elseif (strcasecmp(PHP_OS, 'Linux') === 0) {  
			// Linux 服务器下  
			$pingresult = exec("ping -c 1 {$address}", $outcome, $status);  
		}  
		if (0 == $status) {  
			$status = true;  
		} else {  
			$status = false;  
		}  
		return $status;  
	}  
	
	/**
	* 删除主机
	*/
	function del_host()
	{
		$id = $this->uri->segment(4);
		$result = $this->public_model->del_data('admin_monitor',array('guid' => $id));
		if($result){
			$this->write_log();
			$this->load->view('message',array('msg'=>'操作成功！','url'=>'/index.php/admin/monitor/index'));
		}else{
			$this->load->view('message',array('msg'=>'操作失败！','url'=>'/index.php/admin/monitor/index'));
		}
	}

	//服务器管理
	function server_list(){
		if(empty($_GET)){
			$this->load->view('admin/server_list');
		}else{
			$serchdata['draw']=$_GET['draw'];
			$serchdata['order_column']=$_GET['order']['0']['column'];
			$serchdata['order_dir']=$_GET['order']['0']['dir'];
			$serchdata['start']=$_GET['start'];
			$serchdata['length']=$_GET['length'];
			$res = $this->user->server_list($serchdata,$serchdata['start'],$serchdata['length']);
			$infos=array();
			foreach ($res['data'] as $k => $v) {
				$status = $v['status'] ? "启用":"禁用";
				$operate = $v['status']?"禁用":"启用";

				if($this->pingAddress($v['ip'])){
					$run_status = '正常运行..';
				}else{
					$run_status = '运行异常..';
				}
				$obj = array($v['name'],$v['ip'],$v['port'],$run_status,$v['principal'],$v['mobile'],$status,$v['username'],date('Y-m-d H:i:s',$v['add_time']),'<p><a href="/index.php/admin/monitor/server_status/'.$v['id'].'/'.$v['status'].'">'.$operate.' </a> | <a  href="/index.php/admin/monitor/server_edit/'.$v['id'].'" >修改</a> </p>');
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
	//添加服务器
	function add_server(){
		if($_POST){
			$arr = array(
				'id' => $this->Guid(),
				'name' => $this->input->post('name',TRUE),
				'ip' => $this->input->post('ip',TRUE),
				'port' => $this->input->post('port',TRUE),
				'status' => $this->input->post('status',TRUE),
				'principal' => $this->input->post('principal',TRUE),
				'mobile' => $this->input->post('mobile',TRUE),
				'add_time' => time(),
				'username' => $_SESSION['user_name'],
			);
			$result = $this->public_model->table_add('admin_server',$arr);
			if($result){
				$this->write_log();
				$this->load->view('message',array('msg'=>'操作成功！','url'=>'/index.php/admin/monitor/server_list'));
			}else{
				$this->load->view('message',array('msg'=>'操作失败！','url'=>'/index.php/admin/monitor/server_list'));
			}
		}else{
			$this->load->view('admin/server_add');
		}
	}
	//状态服务器修改
	public function server_status(){
		$id = $this->uri->segment(4);
		$status = $this->uri->segment(5);
		$status = $status ? 0:1;
		$update = array('status'=> $status);
		$where = array('id' => $id);
		$result = $this->public_model->update_table('admin_server',$update,$where);
		if($result){
			$this->write_log();
			$this->load->view('message',array('msg'=>'操作成功！','url'=>'/index.php/admin/monitor/server_list'));
		}else{
			$this->load->view('message',array('msg'=>'操作失败！','url'=>'/index.php/admin/monitor/server_list'));
		}
	}
	//添加服务器
	function server_edit($id=''){
		if($_POST){
			$where['id'] = $this->input->post('id',TRUE);
			$arr = array(
				'name' => $this->input->post('name',TRUE),
				'ip' => $this->input->post('ip',TRUE),
				'port' => $this->input->post('port',TRUE),
				'status' => $this->input->post('status',TRUE),
				'principal' => $this->input->post('principal',TRUE),
				'mobile' => $this->input->post('mobile',TRUE),
				'username' => $_SESSION['user_name']
			);
			$result = $this->public_model->update_table('admin_server',$arr,$where);
			if($result){
				$this->write_log();
				$this->load->view('message',array('msg'=>'操作成功！','url'=>'/index.php/admin/monitor/server_list'));
			}else{
				$this->load->view('message',array('msg'=>'操作失败！','url'=>'/index.php/admin/monitor/server_list'));
			}
		}else{
			$data['ser'] = $this->user->get_one('admin_server','id',$id);
			$this->load->view('admin/server_edit',$data);
		}
	}
	
}

?>