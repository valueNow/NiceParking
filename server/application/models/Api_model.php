<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends CI_Model{

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
	 * 查询预案   @zhubt
	 */
	function ajax_plan_list($type_id){
		$sql = "select * from emergency_plan where event_type = '".$type_id."' and status=1";
		$returnData = $this->db->query($sql)->result_array();
		return $returnData;
	}

	/**
	 * 查询队伍   @zhubt
	 */
	function ajax_team_list($name){
		$sql = "select * from emergency_team where team_name like '%".$name."%' and status=1";
		$returnData = $this->db->query($sql)->result_array();
		return $returnData;
	}

	/**
	 * 查询专家   @zhubt
	 */
	function ajax_person_list($team_id){
		$sql = "select * from emergency_person where team_id = '".$team_id."'";
		$returnData = $this->db->query($sql)->result_array();
		return $returnData;
	}

	/**
	 * 查询应急资源   @zhubt
	 */
	function ajax_material_list($id,$name){
		$sql = "select * from emergency_material where eg_type = '".$id."' and material_name like '%".$name."%'";
		$returnData = $this->db->query($sql)->result_array();
		return $returnData;
	}
	/**
	 * 查询应急路线   @zhubt
	 */
	function ajax_route_list($name){
		$sql = "select * from emergency_route where line_name like '%".$name."%' and status=1";
		$returnData = $this->db->query($sql)->result_array();
		return $returnData;
	}
	/**
	 * 查询具体路线   @zhubt
	 */
	function ajax_route_ass_list($id){
		$sql = "select * from emergency_route_ass where line_id='".$id."' order by orderby asc";
		$returnData = $this->db->query($sql)->result_array();
		return $returnData;
	}
	
	//查询所有兴趣点类型
	public function ajax_interest_type()
	{
		$this->db->select("type_name,type_id,img_id,desc,FROM_UNIXTIME(add_time) as add_time,operate_time,operate_userid");
		$result = $this->db->get('spot_interest_type')->result_array();
		//return array_column($result, 'type_name','type_id');
		return $result;
	}

	//查询所有兴趣点
	public function ajax_interest()
	{
		$this->db->select('a.*,b.type_name,b.img_id as type_img_url');
		$this->db->from('spot_interest as a');
		$this->db->join('spot_interest_type as b','a.type_id = b.type_id','left');
		$query = $this->db->get();
        return $query->result_array();
	}
	//根据景区id获取兴趣点
	public function ajax_get_interest_byspotid($spot_id)
	{
		$this->db->select('a.*,b.type_name,b.img_id as type_img_url');
		$this->db->where('spot_interest.spot_id',$spot_id);
		$this->db->from('spot_interest as a');
		$this->db->join('spot_interest_type as b','a.type_id = b.type_id','left');
		$query = $this->db->get();
        return $query->result_array();
	}

	//查询特色旅游点
	public function ajax_feature()
	{
		$query = $this->db->get('spot_feature');
        return $query->result_array();
	}
	//根据景区id获取特色旅游点信息
	public function ajax_feature_byspotid($spot_id)
	{
		$query = $this->db->get_where('spot_feature',array('spot_id' =>$spot_id ));
        return $query->result_array();
	}

	//获取景点line信息
	public function ajax_get_line()
	{
		$query = $this->db->get_where('spot_line',array('status' => 1 ));
        return $query->result_array();
	}
	//获取景点信息
	public function ajax_get_spots($spot_id)
	{
		/*$this->db->where('a.spot_id',$spot_id);
		$this->db->select('a.*,b.file_url');
		$this->db->from('spot_management as a');
		$this->db->join('attachment as b','a.img_aid = b.connect_id','left');
		$query = $this->db->get();
        return $query->result_array();*/
		$query = $this->db->get_where('spot_management',array('spot_id' => $spot_id ));
        return $query->row_array();
	}
	public function ajax_get_attach($connect_id)
	{
		$query = $this->db->get_where('attachment',array('connect_id' => $connect_id ));
        return $query->result_array();
	}

}


?>
