<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Kategori Mainan</h1>
    </div>
    
    <a href="<?= base_url('admin/data_tipe/tambah_tipe'); ?>" class="btn btn-primary mb-3">Tambah Data</a>
    <?= $this->session->flashdata('pesan'); ?>

    <table class="table table-stripped table-bordered table-hover">
      <thead>
        <tr>
          <th>ID Kategori</th>
          <th>Nama Kategory</th>
          <th width="180px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; 
        foreach($categories as $tp): ?>
        <tr>
          <td><?= $tp->id_category; ?></td>
          <td><?= $tp->c_name; ?></td>
          <td>
            <a href="<?= base_url('admin/data_tipe/update_tipe/'). $tp->id_category; ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
            <a onclick="confirm('Yakin hapus?')" href="<?= base_url('admin/data_tipe/delete_tipe/'). $tp->id_category; ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </section>
</div>