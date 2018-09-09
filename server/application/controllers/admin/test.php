<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MY_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('menu_model','menu');
    }
//数组组装array(高度宽度经度纬度颜色);
//经度范围:73°33′E至135°05′E纬度范围:3°51′N至53°33′N. 
	public function init(){
		$arr = array();  $lat = array();//纬度3-53
$long = array(); //经度73-135

$lat = range(3,53,0.5);
$long = range(73,135,1);
//经纬度合并
$k = 0;
for($i = 0;$i< count($lat);$i++){
	for($j=0;$j<count($long);$j++){
		if(26<= $lat[$i] && $lat[$i] <= 30 && 100 <= $long[$j] && $long[$j] <= 108){
			//高峰值
			$h = 8000;
		}elseif((26<= $lat[$i]  && $lat[$i]<= 30 && 90 <= $long[$j] && $long[$j] < 100) 
			|| (26<= $lat[$i] && $lat[$i] <= 30 && 108 < $long[$j] && $long[$j] <= 118)
			||(30<= $lat[$i]  && $lat[$i]<= 38 && 90 <= $long[$j]  && $long[$j]<= 118)
			||(18<= $lat[$i]  && $lat[$i]<= 26 && 90 <= $long[$j] && $long[$j] <= 118)){//周边
			$h = 6000;
		}elseif((18<= $lat[$i] && $lat[$i] <= 38 && 80 <= $long[$j] && $long[$j] < 90) 
			|| (18<= $lat[$i]  && $lat[$i]<= 38 && 118 < $long[$j]  && $long[$j]<= 125)
			||(8<= $lat[$i] && $lat[$i] <= 18 && 80 <= $long[$j]  && $long[$j]<= 125)
			||(38<= $lat[$i] && $lat[$i] <= 45 && 80 <= $long[$j] && $long[$j] <= 125)){//周边
			$h = 3000;
		}elseif(
			(8<= $lat[$i] && $lat[$i] <= 45 && 73 <= $long[$j] && $long[$j] < 80) 
			|| (8<= $lat[$i] && $lat[$i] <= 45 && 125 < $long[$j] && $long[$j] <= 135)
			||(3<= $lat[$i] && $lat[$i] <= 8 && 73 <= $long[$j]  && $long[$j]<= 135)
			||(45<= $lat[$i]  && $lat[$i]<= 53 && 73 <= $long[$j]  && $long[$j]<= 135)
		){
			$h = 1000;
		}else{
			$h = 1000;
		}
		$arr[$k] = array('lat'=>$lat[$i],'long'=>$long[$j],'height' => $h);
		$k++;
	} 
}
		$returndata=  json_encode($arr,JSON_UNESCAPED_UNICODE);
		echo $returndata;
		//高度颜色
    
	}
	
}

?>