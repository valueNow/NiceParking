<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Emergency_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	/**
	 * 单条信息查询   @zhubt
	 * $table 表名
	 * $field 字段名  $id 字段值
	 */
	function get_one($table,$field,$id){
		$sql = "select * from ".$table." where ".$field."='".$id."'";
		$returnData = $this->db->query($sql)->row_array();
		return $returnData;
	}


	/**
	 * 预案管理列表   @zhubt
	 */
	function plan_list($where,$offset,$limit=15){
		//where条件
		if(isset($where['whe'])){
			$this->db->where($where['whe']);
		}
		if(isset($where['plan_name'])){
			$this->db->like('plan_name',$where['plan_name']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('emergency_plan');
        $this->db = $db;
        $this->db->order_by('add_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('emergency_plan');
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	/**
	 * 值班信息列表   @zhubt
	 */
	function duty_list($where,$offset,$limit=15){
		//where条件
		if(isset($where['duty_name'])){
			$this->db->like('duty_name',$where['duty_name']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('emergency_duty');
        $this->db = $db;
        $this->db->order_by('add_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('emergency_duty');
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	/**
	 * 信息接报列表   @zhubt
	 */
	function received_list($where,$offset,$limit=15){
		//where条件
		if(isset($where['rec_name'])){
			$this->db->like('rec_name',$where['rec_name']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('emergency_received');
        $this->db = $db;
        $this->db->order_by('add_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('emergency_received');
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	/**
	 * 事件管理列表   @zhubt
	 */
	function event_list($where,$offset,$limit=15){
		//where条件
		if(isset($where['rec_name'])){
			$this->db->like('rec_name',$where['rec_name']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('emergency_event');
        $this->db = $db;
        $this->db->order_by('add_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('emergency_event');
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	/**
	 * 应急路线列表   @zhubt
	 */
	function emergency_route_list($where,$offset,$limit=15){
		if(isset($line_name)){
			$this->db->like('line_name',$line_name);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('emergency_route');
        $this->db = $db;
        $this->db->order_by('add_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('emergency_route');
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	/**
	 * 添加数据   @zhubt
	 */
	function data_insert($table,$data){
		if($this->db->insert($table,$data)){
			return true;
		}else{
			return false;
		}
	}
	/**
	 * 修改数据   @zhubt
	 */
	function data_update($table,$data,$where){
		$this->db->where($where);
		if($this->db->update($table,$data)){
			return true;
		}else{
			return false;
		}
	}
	/**
	 * 删除数据   @zhubt
	 */
	function data_delete($table,$where){
		$this->db->where($where);
		if($this->db->delete($table)){
			return true;
		}else{
			return false;
		}
	}
	






	/**
	 * 获取应急服务单位列表   @zhubt
	 */
	function esu_list(){
		$sql = "select esu_id,esu_name from emergency_esu where status=1";
		$returnData = $this->db->query($sql)->result_array();
		return $returnData;
	}

	/**
	 * 获取预案列表   @zhubt
	 */
	function planlist(){
		$sql = "select plan_id,plan_name from emergency_plan where status=1";
		$returnData = $this->db->query($sql)->result_array();
		return $returnData;
	}
	

	/**
	 * 事件列表   @zhubt
	 */
	function ajax_event_list(){
		$sql = "select event_id as id,event_name as name,x_index as x,y_index as y,z_index as z,plan_id,is_eval,event_type,charge_unit,address,occur_time,description,reporter,mobile,img_url,aftermath,measures,end_time from emergency_event";
		$returnData = $this->db->query($sql)->result_array();
		return $returnData;
	}
	/**
	 * 事件单条   @zhubt
	 */
	function get_one_event($id){
		$sql = "select event_id as id,event_name as name,x_index as x,y_index as y,z_index as z from emergency_event where event_id = '".$id."'";
		$returnData = $this->db->query($sql)->result_array();
		return $returnData;
	}
	/**
	 * 信息接报列表   @zhubt
	 */
	function ajax_received_list(){
		$sql = "select rec_id as id,rec_name as name,x_index as x,y_index as y,z_index as z from emergency_received";
		$returnData = $this->db->query($sql)->result_array();
		return $returnData;
	}
	/**
	 * 信息接报单条   @zhubt
	 */
	function get_one_received($id){
		$sql = "select rec_id as id,rec_name as name,x_index as x,y_index as y,z_index as z from emergency_received where rec_id = '".$id."'";
		$returnData = $this->db->query($sql)->result_array();
		return $returnData;
	}

	/**
	 * 效果评估列表   @zhubt
	 */
	function eval_list($plan_id){
		$sql = "select * from emergency_evaluation where plan_id='".$plan_id."'";
		$returnData = $this->db->query($sql)->result_array();
		return $returnData;
	}
	
	//获取应急路线信息
	function get_emergency_route_arr()
	{
		$this->db->select('a.line_id,b.id,b.line_id,b.x_index,b.y_index,b.z_index');
		$this->db->from('emergency_route as a');
		$this->db->join('emergency_route_ass as b','a.line_id = b.line_id','left');
		$query = $this->db->get();
        return $query->result_array();
	}




}


?>
