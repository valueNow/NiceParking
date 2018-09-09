<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Count extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('url');
    }

	//各省客源人数及分布
	public function china(){
		$this->load->view('admin/chart/china');
	}

	//到达方式分析  --游客分析
	public function pie(){
		$this->load->view('admin/chart/pie');
	}
	//游客来源  --游客分析
	public function source(){
		$this->load->view('admin/chart/source');
	}
	//游客量分析  --游客分析
	public function visitors(){
		$this->load->view('admin/chart/visitors');
	}
	//预期人数&&实到人数   --游客分析
	public function actual(){
		$this->load->view('admin/chart/actual');
	}
	//客源地  --游客分析
	public function keyuandi(){
		$this->load->view('admin/chart/keyuandi');
	}

	//涉旅企业  --产业监测分析
	public function trave(){
		$this->load->view('admin/chart/industry_trave');
	}
	//客流接待能力  --产业监测分析
	public function meter(){
		$this->load->view('admin/chart/industry_meter');
	}
	//财务状况  --产业监测分析
	public function finance(){
		$this->load->view('admin/chart/industry_finance');
	}
	//新增业态  --产业监测分析
	public function format(){
		$this->load->view('admin/chart/industry_format');
	}
	//旅游教育  --产业监测分析
	public function education(){
		$this->load->view('admin/chart/industry_education');
	}

	//广告推广   --营销推广
	public function promotion(){
		$this->load->view('admin/chart/promotion');
	}
	//游客时间偏好   --营销推广
	public function tourist_time(){
		$this->load->view('admin/chart/tourist_time');
	}
	//游客消费分析   --营销推广
	public function consum(){
		$this->load->view('admin/chart/tourist_consum');
	}
	//游客住宿偏好   --营销推广
	public function stay(){
		$this->load->view('admin/chart/tourist_stay');
	}
	//威宁景点热度top10   --营销推广
	public function attr(){
		$this->load->view('admin/chart/tourist_attr');
	}
	
	//舆情事件地域分布   --舆情监测
	public function surroun(){
		$this->load->view('admin/chart/surroun');
	}
	//舆情事件时间分布   --舆情监测
	public function opinion(){
		$this->load->view('admin/chart/opinion_time');
	}
	//舆情话语权分布   --舆情监测
	public function speak(){
		$this->load->view('admin/chart/opinion_speak');
	}

	//游客画像分析   --商家分析
	public function portrait(){
		$this->load->view('admin/chart/portrait');
	}
	//商家经营数据分析   --商家分析
	public function operating(){
		$this->load->view('admin/chart/operating');
	}
	//商家客群数据分析   --商家分析
	public function user_group(){
		$this->load->view('admin/chart/user_group');
	}
	//商家数据分析   --商家分析
	public function busin(){
		$this->load->view('admin/chart/businessmen');
	}

	//本周气温变化   --气象分析
	public function temper(){
		$this->load->view('admin/chart/temperature');
	}
	//本周气温变化   --气象分析
	public function aqi(){
		$this->load->view('admin/chart/aqi');
	}
	//本周气温变化   --气象分析
	public function humidity(){
		$this->load->view('admin/chart/humidity');
	}
	
}
