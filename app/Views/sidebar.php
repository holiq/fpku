  <div class="col-lg-3">
    <a href="/posting" class="btn btn-primary btn-block mb-4 mt-3 shadow">POSTING DISKUSI BARU</a>
    <h6>Diskusi Terpopuler</h6>
    <div class="card">
      <div class="card-body">
        <? foreach($sidebar as $s): ?>
        <a style="font-size:11pt" href="diskusi/<?php echo url_title($s['id']); ?>"><?= $s['judul'] ?></a>
        <br/>
        <? if($s['user_gambar'] == ""): ?>
        <img class="img-fluid rounded-circle shadow" style="width: 20px;height: 20px" src="/gambar/sistem/member.png">
        <? else: ?>
        <img class="img-fluid rounded-circle shadow" style="width: 20px;height: 20px" src="/gambar/member/<?= $s['user_gambar'] ?>">
        <? endif; ?>
        <small class="ml-1"><?= $s['user_name'] ?></small>
        <div class="badge badge-info"><i class="fa fa-eye"></i> <?= $s['posting_dibaca'] ?></div>
        <? endforeach; ?>
      </div>
    </div>
  </div>
