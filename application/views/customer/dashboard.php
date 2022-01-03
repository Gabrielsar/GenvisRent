<!DOCTYPE html>
<html>
<head>
<style>
  h4{
    font-size: 20px;
  }
</style>
</head>
<body style="background-image:url('<?php echo base_url('assets/assets_stisla/assets/img/Hydrant BG.png')?>')">

<div style="height: 150px"></div>

<div class="container">
<span class="mt-2 p-2"><?= $this->session->flashdata('pesan'); ?></span>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
            <?php foreach ($data2 as $row) : ?>
                <div class="col-md-3">
                <a href="<?= base_url('customer/data_mobil/detail_mobil/'.$row->id_product) ?>"><img width="150" height="150"  src="<?php echo base_url().'assets/upload/'.$row->img_path;?>"></a>
                        
                        <div class="caption">
                            <h4><?php echo $row->name;?></h4>
                            <div class="row">
                                <div class="col-md-7">
                                    <h4><?php echo 'Rp '.number_format($row->price);?></h4>
                                </div>
                       
                            </div>
                            <form action="<?php echo base_url()?>customer/dashboard/add_to_cart" method="post">
                                <input type="hidden" value="<?= $row->id_product?>" name="id_product">
                                <button class="btn btn-primary">Tambah ke Keranjang</button>
                            </form>
                            <br>
                        </div>
                    </div>    
            <?php endforeach;?>       
            </div>
 
        </div>
    </div>
</div>
</body> 
</html>