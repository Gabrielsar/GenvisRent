<?php

class Transaksi extends CI_Controller{

  public function __construct(){
    parent::__construct();
  }
    

  public function index(){
    $customer = $this->session->userdata('id_customer');
    $data['transaksi'] = $this->db->query("SELECT * FROM orders od, products pr, customer cs WHERE od.id_product=pr.id_product AND od.id_customer=cs.id_customer AND cs.id_customer='$customer' ORDER BY id_order DESC")->result();
    $this->load->view('templates_customer/header');
    $this->load->view('customer/transaksi', $data);
    $this->load->view('templates_customer/footer');
  }
    
    function update_status($id){
    $where = array('id_order' => $id);
    $data = array(
        'status'    => 'Siap di Pickup',
    );
    $this->rental_model->update_data('orders', $data, $where);;
    redirect('customer/transaksi');
  }
}