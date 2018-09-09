<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class statistics_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	/**
	 *门票列表
	 */
    function statistics_list($where,$offset,$limit=15)
	{
		//where条件
		//var_dump(tic_id);die;
	//	die;
		if(!empty($where['timeslot'])){
			$this->db->where('timeslot',$where['timeslot']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('statistics');
        $this->db = $db;
        //$this->db->order_by('tic_id desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('statistics');
        $data = $query->result_array();
		//var_dump($this->db->last_query());
        return array('data'=>$data, 'total'=>$total);
	}
	    function yearStatistics_list($where,$offset,$limit=15)
	{
		//where条件
		if(!empty($where['tic_name'])){
			$this->db->like('tic_name',$where['tic_name']);
		}
		if(!empty($where['tic_conductor'])){
			$this->db->like('tic_conductor',$where['tic_conductor']);
		}
		if(!empty($where['tic_business'])){
			$this->db->like('tic_business',$where['tic_business']);
		}
		if(!empty($where['start_time'])){
			$this->db->where("tic_time >=",$where['start_time']);
		}
		if(!empty($where['end_time'])){
			$this->db->where("tic_time <=",$where['end_time']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('yearstatistics');
        $this->db = $db;
        $this->db->order_by('tic_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('yearstatistics');
        $data = $query->result_array();
		//var_dump($this->db->last_query());
        return array('data'=>$data, 'total'=>$total);
	}
		    function client_statistics_list($where,$offset,$limit=15)
	{
		//where条件
		if(!empty($where['tic_name'])){
			$this->db->like('tic_name',$where['tic_name']);
		}
		if(!empty($where['tic_client_name'])){
			$this->db->like('tic_client_name',$where['tic_client_name']);
		}
		if(!empty($where['tic_business'])){
			$this->db->like('tic_business',$where['tic_business']);
		}
		if(!empty($where['start_time'])){
			$this->db->where("tic_time >=",$where['start_time']);
		}
		if(!empty($where['end_time'])){
			$this->db->where("tic_time <=",$where['end_time']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('yearstatistics');
        $this->db = $db;
        $this->db->order_by('tic_client_number desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('yearstatistics');
        $data = $query->result_array();
		//var_dump($this->db->last_query());
        return array('data'=>$data, 'total'=>$total);
	}
	
	function export_excel(){
		$sql = "select * from statistics";
		$returnData = $this->db->query($sql)->result_array();
		return $returnData;
	}
	
}


?>