<?php

class Pib extends CI_Controller {


public function __construct(){
parent::__construct();
$this->load->library("session");
$this->load->model('data');
}

function test(){
	$this->load->view('header');
	$this->load->view('test');
	$this->load->view('footer');
}

function index(){
	header("Location: /pib/data");
}

function data($status='all',$page=0){
// Halaman default ya kuys
$pp=5;

$data['paging'] = $this->paging($status,$pp);

if(!$this->session->userdata('login') && ($status != "all" || $status != "unmod")){
$data['pib_data'] = $this->data->getdata($status,$page,$pp);
}
else{
$data['pib_data'] = $this->data->getdata($status,$page,$pp);echo "admin";}



$this->load->view('header');
$this->load->view('pib',$data);
$this->load->view('footer');

}


public function form(){

$this->load->helper('form');
$this->load->view('header');
$this->load->view('form');
}



public function post(){

// load library form validasi
$this->load->helper('form');
$this->load->library('form_validation');
// set rules

$this->form_validation->set_rules(array(
	array(
	'field' => 'nama',
	'label' => 'nama',
	'rules' =>'required|min_length[1]',
	'errors' => array(
	'required' => 'Nama harus diiisi',
  'min_length' => 'Nama terlalu pendek'
	)
	)
)
);


$config['upload_path'] = './uploads/';
$config['allowed_types'] = 'gif|jpg|png';
$this->load->library('upload',$config);
if(!$this->upload->do_upload('gambar')){
//$error = array('error' => $this->upload->display_errors());
//print_r($error);
//exit("Error upload data...");
}
else
$error = array('upload_data' => $this->upload->data());


if($this->form_validation->run()===true){

$this->data->insert(array(
'nama' => $this->input->post('nama'),
'judul' => $this->input->post('judul'),
'dept' => $this->input->post('dept'),
'nik' => $this->input->post('nik'),
'perihal' => $this->input->post('perihal'),
'usulan' => $this->input->post('usulan'),
'status' => $this->input->post('status'),
'status' => '0',
'gambar' => $this->upload->data('file_name'),
'waktu'  => time()));
header('Location: /pib/');
}
else {

$this->load->view('header');
$this->load->view('form');

}

}


public function report($status='all'){

$data['report'] = $this->data->getdata($status);
$this->load->view('report',$data);

}



public function get(){
print($this->input->get(array('nama','id'))['nama']);
}


private function paging($status='all',$pp){
// PAGINATION

// wrap pagination section
$config['next_link'] = 'Next';
$config['prev_link'] = 'Prev';
$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
$config['prev_tag_close'] = '</span></li>';

$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
$config['next_tag_close'] = '</span></li>';


$config['full_tag_open'] = '<nav class="container"><ul class="pagination">';
$config['full_tag_close'] = '</div></div>';
// curent link
$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
// digit links
$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
$config['num_tag_close'] = '</span></li>';
$config['base_url'] = base_url().'/pib/data/'.$status.'';
$config['first_url'] = '0';
$config['total_rows'] = $this->data->count($status);
$config['per_page'] = $pp;
$this->pagination->initialize($config);
return $this->pagination->create_links();


}



}
