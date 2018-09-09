<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Esu_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	//机构列表
	public function esu_list($where,$offset,$limit=15)
	{
		if($where['esu_name']){
			$this->db->like('esu_name',$where['esu_name']);
		}
		if(isset($where['status'])){
			$this->db->where('status',$where['status']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('emergency_esu');
        $this->db = $db;
        $this->db->order_by('add_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('emergency_esu');
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	
	//队伍列表
	public function team_list($where,$offset,$limit=15)
	{
		if($where['team_name']){
			$this->db->like('team_name',$where['team_name']);
		}
		if(isset($where['status'])){
			$this->db->where('status',$where['status']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('emergency_team');
        $this->db = $db;
        $this->db->order_by('add_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('emergency_team');
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	
	//专家列表
	public function person_list($where,$offset,$limit=15)
	{
		if($where['person_name']){
			$this->db->like('person_name',$where['person_name']);
		}
		if(isset($where['eg_type'])){
			$this->db->where('eg_type',$where['eg_type']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('emergency_person');
        $this->db = $db;
		$this->db->order_by('add_time desc');
		$this->db->limit($limit, $offset);
		$this->db->select('emergency_person.*,emergency_team.team_name');
        $this->db->from('emergency_person');
        $this->db->join('emergency_team', 'emergency_team.team_id = emergency_person.team_id','left');
        $query = $this->db->get();
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	
	//仓库物资列表
	public function storehouse_list($where,$offset,$limit=15)
	{
		if($where['storehouse_name']){
			$this->db->like('storehouse_name',$where['storehouse_name']);
		}
		if(isset($where['status'])){
			$this->db->where('emergency_material_storehouse.status',$where['status']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('emergency_material_storehouse');
        $this->db = $db;
		$this->db->order_by('add_time desc');
		$this->db->limit($limit, $offset);
		$this->db->select('emergency_material_storehouse.*,emergency_esu.esu_name');
        $this->db->from('emergency_material_storehouse');
        $this->db->join('emergency_esu', 'emergency_esu.esu_id = emergency_material_storehouse.esu_id','left');
        $query = $this->db->get();
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	
	//获取仓库一条数据
	public function get_storedata_by_guid($where=array())
	{
		$this->db->where($where);
		$this->db->select('emergency_material_storehouse.*,emergency_esu.esu_name');
        $this->db->from('emergency_material_storehouse');
		$this->db->join('emergency_esu', 'emergency_esu.esu_id = emergency_material_storehouse.esu_id','left');
		$query = $this->db->get();
		return $query->row_array();
	}
	
	//物资列表
	public function material_list($where,$offset,$limit=15)
	{
		if($where['material_name']){
			$this->db->like('material_name',$where['material_name']);
		}
		if(isset($where['status'])){
			$this->db->where('emergency_material.status',$where['status']);
		}
		if(isset($where['eg_type'])){
			$this->db->where('emergency_material.eg_type',$where['eg_type']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('emergency_material');
        $this->db = $db;
		$this->db->order_by('add_time desc');
		$this->db->limit($limit, $offset);
		$this->db->select('emergency_material.*,emergency_material_storehouse.storehouse_name');
        $this->db->from('emergency_material');
        $this->db->join('emergency_material_storehouse', 'emergency_material.storehouse_id = emergency_material_storehouse.storehouse_id','left');
        $query = $this->db->get();
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	
	//获取仓库
	public function get_storehouse_infos()
	{
		$this->db->select("storehouse_name,storehouse_id");
		$query = $this->db->get('emergency_material_storehouse');
		$result = $query->result_array();
		return array_column($result, 'storehouse_name','storehouse_id');
	}
	
	//卫生站列表
	public function heal_list($where,$offset,$limit=15)
	{
		if($where['heal_name']){
			$this->db->like('heal_name',$where['heal_name']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('emergency_heal');
        $this->db = $db;
		$this->db->order_by('add_time desc');
		$this->db->limit($limit, $offset);
		$this->db->select('emergency_heal.*,emergency_esu.esu_name');
        $this->db->from('emergency_heal');
        $this->db->join('emergency_esu', 'emergency_esu.esu_id = emergency_heal.esu_id','left');
        $query = $this->db->get();
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	
	//抢救装备列表
	public function rescue_list($where,$offset,$limit=15)
	{
		if($where['rescue_name']){
			$this->db->like('rescue_name',$where['rescue_name']);
		}
		if(isset($where['type'])){
			$this->db->where('emergency_rescue.type',$where['type']);
		}
		if(isset($where['eg_type'])){
			$this->db->where('emergency_rescue.eg_type',$where['eg_type']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('emergency_rescue');
        $this->db = $db;
		$this->db->order_by('add_time desc');
		$this->db->limit($limit, $offset);
		$this->db->select('emergency_rescue.*,emergency_esu.esu_name');
        $this->db->from('emergency_rescue');
        $this->db->join('emergency_esu', 'emergency_esu.esu_id = emergency_rescue.esu_id','left');
        $query = $this->db->get();
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	
	//应急保障计划列表
	public function safeguard_list($where,$offset,$limit=15)
	{
		if(isset($where['eg_type'])){
			$this->db->where('emergency_safeguard.eg_type',$where['eg_type']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('emergency_safeguard');
        $this->db = $db;
		$this->db->order_by('add_time desc');
		$this->db->limit($limit, $offset);
		$this->db->select('emergency_safeguard.*,emergency_esu.esu_name');
        $this->db->from('emergency_safeguard');
        $this->db->join('emergency_esu', 'emergency_esu.esu_id = emergency_safeguard.esu_id','left');
        $query = $this->db->get();
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	
	//ajax 获取医疗卫生站
	public function ajax_get_heal_infos()
	{
		$this->db->select("heal_name as name,heal_id as id ,z_index as z ,y_index as y ,x_index as x");
		$query = $this->db->get('emergency_heal');
		return $query->result_array();
	}
	//ajax 获取医疗卫生站单条
	public function ajax_get_one_heal($id)
	{
		$this->db->select("heal_name as name,heal_id as id ,z_index as z ,y_index as y ,x_index as x");
		$query = $this->db->get_where('emergency_heal',array('heal_id'=>$id));
		return $query->result_array();
	}
	
	//ajax 获取物资仓库
	public function ajax_get_storehouse_infos()
	{
		$this->db->select("storehouse_name as name,storehouse_id as id ,z_index as z ,y_index as y ,x_index as x");
		$query = $this->db->get('emergency_material_storehouse');
		return $query->result_array();
	}
	//ajax 获取物资仓库单条
	public function ajax_get_one_storehouse($id)
	{
		$this->db->select("storehouse_name as name,storehouse_id as id ,z_index as z ,y_index as y ,x_index as x");
		$query = $this->db->get_where('emergency_material_storehouse',array('storehouse_id'=>$id));
		return $query->result_array();
	}
	
	
}



?>