<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Release_model extends CI_Model{

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
	 * 排序   @zhubt
	 */
	function listorder($table,$data,$id){
		foreach($data as $k=>$v){
			$sql = "UPDATE ".$table." SET listorder = ".$v." WHERE ".$id." = '".$k."'";
			$res = $this->db->query($sql);
		}
		return $res;
	}
	/**
	 * 动植物分类列表   @zhubt
	 */
	function floratype_list($where,$offset,$limit=15){
		//where条件
		if(isset($where['name'])){
			$this->db->like('name',$where['name']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('flora_type');
        $this->db = $db;
        $this->db->order_by('listorder desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('flora_type');
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	/**
	 * 动植物资源列表   @zhubt
	 */
	function floralist($where,$offset,$limit=15){
		//where条件
		if(isset($where['title'])){
			$this->db->like('title',$where['title']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('flora_fauna');
        $this->db = $db;
        $this->db->order_by('add_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('flora_fauna');
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	/**
	 * 滚动字幕列表   @zhubt
	 */
	function scroll_list($where,$offset,$limit=15){
		//where条件
		if(isset($where['title'])){
			$this->db->like('title',$where['title']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('flora_scroll');
        $this->db = $db;
        $this->db->order_by('last_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('flora_scroll');
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	/**
	 * 信息发布列表   @zhubt
	 */
	function maneger_list($where,$offset,$limit=15){
		//where条件
		if(isset($where['name'])){
			$this->db->like('name',$where['name']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('info_maneger');
        $this->db = $db;
        $this->db->order_by('add_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('info_maneger');
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	/**
	 * 视频列表   @zhubt
	 */
	function maneger_video($where,$offset,$limit=15){
		//where条件
		if(isset($where['whe'])){
			$this->db->where($where['whe']);
		}
		if(isset($where['video_name'])){
			$this->db->like('video_name',$where['video_name']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('info_video');
        $this->db = $db;
        $this->db->order_by('add_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('info_video');
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	/**
	 * 图片列表   @zhubt
	 */
	function maneger_img($where,$offset,$limit=15){
		//where条件
		if(isset($where['whe'])){
			$this->db->where($where['whe']);
		}
		if(isset($where['img_name'])){
			$this->db->like('img_name',$where['img_name']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('info_img');
        $this->db = $db;
        $this->db->order_by('add_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('info_img');
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	/**
	 * 信息发布记录列表   @zhubt
	 */
	function maneger_record($where,$offset,$limit=15){
		//where条件
		if(isset($where['name'])){
			$this->db->like('name',$where['name']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('info_record');
        $this->db = $db;
        $this->db->order_by('release_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('info_record');
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	/**
	 * 服务器列表   @zhubt
	 */
	function get_server(){
		$sql = "select * from admin_server where status='1'";
		$returnData = $this->db->query($sql)->result_array();
		return $returnData;
	}
	/**
	 * 服务器列表   @zhubt
	 */
	function get_server_name($ids){
		$this->db->select("name");
		$this->db->or_where_in('id',$ids);
		$query = $this->db->get_where('admin_server');
		return $query->result_array();
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
	 * 获取动植物分类列表   @zhubt
	 */
	function flora_list(){
		$sql = "select type_id,name from flora_type where status=1 order by listorder desc";
		$returnData = $this->db->query($sql)->result_array();
		return $returnData;
	}

	/**
	 * 获取景点列表   @zhubt
	 */
	function spots_list(){
		$sql = "select spot_id,spot_name from spot_management where status=1";
		$returnData = $this->db->query($sql)->result_array();
		return $returnData;
	}

	/**
	 * 附件列表   @zhubt
	 */
	function atta_list($id){
		$sql = "select * from attachment where connect_id='".$id."'";
		$returnData = $this->db->query($sql)->result_array();
		return $returnData;
	}
	
	/**
	 * 信息时间轴列表   @zhubt
	 */
	function maneger_time_list($maneger_id){
		$sql = "select * from info_maneger_time where maneger_id='".$maneger_id."' order by listorder asc";
		$returnData = $this->db->query($sql)->result_array();
		return $returnData;
	}


}


?>
