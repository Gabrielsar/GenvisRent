<?php

class Dashboard extends CI_Controller{
     
    function __construct(){
        parent::__construct();
        $this->load->model('cart_model');
    }
       
    function index(){
        $data2['data2']=$this->cart_model->get_all_produk();
        $customer = $this->session->userdata('id_customer');
        $this->load->view('templates_customer/header');
        $this->load->view('customer/dashboard',$data2);
        $this->load->view('templates_customer/footer');
    }
 
    function add_to_cart(){ //fungsi Add To Cart
      if($this->session->userdata('role_id') != '2'){
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Anda tidak punya akses ke halaman ini!</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
        redirect('auth/login');
      }
      else{
      $query = $this->db->query("SELECT * FROM cart WHERE id_customer = " . $this->session->userdata('id_customer'))->result();
      $id_customer  = $this->session->userdata('id_customer');
      $id_product    = $this->input->post('id_product');
      $newData      = true;
      $data = array(
        'id_customer'       => $id_customer,
        'id_product'        => $id_product,
      );
  
      foreach($query as $i){
        if($i->id_product == $id_product){
          $newData = false;
        }
      }
  
      if($newData){
        $this->rental_model->insert_data($data, 'cart');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Keranjang berhasil ditambah, silahkan checkout!
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('customer/dashboard');
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
 
    

  public function detail_mainan($id){
    $data['detail'] = $this->rental_model->ambil_id($id);
    $this->load->view('templates_customer/header');
    $this->load->view('customer/detail_mobil', $data);
    $this->load->view('templates_customer/footer');
  }

}