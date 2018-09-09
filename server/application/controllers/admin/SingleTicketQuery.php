<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SingleTicketQuery extends MY_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('ticket_model','ticket');
    }
	
	//日志列表单条记录进行查询
	public function index()
	{
		if(empty($_GET)){
			$this->load->view('admin/ticket_list');
		}else{
			$serchdata['draw']=$_GET['draw'];
			$serchdata['order_column']=$_GET['order']['0']['column'];
			$serchdata['order_dir']=$_GET['order']['0']['dir'];
			$serchdata['start']=$_GET['start'];
			$serchdata['length']=$_GET['length'];
			//获取自定义的查询条件tic_id
			if(isset($_GET['tic_id'])){
			    //echo $_GET['tic_id'];
				$serchdata['tic_id'] = $_GET['tic_id'];
			}
			$res = $this->ticket->ticket_list($serchdata,$serchdata['start'],$serchdata['length']);
			//var_dump($res);die;
			$infos=array();
			foreach ($res['data'] as $k => $v) {
				     //array($v['tic_id'],$v['business'],$v['tic_name'],$v['market_price'],$v['shop_price'],$v['ahead_time']);
				$obj = array($v['tic_id'],$v['business'],$v['tic_name'],$v['market_price'],$v['shop_price'],$v['ahead_time']);
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
	//连续号之间的查询
 public function between_index()
	{
		if(empty($_GET)){
			$this->load->view('admin/ticket_list_between');
		}else{
			$serchdata['draw']=$_GET['draw'];
			$serchdata['order_column']=$_GET['order']['0']['column'];
			$serchdata['order_dir']=$_GET['order']['0']['dir'];
			$serchdata['start']=$_GET['start'];
			$serchdata['length']=$_GET['length'];
	  //获取自定义的查询条件startNumber endNumber
			if(isset($_GET['startNumber'])){
				$serchdata['startNumber'] = $_GET['startNumber'];
			}
			if(isset($_GET['endNumber'])){
				$serchdata['endNumber'] = $_GET['endNumber'];
			}
			$res = $this->ticket->between_list($serchdata,$serchdata['start'],$serchdata['length']);
			//var_dump($res);die;
			$infos=array();
			foreach ($res['data'] as $k => $v) {
				$obj = array($v['tic_id'],$v['business'],$v['tic_name'],$v['market_price'],$v['shop_price'],$v['ahead_time']);
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
	/**
		*
		销售统计汇总
		*/
	public function ticketSum()
	{
		if(empty($_GET)){
			$this->load->view('admin/ticketSum');
		}else{
			$serchdata['draw']=$_GET['draw'];
			$serchdata['order_column']=$_GET['order']['0']['column'];
			$serchdata['order_dir']=$_GET['order']['0']['dir'];
			$serchdata['start']=$_GET['start'];
			$serchdata['length']=$_GET['length'];
			//获取自定义的查询条件
			if(isset($_GET['tic_id'])){
				$serchdata['tic_id'] = $_GET['tic_id'];
			}
			if(isset($_GET['tic_name'])){
				$serchdata['tic_name'] = $_GET['tic_name'];
			}
			if(isset($_GET['start_time']) ){
				$serchdata['start_time'] = $_GET['start_time'];
			}
			if(isset($_GET['end_time']) ){
				$serchdata['end_time'] = $_GET['end_time'];
			}
			$res = $this->ticket->ticketSum($serchdata,$serchdata['start'],$serchdata['length']);
			//var_dump($res);die;
			$infos=array();
			foreach ($res['data'] as $k => $v) {
				$obj =array($v['tic_id'],$v['business'],$v['tic_name'],$v['market_price'],$v['shop_price'],$v['ahead_time'],date('Y-m-d',$v['start_time']));
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
		/**
		*
		销售统计汇总,$v['start_time']
		*/
	public function unused_ticket()
	{
		if(empty($_GET)){
			$this->load->view('admin/unused_ticket_list');
		}else{
			$serchdata['draw']=$_GET['draw'];
			$serchdata['order_column']=$_GET['order']['0']['column'];
			$serchdata['order_dir']=$_GET['order']['0']['dir'];
			$serchdata['start']=$_GET['start'];
			$serchdata['length']=$_GET['length'];
			//获取自定义的查询条件
			if(isset($_GET['business'])){
				$serchdata['business'] = $_GET['business'];
			}
			if(isset($_GET['tic_name'])){
				$serchdata['tic_name'] = $_GET['tic_name'];
			}
			if(isset($_GET['add_time']) ){
				$serchdata['add_time'] = $_GET['add_time'];
			}
			$res = $this->ticket->unused_ticket_list($serchdata,$serchdata['start'],$serchdata['length']);
			//var_dump($res);die;
			$infos=array();
			foreach ($res['data'] as $k => $v) {
				$obj =array($v['tic_id'],$v['add_time'],$v['business'],$v['tic_name'],$v['market_price'],$v['shop_price'],$v['ahead_time']);
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