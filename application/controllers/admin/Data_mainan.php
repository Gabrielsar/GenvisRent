<?php

class data_mainan extends CI_Controller{

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
    $data['product'] = $this->db->query("SELECT * FROM categories tp, products mb WHERE tp.id_category = mb.id_category ORDER BY id_product DESC")->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/data_mainan', $data);
    $this->load->view('templates_admin/footer');
  }

  public function tambah_products(){
    $data['categories'] = $this->rental_model->get_data('categories')->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/form_tambah_products', $data);
    $this->load->view('templates_admin/footer');
  }

  public function tambah_products_aksi(){
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $this->tambah_products();
    }
    else{
      $id_category  = $this->input->post('id_category');
      $name         = $this->input->post('name');
      $price        = $this->input->post('price');
      $qty          = $this->input->post('qty');
      $description  = $this->input->post('description');
      $img_path     = $_FILES['img_path']['name'];

      if($img_path=''){}
      else{
        $config['upload_path'] = './assets/upload';
        $config['allowed_types'] = 'jpg|jpeg|png|tiff';

        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('img_path')){
          echo "Gambar mainan gagal diupload";
        }
        else{
          $img_path = $this->upload->data('file_name');
        }
      }
      $data = array(
        'id_category'    => $id_category,
        'name'           => $name,
        'price'          => $price,
        'qty'            => $qty,
        'description'    => $description,
        'img_path'       => $img_path,
      );

      $this->rental_model->insert_data($data, 'products');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Data berhasil ditambahkan
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
      redirect('admin/data_mainan');
    }
  }

  public function update_products($id_product){
    $where = array('id_product' => $id_product);
    $data['products'] = $this->db->query("SELECT * FROM products mb, categories tp WHERE mb.id_category = tp.id_category AND mb.id_product = '$id_product'")->result();
    $data['categories'] = $this->rental_model->get_data('categories')->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/form_update_products', $data);
    $this->load->view('templates_admin/footer');
  }

  public function update_products_aksi(){
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $id = $this->input->post('id_product');
      $this->update_products($id);
    }
    else{
      $id_product     = $this->input->post('id_product');
      $id_category    = $this->input->post('id_category');
      $name           = $this->input->post('name');
      $price          = $this->input->post('price');
      $qty            = $this->input->post('qty');
      $description    = $this->input->post('description');
      $img_path       = $_FILES['img_path']['name'];

      if($img_path){
        $config['upload_path'] = './assets/upload';
        $config['allowed_types'] = 'jpg|jpeg|png|tiff';

        $this->load->library('upload', $config);
        
        if($this->upload->do_upload('img_path')){
          $img_path = $this->upload->data('file_name');
          $this->db->set('img_path', $img_path);
        }
        else{
          echo $this->upload->display_error();
        }
      }
      $data = array(
        'id_category'   => $id_category,
        'name'        => $name,
        'price'         => $price,
        'qty'           => $qty,
        'description'   => $description,
      );
      $where = array('id_product' => $id_product);

      $this->rental_model->update_data('products', $data, $where);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Data berhasil diupdate
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
      redirect('admin/data_mainan');
    }
  }



  public function delete_products($id){
    $where = array('id_product' => $id);
    $this->rental_model->delete_data($where, 'products');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Data berhasil dihapus
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
      <span aria-hidden="true">&times;</span>
    </button></div>');
    redirect('admin/data_mainan');

  }

  public function _rules(){
    $this->form_validation->set_rules('id_category', 'Category ID', 'required');
    $this->form_validation->set_rules('name', 'Nama', 'required');
    $this->form_validation->set_rules('price', 'Harga Sewa Per Hari', 'required');
    $this->form_validation->set_rules('qty', 'Qty', 'required');
    $this->form_validation->set_rules('description', 'Deskripsi', 'required');
  }


}