<?php echo view('head'); ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h6 class="m-0">Semua Member</h6>
        </div>
        <div class="card-body">
          <div class="row">
            <?php
            foreach($list as $m):
            ?>
            <div class="col-md-4 mb-3">
              <div class="member">
                <div class="card bg-primary">
                    <div class="row">
                      <div class="col-md-4">
                      <?php
                      if($m->user_gambar == ""):
                      ?>
                      <img class="img-fluid rounded shadow" style="" src="/gambar/sistem/member.png">
                      <?php else: ?>
                      <img class="img-fluid rounded shadow" style="" src="/gambar/member/<?php echo $m->user_gambar ?>">
                      <?php endif; ?>
                    </div>
                    <div class="col-md-8 pt-1">
                      <a href="/detail"><h5><b><?php echo $m->user_name; ?></b></h5></a>
                      <p>
                        <i class='fas fa-id-card-alt'> <strong> User status</strong></i>
                        <br/>
                       <?php echo $m->user_status; ?>
                      </p>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <?php echo view('modalLogout'); ?>
  </div>
</div>
<?php echo view('footer.php'); ?>
