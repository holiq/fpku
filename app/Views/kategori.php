<?php echo view('head'); ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-9">
        <div class="card">
          <div class="card-body">
            <div class="btn-group mb-3">
              <div class="dropdown">
                Urutkan : &nbsp;
                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $uri->getSegment(2) === 'terpopuler' ? 'Terpopuler' : 'Terbaru' ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="urutan/terbaru">Terbaru</a>
                  <a class="dropdown-item" href="urutan/terpopuler">Terpopuler</a>
                </div>
              </div>
            </div>
            <?php
            if($uri->getSegment(1) === 'cari'):
              $cari = htmlspecialchars($uri->getSegment(2));
              echo "<br>Diskusi yang dicari : <b>$cari</b>";
            endif;
            if($uri->getSegment(1) === 'kategori'):
              $kate = htmlspecialchars($uri->getSegment(2));
              echo "<br>Kategori : <b>$kate</b>";
            endif
            ?>
            <div class="table-responsive">
              <table class="table table-">
                <thead>
                  <th class="text-nowrap">Judul Diskusi</th>
                  <th>Kategori</th>
                  <th>Member</th>
                  <th><i class="fa fa-eye"></i></th>
                  <th><i class="fa fa-comment"></i></th>
                </thead>
                <tbody>
                <?php
                foreach($kategoriby as $p):
                  $judl = $p->posting_judul;
                  if(strlen($judl) > 20):
                    $judul = substr($judl, 0, 20)."...";
                  else:
                    $judul = $judl;
                  endif;
                  ?>
                  <tr>
                    <td>
                      <a href="diskusi.php?id=<?php echo $p->posting_id; ?>"><?php echo $judul; ?></a>
                      <br/><i><small class="text-nowrap"><?php echo date('d-M-Y H:i:s',strtotime($p->posting_tanggal)) ?></small></i>
                    </td>
                    <td>
                      <a href="kategori.php?id=<?php echo $p->kategori_id; ?>">
                        <div class="badge badge-warning"><?php echo $p->kategori_nama ?></div>
                      </a>
                    </td>
                    <td>
                      <a href="detail_member.php?id=<?php echo $p->posting_id; ?>">
                      <? if($p->member_foto == ""): ?>
                        <img class="img-fluid rounded-circle shadow" style="width: 40px;height: 40px" src="/gambar/sistem/member.png">
                      <? else: ?>
                        <img class="img-fluid rounded-circle shadow" style="width: 40px;height: 40px" src="/gambar/member/<?php echo $p->member_foto ?>">
                      <? endif; ?>
                        <small class="ml-1"><?php echo $p->member_nama ?></small>
                      </a>
                    </td>
                    <td>
                      <div class="badge badge-info"><?php echo $p->posting_dibaca ?></div>
                    </td>
                    <td>
                      <div class="badge badge-info">
                      <?php echo $jumkomen; ?>
                      </div>
                    </td>
                  </tr>
                <? endforeach; ?>
              </tbody>
            </table>
            </div>
            <hr/>

          
        </div>
      </div>

    </div>

    <?php echo view('sidebar'); ?>

  </div>
</div>

<?php echo view('footer'); ?>
