<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("content-type:text/html;charset=utf-8");
class Api extends MY_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('url');
        $this->load->model('api_model','api');
    }

	//通过应对类型查预案
	public function ajax_plan($id=''){
		$event_type = $this->config->item("event_type");
		$plan = $this->api->ajax_plan_list($id);
		foreach($plan as $k=>$v){
			$plan[$k] = $v;
			$plan[$k]['event_type'] = $event_type[$v['event_type']];
		}
		if($plan){
			echo json_encode($plan);exit;
		}else{
			echo json_encode('no');exit;
		}
	}
	//通过队伍名称 模糊查询队伍列表
	public function ajax_team($name=''){
		$name = urldecode($name);
		$team_type = $this->config->item("team_type");
		$team = $this->api->ajax_team_list($name);
		foreach($team as $k=>$v){
			$team[$k] = $v;
			$team[$k]['team_type'] = $team_type[$v['team_type']];
		}
		if($team){
			echo json_encode($team);exit;
		}else{
			echo json_encode('no');exit;
		}
	}
	//通过队伍id  查出专家列表
	public function ajax_person($team_id=''){
		$person = $this->api->ajax_person_list($team_id);
		if($person){
			echo json_encode($person);exit;
		}else{
			echo json_encode('no');exit;
		}
	}
	//通过类型 模糊查询应急资源列表
	public function ajax_material($id='',$name=''){
		$name = urldecode($name);
		$event_type = $this->config->item("event_type");
		$material = $this->api->ajax_material_list($id,$name);
		foreach($material as $k=>$v){
			$material[$k] = $v;
			$arr = $this->api->get_one('emergency_material_storehouse','storehouse_id',$v['storehouse_id']);
			$material[$k]['storehouse_id'] = $arr['storehouse_name'];
			$material[$k]['eg_type'] = $event_type[$v['eg_type']];
		}
		if($material){
			echo json_encode($material);exit;
		}else{
			echo json_encode('no');exit;
		}
	}

	//通过路线名称 模糊查询应急路线列表
	public function ajax_route($name=''){
		$name = urldecode($name);
		$route = $this->api->ajax_route_list($name);
		if($route){
			echo json_encode($route);exit;
		}else{
			echo json_encode('no');exit;
		}
	}
	//通过路线id  查出具体路线
	public function ajax_route_ass($id=''){
		$route_ass = $this->api->ajax_route_ass_list($id);
		if($route_ass){
			echo json_encode($route_ass);exit;
		}else{
			echo json_encode('no');exit;
		}
	}

	//获取兴趣点类型全部信息
	public function ajax_interest_type()
	{
		$interest_type = $this->api->ajax_interest_type();
		if($interest_type){
			echo json_encode($interest_type);exit;
		}else{
			echo json_encode('no');exit;
		}
	}

	//获取所有兴趣点信息
	public function ajax_interest()
	{
		$interest = $this->api->ajax_interest();
		//var_dump($interest);die;
		if($interest){
			echo json_encode($interest);exit;
		}else{
			echo json_encode('no');exit;
		}
	}
	//根据景区id获取兴趣点
	public function ajax_get_interest_byspotid($id='')
	{
		$interests = $this->api->ajax_get_interest_byspotid($id);
		//var_dump($interests);die;
		if($interests){
			echo json_encode($interests);exit;
		}else{
			echo json_encode('no');exit;
		}
	}
	//获取所有特色旅游点信息
	public function ajax_feature()
	{
		$feature = $this->api->ajax_feature();
		//var_dump($feature);die;
		if($feature){
			echo json_encode($feature);exit;
		}else{
			echo json_encode('no');exit;
		}
	}
	//根据景区id获取特色旅游点信息
	public function ajax_feature_byspotid($id='')
	{
		$features = $this->api->ajax_feature_byspotid($id);
		//var_dump($features);die;
		if($features){
			echo json_encode($features);exit;
		}else{
			echo json_encode('no');exit;
		}
	}

	//获取景点line信息
	public function ajax_get_line()
	{
		$lines = array();
		$lines = $this->api->ajax_get_line();
		//var_dump($lines);die;
		foreach($lines as $k => $v){
			if(!empty($v['spot_ids'])){
				$spoidarr = explode(",",$v['spot_ids']);
				$arr = array();
				foreach($spoidarr as $k2 => $v2 ){
					$arr[$k2] = $this->api->ajax_get_spots($v2);
					//var_dump($spots);die;
					if(!empty($arr[$k2])){
						//var_dump($arr[$k2]);die;
						$attachs = $this->api->ajax_get_attach($arr[$k2]['img_aid']);
						$arr[$k2]['imgs'] = $attachs;
					}
				}
				$lines[$k]['spot_arr'] = $arr;
			}
		}
		//var_dump($lines);die;
		if($lines){
			echo json_encode($lines);exit;
		}else{
			echo json_encode('no');exit;
		}
	}

}

?>