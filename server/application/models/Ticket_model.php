<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ticket_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	/**
	 *门票列表
	 */
    function ticket_list($where,$offset,$limit=15)
	{
		//where条件
		//var_dump(tic_id);die;
		if(!empty($where['tic_id'])){

			$this->db->where('tic_id',$where['tic_id']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('tickets');
        $this->db = $db;
        //$this->db->order_by('tic_id desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('tickets');
        $data = $query->result_array();
		//var_dump($this->db->last_query());
        return array('data'=>$data, 'total'=>$total);
	}
	/**
	 * 连续票号查询
	    startNumber endNumber
	 */
    function between_list($where,$offset,$limit=15)
	{
		//where条件
		if(!empty($where['startNumber'])){
			$this->db->where("tic_id >=",$where['startNumber']);
		}
		if(!empty($where['endNumber'])){
			$this->db->where("tic_id <=",$where['endNumber']);
		}

		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('tickets');
        $this->db = $db;
        $this->db->order_by('tic_id desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('tickets');
        $data = $query->result_array();
		//var_dump($this->db->last_query());
        return array('data'=>$data, 'total'=>$total);
	}
	/**
	 * 票号汇总
	 */
    function ticketSum($where,$offset,$limit=15)
	{
		//where条件
		if(!empty($where['tic_id'])){
			$this->db->where('tic_id',$where['tic_id']);
		}
		if(!empty($where['tic_name'])){
			$this->db->like('tic_name',$where['tic_name']);
		}
		if(!empty($where['start_time']) && !empty($where['end_time'])){
			$this->db->where(" start_time between ".strtotime($where['start_time']). " and ".strtotime($where['end_time']));
		}elseif(!empty($where['start_time']) && empty($where['end_time'])){
			$this->db->where(" start_time >= ".strtotime($where['start_time']));
		}elseif(empty($where['start_time']) && !empty($where['end_time'])){
			$this->db->where(" start_time <= ".strtotime($where['end_time']));
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('tickets');
        $this->db = $db;
       // $this->db->order_by('add_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('tickets');
        $data = $query->result_array();
		//var_dump($this->db->last_query());
        return array('data'=>$data, 'total'=>$total);
	}
	/**
	 * 票号汇总
	 */
    function unused_ticket_list($where,$offset,$limit=15)
	{
		//where条件
		if(!empty($where['business'])){
			$this->db->like('business',$where['business']);
		}
		if(!empty($where['tic_name'])){
			$this->db->like('tic_name',$where['tic_name']);
		}
		if(!empty($where['add_time'])){
			$this->db->where('add_time',$where['add_time']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('tickets');
        $this->db = $db;
       // $this->db->order_by('add_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('tickets');
        $data = $query->result_array();
		//var_dump($this->db->last_query());
        return array('data'=>$data, 'total'=>$total);
	}
}


?>