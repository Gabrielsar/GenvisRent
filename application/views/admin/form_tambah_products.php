<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Input Data Mainan</h1>
    </div>

    <div class="card">
      <div class="card-body">
        <form action="<?= base_url('admin/data_mainan/tambah_products_aksi') ?>" enctype="multipart/form-data" method="post">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Kategori Mainan</label>
                <select name="id_category" id="" class="form-control">
                  <option value="">--Pilih Kategori Mainan--</option>
                  <?php foreach($categories as $tp): ?>
                  <option value="<?= $tp->id_category ?>"><?= $tp->c_name; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('id_category', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="name" class="form-control">
                <?= form_error('name', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="form-group">
                <label for="">Qty</label>
                <input type="number" name="qty" class="form-control">
                <?= form_error('qty', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="form-group">
                <label for="">Deskripsi</label>
                <input type="text" name="description" class="form-control">
                <?= form_error('description', '<div class="text-small text-danger">', '</div>') ?>
              </div>

            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Harga Sewa per Hari</label>
                <input type="number" name="price" class="form-control">
                <?= form_error('price', '<div class="text-small text-danger">', '</div>') ?>
              </div>
              
              <div class="form-group">
                <label for="">Gambar</label>
                <input type="file" name="img_path" class="form-control">
              </div>
              <button type="submit" class="btn btn-primary mt-4">Simpan</button>
              <button type="reset" class="btn btn-success mt-4">Reset</button>
            </div>
          </div>
        </form>
      </div>
    </div>


  </section>
</div>