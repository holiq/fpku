<?php echo view('head'); ?>
  <div class="container-fluid">
    <div class="row">
      <?php echo view('headMem') ?>
      <div class="col-md-9">
        <div class="card sub-profile">
          <div class="card-header">
            <h6 class="m-0">Ganti Password</h6>
          </div>
          <div class="card-body">
          <? echo form_open('', array('role' => 'form', 'enctype' => 'multipart/form-data'));
          echo csrf_field();
            if(isset($gagal)): ?>
            <div class="alert alert-danger" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
              
              <?= $gagal ?>
            </div>
            <? endif; ?>
            <div class="form-group">
              <label for="">Masukkan Password Lama</label>
              <input type="password" class="form-control" required="required" name="passlama" placeholder="Masukkan password .." min="5">
            </div>
            <div class="form-group">
              <label for="">Masukkan Password Baru</label>
              <input type="password" class="form-control" required="required" name="passbaru" placeholder="Masukkan password .." min="5">
            </div>
            <div class="form-group">
              <label for="">Konfirmasi Password</label>
              <input type="password" class="form-control" required="required" name="konpass" placeholder="Masukkan password .." min="5">
            </div>
            <div class="form-group">
              <?= form_submit('submit', 'Ganti Password',['class' => 'btn btn-primary btn-block']); ?>
            </div>
            <?= form_close(); ?>
          </div>
        </div>
      </div>
    </div>
    <?php echo view('modalLogout'); ?>
  </div>
<?php echo view('footer'); ?>
