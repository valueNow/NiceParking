<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Resources  extends CI_Controller  {
	function __construct(){
		parent::__construct();
    }
	//景区
	public  function   res_list()
	{
		$this->load->view('res/res_spot');
	}
	//新增
	public  function   spot_add()
	{
		$this->load->view('res/Resources/spot_add');
	}
	//查看
	public  function   spot_look()
	{
		$this->load->view('res/Resources/spot_look');
	}
	//修改
	public  function   spot_update()
	{
		$this->load->view('res/Resources/spot_update');
	}
	//旅游汽车公司
	public  function   res_car()
	{
		$this->load->view('res/res_car');
	}
	//新增
	public  function   car_add()
	{
		$this->load->view('res/Resources/car_add');
	}
	//查看
	public  function   car_look()
	{
		$this->load->view('res/Resources/car_look');
	}
	//修改
	public  function   car_update()
	{
		$this->load->view('res/Resources/car_update');
	}
	//旅游商品
	public  function   res_commodity()
	{
		$this->load->view('res/res_commodity');
	}
	//新增
	public  function   commodity_add()
	{
		$this->load->view('res/Resources/commodity_add');
	}
	//查看
	public  function   commodity_look()
	{
		$this->load->view('res/Resources/commodity_look');
	}
	//修改
	public  function   commodity_update()
	{
		$this->load->view('res/Resources/commodity_update');
	}
	//旅游路线
	public  function   res_line()
	{
		$this->load->view('res/res_line');
	}
	//新增
	public  function   line_add()
	{
		$this->load->view('res/Resources/line_add');
	}
	//查看
	public  function  line_look()
	{
		$this->load->view('res/Resources/line_look');
	}
	//修改
	public  function   line_update()
	{
		$this->load->view('res/Resources/line_update');
	}
	//农家乐
	public  function   res_happy()
	{
		$this->load->view('res/res_happy');
	}
	//新增
	public  function  happy_add()
	{
		$this->load->view('res/Resources/happy_add');
	}
	//查看
	public  function  happy_look()
	{
		$this->load->view('res/Resources/happy_look');
	}
	//修改
	public  function   happy_update()
	{
		$this->load->view('res/Resources/happy_update');
	}
	//停车场
	public  function   res_parking()
	{
		$this->load->view('res/res_parking');
	}
	//新增
	public  function  park_add()
	{
		$this->load->view('res/Resources/park_add');
	}
	//查看
	public  function  park_look()
	{
		$this->load->view('res/Resources/park_look');
	}
	//修改
	public  function  park_update()
	{
		$this->load->view('res/Resources/park_update');
	}
	//导游
	public  function   res_person()
	{
		$this->load->view('res/res_person');
	}
	//酒店宾馆
	public  function   res_hotel()
	{
		$this->load->view('res/res_hotel');
	}
	//乡村旅游点
	public  function   res_village()
	{
		$this->load->view('res/res_village');
	}
	//娱乐场所
    public  function   res_enter()
    {
    	$this->load->view('res/res_enter');
    }
    //租车公司
    public  function   res_taxi()
    {
    	$this->load->view('res/res_taxi');
    }
    //旅行社
    public  function   res_travel()
    {
    	$this->load->view('res/res_travel');
    }
     //旅游厕所
    public  function   res_wc()
    {
    	$this->load->view('res/res_wc');
    }
     //节庆活动
    public  function   res_festival()
    {
    	$this->load->view('res/res_festival');
    }
    //景点
    public  function   res_jingdian()
    {
    	$this->load->view('res/res_jingdian');
    }
     //旅游餐饮
    public  function   res_canyin()
    {
    	$this->load->view('res/res_canyin');
    }
     //旅游大巴
    public  function   res_daba()
    {
    	$this->load->view('res/res_daba');
    }
}

?>