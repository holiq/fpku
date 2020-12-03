      <div class="col-md-3">
        <div class="card profile mb-3">
          <div class="card-body">
          <? foreach($status as $m):
            if($m->member_foto == ""): ?>
            <img class="img-profile" src="/gambar/sistem/member.png">
            <? else: ?>
            <img class="img-profile" src="/gambar/member/<?= $m->member_foto ?>">
            <? endif; ?>
            <h3 class="font-weight-bold text-center mt-2"><?= $m->member_nama ?></h3>
            <h5 class="text-muted text-center"><?= $m->member_email ?></h5>
            <h6 class="text-muted text-center"><?= $m->member_bio ?></h6>
            <hr/>
            <div class="form-gorup">
              <h5><a class="text-light d-block <?php echo $uri->getSegment(2) === '' ? 'active': '' ?>" href="/member"><i class="fa fa-home"></i> Dashboard <i class="fas fa-angle-right float-right"></i></a></h5>
            </div>
            <div class="form-gorup">
              <h5><a class="text-light d-block <?php echo $uri->getSegment(2) === 'profile' ? 'active': '' ?>" href="/member/profile"><i class="fa fa-user"></i> Profile <i class="fas fa-angle-right float-right"></i></a></h5>
            </div>
            <div class="form-gorup">
              <h5><a class="text-light d-block <?php echo $uri->getSegment(2) === 'password' ? 'active': '' ?>" href="/member/password"><i class="fa fa-lock"></i> Password <i class="fas fa-angle-right float-right"></i></a></h5>
            </div>
            <div class="form-gorup">
              <h5><a class="text-light d-block" href="#" data-toggle="modal" data-target="#logout"><i class="fas fa-sign-out-alt"></i> Logout <i class="fas fa-angle-right float-right"></i></a></h5>
            </div>
          <? endforeach; ?>
          </div>
        </div>
      </div>
      