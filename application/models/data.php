<?php

class Data extends CI_Model {

private $table = 'saran';

function getmultipledata($arr){
$this->db->select("*");
$this->db->from($this->table);
if(empty($arr) || !is_array($arr))
$q=$this->db->where_in("status",array("0","1","2"))->get();
else
$q=$this->db->where_in("status",$arr)->get();
return $q->result_array();
}

function getdata(){

$a=func_get_args();

if(!isset($a[2]) && !isset($a[1]) && ( $a[0] == 'all' || $a[0] == '')){
return $this->db->get_where($this->table,array('status'=>''.$a[0].''))->result();
exit();
}


if($a[0] == 'unmod') // unmod
return $this->db->get_where($this->table,array('status' => '0'),$a[2],$a[1])->result();
elseif($a[0] == 'moderasi') 
return $this->db->get_where($this->table,array('status' => '1'),$a[2],$a[1])->result();
elseif($a[0] == 'implementasi')
return $this->db->get_where($this->table,array('status' => '2'),$a[2],$a[1])->result(); 
else 
return $this->db->get($this->table,$a[2],$a[1])->result();

}


function count($status='all'){

if($status == 'unmod')
return $this->db->get_where($this->table,array('status'=>'0'))->num_rows();
elseif ($status == 'moderasi')
return $this->db->get_where($this->table,array('status'=>'1'))->num_rows();
elseif ($status == 'implementasi')
return $this->db->get_where($this->table,array('status'=>'2'))->num_rows();
else
return $this->db->get($this->table)->num_rows();


}


public function insert($data=array()){
$this->db->insert($this->table, $data);
}

public function delete($id){
$this->db->delete($this->table,array('id' => $id));
}

public function update($data=array(), $id){
$this->db->where('id',$id);
$this->db->update($this->table, $data);
}



public function update_status($status, $id){
$this->db->set('status',$status);
$this->db->where("id", $id);
$this->db->update($this->table);

}


}