<?php

class Data_tipe extends CI_Controller{

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
    $data['categories'] = $this->rental_model->get_data('categories')->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/data_tipe', $data);
    $this->load->view('templates_admin/footer');
  }

  public function tambah_tipe(){
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/form_tambah_tipe');
    $this->load->view('templates_admin/footer');
  }

  public function tambah_tipe_aksi(){
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $this->tambah_tipe();
    }
    else{
      $id_category = $this->input->post('id_category');
      $c_name = $this->input->post('c_name');

      $data = array(
        'id_category' => $id_category,
        'c_name' => $c_name,
      );

      $this->rental_model->insert_data($data, 'categories');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Data tipe berhasil ditambahkan
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
      redirect('admin/data_tipe');
    }
  }

  public function update_tipe($id_category){
    $where = array('id_category' => $id_category);
    $data['categories'] = $this->db->query("SELECT * FROM categories WHERE id_category = '$id_category'")->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/form_update_tipe', $data);
    $this->load->view('templates_admin/footer');
  }

  public function update_tipe_aksi(){
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $id_category = $this->input->post('id_category');
      $this->update_tipe($id_category);
    }
    else{
      $id_category  = $this->input->post('id_category');
      $c_name = $this->input->post('c_name');

      $data = array(
        'id_category' => $id_category,
        'c_name' => $c_name,
      );

      $where = array('id_category' => $id_category);

      $this->rental_model->update_data('categories', $data, $where);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Data tipe berhasil diupdate
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
      redirect('admin/data_tipe');
    }
  }

  public function delete_tipe($id_category){
    $where = array('id_category' => $id_category);
    $this->rental_model->delete_data($where, 'categories');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Data tipe berhasil dihapus
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
      <span aria-hidden="true">&times;</span>
    </button></div>');
    redirect('admin/data_tipe');
  }

  public function _rules(){
    $this->form_validation->set_rules('id_category', 'Kategori ID', 'required');
    $this->form_validation->set_rules('c_name', 'Nama Kategori', 'required');
  }


}