<?php

class Ajax extends CI_Controller {


public function __construct(){
parent::__construct();
$this->load->model('data');
}


public function all(){
    sleep(5);
    $data = $this->data->getdata("all",0,5);
    echo json_encode($data, true);
}
}