<?php echo view('head'); ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-9">
      <div class="card">
        <div class="card-body">
          <?php $session = \Config\Services::session();
          if($session->getFlashdata('sukses')) { ?>
         <div class="alert alert-success">
           <?php echo $session->getFlashdata('sukses'); ?>
         </div>
          <?php } ?>
          <?php
          if($uri->getSegment(1) === 'cari'){
            $cari = htmlspecialchars($uri->getSegment(2));
            echo "<br>Diskusi yang dicari : <b>$cari</b>";
          }
          if($uri->getSegment(1) === 'urutan'){
            $urutan = htmlspecialchars($uri->getSegment(2));
            echo "<br>Diurutkan : <b>$urutan</b>";
          }
          ?>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <th class="text-nowrap">Judul</th>
                <th class="text-nowrap">User</th>
                <th><i class="fa fa-eye"></i></th>
                <th><i class="fa fa-comment"></i></th>
              </thead>
              <tbody>
                <?php
                foreach($posting as $p):
                  $judl = $p['judul'];
                  if(strlen($judl) > 20):
                    $judul = substr($judl, 0, 20)."...";
                  else:
                    $judul = $judl;
                  endif;
                  ?>
                  <tr>
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
                    <td>
                      <div class="badge badge-info">
                        <?= $jumkomen ?>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <hr/>
        </div>
      </div>
    </div>
    <?php echo view('sidebar'); ?>
    <?php echo view('modalLogout'); ?>
  </div>
</div>
<?php echo view('footer.php'); ?>
