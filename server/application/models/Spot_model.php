<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Spot_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	//景点列表
	public function spot_list($where,$offset,$limit=15)
	{
		if($where['spot_name']){
			$this->db->like('spot_name',$where['spot_name']);
		}
		if(isset($where['sp_type'])){
			$this->db->where('sp_type',$where['sp_type']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('spot_management');
        $this->db = $db;
        $this->db->order_by('add_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('spot_management');
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	//ajax 获取景点列表
	public function ajax_get_spot(){
		$sql="SELECT a.spot_name AS NAME,a.spot_id AS id ,a.z_index AS z ,a.y_index AS Y ,a.x_index AS X,b.file_url,a.address FROM spot_management AS a LEFT JOIN attachment AS b ON a.img_aid=b.connect_id  where a.status=1";
		//$this->db->select("SELECT a.spot_name AS NAME,a.spot_id AS id ,a.z_index AS z ,a.y_index AS Y ,a.x_index AS X,b.file_url,a.address FROM spot_management AS a LEFT JOIN attachment AS b ON a.img_aid=b.connect_id ");
		$query = $this->db->query($sql)->result_array();
		return $query;
	}
	
	//游览路线列表
	public function spot_line_list($where,$offset,$limit=15)
	{
		if($where['line_name']){
			$this->db->like('line_name',$where['line_name']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('spot_line');
        $this->db = $db;
        $this->db->order_by('add_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('spot_line');
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	//包含景点
	public function spot_management($ids){
		$this->db->select("spot_name,spot_id");
		$this->db->or_where_in('spot_id',$ids);
		$query = $this->db->get_where('spot_management');
		return $query->result_array();
	}
	//获取全部启用的景点信息
	public function get_spot_infos()
	{
		$this->db->select("spot_name,spot_id,x_index,y_index,z_index");
		$query = $this->db->get_where('spot_management',array('status'=>1));
		$result = $query->result_array();
		return $result;
	}
	
	//获取路线单条数据
	public function get_datas_by_guid($line_guid)
	{
		$this->db->select('spot_line.*,spot_and_ids.*');
		$this->db->where('spot_line.line_id',$line_guid);
        $this->db->from('spot_line');
        $this->db->join('spot_and_ids', 'spot_line.line_id = spot_and_ids.line_id','right');
        $query = $this->db->get();
        return $query->result_array();
	}
	
	//获取线路景点信息
	public function get_spots_info($line_id)
	{
		$this->db->select('spot_management.spot_name,spot_management.x_index,spot_management.y_index,spot_management.z_index,spot_and_ids.*');
		$this->db->where('spot_and_ids.line_id',$line_id);
        $this->db->from('spot_and_ids');
        $this->db->join('spot_management', 'spot_and_ids.spot_id = spot_management.spot_id','left');
        $query = $this->db->get();
        return $query->result_array();
	}
	
	//漫游管理
	//漫游路线管理
	public function spot_guide_list($where,$offset,$limit=15)
	{
		if($where['guide_name']){
			$this->db->like('guide_name',$where['guide_name']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('spot_guide');
        $this->db = $db;
        $this->db->order_by('add_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('spot_guide');
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	
	//兴趣点
	public function spot_feature_list($where,$offset,$limit=15)
	{
		if($where['feature_name']){
			$this->db->like('feature_name',$where['feature_name']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('spot_feature');
        $this->db = $db;
		$this->db->order_by('add_time desc');
        $this->db->limit($limit, $offset);
		$this->db->select('spot_feature.*,spot_management.spot_name');
		$this->db->from('spot_feature');
        $this->db->join('spot_management', 'spot_management.spot_id = spot_feature.spot_id','left');
        $query = $this->db->get();
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	//ajax 获取兴趣点列表
	public function ajax_get_interest(){
		$this->db->select("interest_name as name,interest_id as id ,z_index as z ,y_index as y ,x_index as x");
		$query = $this->db->get('spot_interest');
		return $query->result_array();
	}


	//ajax 通过类型获取兴趣点列表
	public function ajax_get_interestBytype($id){
		$sql = "SELECT 	interest_id as id , interest_name as name, spot_id, type_id,  address, x_index as x, y_index as y, z_index as z FROM chdb.spot_interest where  type_id='".$id."'";
		$returnData = $this->db->query($sql)->result_array();
		return $returnData;
	}

	//获取所有的景点
	public function get_spot_arr()
	{
		$this->db->select("spot_name,spot_id");
		$query = $this->db->get_where('spot_management',array('status'=>1));
		$result = $query->result_array();
		return array_column($result, 'spot_name','spot_id');
	}
	//获取兴趣点类型
	public function get_interest_types()
	{
		
		$sql = "select * from spot_interest_type ";
		$returnData = $this->db->query($sql)->result_array();
		return $returnData;
	}

	//获取兴趣点类型
	public function get_interest_type()
	{
		$this->db->select("type_name,type_id");
		$query = $this->db->get_where('spot_interest_type');
		$result = $query->result_array();
		return array_column($result, 'type_name','type_id');
	}

	//兴趣点类型列表
	public function spot_interesttype_list($where,$offset,$limit=15){
		//where条件
		if(isset($where['type_name'])){
			$this->db->like('type_name',$where['type_name']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('spot_interest_type');
        $this->db = $db;
        $this->db->order_by('add_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('spot_interest_type');
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	//兴趣点列表
	public function spot_interest_list($where,$offset,$limit=15){
		//where条件
		if(isset($where['interest_name'])){
			$this->db->like('interest_name',$where['interest_name']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('spot_interest');
        $this->db = $db;
        $this->db->order_by('add_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('spot_interest');
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
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
	*应急路线
	*/
	public function get_route_guid($line_guid)
	{
		$this->db->select('emergency_route.*,emergency_route_ids.*');
		$this->db->where('emergency_route.line_id',$line_guid);
        $this->db->from('emergency_route');
        $this->db->join('emergency_route_ids', 'emergency_route.line_id = emergency_route_ids.line_id','right');
        $query = $this->db->get();
        return $query->result_array();
	}
	
	//视频监控类型列表
	public function spot_videomonitor_type_list($where,$offset,$limit=15)
	{
		//where条件
		if(isset($where['type_name'])){
			$this->db->like('type_name',$where['type_name']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('spot_video_monitor_type');
        $this->db = $db;
        $this->db->order_by('add_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('spot_video_monitor_type');
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
    //视频监控列表
	public function spot_videomonitor_list($where,$offset,$limit=15)
	{
		if(isset($where['name'])){
			$this->db->like('name',$where['name']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('spot_video_monitor');
        $this->db = $db;
		$this->db->order_by('add_time desc');
        $this->db->limit($limit, $offset);
		$this->db->select('spot_video_monitor.*,spot_video_monitor_type.type_name,spot_management.spot_name');
		$this->db->from('spot_video_monitor');
        $this->db->join('spot_video_monitor_type', 'spot_video_monitor_type.type_id = spot_video_monitor.type_id','left');
		$this->db->join('spot_management', 'spot_management.spot_id = spot_video_monitor.spot_id','left');
        $query = $this->db->get();
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	public function ajax_spot_videomonitor_list()
	{
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('spot_video_monitor');
        $this->db = $db;
		$this->db->select('spot_video_monitor.*,spot_video_monitor_type.type_name,spot_video_monitor_type.img_url,spot_management.spot_name');
		$this->db->from('spot_video_monitor');
        $this->db->join('spot_video_monitor_type', 'spot_video_monitor_type.type_id = spot_video_monitor.type_id','left');
		$this->db->join('spot_management', 'spot_management.spot_id = spot_video_monitor.spot_id','left');
        $query = $this->db->get();
        return $query->result_array();
	}
	public function get_rowdata_by_guid($where)
	{
		$this->db->where('spot_video_monitor.id',$where['id']);
		$this->db->select('spot_video_monitor.*,spot_video_monitor_type.type_name,spot_management.spot_name');
		$this->db->from('spot_video_monitor');
        $this->db->join('spot_video_monitor_type', 'spot_video_monitor_type.type_id = spot_video_monitor.type_id','left');
		$this->db->join('spot_management', 'spot_management.spot_id = spot_video_monitor.spot_id','left');
		$query = $this->db->get();
        return $query->row_array();
	}
	//获取视频监控类型
	public function get_videomonitor_type()
	{
		$this->db->select("type_name,type_id");
		$query = $this->db->get_where('spot_video_monitor_type');
		$result = $query->result_array();
		return array_column($result, 'type_name','type_id');
	}
	
}



?>