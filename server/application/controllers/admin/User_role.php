<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_role extends MY_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('url');
        $this->load->model('user_model','user');
    }
	/**
	 * 管理员管理列表   @zhubt
	 */
	public function init(){
		$roles = $this->role('0');
		if(empty($_GET)){
			$this->load->view('admin/user_list');
		}else{
			$serchdata['draw']=$_GET['draw'];
			$serchdata['order_column']=$_GET['order']['0']['column'];
			$serchdata['order_dir']=$_GET['order']['0']['dir'];
			$serchdata['start']=$_GET['start'];
			$serchdata['length']=$_GET['length'];
			//获取自定义的查询条件
			if(isset($_GET['username'])){
				$serchdata['username'] = $_GET['username'];
			}
			$res = $this->user->admin_list($serchdata,$serchdata['start'],$serchdata['length']);
			$infos=array();
			foreach ($res['data'] as $k => $v) {
				$status = $v['status'] ? "锁定":"正常";
				$status2 = $v['status'] ? "解锁":"锁定";
				$rolename = isset($roles[$v['roleid']])?$roles[$v['roleid']]:"";
				$operating = '<a href="/index.php/admin/user_role/edit_status/'.$v['userid'].'/'.$v['status'].'" >'.$status2.'</a> | ';
				$operating .= '<a href="/index.php/admin/user_role/edit_admin/'.$v["userid"].'">修改</a> | ';
				$url = "javascript:if(confirm('确实要删除吗?'))location='/index.php/admin/user_role/del_admin/".$v['userid']."'";
				$operating .= '<a href="'.$url.'">删除</a>';
				$obj = array($v['username'],$rolename,$v['mobile'],$v['realname'],$status,date('Y-m-d H:i:s',$v['add_time']),$operating);
				array_push($infos,$obj);
			}
			 $returndata= json_encode(array(
				"draw" 				=> intval($serchdata['draw']),
				"recordsTotal" 		=> intval($res ['total']),
				"recordsFiltered" 	=> intval($res ['total']),
				"data" 				=> $infos
			 ),JSON_UNESCAPED_UNICODE);
			 echo $returndata;
		}
	}
	/**
	 * 添加管理员   @zhubt
	 */
	public function add_admin() {
		if(isset($_POST['dosubmit'])){
			$data['userid'] = $this->Guid();
			$data['username'] = $this->input->post('username',true);
			$pwd = $this->input->post('password',true);
			$data['password'] = md5($pwd.'caohai');
			$data['realname'] = $this->input->post('realname',true);
			$data['mobile'] = $this->input->post('mobile',true);
			$data['email'] = $this->input->post('email',true);
			$data['roleid'] = $this->input->post('roleid',true);
			$data['add_time'] = time();
			if($this->user->data_insert('admin_user',$data)){
				$this->write_log();
				$this->load->view('message',array('msg'=>'添加成功','url'=>'/index.php/admin/user_role/init'));
			}else{
				$this->load->view('message',array('msg'=>'添加失败','url'=>'/index.php/admin/user_role/add_admin'));
			}
		} else {
			$data['roles'] = $this->role('0');
			$this->load->view('admin/user_add',$data);
		}
		
	}

	/**
	 * 修改管理员   @zhubt
	 */
	public function edit_admin($userid=0){
		if(isset($_POST['dosubmit'])){
			$where['userid'] = $this->input->post('userid',true);
			$pwd = $this->input->post('password',true);
			if(!empty($pwd)){
				$data['password'] = md5($pwd.'caohai');
			}
			$data['realname'] = $this->input->post('realname',true);
			$data['mobile'] = $this->input->post('mobile',true);
			$data['email'] = $this->input->post('email',true);
			$data['roleid'] = $this->input->post('roleid',true);
			if($this->user->data_update('admin_user',$data,$where)){
				$this->write_log();
				$this->load->view('message',array('msg'=>'修改成功','url'=>'/index.php/admin/user_role/init'));
			}else{
				$this->load->view('message',array('msg'=>'修改失败','url'=>'/index.php/admin/user_role/init'));
			}
		} else {					
			$data['roles'] = $this->role('0');
			$data['admin'] = $this->user->get_one('admin_user','userid',$userid);
			$this->load->view('admin/user_edit',$data);
		}
	}
	/**
	 * 个人信息
	 * @author zhubt 
	 */
	public function user_view(){
		$this->write_log();
		$uid = $this->session->userdata('user_id');
		$data['user'] = $this->user->get_one('admin_user','userid',$uid);
		$roles = $this->role('0');
		$data['user']['roleid'] = $roles[$data['user']['roleid']];
		$this->load->view('admin/user_view',$data);
	}
	/**
	 * 更新管理员状态   @zhubt
	 */
	public function edit_status($mid,$status){
		$where['userid'] = $mid;
		$arr['status'] = intval($status) ? '0' : '1';
		if($this->user->data_update('admin_user',$arr,$where)){
			$this->write_log();
			$this->load->view('message',array('msg'=>'操作成功','url'=>'/index.php/admin/user_role/init'));
		}else{
			$this->load->view('message',array('msg'=>'操作失败','url'=>'/index.php/admin/user_role/init'));
		}
	}
	/**
	 * 删除管理员   @zhubt
	 */
	public function del_admin($id=""){
		$where['userid'] = $id;
		if($this->user->data_delete('admin_user',$where)){
			$this->write_log();
			$this->load->view('message',array('msg'=>'删除成功','url'=>'/index.php/admin/user_role/init'));
		}else{
			$this->load->view('message',array('msg'=>'删除失败','url'=>'/index.php/admin/user_role/init'));
		}
	}
	
