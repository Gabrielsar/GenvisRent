<body style="background-image:url('<?php echo base_url('assets/assets_stisla/assets/img/Hydrant BG.png')?>')">
<div style="height: 150px;"></div>
<div class="container">
<span class="mt-2 p-2"><?= $this->session->flashdata('pesan'); ?></span>
  <div class="card mx-auto">
    <div class="card-header">
      Data Shopping Cart
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <tr>
          <th>No</th>
          <th>Gambar Mainan</th>
          <th>Nama Mainan</th>
          <th>Harga Sewa/Hari</th>
          <th>Action</th>
        </tr>
        <form action="<?php echo base_url()?>customer/cart/confirm_order" method="post">
        <?php
        $no = 1;
        $total = 0;
        $count = 0;
        foreach($cart as $ct): ?>
        <tr>
          <td><?= $no++; ?></td>
          <div class="col-md-6">
          <td><img width="80px;" src="<?= base_url('assets/upload/').$ct->img_path; ?>" alt=""></td>
          </div>
          <td><?= $ct->name; ?></td>
          <td>Rp. <?= number_format($ct->price, 0, ',', '.'); ?>,-</td>
         <td>
            <a href="<?= base_url('customer/cart/delete_cart/'). $ct->id_cart; ?>" class="btn btn-sm btn-danger">Delete</a>
          </td>
        </tr>
        <?php $total+=$ct->price; ?>
        <?php $count++; ?>
        <input type="hidden" value="<?= $ct->id_cart?>" name="id_cart[]">
        <input type="hidden" value="<?= $ct->id_product?>" name="id_product[]">
        <input type="hidden" value="<?= $ct->price?>" name="price[]">
        <?php endforeach; ?>
        
        <td><h4>Duration :</h4><input type="number" min="1" name="duration" value="1"></td>
        <td class="text-right align-middle" colspan="4"><button class="btn btn-primary">Confirm Order</button></td>
        <input type="hidden" value="<?= $count?>" name="count">
        </form>
        </table>
        <table class="table table-bordered table-striped">
        <tr>   
        <td><h5>Total Harga :</h5><?= $total ;?></td>
        </tr>
        </table>
    </div>
  </div>
</div>
</body>
<div style="height: 180px;"></div>