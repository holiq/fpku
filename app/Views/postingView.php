<? echo view('head') ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-9">
      <div class="card">
        <div class="card-header">
          <h6 class="m-0">Tulis Posting Diskusi Baru</h6>
        </div>
        <div class="card-body">
          <form action="/posting" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Judul Diskusi</label>
              <input type="text" class="form-control" required="required" name="judul" placeholder="Masukkan judul diskusi ..">
            </div>
              <div class="form-group">
              <label for="">Diskusi</label>
              <textarea id="editor_forum" class="form-control" required="required" name="isi" placeholder="Masukkan isi diskusi .."></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block mb-3">Posting Diskusi</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php echo view('sidebar'); ?>
    <?php echo view('modalLogout'); ?>
  </div>
</div>

<?php echo view('footer.php'); ?>