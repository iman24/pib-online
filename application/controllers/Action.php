<?php

class Action extends CI_Controller {


public function __construct(){
parent::__construct();
$this->load->model('data');
}

// DML //
function delete($id){
	$this->data->delete(intval($id));
}


function update_status(){
 $this->data->update_status($this->input->get('act'), $this->input->get('id'));	
}
header('Location: /pib/data/');
}
