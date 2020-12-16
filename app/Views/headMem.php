      <div class="col-md-3">
        <div class="card profile mb-3">
          <div class="card-body">
            <?php if($status[0]['user_gambar'] == ""): ?>
            <img class="img-profile" src="/gambar/sistem/member.png">
            <?php else: ?>
            <img class="img-profile" src="/gambar/member/<?= $status[0]['user_gambar'] ?>">
            <?php  endif; ?>
            <h3 class="font-weight-bold text-center mt-2"><?= $status[0]['user_name'] ?></h3>
            <h5 class="text-muted text-center"><?= $status[0]['user_email'] ?></h5>
            <h6 class="text-muted text-center"><?= $status[0]['user_status'] ?></h6>
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
          </div>
        </div>
      </div>