/***********************************权限分配和角色管理 @zhubt************************************/


	/**
	 * 角色管理列表
	 *  @zhubt
	 */
	public function role_list(){
		$data['infos'] = $this->user->role_list();
		$this->load->view('admin/role_list',$data);
	}
	/**
	 * 添加角色
	 */
	public function add_role(){
		if(isset($_POST['dosubmit'])){
			$data['name'] = $this->input->post('name',true);
			$data['description'] = $this->input->post('description',true);
			$data['status'] = $this->input->post('status',true);
			$data['listorder'] = $this->input->post('listorder',true);
			if($this->user->data_insert('admin_role',$data)){
				$this->write_log();
				$this->load->view('message',array('msg'=>'添加成功','url'=>'/index.php/admin/user_role/role_list'));
			}else{
				$this->load->view('message',array('msg'=>'添加失败','url'=>'/index.php/admin/user_role/add_role'));
			}
		} else {
			$this->load->view('admin/role_add');
		}
	}
	/**
	 * 编辑角色
	 */
	public function edit_role($roleid=0){
		if(isset($_POST['dosubmit'])){
			$where['roleid'] = $this->input->post('roleid',true);
			$data['name'] = $this->input->post('name',true);
			$data['description'] = $this->input->post('description',true);
			$data['status'] = $this->input->post('status',true);
			$data['listorder'] = $this->input->post('listorder',true);
			if($this->user->data_update('admin_role',$data,$where)){
				$this->write_log();
				$this->load->view('message',array('msg'=>'修改成功','url'=>'/index.php/admin/user_role/role_list'));
			}else{
				$this->load->view('message',array('msg'=>'修改失败','url'=>'/index.php/admin/user_role/role_list'));
			}
		} else {
			$data['role'] = $this->user->get_one('admin_role','roleid',$roleid);
			$this->load->view('admin/role_edit',$data);
		}
	}
	/**
	 * 删除角色
	 */
	public function role_del($roleid) {
		$roleid = intval($roleid);
		if($roleid == '1') $this->load->view('message',array('msg'=>'该对象不能删除','url'=>'/index.php/admin/user_role/role_list'));
		$this->db->where('roleid',$roleid);
		$this->db->delete('admin_role');
		$this->user->del_priv($roleid);
		$this->write_log();
		$this->load->view('message',array('msg'=>'操作成功','url'=>'/index.php/admin/user_role/role_list'));
	}
	/**
	 * 更新角色排序
	 */
	public function listorder(){
		$this->user->update_listorder($_POST['listorders']);
		$this->write_log();
		$this->load->view('message',array('msg'=>'操作成功','url'=>'/index.php/admin/user_role/role_list'));
	}
	/**
	 * 更新角色状态
	 */
	public function change_status($roleid,$disabled){
		$where['roleid'] = intval($roleid);
		$arr['status'] = intval($disabled) ? '0' : '1';
		if($this->user->data_update('admin_role',$arr,$where)){
			$this->write_log();
			$this->load->view('message',array('msg'=>'操作成功','url'=>'/index.php/admin/user_role/role_list'));
		}else{
			$this->load->view('message',array('msg'=>'操作失败','url'=>'/index.php/admin/user_role/role_list'));
		}
	}
	/**
	 * 角色权限设置
	 */
	public function role_priv($roleid=0) {
		if(isset($_POST['dosubmit'])){
			$roleid = $this->input->post('roleid',true);
			if (isset($_POST['menuid']) && is_array($_POST['menuid']) && count($_POST['menuid']) > 0) {
				$this->user->del_priv($roleid);
				foreach($_POST['menuid'] as $menuid){
					$info = array();
					$arr = $this->user->get_one('admin_menu','menu_id',$menuid);
					$info['roleid'] = $_POST['roleid'];
					$info['m'] = $arr['m'];
					$info['c'] = $arr['c'];
					$info['a'] = $arr['a'];
					$info['data'] = $arr['data'];
					$this->user->data_insert('admin_role_priv',$info);
				}
			} else {
				$this->user->del_priv($roleid);
			}
			$this->write_log();
			$this->load->view('message',array('msg'=>'操作成功','url'=>'/index.php/admin/user_role/role_list'));

		} else {	
			$roleid = intval($roleid);
			$data['role'] = $this->user->get_one('admin_role','roleid',$roleid);
			$priv = $this->user->privlist($roleid);
			$role_priv = array();
			foreach($priv as $v){
				$menuid = $this->user->get_menu($v);
				$role_priv[] = $menuid['menu_id'];
			}
			$data['role_priv'] = $role_priv;
			$data['menu'] = $this->user->menulist();
			$this->load->view('admin/role_priv',$data);		
		}
	}

	/**
	 * 角色列表   @zhubt
	 */
	public function role($s) {
		$roles = $this->user->role_list($s);
		$arr = array();
		foreach($roles as $k=>$v){
			$arr[$v['roleid']] = $v['name'];
		}
		return $arr;
	}

}
