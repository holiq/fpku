  <div class="col-lg-3">
    <a href="posting.php" class="btn btn-primary btn-block mb-4 mt-3 shadow">POSTING DISKUSI BARU</a>
    <h6>Kategori</h6>
    <?php 
    foreach($kategori as $k){
    ?>
      <a class="btn btn-outline-primary btn-block" href="kategori.php?id=<?= $k->kategori_id; ?>"><?= $k->kategori_nama; ?></a>
    <? } ?>
    <br/>
    <h6>Diskusi Terpopuler</h6>
    <div class="card">
      <div class="card-body">
        <? foreach($sidebar as $s): ?>
        <a style="font-size:11pt" href="diskusi.php?id=<?= $s->posting_id; ?>"><?= $s->posting_judul ?></a>
        <br/>
        <? if($s->member_foto == ""): ?>
        <img class="img-fluid rounded-circle shadow" style="width: 20px;height: 20px" src="/gambar/sistem/member.png">
        <? else: ?>
        <img class="img-fluid rounded-circle shadow" style="width: 20px;height: 20px" src="/gambar/member/<?= $s->member_foto ?>">
        <? endif; ?>
        <small class="ml-1"><?= $s->member_nama ?></small>
        <div class="badge badge-info"><i class="fa fa-eye"></i> <?= $s->posting_dibaca ?></div>
        <hr class="my-2">
        <? endforeach; ?>
      </div>
    </div>
  </div>
