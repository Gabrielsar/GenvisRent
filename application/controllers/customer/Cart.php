<?php

class Cart extends CI_Controller{

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
    elseif($this->session->userdata('role_id') != '2'){
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
    $customer = $this->session->userdata('id_customer');
    $data['cart'] = $this->db->query("SELECT * FROM cart ct, products pr, customer cs WHERE ct.id_product=pr.id_product AND ct.id_customer=cs.id_customer AND cs.id_customer='$customer' ORDER BY id_cart DESC")->result();
    $this->load->view('templates_customer/header');
    $this->load->view('customer/cart', $data);
    $this->load->view('templates_customer/footer');
  }
    function delete_cart($id){
    $where = array('id_cart' => $id);
    $this->rental_model->delete_data($where, 'cart');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Data berhasil dihapus
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
      <span aria-hidden="true">&times;</span>
    </button></div>');
    redirect('customer/cart');
  }
  function confirm_order(){
    $query = $this->db->query("SELECT * FROM cart WHERE id_customer = " . $this->session->userdata('id_customer'))->result();
    $id_customer  = $this->session->userdata('id_customer');
    $id_product   = $this->input->post('id_product');
    $this->session->set_userdata('id_product', $id_product);
    $id_product   = $this->session->userdata('id_product');
    $id_cart   = $this->input->post('id_cart');
    $this->session->set_userdata('id_cart', $id_cart);
    $id_cart   = $this->session->userdata('id_cart');
    $duration     = $this->input->post('duration');
    $newData      = true;
    $price        = $this->input->post('price');
    $this->session->set_userdata('price', $price);
    $price        =$this->session->userdata('price');
    $count = $this->input->post('count');
    for($i = 0; $i<$count; $i++){
    $total = (int)$price[$i] * (int)$duration;
    $data = array(
      'id_customer'       => $id_customer,
      'id_product'        => $id_product[$i],
      'duration'          => $duration, 
      'total'             => $total,
      'status'            => 'Sedang Dikirim',

    );
    $this->rental_model->insert_data($data, 'orders');
    $where = array('id_cart' => $id_cart[$i]);
    $this->rental_model->delete_data($where, 'cart');
  }
   
    if($newData){
     
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Order berhasil dilakukan!
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
      redirect('customer/cart');
    }
    else{
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      Setiap pelanggan tidak dapat memesan lebih dari satu mainan yang sama
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
    redirect('customer/dashboard');
    }
  }
    
}