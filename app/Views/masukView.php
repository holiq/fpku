<?php echo view('head') ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 offset-lg-4">
        <div class="card">
          <div class="card-header">Login Member</div>
            <div class="card-body">
            <?php if(isset($alert)): ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
                <span class="alert-inner--text"><strong>Gagal! </strong><?= $alert ?></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
            <? endif; ?>
            <form action="" method="post">
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" required="required" name="email" placeholder="Masukkan email ..">
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" required="required" name="password" placeholder="Masukkan password ..">
              </div>
              <p class="float-right">Lupa password? Klik <a href="forgot.php" class="text-primary">disini</a>.</p>
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block mb-3" value="Login">
                <p class="btn btn-block">Tidak punya akun? <a href="daftar" class="text-primary">Daftar</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php echo view('footer') ?>