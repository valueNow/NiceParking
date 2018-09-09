<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TimeQuantumStatistics extends MY_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('statistics_model','statistics');
    }
	
	//日志列表单条记录进行查询
	public function index()
	{
		//die;
		if(empty($_GET)){
			$this->load->view('admin/statistics_list');
		}else{
			
			$serchdata['draw']=$_GET['draw'];
			$serchdata['order_column']=$_GET['order']['0']['column'];
			$serchdata['order_dir']=$_GET['order']['0']['dir'];
			$serchdata['start']=$_GET['start'];
			$serchdata['length']=$_GET['length'];
			//获取自定义的查询条件tic_id
			if(isset($_GET['timeslot'])){
			    //echo $_GET['timeslot'];
				$serchdata['timeslot'] = $_GET['timeslot'];
			}
			$res = $this->statistics->statistics_list($serchdata,$serchdata['start'],$serchdata['length']);
			//var_dump($res);die;
			$infos=array();
			foreach ($res['data'] as $k => $v) {
				     //array($v['tic_id'],$v['business'],$v['tic_name'],$v['market_price'],$v['shop_price'],$v['ahead_time']);
				$obj = array($v['timeslot'],$v['onthatdayticket'],$v['yearstatistics'],$v['lastweekticket'],$v['onthatdayhongshixia'],$v['lastyearhongshixia'],$v['onthatdayyunxigu'],$v['lastyearyunxigu']);
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
	function export_excel()
{
		  

	$res = $this->statistics->export_excel();
	/*header("Content-Type:text/html;charset=utf-8");

@$conn = mysql_connect('localhost','root',''); //连接数据库

mysql_query("set names 'utf8'"); //数据库输出编码
 
mysql_select_db('test'); //打开数据库

$res = mysql_query("select * from chart_pie"); */

/*while($row = mysql_fetch_array($res)){ 
    $arr[] = array('timeslot'=>$row['timeslot'],'onthatdayticket'=>$row['onthatdayticket'],'yearstatistics'=>$row['yearstatistics'],'lastweekticket'=>$row['lastweekticket'],'onthatdayhongshixia'=>$row['onthatdayhongshixia'],'lastyearhongshixia'=>$row['lastyearhongshixia'],'onthatdayyunxigu'=>$row['onthatdayyunxigu'],'lastyearyunxigu'=>$row['lastyearyunxigu']);
}*/

//require_once 'application/libraries/PHPExcel';
//require_once 'application/libraries/PHPExcel/IOFactory.php';
//var_dump('123456456');die;
//ci框架
$this->load->library('PHPExcel');
//this->load->library('PHPExcel/IOFactory');
//var_dump('123456456');die;
$objPHPExcel = new PHPExcel();
//$objIOFactory = new IOFactory();
//var_dump($objPHPExcel);die;
$objPHPExcel->getProperties()->setTitle("export")->setDescription("none");

//设置标题
/*
<th>时间</th>
									<th>当日售票</th>
									<th>上周售票</th>
									<th>16/17年售票</th>
									<th>当日红石峡</th>
                                    <th>去年红石峡</th>
									<th>当日云溪谷</th>
									<th>去年云溪谷</th>
$obj = array($v['timeslot'],$v['onthatdayticket'],$v['yearstatistics'],$v['lastweekticket'],
$v['onthatdayhongshixia'],$v['lastyearhongshixia'],$v['onthatdayyunxigu'],$v['lastyearyunxigu']);
*/
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', '当日售票');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', '上周售票');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', '16/17年售票');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', '当日红石峡');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', '去年红石峡');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', '当日云溪谷');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', '去年云溪谷');

/*	->setCellValue('C1', '16/17年售票')
	->setCellValue('D1', '当日红石峡')
	->setCellValue('E1', '去年红石峡')
	->setCellValue('F1', '当日云溪谷')
	->setCellValue('G1', '去年云溪谷');*/

//循环存入数据
$col = 2;
foreach ($res as $k=>$v){
	$objPHPExcel->getActiveSheet(0)->setCellValue('A'.$col, $v['timeslot']);
	$objPHPExcel->getActiveSheet(0)->setCellValue('B'.$col, $v['onthatdayticket']);
	$objPHPExcel->getActiveSheet(0)->setCellValue('C'.$col, $v['yearstatistics']);
	$objPHPExcel->getActiveSheet(0)->setCellValue('D'.$col, $v['lastweekticket']);
	$objPHPExcel->getActiveSheet(0)->setCellValue('E'.$col, $v['onthatdayhongshixia']);
	$objPHPExcel->getActiveSheet(0)->setCellValue('F'.$col, $v['lastyearhongshixia']);
	$objPHPExcel->getActiveSheet(0)->setCellValue('G'.$col, $v['onthatdayyunxigu']);
	$objPHPExcel->getActiveSheet(0)->setCellValue('H'.$col, $v['lastyearyunxigu']);
	$col++;
}
//文件名
		$fileName = iconv("utf-8", "gb2312", "Products_'.date('dMy').'.xls");
		//  sheet命名		
		$objPHPExcel->getActiveSheet()->setTitle('列表');		
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet		
		$objPHPExcel->setActiveSheetIndex(0);		
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);		
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet		
		$objPHPExcel->setActiveSheetIndex(0);		
	//	$objWriter = IOFactory::createWriter($objPHPExcel, 'Exce2017');		

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');		
		/* 生成到浏览器，提供下载 */		
		ob_end_clean();  //清空缓存		
		header("Pragma: public");		
		header("Expires: 0");		
		header("Cache-Control:must-revalidate,post-check=0,pre-check=0");		
		header("Content-Type:application/force-download");		
		header("Content-Type:application/vnd.ms-execl");		
		header("Content-Type:application/octet-stream");		
		header("Content-Type:application/download");		
		header("Content-Disposition: attachment;filename=\"$fileName\"");		
		header("Content-Transfer-Encoding:binary");		
		$objWriter->save('php://output');		
		exit;
