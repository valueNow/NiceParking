<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class YearStatistics extends MY_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('statistics_model','statistics');
    }
	
	//日志列表
	public function index()
	{
		if(empty($_GET)){
			$this->load->view('admin/yearStatistics_list');
		}else{
			$serchdata['draw']=$_GET['draw'];
			$serchdata['order_column']=$_GET['order']['0']['column'];
			$serchdata['order_dir']=$_GET['order']['0']['dir'];
			$serchdata['start']=$_GET['start'];
			$serchdata['length']=$_GET['length'];
			//获取自定义的查询条件
			if(isset($_GET['tic_name'])){
				$serchdata['tic_name'] = $_GET['tic_name'];
			}
			if(isset($_GET['tic_conductor'])){
				$serchdata['tic_conductor'] = $_GET['tic_conductor'];
			}
			if(isset($_GET['tic_business'])){
				$serchdata['tic_business'] = $_GET['tic_business'];
			}
			if(isset($_GET['start_time']) ){
				$serchdata['start_time'] = $_GET['start_time'];
			}
			if(isset($_GET['end_time']) ){
				$serchdata['end_time'] = $_GET['end_time'];
			}
			$res = $this->statistics->yearStatistics_list($serchdata,$serchdata['start'],$serchdata['length']);
			$infos=array();
			foreach ($res['data'] as $k => $v) {
				$obj = array($v['tic_time'],$v['tic_conductor'],$v['tic_business'],$v['tic_name'],$v['tic_price'],$v['ahead_time']);
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
		public function clientIndex()
	{
		if(empty($_GET)){
			$this->load->view('admin/client_statistics_list');
		}else{
			$serchdata['draw']=$_GET['draw'];
			$serchdata['order_column']=$_GET['order']['0']['column'];
			$serchdata['order_dir']=$_GET['order']['0']['dir'];
			$serchdata['start']=$_GET['start'];
			$serchdata['length']=$_GET['length'];
			//获取自定义的查询条件
			if(isset($_GET['tic_client_name'])){
				$serchdata['tic_client_name'] = $_GET['tic_client_name'];
			}
			if(isset($_GET['tic_name'])){
				$serchdata['tic_name'] = $_GET['tic_name'];
			}
			if(isset($_GET['tic_business'])){
				$serchdata['tic_business'] = $_GET['tic_business'];
			}
			if(isset($_GET['start_time']) ){
				$serchdata['start_time'] = $_GET['start_time'];
			}
			if(isset($_GET['end_time']) ){
				$serchdata['end_time'] = $_GET['end_time'];
			}
			$res = $this->statistics->client_statistics_list($serchdata,$serchdata['start'],$serchdata['length']);
			$infos=array();
			foreach ($res['data'] as $k => $v) {
				$obj = array($v['tic_time'],$v['tic_client_name'],$v['tic_business'],$v['tic_name'],$v['tic_client_number'],$v['ahead_time']);
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
	
	

}
