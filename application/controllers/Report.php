<?php


class Report extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('data');
	}


	public function index($status="all"){
		//echo $status;
		if($this->data->count($status) == 0)
			$w['total']="Data kosong..";
		else
			$w['total']=$this->data->count($status);

		
		$this->load->view('report',$w);
		




	}

	public function download(){

		//print(file_exists(APPPATH.'/third_party'));exit;
	// Load plugin PHPExcel nya
    include_once APPPATH.'/third_party/PHPExcel.php';
	
	$st = $this->input->post("status");
//	print_r($st);
	$dt = $this->data->getmultipledata($st);
	

	
	$objexcel = new PHPExcel();

	$objexcel->setActiveSheetIndex(0);
	$objexcel->getActiveSheet()->setCellValue("A10","No.")
									->setCellValue("B10","Nama")
									->setCellValue("C10","Waktu")
									->setCellValue("D10","Judul")
									->setCellValue("E10","Nik")
									->setCellValue("F10","Dept")
									->setCellValue("G10","Perihal")
									->setCellValue("H10","Usulan");

	$no = 0;
	$dataarray = array();
	foreach($dt as $data){
	$no++;
	$form['no'] = $no;
	$form['nama'] = $data['nama'];
	$form['waktu'] = date('d/m/Y', intval($data['waktu']));
	$form['judul'] = $data['judul'];
	$form['nik'] = $data['nik'];
	$form['dept'] = $data['dept'];
	$form['perihal'] = $data['perihal'];
	$form['usulan'] = $data['usulan'];

	array_push($dataarray,$form);
	}

	//print_r($dataarray);
	//exit();
	$nox=$no+10;
	$objexcel->getActiveSheet()->fromArray($dataarray, NULL, 'A11'); 

	// orientasi jeng size
	$objexcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
	$objexcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LEGAL);
	$objexcel->getActiveSheet()->getPageMargins()->setTop(0.75);
	$objexcel->getActiveSheet()->getPageMargins()->setRight(0.75);
	$objexcel->getActiveSheet()->getPageMargins()->setLeft(0.75);
	$objexcel->getActiveSheet()->getPageMargins()->setBottom(0.75);
	$objexcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objexcel->getProperties()->getTitle() . '&RPage &P of &N');

		 
	// bold title waks
	$objexcel->getActiveSheet()->getStyle('A10:H10')->getFont()->setBold(true);
	// Set fills
	$objexcel->getActiveSheet()->getStyle('A10:H10')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
	$objexcel->getActiveSheet()->getStyle('A10:H10')->getFill()->getStartColor()->setARGB('FF808080');

	//untuk auto size colomn 
	$objexcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
	$objexcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
	$objexcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
	$objexcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
	$objexcel->getActiveSheet()->getColumnDimension('E')->setWidth(21);
	$objexcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
	$objexcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
	$objexcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);

	 
	// Set aktif sheet pertama nya kuya owowok
	$objexcel->setActiveSheetIndex(0);
	 
	$sharedStyle1 = new PHPExcel_Style();

	 
	$sharedStyle1->applyFromArray(
	 array('borders' => array(
	 'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
	 'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
	 'right' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
	 'left' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM)
	 ),
	 ));
	 
	$objexcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A10:H$nox");


	$objexcel->getActiveSheet()->getStyle('E11:E'.$nox)->getNumberFormat()->
		setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);


	 
	// Set heder haha
	$objexcel->getActiveSheet()->getStyle('A10:H10')->applyFromArray(
	 array(
	 'font' => array(
	 'bold' => true
	 ),
	 'alignment' => array(
	 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
	 ),
	 'borders' => array(
	 'top' => array(
	 'style' => PHPExcel_Style_Border::BORDER_THIN
	 )
	 ),
	 'fill' => array(
	 'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
	 'rotation' => 90,
	 'startcolor' => array(
	 'argb' => 'FFA0A0A0'
	 ),
	 'endcolor' => array(
	 'argb' => 'FFFFFFFF'
	 )
	 )
	 )
	);
	 

	// download webs
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment;filename="Laporan_"'.time().'_'.date("d-F-Y_H-i-s").'".xlsx"');
	header('Cache-Control: max-age=0');
	 
	$objWriter = PHPExcel_IOFactory::createWriter($objexcel, 'Excel2007');
	$objWriter->save('php://output');
	exit;
	// Simpen Excel 2007
	$objWriter = PHPExcel_IOFactory::createWriter($objexcel, 'Excel2007');
	$objWriter->save(str_replace('.php', '.xls', __FILE__));


		}




}
