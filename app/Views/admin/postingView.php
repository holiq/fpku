<!DOCTYPE html>
<html lang="en">
<?php echo view('admin/head') ?>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php echo view('admin/sidebar') ?>  
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <?php echo view('admin/navbar') ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?php echo view('admin/breadcrumb') ?>
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Murid</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>
          <? if(isset($sukses)): ?>
          <div class="alert alert-success" role="alert">
            <?= $sukses; ?>
          </div>
          <? endif; ?>
          <!-- Content Row -->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Posting</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalPosting; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Daftar Murid</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered 
table-hover" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Judul</th>
                          <td>User</th>
                          <th>Dilihat</th>
                          <th>Aksi</th>
                        </tr>
                      <tbody>
                      <? $no = 1;
                      foreach($posting as $p):
                      $judl = $p['judul'];
                      if(strlen($judl) > 20):
                        $judul = substr($judl, 0, 20)."...";
                      else:
                        $judul = $judl;
                      endif; ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td>
                            <a href="diskusi/<?php echo url_title($p['id']); ?>"><?= $judul; ?></a>
                            <br/><i><small class="text-nowrap"><?= date('d-M-Y H:i:s',strtotime($p['tanggal'])) ?></small></i>
                          </td>
                          <td>
                            <a href="/detail"></a>
                                <?php
                                if($p['user_gambar'] == ""){
                                ?>
                                  <img class="img-fluid rounded-circle shadow" style="width: 35px;height: 35px" src="/gambar/sistem/member.png">
                                <?php }else{ ?>
                                  <img class="img-fluid rounded-circle shadow" style="width: 35px;height: 35px" src="/gambar/member/<?php echo $p['user_gambar'] ?>">
                                <?php } ?>
                                <br>
                                <small class="ml-1 text-dark"> <?= ucfirst($p['user_name']) ?></small>
                            </a>
                          </td>
                          <td>
                            <div class="badge badge-info"><?= $p['posting_dibaca'] ?></div>
                          </td>
                          <td class="d-flex">
                            <a href="<?= base_url('admin/posting/edit/'.$p['id']) ?>"class="btn btn-primary btn-sm mr-2">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form method="post" action="<?= base_url('admin/posting/hapus/'.$p['id']) ?>">
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                          </td>
                        </tr>
                      <? endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
  <!-- Scroll to Top Button-->
  <?php echo view('admin/scrolltop') ?>
  <?php echo view('admin/modal') ?>
  <?php echo view('admin/js') ?>
</body>

</html>
