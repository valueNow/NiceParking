<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//特色旅游点管理
class Spot_feature extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('spot_model','spot');
		$this->load->model('public_model','public_model');
		$this->load->model('release_model','rele');
    }
	
	//特色旅游点列表
	public function index()
	{
		if(empty($_GET)){
			$this->load->view('admin/spot_feature_list');
		}else{
			$serchdata['draw']=$_GET['draw'];
			$serchdata['order_column']=$_GET['order']['0']['column'];
			$serchdata['order_dir']=$_GET['order']['0']['dir'];
			$serchdata['start']=$_GET['start'];
			$serchdata['length']=$_GET['length'];
			//获取自定义的查询条件
			$serchdata['feature_name']= $_GET['feature_name'];
			$res = $this->spot->spot_feature_list($serchdata,$serchdata['start'],$serchdata['length']);
			$infos=array();
			foreach ($res['data'] as $k => $v) { 
				$obj = array($v['feature_name'],$v['spot_name'],$v['address'],date('Y-m-d H:i:s',$v['add_time']),'<p><a  href="/index.php/admin/spot_feature/look_spot_feature/'.$v['feature_id'].'" >查看</a> | <a  href="/index.php/admin/spot_feature/update_spot_feature/'.$v['feature_id'].'">修改</a></p>');
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
	
	//添加特色旅游点
	public function add_spot_feature()
	{
		if(!empty($_POST)){
			$nowtime = time();
			$guid = $this->Guid();
			$docx_id ="";$video_id="";$voice_id="";
			//上传文档
			if($_FILES['docx_id']['error']==0 && $_FILES['docx_id']['size']!=0){
				$docx_id = $this->Guid();
				$arr1 = array(
					'aid' => $docx_id,
					'file_url' => $this->uploadimage("docx_id"),
					'desc' => $this->input->post('docx_desc',TRUE),
					'add_time' => $nowtime,
					'connect_id' => $guid,
					'file_name' => $_FILES['docx_id']['name'],
				);
				$this->public_model->table_add('attachment',$arr1);
			}
			//上传视频
			if($_FILES['video_id']['error']==0 && $_FILES['video_id']['size']!=0){
				$video_id = $this->Guid();
				$arr2 = array(
					'aid' => $video_id,
					'file_url' => $this->uploadimage("video_id"),
					'desc' => $this->input->post('video_desc',TRUE),
					'add_time' => $nowtime,
					'connect_id' => $guid,
					'file_name' => $_FILES['video_id']['name'],
				);
				$this->public_model->table_add('attachment',$arr2);
			}
			//上传语音
			if($_FILES['voice_id']['error']==0 && $_FILES['voice_id']['size']!=0){
				$voice_id = $this->Guid();
				$arr3 = array(
					'aid' => $voice_id,
					'file_url' => $this->uploadimage("voice_id"),
					'desc' => $this->input->post('voice_desc',TRUE),
					'add_time' => $nowtime,
					'connect_id' => $guid,
					'file_name' => $_FILES['voice_id']['name'],
				);
				$this->public_model->table_add('attachment',$arr3);
			}
			$arr = array(
				'feature_id' => $guid,
				'spot_id' => $this->input->post('spot_id',TRUE),
				'feature_name' => $this->input->post('feature_name',TRUE),
				'address' => $this->input->post('address',TRUE),
				'desc' => $this->input->post('desc',TRUE),
				'x_index' => $this->input->post('x_index',TRUE),
				'y_index' => $this->input->post('y_index',TRUE),
				'z_index' => $this->input->post('z_index',TRUE),
				'voice_id' => $voice_id,
				'video_id' => $video_id,
				'docx_id' => $docx_id,
				'operate_time' => $nowtime,
				'add_time' => $nowtime,
				'operate_userid' => $_SESSION['user_id'],
			);
			//上传多图片
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
			$result = $this->public_model->table_add('spot_feature',$arr);
			if($result){
				$this->write_log();
				$this->load->view('message',array('msg'=>'操作成功！','url'=>'/index.php/admin/spot_feature/index'));
			}else{
				$this->load->view('message',array('msg'=>'操作失败！','url'=>'/index.php/admin/spot_feature/index'));
			}
		}else{
			$data['x']=$this->uri->segment(4);
			$data['y']=$this->uri->segment(5);
			$data['z']=$this->uri->segment(6);
			//所有景点
			$data['spot_arr'] = $this->spot->get_spot_arr();
			$this->load->view('admin/spot_feature_add',$data);
		}
	}
	//修改特色旅游点单位
	public function update_spot_feature()
	{	
		if(!empty($_POST)){
			$nowtime = time();
			$feature_id = $this->input->post('feature_id',TRUE);
			//上传图片
			/*if($_FILES['img_id']['error']==0 && $_FILES['img_id']['size']!=0){
				$aid = $this->input->post('img_id1',TRUE);
				$file_url4 = $this->uploadimage("img_id");
				$where4 = array('aid' => $aid );
				$arr4 = array(
					'file_url' => $file_url4,
					'desc' => $this->input->post('img_desc',TRUE),
					'file_name' => $_FILES['img_id']['name'],	
				);
				//var_dump($arr,$where);die;
				$this->public_model->update_table('attachment',$arr4,$where4);
			}*/
			$update_arr1 = array();
			//上传文档
			$docx_id1 = $this->input->post('docx_id1',TRUE);
			if($_FILES['docx_id']['error']==0 && $_FILES['docx_id']['size']!=0 && !empty($docx_id1)){
				$aid =$docx_id  = $this->input->post('docx_id1',TRUE);
				$file_url4 = $this->uploadimage("docx_id");
				$where4 = array('aid' => $aid );
				$arr4 = array(
					'file_url' => $file_url4,
					'desc' => $this->input->post('docx_desc',TRUE),
					'file_name' => $_FILES['docx_id']['name'],	
				);
				//var_dump($arr,$where);die;
				$this->public_model->update_table('attachment',$arr4,$where4);
			}elseif($_FILES['docx_id']['error']==0 && $_FILES['docx_id']['size']!=0 && empty($docx_id1)){
				$arr1['aid'] = $docx_id = $this->Guid();
				$arr1['file_url'] = $this->uploadimage("docx_id");
				$arr1['desc'] = $this->input->post('docx_desc',TRUE);
				$arr1['add_time'] = $nowtime;
				$arr1['connect_id'] = $feature_id;
				$arr1['file_name'] = $_FILES['docx_id']['name'];
				$this->public_model->table_add('attachment',$arr1);
				$update_arr1['docx_id'] = $docx_id;
			}
			//上传视频
			$video_id1 = $this->input->post('video_id1',TRUE);
			if($_FILES['video_id']['error']==0 && $_FILES['video_id']['size']!=0 && !empty($video_id1)){
				$aid = $video_id = $this->input->post('video_id1',TRUE);
				$file_url5 = $this->uploadimage("video_id");
				$where5 = array('aid' => $aid );
				$arr5 = array(
					'file_url' => $file_url5,
					'desc' => $this->input->post('video_desc',TRUE),
					'file_name' => $_FILES['video_id']['name'],	
				);
				$this->public_model->update_table('attachment',$arr5,$where5);
			}elseif($_FILES['video_id']['error']==0 && $_FILES['video_id']['size']!=0 && empty($video_id1)){
				$arr2['aid'] = $video_id = $this->Guid();
				$arr2['file_url'] = $this->uploadimage("video_id");
				$arr2['desc'] = $this->input->post('video_desc',TRUE);
				$arr2['add_time'] = $nowtime;
				$arr2['connect_id'] = $feature_id;
				$arr2['file_name'] = $_FILES['video_id']['name'];
				$this->public_model->table_add('attachment',$arr2);
				$update_arr1['video_id'] = $video_id;
			}
			//上传语音
			$voice_id1 = $this->input->post('voice_id1',TRUE);
			if($_FILES['voice_id']['error']==0 && $_FILES['voice_id']['size']!=0 && !empty($voice_id1)){
				$aid = $voice_id =$this->input->post('voice_id1',TRUE);
				$file_url6 = $this->uploadimage("voice_id");
				$where6 = array('aid' => $aid );
				$arr6 = array(
					'file_url' => $file_url6,
					'desc' => $this->input->post('voice_desc',TRUE),
					'file_name' => $_FILES['voice_id']['name'],	
				);
				$this->public_model->update_table('attachment',$arr6,$where6);
			}elseif($_FILES['voice_id']['error']==0 && $_FILES['voice_id']['size']!=0 && empty($voice_id1)){
				$arr3['aid'] = $voice_id = $this->Guid();
				$arr3['file_url'] = $this->uploadimage("voice_id");
				$arr3['desc'] = $this->input->post('voice_desc',TRUE);
				$arr3['add_time'] = $nowtime;
				$arr3['connect_id'] = $feature_id;
				$arr3['file_name'] = $_FILES['voice_id']['name'];
				$this->public_model->table_add('attachment',$arr3);
				$update_arr1['voice_id'] = $voice_id;
			}
			$esuinfo = $this->public_model->get_data_by_guid('spot_feature',array('feature_id' =>$feature_id));
			$update_arr = array(
				'spot_id' => $this->input->post('spot_id',TRUE),
				'feature_name' => $this->input->post('feature_name',TRUE),
				'address' => $this->input->post('address',TRUE),
				'desc' => $this->input->post('desc',TRUE),
				'x_index' => $this->input->post('x_index',TRUE),
				'y_index' => $this->input->post('y_index',TRUE),
				'z_index' => $this->input->post('z_index',TRUE),
				'operate_time' => time(),
				'operate_userid' => $_SESSION['user_id'],	
			);
			$update_arr = array_merge($update_arr,$update_arr1);
			$where = array(
				'feature_id' => $this->input->post('feature_id',TRUE),	
			);
			if($_FILES['img_url']['error'][0]==0 && $_FILES['img_url']['size'][0]!=0){
				if(!empty($esuinfo['img_aid'])){
					$img_aid = $esuinfo['img_aid'];
				}else{
					$img_aid = $this->Guid();
					$update_arr['img_aid'] = $img_aid;
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
			$result = $this->public_model->update_table('spot_feature',$update_arr,$where);
			if($result){
				$this->write_log();
				$this->load->view('message',array('msg'=>'操作成功！','url'=>'/index.php/admin/spot_feature/index'));
			}else{
				$this->load->view('message',array('msg'=>'操作失败！','url'=>'/index.php/admin/spot_feature/index'));
			}
		}
		else{
			$id = $this->uri->segment(4);
			$data['feature_info'] = $this->public_model->get_data_by_guid('spot_feature',array('feature_id' =>$id));
			$data['img'] = $this->rele->atta_list($data['feature_info']['img_aid']);
			$arr = $this->public_model->get_datas_by_guid('attachment',array('connect_id' => $id));
			foreach($arr as $k => $v){
				$data['file_result'][$v['aid']] = $v;
			}
			//所有景点
			$data['spot_arr'] = $this->spot->get_spot_arr();
			$this->load->view('admin/spot_feature_update',$data);
		}
	}
	
	//查看特色旅游点全部信息
	public function look_spot_feature()
	{
		$this->write_log();
		$id = $this->uri->segment(4);
		$data['feature_info'] = $this->public_model->get_data_by_guid('spot_feature',array('feature_id' =>$id));
		$data['img'] = $this->rele->atta_list($data['feature_info']['img_aid']);
		$arr = $this->public_model->get_datas_by_guid('attachment',array('connect_id' => $id));
		foreach($arr as $k => $v){
			$data['file_result'][$v['aid']] = $v;
		}
		//所有景点
		$data['spot_arr'] = $this->spot->get_spot_arr();
		$this->load->view('admin/spot_feature_look',$data);
	}

	
}



?>