/*$objPHPExcel->setActiveSheetIndex(0);

//发送标题强制用户下载文件
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Products_'.date('dMy').'.xls"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;*/

  
//    $objPHPExcel = new PHPExcel();  
//    // Set properties    
//    $objPHPExcel->getProperties()->setCreator("ctos")  
//            ->setLastModifiedBy("ctos")  
//            ->setTitle("Office 2007 XLSX Test Document")  
//            ->setSubject("Office 2007 XLSX Test Document")  
//            ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")  
//            ->setKeywords("office 2007 openxml php")  
//            ->setCategory("Test result file");  
//  
//    // set width    
//    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);  
//    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);  
//    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);  
//    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);  
//  
//    // 设置行高度    
//    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(22);  
//  
//    $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);  
//  
//    // 字体和样式  
//    $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setSize(10);  
//    $objPHPExcel->getActiveSheet()->getStyle('A2:D2')->getFont()->setBold(true);  
//    $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);  
//  
//    $objPHPExcel->getActiveSheet()->getStyle('A2:D2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  
//    $objPHPExcel->getActiveSheet()->getStyle('A2:D2')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);  
//  
//    // 设置水平居中    
//    $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  
//    $objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  
//    $objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  
//    $objPHPExcel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  
//    $objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  
//  
//    //  合并  
//    $objPHPExcel->getActiveSheet()->mergeCells('A1:D1');  
//  
//    // 表头  
//    $objPHPExcel->setActiveSheetIndex(0)  
//            ->setCellValue('A1', $data['examTitle'])  
//            ->setCellValue('A2', '序号')  
//            ->setCellValue('B2', '姓名')  
//            ->setCellValue('C2', '班级')  
//            ->setCellValue('D2', '成绩');  
//  
//    // 内容  
//    for ($i = 0, $len = count($list); $i < $len; $i++) {  
//        $objPHPExcel->getActiveSheet(0)->setCellValue('A' . ($i + 3), $list[$i]['sc_rank']);  
//        $objPHPExcel->getActiveSheet(0)->setCellValue('B' . ($i + 3), $list[$i]['a_nickname']);  
//        $objPHPExcel->getActiveSheet(0)->setCellValue('C' . ($i + 3), $data['title']);  
//        $objPHPExcel->getActiveSheet(0)->setCellValue('D' . ($i + 3), $list[$i]['sc_point']);  
//        $objPHPExcel->getActiveSheet()->getStyle('A' . ($i + 3) . ':D' . ($i + 3))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);  
//        $objPHPExcel->getActiveSheet()->getStyle('A' . ($i + 3) . ':D' . ($i + 3))->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);  
//        $objPHPExcel->getActiveSheet()->getRowDimension($i + 3)->setRowHeight(16);  
//    }  
//  
//    // Rename sheet    
//    $objPHPExcel->getActiveSheet()->setTitle($data['examTitle']);  
//  
//    // Set active sheet index to the first sheet, so Excel opens this as the first sheet    
//    $objPHPExcel->setActiveSheetIndex(0);  
//  
//    // 输出  
//    header('Content-Type: application/vnd.ms-excel');  
//    header('Content-Disposition: attachment;filename="' . $data['examTitle'] . '.xls"');  
//    header('Cache-Control: max-age=0');  
//  
//    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
//    $objWriter->save('php://output');

}
}