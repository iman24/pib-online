<div class="d-flex justify-content-center">
<?php
if($this->session->userdata('login'))
echo '<a href="/report"> DOWNLOAD LAPORAN</a>'; 
else
echo '<a href="/pib/form/"><img src="'. base_url().'asset/img/tulis.jpg" width="250"/></a>';
?>
</div>


<div class="d-flex justify-content-around flex-row">
  <div class="p-2"><a href="/pib/data/moderasi" style="color: white" class="btn btn-primary">PIB Diterima</a></div>
  <div class="p-2"></div>
  <div class="p-2"><a href="/pib/data/implementasi" style="color: white" class="btn btn-info">PIB Implementasi</a></div>
</div>


<?php

echo '<div style="padding:-100px !important" class="card">
<h2 class="card-header">
Aturan saja
</h2>
<div class="card-body">';

if(!$this->session->userdata('login')){
echo "aturan dibuat hanya untuk dilanggar so jaganglah buat aturan kalau gak mau dilanggar good job";
/*
echo '<div class="table-responsive">
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Waktu</th>
            <th scope="col">Judul</th>
            <th scope="col">Gambar</th>
            <th scope="col">Nik</th>
            <th scope="col">Dept</th>
            <th scope="col">Perihal</th>
            <th scope="col">Usulan</th>
            <th scope="col">Status</th>';
            if($this->session->userdata('login'))
            echo '<th style="width: 1%;white-space: nowrap">Action</th>';
          echo '</tr>
        </thead><tbody>';

$no=!empty($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
if($no == 1) 
$no = 0;
foreach($pib_data as $val){

$no++;

echo '<tr><th scop="row">'.$no.'</th><td>'.$val->nama.'</td>';
echo '<td>'.date('d/m/Y',@intval($val->waktu)).'</td>';
echo '<td>'.$val->judul.'</td>';
echo '<td>'.(!empty($val->gambar) ? '<img class="myImg" src="/uploads/'.$val->gambar.'" width="100"/>' : '').'</td>';
echo '<td>'.$val->nik.'</td>';
echo '<td>'.$val->dept.'</td>';
echo '<td class="larg">'.$val->perihal.'</td>';
echo '<td>'.$val->usulan.'</td>';

echo '<td>';
if($val->status == '1')
echo '<a href="#" class="badge badge-primary">Disetujui</a>';
elseif($val->status == '0')
echo '<a href="#" class="badge badge-danger">Menunggu</a>';
elseif($val->status == '2')
echo '<a href="#" class="badge badge-success">Diimplementasi</a>';


echo '</td>';

if($this->session->userdata('login')){
echo '<td style="width: 1%;white-space: nowrap"><a class="btn btn-sm btn-info" style="color: white" href="/action/edit/'.$val->id.'"><i class="material-icons">edit</i></a> <a no="'.$val->id.'" class="delete btn btn-sm btn-danger" style="color: white" href=""><i class="material-icons">delete_forever</i> delete</a>';


if($val->status == '0')
echo ' <a class="btn btn-sm btn-dark" onclick="return konfirm(\'moderasi\');" style="color: white" href="/action/update_status/?act=1&id='.$val->id.'">Setujui</a> <a class="btn btn-sm btn-success" onclick="return konfirm(\'implementasi\');" style="color: white" href="/action/update_status/?act=2&id='.$val->id.'"> Implementasikan</a>';
elseif($val->status == '1')
echo ' <a class="btn btn-sm btn-primary" onclick="return konfirm(\'implementasi\');" style="color: white" href="/action/update_status/?act=2&id='.$val->id.'"> Implementasikan</a> <a class="btn btn-secondary"><i class="material-icons">info</i></a>';
elseif($val->status == '2')
echo ' <a class="btn btn-sm btn-secondary" style="color: white"><i class="material-icons">done_all</i></a>';

echo '</td>';
}

echo '</tr>';

}


echo '</table>';

*/

} else {

// session admin


echo '<div class="table-responsive">
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Waktu</th>
            <th scope="col">Judul</th>
            <th scope="col">Gambar</th>
            <th scope="col">Nik</th>
            <th scope="col">Dept</th>
            <th scope="col">Perihal</th>
            <th scope="col">Usulan</th>
            <th scope="col">Status</th>';
            if($this->session->userdata('login'))
            echo '<th style="width: 1%;white-space: nowrap">Action</th>';
          echo '</tr>
        </thead><tbody>';

$no=!empty($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
if($no == 1) 
$no = 0;
foreach($pib_data as $val){

$no++;

echo '<tr><th scop="row">'.$no.'</th><td>'.$val->nama.'</td>';
echo '<td>'.date('d/m/Y',@intval($val->waktu)).'</td>';
echo '<td>'.$val->judul.'</td>';
echo '<td>'.(!empty($val->gambar) ? '<img class="myImg" src="/uploads/'.$val->gambar.'" width="100"/>' : '').'</td>';
echo '<td>'.$val->nik.'</td>';
echo '<td>'.$val->dept.'</td>';
echo '<td class="larg">'.$val->perihal.'</td>';
echo '<td>'.$val->usulan.'</td>';

echo '<td>';
if($val->status == '1')
echo '<a href="#" class="badge badge-primary">Disetujui</a>';
elseif($val->status == '0')
echo '<a href="#" class="badge badge-danger">Menunggu</a>';
elseif($val->status == '2')
echo '<a href="#" class="badge badge-success">Diimplementasi</a>';


echo '</td>';
if($this->session->userdata('login')){
echo '<td style="width: 1%;white-space: nowrap"><a class="btn btn-sm btn-info" style="color: white" href="/action/edit/'.$val->id.'"><i class="material-icons">edit</i>edit</a> <a no="'.$val->id.'" class="delete btn btn-sm btn-danger" style="color: white" href=""><i class="material-icons">delete_forever</i>delete</a>';


if($val->status == '0')
echo ' <a class="btn btn-sm btn-dark" onclick="return konfirm(\'moderasi\');" style="color: white" href="/action/update_status/?act=1&id='.$val->id.'">Setujui</a>';
/* echo '<a class="btn btn-sm btn-success" onclick="return konfirm(\'implementasi\');" style="color: white" href="/action/update_status/?act=2&id='.$val->id.'"> Implementasikan</a>'; */
elseif($val->status == '1')
echo ' <a class="btn btn-sm btn-primary" onclick="return konfirm(\'implementasi\');" style="color: white" href="/action/update_status/?act=2&id='.$val->id.'"> implementasi</a>';
/* echo '<a class="btn btn-secondary"><i class="material-icons">info</i></a>';
elseif($val->status == '2')
echo ' <a class="btn btn-sm btn-secondary" style="color: white"><i class="material-icons">done_all</i></a>';
echo '</td>'; */
}
echo '</tr>';

}


echo '</table>';
} // end if not user

echo '</div></div></div>';
echo $paging;
echo '</div>';
echo '</div>';

