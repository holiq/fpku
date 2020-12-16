<?php echo view('head'); ?>
  <div class="container-fluid">
    <div class="row">
      <?php echo view('headMem') ?>
      <div class="col-md-9">
        <div class="card sub-profile">
          <div class="card-header">
            <h6 class="m-0 font-weight-bold">Profile</h6>
          </div>
          <div class="card-body">
            <?php echo form_open('', array('role' => 'form', 'enctype' => 'multipart/form-data'));
            foreach($status as $m):
              echo csrf_field();
              if(isset($validation)): ?>
              <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <?= $validation->listErrors(); ?>
              </div>
            <?php endif; ?>
              <div class="row">
                <div class="col-md-6">
                  <label>Nama</label>
                  <div class="form-group">
                    <input type="text" name="nama" class="form-control" value="<?php echo $m['user_name'] ?>" reuired>
                  </div>
                </div>
                <div class="col-md-6">
                  <label>Email</label>
                  <div class="form-group">
                    <input type="text" name="email" class="form-control" value="<?php echo $m['user_email'] ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <label>Bio</label>
                  <div class="form-group">
                    <input type="text" name="bio" class="form-control" value="<?php echo $m['user_status'] ?>" reuired>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="customFile">Foto Profil</label>
                    <div class='custom-file'>
                      <input type='file' name='foto' class='custom-file-input' id='customFile'>
                      <label class='custom-file-label' for='customFile'>Choose photo</label>
                    </div>
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah foto profil. *Max 2mb</small>
                  </div>
                </div>
              </div>
              <?php echo form_submit('submit', 'Ubah Profile',['class' => 'btn btn-primary btn-block']) ?>;
            <?php endforeach; ?>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
    <?php echo view('modalLogout'); ?>
  </div>
<?php echo view('footer'); ?>
