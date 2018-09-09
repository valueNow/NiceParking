<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prediction extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('url');
    }

    //添加
	public function add(){
		if($_POST){
			$this->load->view('message',array('msg'=>'添加成功','url'=>'/index.php/res/prediction/structure'));
		}else{
			$this->load->view('res/add');
		}
	}
	//修改
	public function edit(){
		if($_POST){
			$this->load->view('message',array('msg'=>'修改成功','url'=>'/index.php/res/prediction/structure'));
		}else{
			$this->load->view('res/edit');
		}
	}
	//威宁县旅游企业结构图
	public function structure(){
		$this->load->view('res/structure_list');
	}
	//威宁县旅游企业结构图
	public function public_structure(){
		$this->load->view('res/structure');
	}
	//威宁县旅游企业经济收入结构图
	public function economic(){
		$this->load->view('res/economic_list');
	}
	//威宁县旅游企业经济收入结构图
	public function public_economic(){
		$this->load->view('res/economic');
	}
	//威宁县游客投诉事件统计
	public function complaints(){
		$this->load->view('res/complaints_list');
	}
	//威宁县游客投诉事件统计
	public function public_complaints(){
		$this->load->view('res/complaints');
	}
	//重点节假日草海景区客流量
	public function traffic(){
		$this->load->view('res/traffic_list');
	}
	//重点节假日草海景区客流量
	public function public_traffic(){
		$this->load->view('res/traffic');
	}
	//草海游客性别、年龄结构
	public function sex(){
		$this->load->view('res/sex');
	}
	//威宁县从业情况统计
	public function guide(){
		$this->load->view('res/guide_list');
	}
	//威宁县从业情况统计
	public function public_guide(){
		$this->load->view('res/guide');
	}
	//威宁县旅游行业接待能力情况
	public function ability(){
		$this->load->view('res/ability');
	}


}
