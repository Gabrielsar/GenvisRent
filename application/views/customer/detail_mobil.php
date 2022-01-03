<!-- Banner Starts Here -->
<div class="container">
  <div style="height: 150px;"></div>

  <div class="card">
    <div class="card-body">
      <?php foreach($detail as $dt): ?>
      <div class="row">
        <div class="col-md-6">
          <img width="500px;" src="<?= base_url('assets/upload/').$dt->img_path; ?>" alt="">
        </div>
        <div class="col-md-6">
          <table class="table">
            <tr>
              <th>Name</th>
              <td><?= $dt->name; ?></td>
            </tr>
            <tr>
              <th>Price</th>
              <td><?=number_format($dt->price,0,',','.');?> / per hari</td>
            </tr>
            <tr>
              <th>Qty</th>
              <td><?= $dt->qty; ?></td>
            </tr>
            <tr>
              <th>Description</th>
              <td><?= $dt->description; ?></td>
            </tr>
          </table>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

</div>
<!-- Banner Ends Here -->

<div style="height: 180px;"></div>
