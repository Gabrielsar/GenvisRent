<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Mainan</h1>
    </div>
    
    <a href="<?= base_url('admin/data_mainan/tambah_products/'); ?>" class="btn btn-primary mb-3">Tambah Data</a>
    <?= $this->session->flashdata('pesan'); ?>

    <table class="table table-hover table-striped table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Gambar</th>
          <th>Kategori</th>
          <th>Nama Mainan</th>
          <th>Harga Sewa per Hari</th>
          <th>Qty</th>
          <th>Deskripsi</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach($product as $mb): ?>
        <tr>
          <td><?= $no++; ?>.</td>
          <td>
            <img width="70px;" src="<?= base_url('assets/upload/'). $mb->img_path; ?>" alt="">
          </td>
          <td><?= $mb->c_name; ?></td>
          <td><?= $mb->name; ?></td>
          <td><?= $mb->price; ?></td>
          <td><?= $mb->qty; ?></td>
          <td><?=$mb->description; ?></td>
          <td>
            <a onclick="return confirm('Yakin hapus?')" href="<?= base_url('admin/data_mainan/delete_products/'). $mb->id_product; ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
            <a href="<?= base_url('admin/data_mainan/update_products/'). $mb->id_product; ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>
</div>