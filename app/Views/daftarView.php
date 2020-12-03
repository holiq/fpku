<?php echo view('head') ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 offset-lg-4">
        <div class="card">
          <div class="card-header">Login Member</div>
            <div class="card-body">
            <?php 
            if(isset($alert)):
              
            ?>
            <? endif; ?>
              <form action="" onsubmit="return validateForm()" method="post">
                <?= csrf_field(); ?>
                
                <div class="form-group">
                  <label for="">Nama Lengkap</label>
                  <input type="text" id="nama" class="form-control" required="required" name="nama" placeholder="Masukkan nama lengkap . ..">
                  <small style="color:red">*Gunakan nama asli</small>
                </div>
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" class="form-control" required="required" name="email" id="email" placeholder="Masukkan email . . .">
                   <small style="color:red">*Masukan email anda</small>
                </div>
                <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" class="form-control" required="required" name="password" id="pw" placeholder="Masukkan password ..">
                  <small style="color:red">*Gunakan kombinasi huruf dan simbol</small>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary btn-block mb-3" value="Daftar">
                  <p class="btn btn-block">Sudah punya akun? <a href="masuk" class="text-primary">Login</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php echo view('footer') ?>