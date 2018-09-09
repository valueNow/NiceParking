<?php

defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
class MY_Controller extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		self::check_admin();
		self::check_priv();
		//self::write_log();
	}

	//生成Guid
	public function Guid(){
		//return com_create_guid();
		$charid = strtoupper(md5(uniqid(mt_rand(), true)));
		$hyphen = chr(45);// "-"
		$uuid = substr($charid, 0, 8).$hyphen
		.substr($charid, 8, 4).$hyphen
		.substr($charid,12, 4).$hyphen
		.substr($charid,16, 4).$hyphen
		.substr($charid,20,12);
		return $uuid;
	}
	//遍历目录下的文件
	function getfiles($path){
		if(!is_dir($path)) return;
		$handle  = opendir($path);
		$files = array();
		while(false !== ($file = readdir($handle))){
			if($file != '.' && $file!='..'){
				$files[] = $path.'/'.$file;
			}
		}
		return $files;
	}

	/**
	 * 判断用户是否登陆
	 */
	final public function check_admin() {
		return true;
		$a = $this->uri->segment(3);
		if(preg_match('/^public_/',$a)) return true;
		if($this->uri->segment(1) =='admin' && $this->uri->segment(2) =='index' && $this->uri->segment(3) == 'login') {
			return true;
		} else {
			if(!isset($_SESSION['user_id']) || !isset($_SESSION['roleid']) || !$_SESSION['user_id'] || !$_SESSION['roleid']){
				$this->load->view('message',array('msg'=>'请先登录后台管理！','url'=>'logout'));
			}
		}
	}

	/**
	 * 权限判断
	 */
	final public function check_priv(){
		$this->load->model('user_model','user');
		$arr['m'] = $this->uri->segment(1);
		$arr['c'] = $this->uri->segment(2);
		$arr['a'] = $this->uri->segment(3);
		if($arr['m'] =='admin' && $arr['c'] =='index' && in_array($arr['a'], array('login','init'))) return true;
		if(preg_match('/^public_/',$arr['a'])) return true;
		if(preg_match('/^ajax_/',$arr['a'])) return true;
		if($_SESSION['roleid'] == 1) return true;
		$r = $this->user->get_priv($arr,$_SESSION['roleid']);
		if(!$r) $this->load->view('message',array('msg'=>'您没有权限操作该项','url'=>'histor'));
	}
	
	/**
	 * 操作日志添加
	 */
	public function write_log($operating = '')
	{
		//1：获取当前访问信息路径
		$direct = substr($this->router->fetch_directory(),0,-1); //分组目录
		$controller = $this->router->fetch_class();   //当前控制器
		$method = $this->router->fetch_method();    // 当前使用方法
		//2:去除不需要记录的方法
		//if($direct  =='admin' && $controller =='index' && in_array($method, array('login'))) return true;
		//3:判断系统操作日志和单个编写系统日志
		if(empty($operating)){//系统自动操作日志
			$name = '';
			$this->load->model('user_model','user');
			//1::匹配此次访问的菜单详细信息
			$name = '';
			if($direct == 'admin'){
				$result = $this->user->get_operate_bymca(array('m'=>$direct,'c'=>$controller,'a'=>$method));
				if(!empty($result)){
					$name = $result['name'];
				}
			}
		}else{//开发单个操作日志
			$name = $operating;
		}
		//4:参数组装
		if(!empty($name)){
			$add_arr = array(
				'log_id' =>	$this->Guid(),
				'module' => $controller,//控制器
				'catname' => $method,//方法
				'operating' => $name ,//作何操作
				'add_time' => time(),
				'userid' => $_SESSION['user_id']?$_SESSION['user_id']:'',
				'username' => $_SESSION['user_name']?$_SESSION['user_name']:'',
			);
			//5:添加日志
			$res = $this->user->data_insert('admin_logs',$add_arr);
			if($res){
				return true;	
			}else{
				return false;
			}
		}else{
			return true;//没有匹配出操作
		}
	}
	/**
	*	上传多个附件
	*	@author zhubt
	**/
	function upload_more($inputname,$id,$ar='-1'){
		$ext = $this->getExt($_FILES[$inputname]['name'][$ar]);
		$tmp = $_FILES[$inputname]['tmp_name'][$ar];
//        if(!($ext = $this->check_format($ext))){
//            return false;
//        }
		$dir = 'uploadfile/'.date('Y',time()).'/'.date('m',time()).'/'.date('d',time()).'/';
		if(!file_exists($dir)) {
			mkdir($dir, 0777, true);
		}
        $filename = $id.'.'.$ext;
        if(move_uploaded_file($tmp,$dir.$filename)){
            return $dir.$filename;
            @unlink($tmp);//删除临时文件
        }else{
            return false;
        }
    }

	/**
	*	上传图片
	*	@author zhubt
	**/
	function uploadimage($inputname){
		$ext = $this->getExt($_FILES[$inputname]['name']);
		$tmp = $_FILES[$inputname]['tmp_name'];
        if(!($ext = $this->check_format($ext))){
            return false;
        }
		$dir = 'uploadfile/'.date('Y',time()).'/'.date('m',time()).'/'.date('d',time()).'/';
		if(!file_exists($dir)) {
			mkdir($dir, 0777, true);
		}
        $filename = time().'.'.$ext;
        if(move_uploaded_file($tmp,$dir.$filename)){
            return $dir.$filename;
            @unlink($tmp);//删除临时文件
        }else{
            return false;
        }
    }
	/**
    *	获取文件扩展名
    *	@editor zhubt
    **/
	function getExt($filename){
        $ext = explode('.',$filename);
        $ext =  $ext[count($ext)-1];
        return $ext; // 返回一个扩展名
    }

    /**
    *	验证文件扩展名
    *	@editor zhubt
    **/
	function check_format($ext){
        $format = array('JPG','PNG','jpg','png','pdf','txt');
        if(!in_array($ext,$format)){
            return false;
        }else{
            return $ext;
        }
    }

}