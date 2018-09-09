<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spot_interest extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('spot_model','spot');
		$this->load->model('public_model','public_model');
    }
	/***********************************兴趣点类型管理 @zhubt************************************/
	//兴趣点类型管理列表
	public function stype_index(){
		if(empty($_GET)){
			$this->load->view('admin/spot_interesttype_list');
		}else{
			$serchdata['draw']=$_GET['draw'];
			$serchdata['order_column']=$_GET['order']['0']['column'];
			$serchdata['order_dir']=$_GET['order']['0']['dir'];
			$serchdata['start']=$_GET['start'];
			$serchdata['length']=$_GET['length'];
			//获取自定义的查询条件
			if(isset($_GET['type_name'])){
				$serchdata['type_name'] = $_GET['type_name'];
			}
			$res = $this->spot->spot_interesttype_list($serchdata,$serchdata['start'],$serchdata['length']);
			$infos=array();
			foreach ($res['data'] as $k => $v) {
				$img_id = '';
				if(!empty($v['img_id'])){
					$img_id = "<img src=".base_url().$v['img_id']." height='38px' width='38px'/>";
				}
				$operating = '<a href="/index.php/admin/spot_interest/stype_edit/'.$v["type_id"].'">修改</a> | ';
				$url = "javascript:if(confirm('确实要删除吗?'))location='/index.php/admin/spot_interest/stype_del/".$v['type_id']."'";
				$operating .= '<a href="'.$url.'">删除</a>';
				$obj = array($v['type_name'],$v['desc'],$img_id,date('Y-m-d H:i:s',$v['add_time']),$operating);
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
	//兴趣点类型添加
	public function stype_add(){
		if($_POST){
			$arr['type_id'] = $this->Guid();
			$arr['type_name'] = $this->input->post('type_name',true);
			if($_FILES['img_id']['error']==0 && $_FILES['img_id']['size']!=0){
				$arr['img_id'] = $this->uploadimage("img_id");
			}
			$arr['desc'] = $this->input->post('desc',true);
			$arr['operate_userid'] = $_SESSION['user_id'];
			$arr['add_time'] = time();
			if($this->public_model->table_add('spot_interest_type',$arr)){
				$this->write_log();
				$this->load->view('message',array('msg'=>'添加成功','url'=>'/index.php/admin/spot_interest/stype_index'));
			}else{
				$this->load->view('message',array('msg'=>'添加失败','url'=>'/index.php/admin/spot_interest/stype_index'));
			}
		}else{
			$this->load->view('admin/spot_interesttype_add');
		}
	}
	
	
	
	//兴趣点类型修改
	public function stype_edit($id=''){
		if($_POST){
			$where['type_id'] = $this->input->post('type_id',true);
			$arr['type_name'] = $this->input->post('type_name',true);
			if($_FILES['img_id']['error']==0 && $_FILES['img_id']['size']!=0){
				$arr['img_id'] = $this->uploadimage("img_id");
			}
			$arr['desc'] = $this->input->post('desc',true);
			$arr['operate_userid'] = $_SESSION['user_id'];
			$arr['operate_time'] = time();
			if($this->public_model->update_table('spot_interest_type',$arr,$where)){
				$this->write_log();
				$this->load->view('message',array('msg'=>'修改成功','url'=>'/index.php/admin/spot_interest/stype_index'));
			}else{
				$this->load->view('message',array('msg'=>'修改失败','url'=>'/index.php/admin/spot_interest/stype_index'));
			}
		}else{
			$data['type'] = $this->public_model->get_data_by_guid('spot_interest_type',array('type_id'=>$id));
			$this->load->view('admin/spot_interesttype_edit',$data);
		}
	}
	//删除兴趣点类型
	public function stype_del($id=""){
		$where['type_id'] = $id;
		if($this->public_model->del_data('spot_interest_type',$where)){
			$this->write_log();
			$this->load->view('message',array('msg'=>'删除成功','url'=>'/index.php/admin/spot_interest/stype_index'));
		}else{
			$this->load->view('message',array('msg'=>'删除失败','url'=>'/index.php/admin/spot_interest/stype_index'));
		}
	}
	/***********************************兴趣点管理 @zhubt************************************/
	//兴趣点管理列表
	public function interest(){
		if(empty($_GET)){
			$this->load->view('admin/spot_interest_list');
		}else{
			$serchdata['draw']=$_GET['draw'];
			$serchdata['order_column']=$_GET['order']['0']['column'];
			$serchdata['order_dir']=$_GET['order']['0']['dir'];
			$serchdata['start']=$_GET['start'];
			$serchdata['length']=$_GET['length'];
			//获取自定义的查询条件
			if(isset($_GET['interest_name'])){
				$serchdata['interest_name'] = $_GET['interest_name'];
			}
			$res = $this->spot->spot_interest_list($serchdata,$serchdata['start'],$serchdata['length']);
			$infos=array();
			foreach ($res['data'] as $k => $v) {
				$type = $this->public_model->get_data_by_guid('spot_interest_type',array('type_id'=>$v['type_id']));
				$spot = $this->public_model->get_data_by_guid('spot_management',array('spot_id'=>$v['spot_id']));
				$operating = '<a href="/index.php/admin/spot_interest/interest_view/'.$v["interest_id"].'">查看</a> | ';
				$operating .= '<a href="/index.php/admin/spot_interest/interest_edit/'.$v["interest_id"].'">修改</a> | ';
				$url = "javascript:if(confirm('确实要删除吗?'))location='/index.php/admin/spot_interest/interest_del/".$v['interest_id']."'";
				$operating .= '<a href="'.$url.'">删除</a>';
				$obj = array($v['interest_name'],$type['type_name'],$spot['spot_name'],date('Y-m-d H:i:s',$v['add_time']),$operating);
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
	//ajax 获取兴趣点列表
	public function ajax_get_interest(){
		$res = $this->spot->ajax_get_interest();	
		echo json_encode($res);exit;
	}
	//获取详情
	public function spot_interesttype_map_view(){
		$this->write_log();
		$id = $this->uri->segment(4);
		$data['rec'] = $this->public_model->get_data_by_guid('spot_interest',array('interest_id'=>$id));
		$spot = $this->public_model->get_data_by_guid('spot_management',array('spot_id'=>$data['rec']['spot_id']));
		$data['rec']['spot_id'] = $spot['spot_name'];
		$type = $this->public_model->get_data_by_guid('spot_interest_type',array('type_id'=>$data['rec']['type_id']));
		$data['rec']['type_id'] = $type['type_name'];
		$data['img'] = $this->spot->atta_list($data['rec']['img_id']);
		$this->load->view('admin/spot_interesttype_map_view',$data);
	}
	
	//兴趣点添加
	public function interest_add(){
		if($_POST){
			$arr['interest_id'] = $this->Guid();
			$arr['interest_name'] = $this->input->post('interest_name',true);
			$arr['spot_id'] = $this->input->post('spot_id',true);
			$arr['type_id'] = $this->input->post('type_id',true);
			$arr['x_index'] = $this->input->post('x_index',true);
			$arr['y_index'] = $this->input->post('y_index',true);
			$arr['z_index'] = $this->input->post('z_index',true);
			$arr['address'] = $this->input->post('address',true);
			if($_FILES['img_url']['error'][0]==0 && $_FILES['img_url']['size'][0]!=0){
				$img_aid = $this->Guid();
				for($i=0;$i<count($_FILES['img_url']['name']);$i++){
					$row['aid'] = $this->Guid();
					$row['file_url'] = $this->upload_more("img_url",$row['aid'],$i);//上传图片
					$row['file_name'] = $_POST['img_name'][$i];
					$row['connect_id'] = $img_aid;
					$row['add_time'] = time();
					$this->public_model->table_add('attachment',$row);
				}
				$arr['img_id'] = $img_aid;
			}
			$arr['desc'] = $this->input->post('desc',true);
			$arr['operate_userid'] = $_SESSION['user_id'];
			$arr['add_time'] = time();
			if($this->public_model->table_add('spot_interest',$arr)){
				$this->write_log();
				$this->load->view('message',array('msg'=>'添加成功','url'=>'/index.php/admin/spot_interest/interest'));
			}else{
				$this->load->view('message',array('msg'=>'添加失败','url'=>'/index.php/admin/spot_interest/interest'));
			}
		}else{
			$data['spot'] = $this->spot->get_spot_arr();
			$data['type'] = $this->spot->get_interest_type();
			$this->load->view('admin/spot_interest_add',$data);
		}
	}
	//兴趣点修改
	public function interest_edit($id=''){
		if($_POST){
			$where['interest_id'] = $this->input->post('interest_id',true);
			$arr['interest_name'] = $this->input->post('interest_name',true);
			$arr['spot_id'] = $this->input->post('spot_id',true);
			$arr['type_id'] = $this->input->post('type_id',true);
			$arr['x_index'] = $this->input->post('x_index',true);
			$arr['y_index'] = $this->input->post('y_index',true);
			$arr['z_index'] = $this->input->post('z_index',true);
			$arr['address'] = $this->input->post('address',true);
			$interest = $this->public_model->get_data_by_guid('spot_interest',array('interest_id'=>$where['interest_id']));
			if($_FILES['img_url']['error'][0]==0 && $_FILES['img_url']['size'][0]!=0){
				if(!empty($interest['img_id'])){
					$img_aid = $interest['img_id'];
				}else{
					$img_aid = $this->Guid();
					$arr['img_id'] = $img_aid;
				}
				for($i=0;$i<count($_FILES['img_url']['name']);$i++){
					$row['aid'] = $this->Guid();
					$row['file_url'] = $this->upload_more("img_url",$row['aid'],$i);//上传图片
					$row['file_name'] = $_POST['img_name'][$i];
					$row['connect_id'] = $img_aid;
					$row['add_time'] = time();
					$this->public_model->table_add('attachment',$row);
				}
				
			}
			$arr['desc'] = $this->input->post('desc',true);
			$arr['operate_userid'] = $_SESSION['user_id'];
			$arr['operate_time'] = time();
			if($this->public_model->update_table('spot_interest',$arr,$where)){
				$this->write_log();
				$this->load->view('message',array('msg'=>'修改成功','url'=>'/index.php/admin/spot_interest/interest'));
			}else{
				$this->load->view('message',array('msg'=>'修改失败','url'=>'/index.php/admin/spot_interest/interest'));
			}
		}else{
			$data['interest'] = $this->public_model->get_data_by_guid('spot_interest',array('interest_id'=>$id));
			$data['img'] = $this->spot->atta_list($data['interest']['img_id']);
			$data['spot'] = $this->spot->get_spot_arr();
			$data['type'] = $this->spot->get_interest_type();
			$this->load->view('admin/spot_interest_edit',$data);
		}
	}
	//查看兴趣点   @zhubt
	public function interest_view($id=""){
		$this->write_log();
		$data['interest'] = $this->public_model->get_data_by_guid('spot_interest',array('interest_id'=>$id));
		$spot = $this->public_model->get_data_by_guid('spot_management',array('spot_id'=>$data['interest']['spot_id']));
		$data['interest']['spot_id'] = $spot['spot_name'];
		$type = $this->public_model->get_data_by_guid('spot_interest_type',array('type_id'=>$data['interest']['type_id']));
		$data['interest']['type_id'] = $type['type_name'];
		$data['img'] = $this->spot->atta_list($data['interest']['img_id']);
		$this->load->view('admin/spot_interest_view',$data);
	}
	//删除兴趣点
	public function interest_del($id=""){
		$where['interest_id'] = $id;
		if($this->public_model->del_data('spot_interest',$where)){
			$this->write_log();
			$this->load->view('message',array('msg'=>'删除成功','url'=>'/index.php/admin/spot_interest/interest'));
		}else{
			$this->load->view('message',array('msg'=>'删除失败','url'=>'/index.php/admin/spot_interest/interest'));
		}
	}
	
	//ajax 通过类型查询同类型的所有兴趣点
	public function ajax_get_interestByType($types=""){
		$res = $this->spot->ajax_get_interestBytype($types);	
		echo json_encode($res);exit;
	}
	
	//ajax 获取所有类型
	public function ajax_get_interestType(){
		$res = $this->spot->get_interest_types();	
		echo json_encode($res);exit;
	}
	
	
//添加车站信息
	public function ajax_station_add(){
		if($_POST){
			//echo 'sssssssssss';exit;
			$arr['park_id'] = $this->Guid();
			$arr['name'] = $_POST['data']['name'];
			$arr['park_num'] = $_POST['data']['count'];
			$arr['free_num'] = $_POST['data']['lostCount'];
			$arr['business_time'] = $_POST['data']['yysj'];
			
			$arr['position'] = $_POST['data']['position'];
			$arr['tel'] = $_POST['data']['number'];
			$arr['address'] = $_POST['data']['address'];
			if($this->public_model->table_add('jsjds_park',$arr)){
				echo $arr['park_id'];exit;
			}else{
				echo '';exit;
				//$this->load->view('message',array('msg'=>'添加失败','url'=>'/index.php/admin/spot_interest/stype_index'));
			}
		}else{
			echo '';exit;
		}
	}
	
	//登陆
	public function ajax_login($login_name="",$password=""){
		if($_GET){
			$arr['login_name'] = $login_name==""?$_GET['login_name']:$login_name;
			$arr['password'] = $password==""?$_GET['password']:$password;
			//var_dump($arr);die;
			$data['user'] = $this->public_model->get_data_by_guid('jsjds_account_info',array('username'=>$arr['login_name']));
			//var_dump($data['user']);die;
			if($data['user']){
				if($data['user']['password']==$arr['password']){
					
					$_SESSION['jsjds_id']=$data['user']['account_id'];
					if($data['user']['license_plate']){
						$data['user']['license_plate']=mb_substr($data['user']['license_plate'], 0, 3, 'utf-8').'***';
					}
					if($data['user']['tel']){
						$data['user']['tel']=mb_substr($data['user']['tel'], 0, 3, 'utf-8').'***'. mb_substr($data['user']['tel'], -4, 4, 'utf-8');
					}
					if($data['user']['password']){
						$data['user']['password']='';
					}
					echo json_encode($data['user']);exit;
				}else{
					echo 'err';exit;
				}
			}else{
				echo 'err';exit;
			}
		}else{
			echo 'err';exit;
		}
		
	}
		//注册
	public function ajax_register($register_name="",$register_password="",$register_license_plate="",$register_tel="",$register_accountFrom=""){
		if($_GET){
			$arr['account_id'] = $this->Guid();
			$arr['username'] = $register_name==""?$_GET['register_name']:$register_name;
			$arr['password'] = $register_password==""?$_GET['register_password']:$register_password;
			$arr['license_plate'] = $register_license_plate==""?$_GET['register_license_plate']:$register_license_plate;
			$arr['tel'] = $register_tel==""?$_GET['register_tel']:$register_tel;
			$arr['account_type'] = 0;//$register_accountFrom==""?$_GET['register_accountFrom']:$register_accountFrom;
			if($this->public_model->table_add('jsjds_account_info',$arr)){
				echo 'suc';exit;
			}else{
				echo 'err';exit;
				//$this->load->view('message',array('msg'=>'添加失败','url'=>'/index.php/admin/spot_interest/stype_index'));
			}
		}else{
			echo 'err';exit;
		}
		
	}
	//产生订单
	public function ajax_addorder($park_id="",$park_name="",$book_st="",$book_ed="",$book_account=""){
		if($_GET){
			$arr['order_id'] = date('Ymdhis', time()).'';
			//$arr['order_id'] = date('Ymdhis', time()).'';
			$arr['park_id'] = $park_id==""?$_GET['park_id']:$park_id;
			$arr['order_state'] = 0;
			$arr['park_name'] = $park_name==""?$_GET['park_name']:$park_name;
			$arr['order_start_time'] = $book_st==""?$_GET['book_st']:$book_st;
			$arr['order_end_time'] = $book_ed==""?$_GET['book_ed']:$book_ed;
			$arr['order_attribution'] = $book_account==""?$_GET['book_account']:$book_account;
			$arr['order_attribution']==""?$_SESSION['jsjds_id']:$arr['order_attribution'];
			if($this->public_model->table_add('jsjds_order_infomation',$arr)){
				echo 'suc';exit;
			}else{
				echo 'err';exit;
				//$this->load->view('message',array('msg'=>'添加失败','url'=>'/index.php/admin/spot_interest/stype_index'));
			}
		}else{
			echo 'err';exit;
		}
		
	}
	
	//产生订单
	public function ajax_updorder($book_item_id="",$book_account=""){
		//echo date('Ymdhis', time());die;
		if($_GET){
			$arr['order_state'] = 1;
			$where['book_item_id'] = $book_item_id==""?$_GET['book_item_id']:$book_item_id;
			$where['order_attribution'] = $book_account==""?$_GET['book_account']:$book_account;
			$where['order_attribution']==""?$_SESSION['jsjds_id']:$where['order_attribution'];
			if($this->public_model->update_table('jsjds_order_infomation',$arr,$where)){
				echo 'suc';exit;
			}else{
				echo 'err';exit;
				//$this->load->view('message',array('msg'=>'添加失败','url'=>'/index.php/admin/spot_interest/stype_index'));
			}
		}else{
			echo 'err';exit;
		}
		
	}
	
	//产生订单
	public function ajax_getorderbyaccountid($account_id=""){
		if($_GET){
			$arr['accound_id'] = $account_id==""?$_GET['account_id']:$account_id;
			
			//var_dump($arr);die;
			$data['order'] = $this->public_model->get_datas_by_guid('jsjds_order_infomation',array('order_attribution'=>$arr['accound_id']));
			//var_dump($data['user']);die;
			if($data['order']){
				//var_dump($data['order']);die;
				for($i=0;$i<count($data['order']);$i++){
					//var_dump($data['order'][$i]);die; 
					$data['order'][$i]['park'] = $this->public_model->get_data_by_guid('jsjds_park',array('park_id'=>$data['order'][$i]['park_id']));
					$data['order'][$i]['license_plate'] = $this->public_model->get_data_by_guid('jsjds_account_info',array('account_id'=>$arr['accound_id']))['license_plate'];
				}
				echo json_encode($data['order']);exit;
			}else{
				echo 'err';exit;
			}
		}else{
			echo 'err';exit;
		}
	}
	//产生订单
	public function ajax_updpwd($account_id="",$password="",$oldpassword=""){
		//echo date('Ymdhis', time());die;
		if($_GET){
			$arr['password'] = $password==""?$_GET['password']:$password;
			$where['password'] = $oldpassword==""?$_GET['oldpassword']:$oldpassword;
			$where['account_id'] = $account_id==""?$_GET['account_id']:$account_id;
			if($this->public_model->update_table('jsjds_account_info',$arr,$where)){
				echo 'suc';exit;
			}else{
				echo 'err';exit;
				//$this->load->view('message',array('msg'=>'添加失败','url'=>'/index.php/admin/spot_interest/stype_index'));
			}
		}else{
			echo 'err';exit;
		}
		
	}
	//产生订单
	public function ajax_retrievepwd($register_tel="",$register_password=""){
		//echo date('Ymdhis', time());die;
		if($_GET){
			$arr['password'] = $register_password==""?$_GET['register_password']:$register_password;
			$where['tel'] = $register_tel==""?$_GET['register_tel']:$register_tel;
			//$where['account_id'] = $account_id==""?$_GET['account_id']:$account_id;
			if($this->public_model->update_table('jsjds_account_info',$arr,$where)){
				echo 'suc';exit;
			}else{
				echo 'err';exit;
				//$this->load->view('message',array('msg'=>'添加失败','url'=>'/index.php/admin/spot_interest/stype_index'));
			}
		}else{
			echo 'err';exit;
		}
		
	}
	public function ajax_testssss(){
		echo mb_substr('我的心你的梦', 0, 1, 'utf-8').'***';exit;
		echo mb_substr('我的心你的梦', 0, 1, 'utf-8').'***'. mb_substr('我的心你的梦', -1, 1, 'utf-8');exit;
		echo $username;
	}
}



?>