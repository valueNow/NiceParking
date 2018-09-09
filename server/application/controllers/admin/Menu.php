<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('menu_model','menu');
    }

	//菜单列表   @zhubt
	public function init(){
		$menu = $this->menu->menulist();
		$data['html'] = $this->make_option_tree_for_list($menu, 0);
		$this->load->view('admin/menu',$data);
	}

	//菜单添加   @zhubt
	public function add_menu($id=0){
		if($_POST){
			if($this->menu->addmenu($_POST)){
				$this->write_log();
				$this->load->view('message',array('msg'=>'添加成功','url'=>'/index.php/admin/menu/init'));
			}else{
				$this->load->view('message',array('msg'=>'添加失败','url'=>'/index.php/admin/menu/add_menu'));
			}
		}else{
			$data['imgurl'] = $this->getfiles("statics/image/icon");
			$menu = $this->menu->menulist();
			$data['str'] = $this->make_option_tree_for_select($menu,0,$id);
			$this->load->view('admin/add_menu',$data);
		}
	}


	//菜单修改   @zhubt
	public function edit_menu($id=0){
		if($_POST){
			$menu_id = $this->input->post('menu_id',true);
			$arr['name'] = $this->input->post('name',true);
			$arr['parentid'] = $this->input->post('parentid',true);
			$arr['m'] = $this->input->post('m',true);
			$arr['c'] = $this->input->post('c',true);
			$arr['a'] = $this->input->post('a',true);
			$arr['color'] = $this->input->post('color',true);
			$arr['img'] = $this->input->post('img',true);
			$arr['data'] = $this->input->post('data',true);
			$arr['display'] = $this->input->post('display',true);
			if($this->menu->updatemenu($arr,$menu_id)){
				$this->write_log();
				$this->load->view('message',array('msg'=>'修改成功','url'=>'/index.php/admin/menu/init'));
			}else{
				$this->load->view('message',array('msg'=>'修改失败','url'=>'/index.php/admin/menu/edit_menu'));
			}
		}else{
			$menu = $this->menu->menulist();
			$data['menu'] = $this->menu->get_menu($id);
			$data['str'] = $this->make_option_tree_for_select($menu,0,$data['menu']['parentid']);
			$data['imgurl'] = $this->getfiles("statics/image/icon");
			$this->load->view('admin/edit_menu',$data);
		}
	}

	//菜单删除   @zhubt
	public function del_menu($id){
		if($this->menu->delmenu($id)){
			$this->write_log();
			$this->load->view('message',array('msg'=>'删除成功','url'=>'/index.php/admin/menu/init'));
		}else{
			$this->load->view('message',array('msg'=>'删除失败','url'=>'/index.php/admin/menu/init'));
		}
	}

	//排序
	public function order_menu(){
		if($this->menu->ordermenu($_POST)){
			$this->write_log();
			$this->load->view('message',array('msg'=>'操作成功','url'=>'/index.php/admin/menu/init'));
		}else{
			$this->load->view('message',array('msg'=>'操作失败','url'=>'/index.php/admin/menu/init'));
		}
	}


/***********************************无限极分类 @zhubt************************************/

	function make_tree($arr, $parent_id=0){
		$new_arr = array();
		foreach($arr as $k=>$v){
			if($v['parentid'] == $parent_id){
				$new_arr[] = $v;
				unset($arr[$k]);
			}
		}
		foreach($new_arr as &$a){
			$a['children'] = $this->make_tree($arr, $a['menu_id']);
		}
		return $new_arr;
	}
	function make_tree_with_namepre($arr){
		$arr = $this->make_tree($arr);
		if (!function_exists('add_namepre1')) {
			function add_namepre1($arr, $prestr='') {
				$new_arr = array();
				foreach ($arr as $v) {
					if ($prestr) {
						if ($v == end($arr)) {
							$v['name'] = $prestr.'└─ '.$v['name'];
						} else {
							$v['name'] = $prestr.'├─ '.$v['name'];
						}
					}
	 
					if ($prestr == '') {
						$prestr_for_children = '　 ';
					} else {
						if ($v == end($arr)) {
							$prestr_for_children = $prestr.'　　 ';
						} else {
							$prestr_for_children = $prestr.'│　 ';
						}
					}
					$v['children'] = add_namepre1($v['children'], $prestr_for_children);
	 
					$new_arr[] = $v;
				}
				return $new_arr;
			}
		}
		return add_namepre1($arr);
	}
 
	/**
	 * @下拉式无限极分类
	 * @param $arr
	 * @param int $depth，当$depth为0的时候表示不限制深度
	 * @return string
	 */
	function make_option_tree_for_select($arr,$depth=0,$mid=0)
	{
		$arr = $this->make_tree_with_namepre($arr);
		if (!function_exists('make_options1')) {
			function make_options1($arr,$depth,$mid,$recursion_count=0, $ancestor_ids='') {
				$recursion_count++;
				$str = '';
				foreach ($arr as $v) {
					if($v['menu_id'] == $mid){
						$str .= "<option value='".$v['menu_id']."' selected>".$v['name']."</option>";
					}else{
						$str .= "<option value='".$v['menu_id']."' >".$v['name']."</option>";
					}
					if ($v['parentid'] == 0) {
						$recursion_count = 1;
					}
					if ($depth==0 || $recursion_count<$depth) {
						$str .= make_options1($v['children'],$depth,$mid,$recursion_count, $ancestor_ids.','.$v['menu_id']);
					}
				}
				return $str;
			}
		}
		return make_options1($arr,$depth,$mid);
	}
	/**
	 * @列表无限极分类
	 * @param $arr
	 * @param int $depth，当$depth为0的时候表示不限制深度
	 * @return string
	 */
	function make_option_tree_for_list($arr, $depth=0)
	{
		$arr = $this->make_tree_with_namepre($arr);
		if (!function_exists('make_options1')) {
			function make_options1($arr, $depth, $recursion_count=0, $ancestor_ids='') {
				$recursion_count++;
				$str = '';
				foreach ($arr as $v) {
					if($v['menu_id']==1 || $v['parentid']==1){
						$hre = "JavaScript:void(0);";
					}else{
						$hre = "javascript:if(confirm('确定要删除吗?'))location='/index.php/admin/menu/del_menu/".$v['menu_id']."'";
					}
					$str .= '<tr class="gradeX">';
                    $str .= "<td align='center'><input type='text' style='text-align:center' name='listorders[".$v['menu_id']."]' value='".$v['listorder']."' size='1'></td>";
                    $str .= "<td align='center'>".$v['menu_id']."</td>";
                    $str .= "<td>".$v['name']."</td>";
                    $str .= "<td align='center'><a href='/index.php/admin/menu/add_menu/".$v['menu_id']."' >添加子菜单</a> | <a href='/index.php/admin/menu/edit_menu/".$v['menu_id']."' >修改</a> | <a href=".$hre." >删除</a></td></tr>";
					if ($v['parentid'] == 0) {
						$recursion_count = 1;
					}
					if ($depth==0 || $recursion_count<$depth) {
						$str .= make_options1($v['children'], $depth, $recursion_count, $ancestor_ids.','.$v['menu_id']);
					}
				}
				return $str;
			}
		}
		return make_options1($arr, $depth);
	}
/***********************************无限极分类************************************/




}
