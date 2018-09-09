<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{

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
	 * 管理员列表   @zhubt
	 */
	function admin_list($where,$offset,$limit=15){
		//where条件
		if(isset($where['username'])){
			$this->db->like('username',$where['username']);
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('admin_user');
        $this->db = $db;
        $this->db->order_by('add_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('admin_user');
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}

	/**
	 * 角色列表   @zhubt
	 */
	function role_list($status=2){
		if($status==2){
			$sql = "select * from admin_role order by listorder desc,roleid asc";
		}else{
			$sql = "select * from admin_role where status=".$status." order by roleid asc";
		}
		$returnData = $this->db->query($sql)->result_array();
		return $returnData;
	}
	/**
	 * 角色排序   @zhubt
	 */
	function update_listorder($data){
		foreach($data as $k=>$v){
			$sql = "UPDATE admin_role SET listorder = ".$v." WHERE roleid = '".$k."'";
			$res = $this->db->query($sql);
		}
		return $res;
	}
	/**
	 * 删除角色权限   @zhubt
	 */
	function del_priv($roleid){
		$this->db->where('roleid',$roleid);
		if($this->db->delete('admin_role_priv')){
			return true;
		}else{
			return false;
		}
	}

	/**
	 * 角色权限列表   @zhubt
	 */
	function privlist($roleid){
		$sql = "select * from admin_role_priv where roleid='".$roleid."'";
		$returnData = $this->db->query($sql)->result_array();
		return $returnData;
	}

	/**
	 * 菜单   @zhubt
	 */
	function menulist(){
		$sql = "select * from admin_menu order by listorder desc,menu_id asc";
		$returnData = $this->db->query($sql)->result_array();
		return $returnData;
	}
	/**
	 * 查询现有权限菜单   @zhubt
	 */
	function get_menu($data){
		$sql = "select menu_id from admin_menu where m='".$data['m']."' and c='".$data['c']."' and a='".$data['a']."'";
		$returnData = $this->db->query($sql)->row_array();
		return $returnData;
	}
	/**
	 * 查询权限   @zhubt
	 */
	function get_priv($data,$roleid){
		$sql = "select * from admin_role_priv where m='".$data['m']."' and c='".$data['c']."' and a='".$data['a']."' and roleid=".$roleid;
		$returnData = $this->db->query($sql)->row_array();
		return $returnData;
	}
	/**
	 * 右侧菜单列表   @zhubt
	 */
	function leftlist($parentid=0){
		$sql = "select * from admin_menu where display=1 and parentid=".$parentid." order by listorder desc,menu_id asc";
		$returnData = $this->db->query($sql)->result_array();
		return $returnData;
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
	 * 获取全部菜单
	 */
    function get_admin_menu()
	{
		$this->db->select('menu_id,name,m,c,a');
		$query = $this->db->get('admin_menu');
		return $query->result_array();
	}
	/**
	 * 根据方法控制器比配菜单
	 */
	function get_operate_bymca($where=array())
	{
		$this->db->select('menu_id,name,m,c,a');
		$this->db->where($where);
		$query = $this->db->get('admin_menu');
		return $query->row_array();
	}
	
	/**
	 * 日志列表
	 */
    function logs_list($where,$offset,$limit=15)
	{
		//where条件
		if(!empty($where['operating'])){
			$this->db->like('operating',$where['operating']);
		}
		if(!empty($where['username'])){
			$this->db->like('username',$where['username']);
		}
		if(!empty($where['start_time']) && !empty($where['end_time'])){
			$this->db->where(" add_time between ".strtotime($where['start_time']). " and ".strtotime($where['end_time']));
		}elseif(!empty($where['start_time']) && empty($where['end_time'])){
			$this->db->where(" add_time >= ".strtotime($where['start_time']));
		}elseif(empty($where['start_time']) && !empty($where['end_time'])){
			$this->db->where(" add_time <= ".strtotime($where['end_time']));
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('admin_logs');
        $this->db = $db;
        $this->db->order_by('add_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('admin_logs');
        $data = $query->result_array();
		//var_dump($this->db->last_query());
        return array('data'=>$data, 'total'=>$total);
	}
	
	/**
	 * 数据备份列表
	 */
	function data_backup_list($where,$offset,$limit=15)
	{
		$this->db->where(array('module' => 'logs'));
		$this->db->where('catname', 'data_backup');
		$this->db->or_where('catname', 'data_restore'); 
		//where条件
		if(!empty($where['operating'])){
			$this->db->like('operating',$where['operating']);
		}
		if(!empty($where['username'])){
			$this->db->like('username',$where['username']);
		}
		if(!empty($where['start_time']) && !empty($where['end_time'])){
			$this->db->where(" add_time between ".strtotime($where['start_time']). " and ".strtotime($where['end_time']));
		}elseif(!empty($where['start_time']) && empty($where['end_time'])){
			$this->db->where(" add_time >= ".strtotime($where['start_time']));
		}elseif(empty($where['start_time']) && !empty($where['end_time'])){
			$this->db->where(" add_time <= ".strtotime($where['end_time']));
		}
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('admin_logs');
        $this->db = $db;
        $this->db->order_by('add_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('admin_logs');
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	
	
	/**
	  * 监控主机列表
	  */
	function monitor_list($where,$offset,$limit=15)
	{
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('admin_monitor');
        $this->db = $db;
        $this->db->order_by('add_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('admin_monitor');
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}

	/**
	  * 服务器列表
	  */
	function server_list($where,$offset,$limit=15){
		//在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('admin_server');
        $this->db = $db;
        $this->db->order_by('add_time desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('admin_server');
        $data = $query->result_array();
        return array('data'=>$data, 'total'=>$total);
	}
	
}


?>
