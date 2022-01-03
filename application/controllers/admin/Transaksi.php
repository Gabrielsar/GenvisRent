<?php

class Transaksi extends CI_Controller{

  public function __construct(){
    parent::__construct();
    
    if(empty($this->session->userdata('email'))){
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Anda belum login!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('auth/login');
    }
    elseif($this->session->userdata('role_id') != '1'){
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Anda tidak punya akses ke halaman ini!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('customer/dashboard');
    }
  }

  public function index(){
    $data['orders'] = $this->db->query("SELECT * FROM orders tr, products mb, customer cs WHERE tr.id_product=mb.id_product AND tr.id_customer=cs.id_customer")->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/transaksi', $data);
    $this->load->view('templates_admin/footer');
  }
  function update_status($id){
    $where = array('id_order' => $id);
    $data = array(
        'status'    => 'Sudah dikirim',
    );
    $this->rental_model->update_data('orders', $data, $where);;
    redirect('admin/transaksi');
  }

    function update_status_selesai($id){
    $where = array('id_order' => $id);
    $data = array(
        'status'    => 'Selesai',
    );
    $this->rental_model->update_data('orders', $data, $where);;
    redirect('admin/transaksi');
  }

}