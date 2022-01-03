<?php

class Rental_model extends CI_Model{

  public function get_data($table){
    return $this->db->get($table);
  }

  public function get_where($where, $table){
    return $this->db->get_where($table, $where);
  }

  public function insert_data($data, $table){
    $this->db->insert($table, $data);
  }

  public function update_data($table, $data, $where){
    $this->db->update($table, $data, $where);
  }

  public function ambil_id($id){
    $hasil = $this->db->where('id_product', $id)->get('products');

    if($hasil->num_rows() > 0){
      return $hasil->result();
    }
    else{
      return false;
    }
  }

  public function delete_data($where, $table){
    $this->db->where($where);
    $this->db->delete($table);
  }

  public function cek_login($email, $password){
    $email = set_value('email');
    $password = set_value('password');
    $password_cap = $_POST['password_captcha'];

    $result = $this->db->where('email', $email)
             ->where('password', md5($password))
             ->limit(1)
             ->get('customer');

    if($result->num_rows() > 0 && $_POST['password_captcha'] == $_SESSION['password_captcha']){
      return $result->row();
    }
    else{
      return FALSE;
    }
  }

}