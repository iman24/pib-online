<?php


class User extends CI_Model {


    public function getuser($username, $password){
       // return $this->db->get_where('user', array('username'=> $username, 'password' => $password))->result();
        $q = $this->db->query('SELECT COUNT(*) as jumlah FROM user WHERE username = "'.$username.'" AND password = "'.$password.'"')->row();
        return $q->jumlah;
    }


}