<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Input Kategori Mainan</h1>
    </div>

    <form action="<?= base_url('admin/data_tipe/tambah_tipe_aksi') ?>" method="post">
      <div class="form-group"> 
        <label for="">ID Kategori</label>
        <input type="number" name="id_category" class="form-control">
        <?= form_error('id', '<div class="text-small text-danger">', '</div>') ?>
      </div>
      <div class="form-group"> 
        <label for="">Nama Kategori</label>
        <input type="text" name="c_name" class="form-control">
        <?= form_error('name', '<div class="text-small text-danger">', '</div>') ?>
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="reset" class="btn btn-warning">Reset</button>

    </form>


  </section>
</div>