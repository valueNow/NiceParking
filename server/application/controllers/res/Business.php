<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Business extends CI_Controller {

	function __construct(){
        parent::__construct();
    }

	public function main(){
		$this->load->view('res/index');
	}
	
	public function schedule(){
		$this->load->view('res/schedule');
	}
	
	public  function s_add()
	{
		$this->load->view("res/schedule/schedule_add");
	}
	
	public  function s_edit()
	{
		$this->load->view("res/schedule/schedule_edit");
	}

	public  function s_details()
	{
		$this->load->view("res/schedule/schedule_details");
	}

	
	public function work_log(){
		$this->load->view('res/work_log');
	}
	
	public  function log_add()
	{
		$this->load->view("res/work_log/work_log_add");
	}
	
	public  function log_edit()
	{
		$this->load->view("res/work_log/work_log_edit");
	}

	public  function log_details()
	{
		$this->load->view("res/work_log/work_log_details");
	}
	public function process(){
		$this->load->view('res/process');
	}
	
	public function p_details(){
		$this->load->view('res/process/chop_look');
	}
	
	public function p_add(){
		$this->load->view('res/process/chop_add');
	}
	
	public function meeting(){
		$this->load->view('res/meeting');
	}
	
	public function meeting_log(){
		$this->load->view('res/meet_summary');
	}
	
	
	public function  rule(){
		$this->load->view('res/rule');
	}
	public function  r_add(){
		$this->load->view('res/rule/rule_add');
	}
	public function  r_edit(){
		$this->load->view('res/rule/rule_edit');
	}
	
	public function  notice(){
		$this->load->view('res/notice');
	}
	
	public function  n_add(){
		$this->load->view('res/notice/notice_add');
	}
	
	public function  n_details(){
		$this->load->view('res/notice/notice_details');
	}
	
	public function  task(){
		$this->load->view('res/task');
	}
	public function  t_add(){
		$this->load->view('res/task/task_add');
	}
	public function  t_edit(){
		$this->load->view('res/task/task_edit');
	}
	public function  t_details(){
		$this->load->view('res/task/task_details');
	}
	

	
}
