<header 
    style= "background-image: linear-gradient(to top, #c1dfc4 0%, #deecdd 100%);
            margin-bottom: 2%;
            padding-top: 5rem;
            padding-bottom: 3rem;">
    <div class="head col-md-6 col-10 mx-auto">
        <h5>Genvis Rent</h5>
        <h1>REGISTRATION</h1>
    </div>
    <div class="login-brand">
      <img src="<?= base_url('assets/assets_stisla/'); ?>assets/img/logo.png" alt="logo" width="300" 
      style= "position: absolute;
              right: 320px;
              top: 30px;
              text-decoration: none;
              color: white;
              letter-spacing: 5px;
              text-align: center;">
    </div>
</header>
<body style="background-image:url('<?php echo base_url('assets/assets_stisla/assets/img/Hydrant BG.png')?>')">
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>
              <div class="card-body">
                <form method="POST" action="<?= base_url('register'); ?>">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="nama">Email</label>
                      <input id="email" type="email" class="form-control" name="email" autofocus>
                      <?= form_error('email', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-6">
                      <label for="password">Password</label>
                      <input id="password" type="password" class="form-control" name="password">
                      <?= form_error('password', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                  </div>
                    
                <div class="row">
                    <div class="form-group col-6">
                      <label for="nama">Nama</label>
                      <input id="nama" type="text" class="form-control" name="nama" autofocus>
                      <?= form_error('nama', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-6">
                      <label for="no_telepon">No Telepon</label>
                      <input id="no_telepon" type="text" class="form-control" name="no_telepon">
                      <?= form_error('no_telepon', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                  </div>
                    <div class=form-group>
                    <label for="alamat">Alamat</label>
                    <input id="alamat" type="text" class="form-control" name="alamat">
                    <?= form_error('alamat', '<div class="text-small text-danger">', '</div>'); ?>
                    <div class="invalid-feedback">
                    </div>
                    </div>
                    
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
                <div class="mt-5 text-muted text-center">
              Already Have An Account? <a href="<?= base_url('Auth/login'); ?>">Login</a>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>