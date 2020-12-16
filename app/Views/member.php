<?php echo view('head'); ?>
  <div class="container-fluid">
    <?php $session = \Config\Services::session();
    if($session->getFlashdata('sukses')): ?>
    <div class="alert alert-success">
      <?= $session->getFlashdata('sukses'); ?>
    </div>
  <?php endif; ?>
    <div class="row">
      <?php echo view('headMem') ?>
      <div class="col-md-9">
        <div class="card sub-profile">
          <div class="card-header">
            <h6 class="m-0 font-weight-bold">Statistik
            <div class="mt-0 dropdown no-arrow float-right">
              <a href="#" class="dropdown-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw"></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="profile/diskusi">Diskusi Saya</a>
              </div>
            </div>
            </h6>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 mb-3">
                <div class="card card-body shadow bg-primary text-white">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col mr-2">
                        <div class="small font-weight-bold text-white text-uppercase mb-1">Total Diskusi/Posting</div>
                        <div class="h5 mb-0 font-weight-bold text-white"><?= $totpos; ?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-newspaper fa-2x text-gray"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-body shadow bg-success text-white">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col mr-2">
                        <div class="small font-weight-bold text-white text-uppercase mb-1">Total Komentar</div>
                        <div class="h5 mb-0 font-weight-bold text-white"><?= $totmen; ?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-newspaper fa-2x text-gray"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php echo view('modalLogout'); ?>
  </div>
<?php echo view('footer'); ?>
