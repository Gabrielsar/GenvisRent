<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Transaksi</h1>
    </div>

    <table class="table table-responsive table-bordered table-striped">
    <tr>
          <th>No</th>
          <th>Nama Customer</th>
          <th>Nama Mainan</th>
          <th>Harga Sewa / Hari</th>
          <th>Hari Sewa</th>
          <th>Alamat</th>
          <th>Total Biaya</th>
          <th>Status </th>
          <th>Action </th>  
        </tr>
        <?php
        $no = 1;
        foreach($orders as $tr): ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $tr->nama; ?></td>
          <td><?= $tr->name; ?></td>
          <td><?= $tr->price; ?></td> 
          <td><?= $tr->duration; ?> Hari</td>
          <td><?= $tr->alamat; ?></td>
          <td>Rp. <?= number_format($tr->total, 0, ',', '.'); ?>,-</td>
          <td><?= $tr->status; ?></td>
          <td><a href="<?= base_url('admin/transaksi/update_status/'). $tr->id_order; ?>" class="btn btn-sm btn-success">Sudah dikirim</a></td>
          <td><a href="<?= base_url('admin/transaksi/update_status_selesai/'). $tr->id_order; ?>" class="btn btn-sm btn-danger">Selesai</a></td>
        </tr>
        <?php endforeach; ?>
      </table>
  </section>
</div>