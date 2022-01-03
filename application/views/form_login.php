<?php
$uppr_case ="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$lower_case ="abcdefghijklmnopqrstuvwxyz";
$number ="0123456789";
$generated_uppr_case = substr(str_shuffle($uppr_case),0,2);
$generated_lower_case = substr(str_shuffle($lower_case),0,2);
$generated_number = substr(str_shuffle($number),0,2);
$mixed = "$generated_uppr_case$generated_lower_case$generated_number";
$generated_captcha = substr(str_shuffle($mixed),0,6); 
$_SESSION['password_captcha'] = $generated_captcha;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<header 
    style= "background-image: linear-gradient(to top, #c1dfc4 0%, #deecdd 100%);

            margin-bottom: 2%;
            padding-top: 5rem;
            padding-bottom: 3rem;">
    <div class="head col-md-6 col-10 mx-auto">
        <h5>Genvis Rent</h5>
        <h1>LOGIN</h1>
    </div>
    <div class="login-brand">
      <img src="<?= base_url('assets/assets_stisla/'); ?>assets/img/logo.png" alt="logo" width="350" class="rounded"
      style= "position: absolute;
              right: 320px;
              top: 30px;
              text-decoration: none;
              color: white;
              letter-spacing: 5px;
              text-align: center;">
    </div>
    <style>
      @media (max-width: 1024px) {
        .login-brand{
          right:150px;
        }
      }
    </style>
</header>
<body style="background-image:url('<?php echo base_url('assets/assets_stisla/assets/img/Hydrant BG.png')?>')">
  <div id="app" >
    <!-- <section class="section"> -->
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-6 left-content">
            <div class="bg-primary">
              <img src="<?= base_url('assets/assets_stisla/'); ?>assets/img/toy1.gif" alt="logo" width="545" height="555" class="rounded" style="margin-top:1.5px;">
            </div>
          </div>
          <div class="col-md-6 right-content">
            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>
                <span class="m-2"><?= $this->session->flashdata('pesan'); ?></span>
                <div class="card-body">
                  <form method="POST" action="<?= base_url('auth/login'); ?>">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input id="email" type="text" class="form-control" name="email" tabindex="1" autofocus>
                      <?= form_error('email', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                      <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                      </div>
                      <input id="password" type="password" class="form-control" name="password" tabindex="2">
                      <?= form_error('password', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                    <center>
                    <div class="form-group">
                      <label for="CAPTCHA" class="control-label">CAPTCHA</label><br>
                      <td><button style="border:none; background-color:transparent;" type="submit" name="generate"><i class="fa fa-refresh" style="font-size:24px"></i></button></td>
                      <td><?php error_reporting(0); echo "<font color='black' >$generated_captcha</font>" ?></td><br>
                      <input id="password_captcha" class="form-control" style="width:40%; text-align:center;" type="text" tabindex="2" name="password_captcha" placeholder="Enter Captcha" value="" maxlength="6" />
                    </div>
                    </center>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Login
                      </button>
                    </div>
                  </form>
                  <div class="mt-5 text-muted text-center">
                    Don't have an account? <a href="<?= base_url('register'); ?>">Register</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- </section> -->
  </div>
</body>
