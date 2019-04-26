<?php

class Admin extends CI_Controller {


public function __construct(){
    parent::__construct();
    $this->load->library("session");
    $this->load->model("user");
}


public function login_process(){
// match user
$user = $this->input->post('username');
$pass = $this->input->post('password');
if ($this->user->getuser($user, $pass) > 0){
    $this->session->set_userdata(array('login'=> true));
//    echo "<script>alert('berhasil login');</script>";
    //print_r($_SESSION);
    //print_r($this->user->getuser($user, $pass));
    //login ok
    header('Location: /pib/data/');
} else {
    //login gagal
    echo "<script>alert('Login gagal silahkan ulangi lagi');window.location='/admin/login_form';</script>";
    $this->session->mark_as_flash('error_login');
    $this->session->set_flashdata('error_login', 'Login gagal');
//    header('Location: /admin/login_form');


    //print_r($this->user->getuser($user, $pass));
}

}


public function logout(){
    $this->session->unset_userdata('login');
    header("Location: /pib/data");
}


public function login_form(){
    $this->load->view("header");
    $this->load->view("login_form");
    $this->load->view("footer");
}

public function index(){
    header('Location: /admin/login_form');
}

}
