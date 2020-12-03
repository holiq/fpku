<?php echo view('head'); ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-9">
        <div class="card">
          <div class="card-body">
          <?php foreach($diskusi as $d): ?>
            <div class="badge badge-danger"><i class="fa fa-eye"></i>&nbsp; <?= $d['posting_dibaca'] ?></div>
            <div class="share">
              <input class="share-input" type="checkbox" id="checkbox">
              <label class="share-toggler" for="checkbox">
                <span class="share-icon"></span>
              </label>

              <ul class="share_options" data-title="Share">
                <li><a href="https://www.facebook.com/sharer.php?u=<?= current_url(true); ?>">Facebook</a></li>
                <li><a href="https://twitter.com/intent/tweet?url=<?= current_url(true); ?>l&amp;text=<?= $d['judul']; ?>">Twitter</a></li>
                <li><a href="#">Google</a></li>
                <li><a href="#">Email</a></li>
              </ul>
            </div>
            <h2><?= $d['judul'] ?></h2>
            <hr>
            <div class="clearfix">
              <div class="pull-left">
                <a href="detail_member?id=<?= $d['user_id']; ?>">
                <?php if($d['user_gambar'] == ""): ?>
                <img class="img-fluid rounded-circle shadow" style="width: 40px;height: 40px;" src="/gambar/sistem/member.png">
                 <? else: ?>
                 <img class="img-fluid rounded-circle shadow" style="width: 40px;height: 40px;" src="/gambar/member/<?= $d['user_gambar'] ?>">
                <? endif; ?>
                <b><span class="ml-2 text-dark"><?= $d['user_name'] ?></span></b>
                </a>
              </div>
              <div class="pull-right pt-2">
                <small class="text-muted"><i><?php echo date('d-M-Y H:i:s',strtotime($d['tanggal'])) ?></i></small>
              </div>
            </div>
            <br/>
            <?= $d['isi']; ?>
            <hr>
            <div class="alert alert-primary mb-4"><center><b class="text-white m-0">DISKUSI</b></center></div>
            <?php
            if($total > 0):
              foreach($komen as $k):
              ?>
              <div class="clearfix">
                <div class="pull-left">
                  <a href="/detail_member/<?php echo $k['user_id']; ?>">
                    <? if($k['user_gambar'] == ""): ?>
                    <img class="img-fluid rounded-circle shadow" style="width: 40px;height: 40px;" src="/gambar/sistem/member.png">
                    <? else: ?>
                    <img class="img-fluid rounded-circle shadow" style="width: 40px;height: 40px" src="/gambar/member/<?php echo $k['user_gambar'] ?>">
                    <? endif; ?>
                    <span class="ml-2 text-dark"><b><?php echo $k['user_name'] ?></b></span>
                  </a>
                </div>
                <div class="pull-right pt-2">
                  <small class="text-muted"> <i><?php echo date('d-M-Y H:i:s',strtotime($k['komentar_tanggal'])) ?></i></small>
                </div>
              </div>
              <br/>
              <?= $k['komentar_isi'] ?>
              <hr/>
              <? endforeach;
            else: ?>
              <div class="mb-5 text-center">Belum ada komentar di diskusi ini.</div>
            <? endif; ?>
            <b>Beri Komentar</b>
            <hr>
            <?php if(!empty($stat)): ?>
            <form action="" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="posting" value="<?php echo $d['id']; ?>">
              <div class="form-group">
                <b>Tulis komentar</b>
                <textarea class="form-control" id="editor_forum" required="required" name="isi" rows="5" placeholder="Masukkan komentar baru .."></textarea>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block mb-3" value="Posting Komentar">
              </div>
            </form>
            <? else: ?>
            <div class="alert bg-primary text-center">
              <b>Silahkan Login Untuk Komentar / Diskusi</b>.
              <br/><a class="text-white" href="masuk">Login Disini</a>
            </div>
            <? endif;
          endforeach; ?>
          </div>
        </div>
      </div>
      <?php echo view('sidebar'); ?>
      <?php echo view('modalLogout'); ?>
    </div>
  </div>
<?php echo view('footer'); ?>
