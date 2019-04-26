<?php

class Pbi_model extends CI_Model {



public function getdata($limit=null,$offset=null){

return $this->db->get('saran',$limit,$offset)->result();

}


}



