<?php echo view('head'); ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-9">
        <div class="card">
          <div class="card-body">
          <?php foreach($diskusi as $d): ?>
            <div class="badge badge-primary"><?= $d->kategori_nama ?></div>
            <div class="badge badge-danger"><i class="fa fa-eye"></i>&nbsp; <?= $d->posting_dibaca ?></div>
            <h2><?= $d->posting_judul ?></h2>
            <hr>
            <div class="clearfix">
              <div class="pull-left">
                <a href="detail_member?id=<?= $d->member_id; ?>">
                <?php if($d->member_foto == ""): ?>
                <img class="img-fluid rounded-circle shadow" style="width: 40px;height: 40px;" src="/gambar/sistem/member.png">
                 <? else: ?>
                 <img class="img-fluid rounded-circle shadow" style="width: 40px;height: 40px;" src="/gambar/member/<?= $d->member_foto ?>">
                <? endif; ?>
                <b><span class="ml-2 text-dark"><?= $d->member_nama ?></span></b>
                </a>
              </div>
              <div class="pull-right pt-2">
                <small class="text-muted"><i><?php echo date('d-M-Y H:i:s',strtotime($d->posting_tanggal)) ?></i></small>
              </div>
            </div>
            <br/>
            <?= $d->posting_isi; ?>
            <hr>
            <div class="alert alert-primary mb-4"><center><b class="text-white m-0">DISKUSI</b></center></div>
            <?php
            if($total > 0):
              foreach($komen as $k):
              ?>
              <div class="clearfix">
                <div class="pull-left">
                  <a href="/detail_member/<?php echo $k->member_id; ?>">
                    <? if($d->member_foto == ""): ?>
                    <img class="img-fluid rounded-circle shadow" style="width: 40px;height: 40px;" src="/gambar/sistem/member.png">
                    <? else: ?>
                    <img class="img-fluid rounded-circle shadow" style="width: 40px;height: 40px" src="/gambar/member/<?php echo $k->member_foto ?>">
                    <? endif; ?>
                    <span class="ml-2 text-dark"><b><?php echo $k->member_nama ?></b></span>
                  </a>
                </div>
                <div class="pull-right pt-2">
                  <small class="text-muted"> <i><?php echo date('d-M-Y H:i:s',strtotime($k->komen_tanggal)) ?></i></small>
                </div>
              </div>
              <br/>
              <?= $k->komen_isi ?>
              <hr/>
              <? print_r($json);
        //        foreach($reply as $r):
                
                ?>
              
              
                <?
        //        endforeach;
              endforeach;
            else: ?>
              <div class="mb-5 text-center">Belum ada komentar di diskusi ini.</div>
            <? endif; ?>
            <b>Beri Komentar</b>
            <hr>
            <?php if(!empty($stat)): ?>
            <form action="" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="posting" value="<?php echo $d->posting_judul; ?>">
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
