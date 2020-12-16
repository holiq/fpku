  <div class="col-lg-3">
    <a href="/posting" class="btn btn-primary btn-block mb-4 mt-3 shadow">Posting status Anda</a>
    <h6>Postingan Hits</h6>
    <div class="card">
      <div class="card-body">
        <?php foreach($sidebar as $s): ?>
        <?php if($s['user_gambar'] == ""): ?>
        <img class="img-fluid rounded-circle shadow" style="width: 20px;height: 20px" src="/gambar/sistem/member.png">
        <?php else: ?>
        <img class="img-fluid rounded-circle shadow" style="width: 20px;height: 20px" src="/gambar/member/<?= $s['user_gambar'] ?>">
        <?php endif; ?>
        <small class="ml-1"><?= $s['user_name'] ?></small>
        <a style="font-size:11pt" href="diskusi/<?php echo url_title($s['id']); ?>"><?= $s['judul'] ?></a>
        <div class="badge badge-info"><i class="fa fa-eye"></i> <?= $s['posting_dibaca'] ?></div>
        <div class="badge badge-info"><i class="fa fa-eye"></i> <?= $jumkomen ?></div>
        <hr>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
