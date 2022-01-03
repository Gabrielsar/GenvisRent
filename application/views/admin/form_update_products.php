<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Update Data Mainan</h1>
    </div>

    <div class="card">
      <div class="card-body">

        <?php foreach($products as $mb): ?>

        <form action="<?= base_url('admin/data_mainan/update_products_aksi') ?>" enctype="multipart/form-data" method="post">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Kategori Mainan</label>
                <input type="hidden" name="id_product" value="<?= $mb->id_product; ?>">
                <select name="id_category" id="" class="form-control">
                  <option value="<?= $mb->id_category ?>"><?= $mb->c_name ?></option>
                  <?php foreach($categories as $tp): ?>
                  <option value="<?= $tp->id_category ?>"><?= $tp->c_name; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('id_category', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="name" class="form-control" value="<?= $mb->name ?>">
                <?= form_error('name', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="form-group">
                <label for="">Harga</label>
                <input type="text" name="price" class="form-control" value="<?= $mb->price ?>">
                <?= form_error('price', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="form-group">
                <label for="">Qty</label>
                <input type="text" name="qty" class="form-control" value="<?= $mb->qty ?>">
                <?= form_error('qty', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Deskripsi</label>
                <input type="text" name="description" class="form-control" value="<?= $mb->description ?>">
                <?= form_error('description', '<div class="text-small text-danger">', '</div>') ?>
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

        <?php endforeach; ?>
      </div>
    </div>

  </section>
</div>