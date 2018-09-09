<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Public_model extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	/*
	 * 修改功能单条limit 1
	 * @param	array
	 * @param	array
	 * @return	int
	*/
	public function update_table($table,$update=array(),$where=array())
	{
		if(!is_array($update) OR empty($update))
		{
			die('update参数必须为数组且不能为空');
		}
		if(!is_array($where) OR empty($where))
		{
			die('where参数必须为数组且不能为空');
		}
		foreach($where as $k=>$v)
		{
			$this->db->where($k, $v);
		}
		$this->db->update($table, $update);
		return $this->db->affected_rows();
	}
	
	/*
	 * 添加功能单条limit 1
	 * @param	array
	 * @return	int
	*/
	public function table_add($table,$data)
	{
		return $this->db->insert($table, $data);
	}
	
	/**
	 * 获取单条数据
	 */
	public function get_data_by_guid($table,$where)
	{
		$query = $this->db->get_where($table,$where, 1);
        return $query->row_array(); 
	}
	public function get_row_by_guid($table,$where,$file_name)
	{
		$query = $this->db->get_where($table,$where);
        $row = $query->row_array(); 
		return $row[$file_name];
	}
	
	public function get_datas_by_guid($table,$where)
	{
		$query = $this->db->get_where($table,$where);
        return $query->result_array(); 
	}
	//路线点面的x,y,z处理
	public function get_datas_by_guid2($table,$where)
	{
		$this->db->select("id,line_id,orderby,x_index as x,y_index as y,z_index as z");
		$query = $this->db->order_by('orderby')->get_where($table,$where);
		return $query->result_array(); 

	}
	public function get_datas_by_guid3($table,$where)
	{
		$this->db->select("point_heading as heading,point_pitch as pitch,point_range as roll,point_speed as time,x_index as x,y_index as y,z_index as z,orderby");
		$query = $this->db->order_by('orderby')->get_where($table,$where);
		return $query->result_array(); 
	}
	//获取有效的单位名称
	public function get_esu_infos()
	{
		$this->db->select("esu_name,esu_id");
		$query = $this->db->get_where('emergency_esu',array('status'=>1));
		$result = $query->result_array();
		return array_column($result, 'esu_name','esu_id');
	}
	//获取有效的单位名称2
	public function ajax_get_esu_infos()
	{
		$this->db->select("esu_name as name,esu_id as id ,z_index as z ,y_index as y ,x_index as x");
		$query = $this->db->get_where('emergency_esu',array('status'=>1));
		return $query->result_array();
	}
	//获取有效的单位名称单条2
	public function ajax_get_one_esu($id)
	{
		$this->db->select("esu_name as name,esu_id as id ,z_index as z ,y_index as y ,x_index as x");
		$query = $this->db->get_where('emergency_esu',array('status'=>1,'esu_id'=>$id));
		return $query->result_array();
	}
	//获取有效的单位名称
	public function ajax_get_Spot_infos()
	{
		$this->db->select("spot_name as name,spot_id as id ,z_index as z ,y_index as y ,x_index as x");
		$query = $this->db->get_where('spot_management',array('status'=>1));
		return $query->result_array();
	}
	//获取有效的景点名称单条
	public function ajax_get_one_Spot($id)
	{
		$this->db->select("spot_name as name,spot_id as id ,z_index as z ,y_index as y ,x_index as x");
		$query = $this->db->get_where('spot_management',array('status'=>1,'esu_id'=>$id));
		return $query->result_array();
	}
	
	//获取有效的队伍名称
	public function get_team_infos()
	{
		$this->db->select("team_name,team_id");
		$query = $this->db->get_where('emergency_team',array('status'=>1));
		$result = $query->result_array();
		return array_column($result, 'team_name','team_id');
	}
	
	//删除一条数据
	public function del_data($table,$where)
	{
		$bool=$this->db->delete($table,$where);
		return $bool;
	}
	
}


?>
