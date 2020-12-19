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
            <h1 class="h3 mb-0 text-gray-800">Posting</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>
          <? if(isset($sukses)): ?>
          <div class="alert alert-success" role="alert">
            <?= $sukses; ?>
          </div>
          <? endif; ?>
          <h1 class="h3 mb-3 text-gray-800">Edit Murid</h1>
          <form method="post" enctype="multipart/form-data">
            <? foreach($posting as $p): ?>
            <div class="form-group">
              <label for="">Judul</label>
              <input type="text" class="form-control" required="required" name="judul" value="<?= $p['judul'] ?> placeholder="Masukkan judul diskusi ..">
            </div>
              <div class="form-group">
              <label for="">Isi</label>
              <textarea id="sharkeditor" class="form-control" required="required" name="isi" placeholder="Masukkan isi diskusi .."><?= $p['isi'] ?></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block mb-3">Update</button>
            </div>
            <? endforeach; ?>
          </form>
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
