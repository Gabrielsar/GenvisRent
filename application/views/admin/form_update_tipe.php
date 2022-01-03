<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Update Kategori Mainan</h1>
    </div>

    <?php foreach($categories as $tp): ?>
    <form action="<?= base_url('admin/data_tipe/update_tipe_aksi') ?>" method="post">
      <div class="form-group">
        <label for="">ID Kategori</label>
        <input type="number" name="id_category" value="<?= $tp->id_category; ?>">
        <?= form_error('id_catgeory', '<div class="text-small text-danger">', '</div>') ?>
      </div>
      <div class="form-group"> 
        <label for="">Nama Kategori</label>
        <input type="text" name="c_name" class="form-control"  value="<?= $tp->c_name; ?>">
        <?= form_error('c_name', '<div class="text-small text-danger">', '</div>') ?>
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="reset" class="btn btn-warning">Reset</button>

    </form>
    <?php endforeach; ?>

  </section>
</div>