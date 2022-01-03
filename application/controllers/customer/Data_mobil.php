<?php

class Data_mobil extends CI_Controller{

  public function index(){
    $data['products'] = $this->rental_model->get_data('products')->result();
    $this->load->view('templates_customer/header');
    $this->load->view('customer/data_mobil', $data);
    $this->load->view('templates_customer/footer');
  }

  public function detail_mobil($id){
    $data['detail'] = $this->rental_model->ambil_id($id);
    $this->load->view('templates_customer/header');
    $this->load->view('customer/detail_mobil', $data);
    $this->load->view('templates_customer/footer');
  }
}