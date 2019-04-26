<?php

class Notfound extends CI_Controller {

function index(){
header('HTTP/1.0 404 Not Found');

$this->load->view('header');
$this->load->view('404');
//echo '<div class="card alert alert-danger"><div class="card-body"><h2><i class="material-icons">warning</i> 404 Not Found</h2>Sesuatu yang dicari tak kunjung ketemu, bersabarlah ini hanya ujian semata. <br><br>Silahkan lanjutkan <a href="">Mencari</a> atau kembali ke <a href="/">Jalan yang benar</a>.</div></div>';

}
}
