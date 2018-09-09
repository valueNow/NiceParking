<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	/**
	 * 后台菜单列表   @zhubt
	 */
	function menulist(){
		$sql = "select * from admin_menu order by listorder desc,menu_id asc";
		$returnData = $this->db->query($sql)->result_array();
		return $returnData;
	}

	/**
	 * 后台菜单单个查询   @zhubt
	 */
	function get_menu($id){
		$sql = "select * from admin_menu where menu_id=$id";
		$returnData = $this->db->query($sql)->row_array();
		return $returnData;
	}


	/**
	 * 后台菜单添加   @zhubt
	 */
	function addmenu($data){
		if($this->db->insert('admin_menu',$data)){
			return true;
		}else{
			return false;
		}
	}

	/**
	 * 后台菜单修改   @zhubt
	 */
	function updatemenu($data,$menu_id){
		$this->db->where('menu_id',$menu_id);
		if($this->db->update('admin_menu',$data)){
			return true;
		}else{
			return false;
		}
	}

	/**
	 * 后台菜单删除   @zhubt
	 */
	function delmenu($id){
		$this->db->where('menu_id',$id);
		if($this->db->delete('admin_menu')){
			return true;
		}else{
			return false;
		}
	}
	/**
	 * 后台菜单排序   @zhubt
	 */
	function ordermenu($data){
		foreach ($data['listorders'] as $k=>$v){
			$sql = "UPDATE admin_menu SET listorder = ".$v." WHERE menu_id = ".$k;
			$res = $this->db->query($sql);
		}
		return $res;
	}
	


	
}


?>
