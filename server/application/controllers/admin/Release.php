<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Release extends MY_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('url');
        $this->load->model('release_model','rele');
		$this->load->model('public_model','public_model');
    }
	/**
	 * 动植物分类列表   @zhubt
	 */
	public function floratype(){
		if(empty($_GET)){
			$this->load->view('admin/release_floratype');
		}else{
			$serchdata['draw']=$_GET['draw'];
			$serchdata['order_column']=$_GET['order']['0']['column'];
			$serchdata['order_dir']=$_GET['order']['0']['dir'];
			$serchdata['start']=$_GET['start'];
			$serchdata['length']=$_GET['length'];
			//获取自定义的查询条件
			if(isset($_GET['name'])){
				$serchdata['name'] = $_GET['name'];
			}
			$res = $this->rele->floratype_list($serchdata,$serchdata['start'],$serchdata['length']);
			$infos=array();
			foreach ($res['data'] as $k => $v) {
				$status = $v['status'] ? "启用":"禁用";
				$operating = '<a href="/index.php/admin/release/edit_floratype/'.$v["type_id"].'">修改</a> | ';
				$url = "javascript:if(confirm('确实要删除吗?'))location='/index.php/admin/release/del_floratype/".$v['type_id']."'";
				$operating .= '<a href="'.$url.'">删除</a>';
				$obj = array("<input type='text' style='text-align:center' name='listorders[".$v['type_id']."]' value='".$v['listorder']."' size='1'>",$v['name'],$v['description'],$status,date('Y-m-d H:i:s',$v['add_time']),$operating);
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
	
	//动植物分类添加   @zhubt
	public function add_floratype(){
		if($_POST){
			$arr['type_id'] = $this->Guid();
			$arr['name'] = $this->input->post('name',true);
			$arr['description'] = $this->input->post('description',true);
			$arr['status'] = $this->input->post('status',true);
			$arr['userid'] = $_SESSION['user_id'];
			$arr['add_time'] = time();
			if($this->rele->data_insert('flora_type',$arr)){
				$this->write_log();
				$this->load->view('message',array('msg'=>'添加成功','url'=>'/index.php/admin/release/floratype'));
			}else{
				$this->load->view('message',array('msg'=>'添加失败','url'=>'/index.php/admin/release/add_floratype'));
			}
		}else{
			$this->load->view('admin/release_floratype_add');
		}
	}

	//动植物分类修改   @zhubt
	public function edit_floratype($id=""){
		if($_POST){
			$where['type_id'] = $this->input->post('type_id',true);
			$arr['name'] = $this->input->post('name',true);
			$arr['description'] = $this->input->post('description',true);
			$arr['status'] = $this->input->post('status',true);
			$arr['userid'] = $_SESSION['user_id'];
			$arr['last_time'] = time();
			if($this->rele->data_update('flora_type',$arr,$where)){
				$this->write_log();
				$this->load->view('message',array('msg'=>'修改成功','url'=>'/index.php/admin/release/floratype'));
			}else{
				$this->load->view('message',array('msg'=>'修改失败','url'=>'/index.php/admin/release/floratype'));
			}
		}else{
			$data['flora'] = $this->rele->get_one('flora_type','type_id',$id);
			$this->load->view('admin/release_floratype_edit',$data);
		}
	}
	//动植物分类排序   @zhubt
	public function public_listorder(){
		if($_POST){
			$this->rele->listorder('flora_type',$_POST['listorders'],'type_id');
			$this->write_log();
			$this->load->view('message',array('msg'=>'操作成功','url'=>'/index.php/admin/release/floratype'));
		}else{
			$this->load->view('message',array('msg'=>'参数错误，刷新重试！','url'=>'/index.php/admin/release/floratype'));
		}
	}
	//删除动植物分类
	public function del_floratype($id=""){
		$where['type_id'] = $id;
		if($this->rele->data_delete('flora_type',$where)){
			$this->write_log();
			$this->load->view('message',array('msg'=>'删除成功','url'=>'/index.php/admin/release/floratype'));
		}else{
			$this->load->view('message',array('msg'=>'删除失败','url'=>'/index.php/admin/release/floratype'));
		}
	}

	/***********************************动植物资源管理 @zhubt************************************/
	public function floralist(){
		if(empty($_GET)){
			$this->load->view('admin/release_flora');
		}else{
			$serchdata['draw']=$_GET['draw'];
			$serchdata['order_column']=$_GET['order']['0']['column'];
			$serchdata['order_dir']=$_GET['order']['0']['dir'];
			$serchdata['start']=$_GET['start'];
			$serchdata['length']=$_GET['length'];
			//获取自定义的查询条件
			if(isset($_GET['title'])){
				$serchdata['title'] = $_GET['title'];
			}
			$res = $this->rele->floralist($serchdata,$serchdata['start'],$serchdata['length']);
			$infos=array();
			foreach ($res['data'] as $k => $v) {
				$type = $this->rele->get_one('flora_type','type_id',$v['type_id']);
				$operating = '<a href="/index.php/admin/release/view_flora/'.$v["flora_id"].'">查看</a> | ';
				$operating .= '<a href="/index.php/admin/release/edit_flora/'.$v["flora_id"].'">修改</a> | ';
				$url = "javascript:if(confirm('确实要删除吗?'))location='/index.php/admin/release/del_flora/".$v['flora_id']."'";
				$operating .= '<a href="'.$url.'">删除</a>';
				$obj = array($v['numbering'],$v['title'], $type['name'],$v['num'],date('Y-m-d H:i:s',$v['add_time']),$operating);
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

	//动植物资源添加   @zhubt
	public function add_flora(){
		if($_POST){
			$arr['flora_id'] = $this->Guid();
			$arr['type_id'] = $this->input->post('type_id',true);
			$arr['sp_id'] = $this->input->post('sp_id',true);
			$arr['numbering'] = $this->input->post('numbering',true);
			$arr['num'] = $this->input->post('num',true);
			$arr['title'] = $this->input->post('title',true);
			$arr['description'] = $this->input->post('description',true);
			if($_FILES['img_url']['error'][0]==0 && $_FILES['img_url']['size'][0]!=0){
				$img_aid = $this->Guid();
				for($i=0;$i<count($_FILES['img_url']['name']);$i++){
					$row['aid'] = $this->Guid();
					$row['file_url'] = $this->upload_more("img_url",$row['aid'],$i);//上传图片
					$row['file_name'] = $_POST['img_name'][$i];
					$row['connect_id'] = $img_aid;
					$row['add_time'] = time();
					$this->rele->data_insert('attachment',$row);
				}
				$arr['img_aid'] = $img_aid;
			}
			if($_FILES['video_url']['error'][0]==0 && $_FILES['video_url']['size'][0]!=0){
				$video_aid = $this->Guid();
				for($i=0;$i<count($_FILES['video_url']['name']);$i++){
					$info['aid'] = $this->Guid();
					$info['file_url'] = $this->upload_more("video_url",$info['aid'],$i);//上传视频
					$info['file_name'] = $_POST['video_name'][$i];
					$info['connect_id'] = $video_aid;
					$info['add_time'] = time();
					$this->rele->data_insert('attachment',$info);
				}
				$arr['video_aid'] = $video_aid;
			}
			$arr['userid'] = $_SESSION['user_id'];
			$arr['add_time'] = time();
			if($this->rele->data_insert('flora_fauna',$arr)){
				//添加关联表漫游点表
				$lstPoint = json_decode($_POST['lstPoint'],true);
				foreach($lstPoint as $k => $v){
					$new = array(
						'line_id' => $arr['flora_id'],
						'id' => $this->Guid(),
						'x_index' => $v['x'],
						'y_index' => $v['y'],
						'z_index' => $v['z'],
						'orderby' => $v['orderby'],
					);
					$this->rele->data_insert('spot_line_ass',$new);
				}
				$this->write_log();
				$this->load->view('message',array('msg'=>'添加成功','url'=>'/index.php/admin/release/floralist'));
			}else{
				$this->load->view('message',array('msg'=>'添加失败','url'=>'/index.php/admin/release/add_flora'));
			}
		}else{
			$data['type'] = $this->rele->flora_list();
			$data['spots'] = $this->rele->spots_list();
			$this->load->view('admin/release_flora_add',$data);
		}
	}

	//动植物资源修改   @zhubt
	public function edit_flora($id=""){
		if($_POST){
			$where['flora_id'] = $this->input->post('flora_id',true);
			$flora = $this->rele->get_one('flora_fauna','flora_id',$where['flora_id']);
			$arr['type_id'] = $this->input->post('type_id',true);
			$arr['sp_id'] = $this->input->post('sp_id',true);
			$arr['numbering'] = $this->input->post('numbering',true);
			$arr['num'] = $this->input->post('num',true);
			$arr['title'] = $this->input->post('title',true);
			$arr['description'] = $this->input->post('description',true);
			if($_FILES['img_url']['error'][0]==0 && $_FILES['img_url']['size'][0]!=0){
				if(!empty($flora['img_aid'])){
					$img_aid = $flora['img_aid'];
				}else{
					$img_aid = $this->Guid();
					$arr['img_aid'] = $img_aid;
				}
				for($i=0;$i<count($_FILES['img_url']['name']);$i++){
					$row['aid'] = $this->Guid();
					$row['file_url'] = $this->upload_more("img_url",$row['aid'],$i);//上传图片
					$row['file_name'] = $_POST['img_name'][$i];
					$row['connect_id'] = $img_aid;
					$row['add_time'] = time();
					$this->rele->data_insert('attachment',$row);
				}
			}
			if($_FILES['video_url']['error'][0]==0 && $_FILES['video_url']['size'][0]!=0){
				if(!empty($flora['video_aid'])){
					$video_aid = $flora['video_aid'];
				}else{
					$video_aid = $this->Guid();
					$arr['video_aid'] = $video_aid;
				}
				for($i=0;$i<count($_FILES['video_url']['name']);$i++){
					$info['aid'] = $this->Guid();
					$info['file_url'] = $this->upload_more("video_url",$info['aid'],$i);//上传视频
					$info['file_name'] = $_POST['video_name'][$i];
					$info['connect_id'] = $video_aid;
					$info['add_time'] = time();
					$this->rele->data_insert('attachment',$info);
				}
			}
			$arr['userid'] = $_SESSION['user_id'];
			$arr['last_time'] = time();
			if($this->rele->data_update('flora_fauna',$arr,$where)){
				if(!empty($_POST['lstPoint'])){
					//删除关联表信息，重新添加
					$this->public_model->del_data('spot_line_ass',array('line_id'=>$where['flora_id']));
					//添加关联表路线表
					$lstPoint = json_decode($_POST['lstPoint'],true);
					foreach($lstPoint as $val){
						$new = array(
							'line_id' => $where['flora_id'],
							'id' => $this->Guid(),
							'x_index' => $val['x'],
							'y_index' => $val['y'],
							'z_index' => $val['z'],
							'orderby' => $val['orderby'],
						);
						$this->public_model->table_add('spot_line_ass',$new);
					}
				}
				$this->write_log();
				$this->load->view('message',array('msg'=>'修改成功','url'=>'/index.php/admin/release/floralist'));
			}else{
				$this->load->view('message',array('msg'=>'修改失败','url'=>'/index.php/admin/release/floralist'));
			}
		}else{
			$data['flora'] = $this->rele->get_one('flora_fauna','flora_id',$id);
			$data['ass'] = $this->public_model->get_datas_by_guid2('spot_line_ass',array('line_id'=>$id));
			$data['lstPoint'] = json_encode($data['ass']);
			$data['type'] = $this->rele->flora_list();
			$data['spots'] = $this->rele->spots_list();
			$data['img'] = $this->rele->atta_list($data['flora']['img_aid']);
			$data['video'] = $this->rele->atta_list($data['flora']['video_aid']);
			$this->load->view('admin/release_flora_edit',$data);
		}
	}

	//查看动植物资源详情   @zhubt
	public function view_flora($id=""){
		$this->write_log();
		$data['flora'] = $this->rele->get_one('flora_fauna','flora_id',$id);
		$type = $this->rele->get_one('flora_type','type_id',$data['flora']['type_id']);
		$data['flora']['type_id'] = $type['name'];
		$spot = $this->rele->get_one('spot_management','spot_id',$data['flora']['sp_id']);
		$data['flora']['sp_id'] = $spot['spot_name'];
		$data['img'] = $this->rele->atta_list($data['flora']['img_aid']);
		$data['video'] = $this->rele->atta_list($data['flora']['video_aid']);
		$data['ass'] = $this->public_model->get_datas_by_guid2('spot_line_ass',array('line_id'=>$id));
		$data['lstPoint'] = json_encode($data['ass']);
		$this->load->view('admin/release_flora_view',$data);
	}

	//删除动植物资源
	public function del_flora($id=""){
		$where['flora_id'] = $id;
		if($this->rele->data_delete('flora_fauna',$where)){
			//删除关联表信息
			$this->public_model->del_data('spot_line_ass',array('line_id'=>$id));
			$this->write_log();
			$this->load->view('message',array('msg'=>'删除成功','url'=>'/index.php/admin/release/floralist'));
		}else{
			$this->load->view('message',array('msg'=>'删除失败','url'=>'/index.php/admin/release/floralist'));
		}
	}

	/***********************************滚动字幕管理 @zhubt************************************/
	public function scroll(){
		$data['server'] = $this->rele->get_server();
		if(empty($_GET)){
			$this->load->view('admin/release_scroll',$data);
		}else{
			$serchdata['draw']=$_GET['draw'];
			$serchdata['order_column']=$_GET['order']['0']['column'];
			$serchdata['order_dir']=$_GET['order']['0']['dir'];
			$serchdata['start']=$_GET['start'];
			$serchdata['length']=$_GET['length'];
			//获取自定义的查询条件
			if(isset($_GET['title'])){
				$serchdata['title'] = $_GET['title'];
			}
			$res = $this->rele->scroll_list($serchdata,$serchdata['start'],$serchdata['length']);
			$infos=array();
			foreach ($res['data'] as $k => $v) {
				$onclick = "open_win('".$v["id"]."')";
				$operating = '';
				if(!$v['last_time']){
					$operating .= '<a onclick="'.$onclick.'">发布</a> | ';
					$operating .= '<a href="/index.php/admin/release/edit_scroll/'.$v["id"].'">修改</a> | ';
					$url = "javascript:if(confirm('确实要删除吗?'))location='/index.php/admin/release/del_scroll/".$v['id']."'";
					$operating .= '<a href="'.$url.'">删除</a>';
				}
				if(empty($v['last_time'])){
					$last_time = "暂未发布";
				}else{
					$last_time = date('Y-m-d H:i:s',$v['last_time']);
				}
				$obj = array($v['title'],$v['speed'],$v['content'],$last_time,$operating);
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

	//滚动字幕添加   @zhubt
	public function add_scroll(){
		if($_POST){
			$arr['id'] = $this->Guid();
			$arr['title'] = $this->input->post('title',true);
			$arr['speed'] = $this->input->post('speed',true);
			$arr['content'] = $this->input->post('content',true);
			$arr['username'] = $_SESSION['user_name'];
			$arr['add_time'] = time();
			if($this->rele->data_insert('flora_scroll',$arr)){
				$this->write_log();
				$this->load->view('message',array('msg'=>'添加成功','url'=>'/index.php/admin/release/scroll'));
			}else{
				$this->load->view('message',array('msg'=>'添加失败','url'=>'/index.php/admin/release/add_scroll'));
			}
		}else{
			$this->load->view('admin/release_scroll_add');
		}
	}

	//滚动字幕修改   @zhubt
	public function edit_scroll($id=""){
		if($_POST){
			$where['id'] = $this->input->post('id',true);
			$arr['title'] = $this->input->post('title',true);
			$arr['speed'] = $this->input->post('speed',true);
			$arr['content'] = $this->input->post('content',true);
			$arr['username'] = $_SESSION['user_name'];
			if($this->rele->data_update('flora_scroll',$arr,$where)){
				$this->write_log();
				$this->load->view('message',array('msg'=>'修改成功','url'=>'/index.php/admin/release/scroll'));
			}else{
				$this->load->view('message',array('msg'=>'修改失败','url'=>'/index.php/admin/release/scroll'));
			}
		}else{
			$data['scroll'] = $this->rele->get_one('flora_scroll','id',$id);
			$this->load->view('admin/release_scroll_edit',$data);
		}
	}

	//发布滚动字幕   @zhubt
	public function view_scroll(){
		if($_POST){
			$where['id'] = $this->input->post('sid',true);
			$scroll = $this->rele->get_one('flora_scroll','id',$where['id']);
			$arr['last_time'] = time();
			$upda = $this->rele->data_update('flora_scroll',$arr,$where);
			$row['id'] = $this->Guid();
			$row['maneger_id'] = $where['id'];
			$row['name'] = $scroll['title'];
			$row['type'] = '1';
			$row['release_time'] = $arr['last_time'];
			$row['username'] = $_SESSION['user_name'];
			$row['release_host'] = implode(',',$_POST['sys']);
			$insert = $this->rele->data_insert('info_record',$row);
			if($upda && $insert){
				$this->write_log();
				$this->load->view('message',array('msg'=>'发布成功','url'=>'/index.php/admin/release/scroll'));
			}else{
				$this->load->view('message',array('msg'=>'发布失败','url'=>'/index.php/admin/release/scroll'));
			}
		}else{
			$this->load->view('message',array('msg'=>'参数错误','url'=>'/index.php/admin/release/scroll'));
		}
	}

	//删除滚动字幕
	public function del_scroll($id=""){
		$where['id'] = $id;
		if($this->rele->data_delete('flora_scroll',$where)){
			$this->write_log();
			$this->load->view('message',array('msg'=>'删除成功','url'=>'/index.php/admin/release/scroll'));
		}else{
			$this->load->view('message',array('msg'=>'删除失败','url'=>'/index.php/admin/release/scroll'));
		}
	}

	/***********************************信息发布管理 @zhubt************************************/
	public function maneger(){
		$data['server'] = $this->rele->get_server();
		if(empty($_GET)){
			$this->load->view('admin/maneger_info',$data);
		}else{
			$serchdata['draw']=$_GET['draw'];
			$serchdata['order_column']=$_GET['order']['0']['column'];
			$serchdata['order_dir']=$_GET['order']['0']['dir'];
			$serchdata['start']=$_GET['start'];
			$serchdata['length']=$_GET['length'];
			//获取自定义的查询条件
			if(isset($_GET['name'])){
				$serchdata['name'] = $_GET['name'];
			}
			$res = $this->rele->maneger_list($serchdata,$serchdata['start'],$serchdata['length']);
			$infos=array();
			foreach($res['data'] as $k => $v) {
				$is_enabled = $v['is_enabled'] ? "启用":"禁用";
				$release_time = empty($v['release_time']) ? "暂未发布":date('Y-m-d H:i:s',$v['release_time']);
				$operating = '<a href="/index.php/admin/release/view_maneger/'.$v["id"].'">查看</a>';
				if(!$v['release_time']){
					$operating .= ' | <a href="/index.php/admin/release/edit_maneger/'.$v["id"].'">修改</a> | ';
					$url = "javascript:if(confirm('确实要删除吗?'))location='/index.php/admin/release/del_maneger/".$v['id']."'";
					$operating .= '<a href="'.$url.'">删除</a>';
					if($v['is_enabled']==1){
						$onclick = "open_win('".$v["id"]."')";
						$operating .= ' | <a onclick="'.$onclick.'">发布</a>';
					}
				}
				$obj = array($v['name'],$v['description'],$release_time, $is_enabled,$operating);
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
	//发布信息   @zhubt
	public function release_maneger(){
		if($_POST){
			$where['id'] = $this->input->post('sid',true);
			$maneger = $this->rele->get_one('info_maneger','id',$where['id']);
			$arr['release_time'] = time();
			$upda = $this->rele->data_update('info_maneger',$arr,$where);
			$row['id'] = $this->Guid();
			$row['maneger_id'] = $where['id'];
			$row['name'] = $maneger['name'];
			$row['type'] = '2';
			$row['release_time'] = $arr['release_time'];
			$row['username'] = $_SESSION['user_name'];
			$row['release_host'] = implode(',',$_POST['sys']);
			$insert = $this->rele->data_insert('info_record',$row);
			if($upda && $insert){
				$this->write_log();
				$this->load->view('message',array('msg'=>'发布成功','url'=>'/index.php/admin/release/maneger'));
			}else{
				$this->load->view('message',array('msg'=>'发布失败','url'=>'/index.php/admin/release/maneger'));
			}
		}else{
			$this->load->view('message',array('msg'=>'参数错误','url'=>'/index.php/admin/release/maneger'));
		}
	}
	//时间轴排序
	public function maneger_order(){
		foreach ($_POST['id'] as $k => $v) {
			$where['id'] = $v;
			$arr['listorder'] = ($k+1);
			$this->rele->data_update('info_maneger_time',$arr,$where);
		}
		$this->write_log();
		$this->load->view('message',array('msg'=>'操作成功','url'=>'/index.php/admin/release/maneger_time'));	
	}
	//添加信息   @zhubt
	public function add_maneger(){
		if($_POST){
			$arr['id'] = $this->Guid();
			$arr['name'] = $this->input->post('name',true);
			$arr['description'] = $this->input->post('description',true);
			$arr['is_enabled'] = $this->input->post('is_enabled',true);
			$arr['userid'] = $_SESSION['user_id'];
			$arr['add_time'] = time();
			if($this->rele->data_insert('info_maneger',$arr)){
				$_SESSION['maneger_id'] = $arr['id'];
				$this->maneger_time();
				$this->write_log();
			}
		}else{
			$data['c'] = "add_maneger";
			$this->load->view('admin/maneger_info_add',$data);
		}
	}
	//修改信息   @zhubt
	public function edit_maneger($id=""){
		if($_POST){
			$where['id'] = $this->input->post('id',true);
			$arr['name'] = $this->input->post('name',true);
			$arr['description'] = $this->input->post('description',true);
			$arr['is_enabled'] = $this->input->post('is_enabled',true);
			$arr['userid'] = $_SESSION['user_id'];
			$arr['last_time'] = time();
			if($this->rele->data_update('info_maneger',$arr,$where)){
				$_SESSION['maneger_id'] = $where['id'];
				$this->maneger_time();
			}
			$this->write_log();
		}else{
			$data['info'] = $this->rele->get_one('info_maneger','id',$id);
			$data['c'] = "edit_maneger";
			$this->load->view('admin/maneger_info_add',$data);
		}
	}

	//信息发布时间轴   @zhubt
	public function maneger_time(){
		$data['maneger'] = $this->rele->maneger_time_list($_SESSION['maneger_id']);
		$this->load->view('admin/maneger_time',$data);
	}

	//删除时间轴信息   @zhubt
	public function del_maneger_time($id=''){
		$where['id'] = $id;
		if($this->rele->data_delete('info_maneger_time',$where)){
			$this->write_log();
			$this->load->view('message',array('msg'=>'删除成功','url'=>'/index.php/admin/release/maneger_time'));
		}else{
			$this->load->view('message',array('msg'=>'删除失败','url'=>'/index.php/admin/release/maneger_time'));
		}
	}

	//视频列表   @zhubt
	public function maneger_video(){
		if(empty($_GET)){
			$this->load->view('admin/maneger_video');
		}else{
			$serchdata['draw']=$_GET['draw'];
			$serchdata['order_column']=$_GET['order']['0']['column'];
			$serchdata['order_dir']=$_GET['order']['0']['dir'];
			$serchdata['start']=$_GET['start'];
			$serchdata['length']=$_GET['length'];
			//获取自定义的查询条件
			if(isset($_GET['video_name'])){
				$serchdata['video_name'] = $_GET['video_name'];
			}
			$serchdata['whe']['is_enabled'] = '1';
			$res = $this->rele->maneger_video($serchdata,$serchdata['start'],$serchdata['length']);
			$infos=array();
			foreach ($res['data'] as $k => $v) {
				$obj = array('<input type="radio" value="'.$v['video_id'].'" name="video_id">',$v['video_name'],$v['duration']."分钟",$v['description']);
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
	//添加视频信息   @zhubt
	public function add_maneger_video(){
		if($_POST){
			$video_id = $this->input->post('video_id',true);
			$video = $this->rele->get_one('info_video','video_id',$video_id);
			$arr['id'] = $this->Guid();
			$arr['maneger_id'] = $_SESSION['maneger_id'];
			$arr['name'] = $video['video_name'];
			$arr['duration'] = $video['duration'];
			$arr['connectid'] = $video['video_id'];
			$arr['type'] = 1;
			$arr['description'] = $video['description'];
			$arr['userid'] = $_SESSION['user_id'];
			$arr['add_time'] = time();
			if($this->rele->data_insert('info_maneger_time',$arr)){
				$this->write_log();
				$this->load->view('message',array('msg'=>'添加成功','url'=>'/index.php/admin/release/maneger_time'));
			}else{
				$this->load->view('message',array('msg'=>'添加失败','url'=>'/index.php/admin/release/maneger_time'));
			}
		}
	}
	//图片列表   @zhubt
	public function maneger_img(){
		if(empty($_GET)){
			$this->load->view('admin/maneger_img');
		}else{
			$serchdata['draw']=$_GET['draw'];
			$serchdata['order_column']=$_GET['order']['0']['column'];
			$serchdata['order_dir']=$_GET['order']['0']['dir'];
			$serchdata['start']=$_GET['start'];
			$serchdata['length']=$_GET['length'];
			//获取自定义的查询条件
			if(isset($_GET['img_name'])){
				$serchdata['img_name'] = $_GET['img_name'];
			}
			$serchdata['whe']['is_enabled'] = '1';
			$res = $this->rele->maneger_img($serchdata,$serchdata['start'],$serchdata['length']);
			$infos=array();
			foreach ($res['data'] as $k => $v) {
				$obj = array('<input type="checkbox" value="'.$v['img_id'].'" name="img_id[]">',$v['img_name'],$v['description']);
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
	//添加图片信息   @zhubt
	public function add_maneger_img(){
		if($_POST){
			$arr['id'] = $this->Guid();
			$arr['maneger_id'] = $_SESSION['maneger_id'];
			$arr['name'] = $this->input->post('name',true);
			$arr['duration'] = $this->input->post('duration',true);
			$arr['connectid'] = implode(',',$_POST['img_id']);
			$arr['type'] = 2;
			$arr['description'] = $this->input->post('description',true);
			$arr['userid'] = $_SESSION['user_id'];
			$arr['add_time'] = time();
			if($this->rele->data_insert('info_maneger_time',$arr)){
				$this->write_log();
				$this->load->view('message',array('msg'=>'添加成功','url'=>'/index.php/admin/release/maneger_time'));
			}else{
				$this->load->view('message',array('msg'=>'添加失败','url'=>'/index.php/admin/release/maneger_time'));
			}
		}
	}
	//动植物列表   @zhubt
	public function maneger_flora(){
		if(empty($_GET)){
			$this->load->view('admin/maneger_flora');
		}else{
			$serchdata['draw']=$_GET['draw'];
			$serchdata['order_column']=$_GET['order']['0']['column'];
			$serchdata['order_dir']=$_GET['order']['0']['dir'];
			$serchdata['start']=$_GET['start'];
			$serchdata['length']=$_GET['length'];
			//获取自定义的查询条件
			if(isset($_GET['title'])){
				$serchdata['title'] = $_GET['title'];
			}
			$res = $this->rele->floralist($serchdata,$serchdata['start'],$serchdata['length']);
			$infos=array();
			foreach ($res['data'] as $k => $v) {
				$type = $this->rele->get_one('flora_type','type_id',$v['type_id']);
				$obj = array('<input type="radio" value="'.$v['flora_id'].'" name="flora_id">',$v['title'],$v['numbering'],$v['num'],$type['name']);
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
	//添加动植物信息   @zhubt
	public function add_maneger_flora(){
		if($_POST){
			$arr['id'] = $this->Guid();
			$arr['maneger_id'] = $_SESSION['maneger_id'];
			$arr['name'] = $this->input->post('name',true);
			$arr['duration'] = $this->input->post('duration',true);
			$arr['connectid'] = $this->input->post('flora_id',true);
			$arr['description'] = $this->input->post('description',true);
			$arr['type'] = 3;
			$arr['userid'] = $_SESSION['user_id'];
			$arr['add_time'] = time();
			if($this->rele->data_insert('info_maneger_time',$arr)){
				$this->write_log();
				$this->load->view('message',array('msg'=>'添加成功','url'=>'/index.php/admin/release/maneger_time'));
			}else{
				$this->load->view('message',array('msg'=>'添加失败','url'=>'/index.php/admin/release/maneger_time'));
			}
		}
	}
	//查看信息   @zhubt
	public function view_maneger($id=""){
		$this->write_log();
		$data['maneger_time'] = $this->rele->maneger_time_list($id);
		$data['maneger'] = $this->rele->get_one('info_maneger','id',$id);
		$data['maneger']['is_enabled'] = $data['maneger']['is_enabled'] ? "启用":"禁用";
		$data['maneger']['release_time'] = empty($data['maneger']['release_time']) ? "暂未发布":date('Y-m-d H:i:s',$data['maneger']['release_time']);
		$this->load->view('admin/maneger_view',$data);
	}

	//删除信息
	public function del_maneger($id=""){
		$where['id'] = $id;
		$row['maneger_id'] = $id;
		$maneger = $this->rele->data_delete('info_maneger',$where);
		$maneger_time = $this->rele->data_delete('info_maneger_time',$row);
		if($maneger && $maneger_time){
			$this->write_log();
			$this->load->view('message',array('msg'=>'删除成功','url'=>'/index.php/admin/release/maneger'));
		}else{
			$this->load->view('message',array('msg'=>'删除失败','url'=>'/index.php/admin/release/maneger'));
		}
	}
	/***********************************视频管理 @zhubt************************************/
	//视频管理列表   @zhubt
	public function videolist(){
		if(empty($_GET)){
			$this->load->view('admin/maneger_video_list');
		}else{
			$serchdata['draw']=$_GET['draw'];
			$serchdata['order_column']=$_GET['order']['0']['column'];
			$serchdata['order_dir']=$_GET['order']['0']['dir'];
			$serchdata['start']=$_GET['start'];
			$serchdata['length']=$_GET['length'];
			//获取自定义的查询条件
			if(isset($_GET['video_name'])){
				$serchdata['video_name'] = $_GET['video_name'];
			}
			$res = $this->rele->maneger_video($serchdata,$serchdata['start'],$serchdata['length']);
			$infos=array();
			foreach ($res['data'] as $k => $v) {
				$is_enabled = $v['is_enabled'] ? "启用":"禁用";
				$is = $v['is_enabled'] ? "禁用":"启用";
				$operating = '<a href="/index.php/admin/release/video_enabled/'.$v["video_id"].'/'.$v['is_enabled'].'">'.$is.'</a> | ';
				$operating .= '<a href="/index.php/admin/release/edit_video/'.$v["video_id"].'">修改</a> | ';
				$url = "javascript:if(confirm('确实要删除吗?'))location='/index.php/admin/release/del_video/".$v['video_id']."'";
				$operating .= '<a href="'.$url.'">删除</a>';
				$obj = array($v['video_name'],$v['duration']."分钟",$v['description'],$is_enabled,$operating);
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
	//修改视频状态   @zhubt
	public function video_enabled($id='',$is_enabled=''){
		$where['video_id'] = $id;
		$arr['is_enabled'] = intval($is_enabled) ? '0' : '1';
		if($this->rele->data_update('info_video',$arr,$where)){
			$this->write_log();
			$this->load->view('message',array('msg'=>'操作成功','url'=>'/index.php/admin/release/videolist'));
		}else{
			$this->load->view('message',array('msg'=>'操作失败','url'=>'/index.php/admin/release/videolist'));
		}
	}
	//添加视频   @zhubt
	public function add_video($catname=''){
		if($_POST){
			$cat = $this->input->post('cat',true);
			$arr['video_id'] = $this->Guid();
			$arr['video_name'] = $this->input->post('video_name',true);
			if($_FILES['video_url']['error']==0 && $_FILES['video_url']['size']!=0){
				$arr['video_url'] = $this->uploadimage("video_url");
			}
			$arr['duration'] = $this->input->post('duration',true);
			$arr['is_enabled'] = "1";
			$arr['description'] = $this->input->post('description',true);
			$arr['userid'] = $_SESSION['user_id'];
			$arr['add_time'] = time();
			if($this->rele->data_insert('info_video',$arr)){
				$this->write_log();
				$this->load->view('message',array('msg'=>'添加成功','url'=>'/index.php/admin/release/'.$cat));
			}else{
				$this->load->view('message',array('msg'=>'添加失败','url'=>'/index.php/admin/release/'.$cat));
			}
		}else{
			$data['catname'] = $catname;
			$this->load->view('admin/maneger_video_add',$data);
		}
	}
	//修改视频信息   @zhubt
	public function edit_video($id=""){
		if($_POST){
			$where['video_id'] = $this->input->post('video_id',true);
			$arr['video_name'] = $this->input->post('video_name',true);
			if($_FILES['video_url']['error']==0 && $_FILES['video_url']['size']!=0){
				$arr['video_url'] = $this->uploadimage("video_url");
			}
			$arr['duration'] = $this->input->post('duration',true);
			$arr['description'] = $this->input->post('description',true);
			$arr['userid'] = $_SESSION['user_id'];
			if($this->rele->data_update('info_video',$arr,$where)){
				$this->write_log();
				$this->load->view('message',array('msg'=>'修改成功','url'=>'/index.php/admin/release/videolist'));
			}else{
				$this->load->view('message',array('msg'=>'修改失败','url'=>'/index.php/admin/release/videolist'));
			}
		}else{
			$data['video'] = $this->rele->get_one('info_video','video_id',$id);
			$this->load->view('admin/maneger_video_edit',$data);
		}
	}
	//删除视频
	public function del_video($id=""){
		$where['video_id'] = $id;
		if($this->rele->data_delete('info_video',$where)){
			$this->write_log();
			$this->load->view('message',array('msg'=>'删除成功','url'=>'/index.php/admin/release/videolist'));
		}else{
			$this->load->view('message',array('msg'=>'删除失败','url'=>'/index.php/admin/release/videolist'));
		}
	}

	/***********************************图片管理 @zhubt************************************/
	//图片管理列表   @zhubt
	public function imglist(){
		if(empty($_GET)){
			$this->load->view('admin/maneger_img_list');
		}else{
			$serchdata['draw']=$_GET['draw'];
			$serchdata['order_column']=$_GET['order']['0']['column'];
			$serchdata['order_dir']=$_GET['order']['0']['dir'];
			$serchdata['start']=$_GET['start'];
			$serchdata['length']=$_GET['length'];
			//获取自定义的查询条件
			if(isset($_GET['img_name'])){
				$serchdata['img_name'] = $_GET['img_name'];
			}
			$res = $this->rele->maneger_img($serchdata,$serchdata['start'],$serchdata['length']);
			$infos=array();
			foreach ($res['data'] as $k => $v) {
				$is_enabled = $v['is_enabled'] ? "启用":"禁用";
				$is = $v['is_enabled'] ? "禁用":"启用";
				$operating = '<a href="/index.php/admin/release/img_enabled/'.$v["img_id"].'/'.$v['is_enabled'].'">'.$is.'</a> | ';
				$operating .= '<a href="/index.php/admin/release/edit_img/'.$v["img_id"].'">修改</a> | ';
				$url = "javascript:if(confirm('确实要删除吗?'))location='/index.php/admin/release/del_img/".$v['img_id']."'";
				$operating .= '<a href="'.$url.'">删除</a>';
				$obj = array($v['img_name'],$v['description'],date('Y-m-d H:i:s',$v['add_time']),$is_enabled,$operating);
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
	//修改图片状态   @zhubt
	public function img_enabled($id='',$is_enabled=''){
		$where['img_id'] = $id;
		$arr['is_enabled'] = intval($is_enabled) ? '0' : '1';
		if($this->rele->data_update('info_img',$arr,$where)){
			$this->load->view('message',array('msg'=>'操作成功','url'=>'/index.php/admin/release/imglist'));
		}else{
			$this->load->view('message',array('msg'=>'操作失败','url'=>'/index.php/admin/release/imglist'));
		}
	}
	//添加图片   @zhubt
	public function add_img($catname=''){
		if($_POST){
			$cat = $this->input->post('cat',true);
			$arr['img_id'] = $this->Guid();
			$arr['img_name'] = $this->input->post('img_name',true);
			if($_FILES['img_url']['error']==0 && $_FILES['img_url']['size']!=0){
				$arr['img_url'] = $this->uploadimage("img_url");
			}
			$arr['is_enabled'] = "1";
			$arr['description'] = $this->input->post('description',true);
			$arr['userid'] = $_SESSION['user_id'];
			$arr['add_time'] = time();
			if($this->rele->data_insert('info_img',$arr)){
				$this->write_log();
				$this->load->view('message',array('msg'=>'添加成功','url'=>'/index.php/admin/release/'.$cat));
			}else{
				$this->load->view('message',array('msg'=>'添加失败','url'=>'/index.php/admin/release/'.$cat));
			}
		}else{
			$data['catname'] = $catname;
			$this->load->view('admin/maneger_img_add',$data);
		}
	}
	//修改图片信息   @zhubt
	public function edit_img($id=""){
		if($_POST){
			$where['img_id'] = $this->input->post('img_id',true);
			$arr['img_name'] = $this->input->post('img_name',true);
			if($_FILES['img_url']['error']==0 && $_FILES['img_url']['size']!=0){
				$arr['img_url'] = $this->uploadimage("img_url");
			}
			$arr['description'] = $this->input->post('description',true);
			$arr['userid'] = $_SESSION['user_id'];
			if($this->rele->data_update('info_img',$arr,$where)){
				$this->write_log();
				$this->load->view('message',array('msg'=>'修改成功','url'=>'/index.php/admin/release/imglist'));
			}else{
				$this->load->view('message',array('msg'=>'修改失败','url'=>'/index.php/admin/release/imglist'));
			}
		}else{
			$data['img'] = $this->rele->get_one('info_img','img_id',$id);
			$this->load->view('admin/maneger_img_edit',$data);
		}
	}
	//删除图片
	public function del_img($id=""){
		$where['img_id'] = $id;
		if($this->rele->data_delete('info_img',$where)){
			$this->write_log();
			$this->load->view('message',array('msg'=>'删除成功','url'=>'/index.php/admin/release/imglist'));
		}else{
			$this->load->view('message',array('msg'=>'删除失败','url'=>'/index.php/admin/release/imglist'));
		}
	}
	//删除附件
	public function del_annex($id=""){
		$where['aid'] = $id;
		if($this->rele->data_delete('attachment',$where)){
			$this->write_log();
			echo json_encode("ok");exit;
		}else{
			echo json_encode("no");exit;
		}
	}

	//信息发布记录
	public function record(){
		if(empty($_GET)){
			$this->load->view('admin/maneger_info_record');
		}else{
			$serchdata['draw']=$_GET['draw'];
			$serchdata['order_column']=$_GET['order']['0']['column'];
			$serchdata['order_dir']=$_GET['order']['0']['dir'];
			$serchdata['start']=$_GET['start'];
			$serchdata['length']=$_GET['length'];
			//获取自定义的查询条件
			if(isset($_GET['name'])){
				$serchdata['name'] = $_GET['name'];
			}
			$res = $this->rele->maneger_record($serchdata,$serchdata['start'],$serchdata['length']);
			$infos=array();
			foreach ($res['data'] as $k => $v) {
				$type = $v['type']==1 ? "滚动字幕发布":"信息发布";
				$ser = $this->rele->get_server_name(explode(',',$v['release_host']));
				$server_name = '';
				foreach($ser as $val){
					$server_name .= $val['name']." | ";
				}
				$obj = array($server_name,$v['name'],$type,date('Y-m-d H:i:s',$v['release_time']),$v['username']);
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

}
