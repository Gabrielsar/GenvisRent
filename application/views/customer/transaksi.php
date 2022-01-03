<body style="background-image:url('<?php echo base_url('assets/assets_stisla/assets/img/Hydrant BG.png')?>')">
<div style="height: 150px;"></div>
<div class="container">
  <div class="card mx-auto">
    <div class="card-header">
      Data Transaksi Anda
    </div>
    <span class="mt-2 p-2"><?= $this->session->flashdata('pesan'); ?></span>
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <tr>
          <th>No</th>
          <th>Nama Mainan</th>
          <th>Hari Sewa</th>
          <th>Alamat</th>
          <th>Total Biaya</th>
          <th>Status </th>
          <th>Action </th>  
        </tr>
        <?php
        $no = 1;
        foreach($transaksi as $tr): ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $tr->name; ?></td>
          <td><?= $tr->duration; ?> Hari</td>
          <td><?= $tr->alamat; ?></td>
          <td>Rp.<?= number_format($tr->total, 0, ',', '.'); ?>,-</td>
          <td><?= $tr->status; ?></td>
          <td><a href="<?= base_url('customer/transaksi/update_status/'). $tr->id_order; ?>" class="btn btn-sm btn-success">Konfirmasi Status</a></td>
        </tr>

        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
</body>
<div style="height: 180px;"></div>