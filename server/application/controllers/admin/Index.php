<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends MY_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('user_model','user');
    }

	public function init(){
		$data['menu'] = $this->user->leftlist(0);
		if($_SESSION['roleid'] != 1){
			$arr = array();
			foreach($data['menu'] as $v) {
				$r = $this->user->get_priv($v,$_SESSION['roleid']);
				if($r) $arr[] = $v;
			}
			$data['menu'] = $arr;
		}
		$this->load->view('admin/index',$data);
	}

	//二级菜单   @zhubt
	public function public_menu($menu_id){
		$menu = $this->user->leftlist($menu_id);
		if($_SESSION['roleid'] != 1){
			$arr = array();
			foreach($menu as $v) {
				$r = $this->user->get_priv($v,$_SESSION['roleid']);
				if($r) $arr[] = $v;
			}
			$menu = $arr;
		}
		if(!empty($menu)){
			echo json_encode($menu);die;
		}else{
			echo json_encode('no');die;
		}
	}

	/**
	 * 用户登录
	 * @author zhubt 
	 */
	public function login(){
		if($this->session->userdata('user_id')){
			$this->load->view('message',array('msg'=>'您已登录！','url'=>'/index.php/admin/index/init'));
		}else{
		echo isset($_POST['dosubmit']);
			if(isset($_POST['dosubmit'])) {
				//$returnresult="";
				
				$username = $this->input->post('userName',true);
				$password = $this->input->post('passWord',true);
				$r = $this->user->get_one('admin_user','username',$username);
				if(!$r || $r['status']==1){
					$this->load->view('message',array('msg'=>'用户名不存在或被锁定！','url'=>'/index.php/admin/index/login'));
//					$returnresult['status']='err';
//					$returnresult['message']='用户名不存在或被锁定！';
//					$returnresult['url']='';
				}else{
					$pwd = md5($password.'caohai');			
					if($r['password'] != $pwd) { //判断密码
						$this->load->view('message',array('msg'=>'密码错误，请重新输入！','url'=>'/index.php/admin/index/login'));
//						$returnresult['status']='err';
//						$returnresult['message']='密码错误，请重新输入！';
//						$returnresult['url']='';
					}else{
						//更新信息并存入session
						$data['lastloginip'] = $_SERVER['REMOTE_ADDR'];
						$data['lastlogintime'] = time();
						$where['userid'] = $r['userid'];
						$this->user->data_update('admin_user',$data,$where);
						//存入session
						$this->session->set_userdata('user_id', $r['userid']);//用户id
						$this->session->set_userdata('user_name', $r['username']);//用户名
						$this->session->set_userdata('realname', $r['realname']);//真实姓名
						$this->session->set_userdata('roleid', $r['roleid']);//角色id
						$this->write_log('用户登录');
						//$this->load->view('message',array('msg'=>'登录成功！','url'=>'/index.php/admin/index/init'));
//						$returnresult['status']='ok';
//						$returnresult['message']='登录成功！';
//						$returnresult['url']='/index.php/admin/index/init';
						header("Location: /index.php/admin/index/init");
					}
				}
			}else{
				$this->load->view('admin/login');
			}
		}
	}
	/**
	 * 后台用户退出
	 * @author zhubt 
	 */
	public function public_logout(){
		$this->write_log('用户退出');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_name');
		$this->session->unset_userdata('realname');
		$this->session->unset_userdata('roleid');
		$this->load->view('message',array('msg'=>'安全退出！','url'=>'/index.php/admin/index/login'));
	}
	/**
	 * 修改密码
	 * @author zhubt 
	 */
	public function set_password(){
		if($_POST){
			$y_password = $this->input->post('y_password',true);
			$password = $this->input->post('password',true);
			$uid = $this->session->userdata('user_id');
			$r = $this->user->get_one('admin_user','userid',$uid);
			if(md5($y_password.'caohai') != $r['password']){
				$this->load->view('message',array('msg'=>'原密码错误！','url'=>'/index.php/admin/index/set_password'));
			}else{
				$this->write_log('重置密码');
				$where['userid'] = $uid;
				$data['password'] = md5($password.'caohai');
				$this->user->data_update('admin_user',$data,$where);
				$this->session->unset_userdata('user_id');
				$this->session->unset_userdata('user_name');
				$this->session->unset_userdata('realname');
				$this->session->unset_userdata('roleid');
				$this->load->view('message',array('msg'=>'操作成功，请重新登录！','url'=>'logout'));
			}
		}else{
			$this->load->view('admin/set_password');
		}
	}
}
