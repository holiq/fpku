<!DOCTYPE html>
<html lang="en">
<head>
  <?= csrf_meta(); ?>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="icon.png">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Library summernote bserta jquery, misal tidak ingin memakai libray bisa download source code summernite
   tingga panggil nanti di path foldernya -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link type="text/css" href="<?= base_url('assets_forum/css/argon.css') ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets_forum/summernote2/summernote.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets_forum/summernote2/summernote.js') ?>">
  <link rel="stylesheet" href="<?= base_url('assets_forum/vendor/font-awesome/css/all.min.css') ?>">
  <link type="text/css" href="<?= base_url('assets_forum/css/setting.css') ?>" rel="stylesheet">
  <title><?= $title ?></title>
</head>
<body class="bg-secondary">
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-default mb-4">
      <div class="container-fluid">
        <div class="row">
          <img src="logo.png" height="30px">
          <a class="navbar-brand float-right ml-3" href="/" style="font-size: 15pt;">SHARK BIO ARCHIVE</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-default">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-6 collapse-brand">
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <ul class="navbar-nav ml-lg-auto">
            <li class="nav-item">
              <a class="nav-link p-1 nav-link-icon" style="font-size:11pt;font-weight:bold" href="/bio">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-1 nav-link-icon" style="font-size:11pt;font-weight:bold" href="/list_member">USERS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-1 nav-link-icon" style="font-size:11pt;font-weight:bold" href="/jobs">
                JOBS
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-1 nav-link-icon" style="font-size:11pt;font-weight:bold" href="/products">PRODUCTS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-1 nav-link-icon" style="font-size:11pt;font-weight:bold" href="/contact">CONTACT US</a>
            </li>
            <?php if(!empty($status)): ?>
            <li class="nav-item dropdown">
              <a class="nav-link nav-link-icon" href="#" style="padding:7px;font-size:10pt;font-weight:bold" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php if( $status[0]['user_gambar'] == ""): ?>
                <img class="img-fluid rounded-circle shadow" style="width: 22px;height: 22px" src="/gambar/sistem/member.png">
                <?php else: ?>
                <img class="img-fluid rounded-circle shadow" style="width: 22px;height: 22px" src="/gambar/member/<?php echo $status[0]['user_gambar'] ?>">
                <?php endif; ?>
                &nbsp;
                <?php echo $status[0]['user_name'] ?>
                <i class="fa fa-caret-down"></i>
                <span class="nav-link-inner--text d-lg-none">Settings</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                <a class="dropdown-item" href="/member">Dashboard</a>
                <a class="dropdown-item" href="/member/profile">Profil</a>
                <a class="dropdown-item" href="/member/password">Ganti Password</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/keluar" data-toggle="modal" data-target="#logout">Logout</a>
              </div>
            </li>
            <?php else: ?>
              <li class="nav-item">
                <a class="btn btn-success btn-sm " style="padding:7px;font-size:10pt;font-weight:bold" href="/masuk">&nbsp;
                  <i class="fa fa-sign-in-alt"></i> &nbsp;LOGIN&nbsp;
                </a>
                <a class="btn btn-primary btn-sm float-right" style="padding:7px;font-size:10pt;font-weight:bold" href="/daftar">&nbsp;
                  <i class="fa fa-sign-out-alt"></i>&nbsp;DAFTAR&nbsp;
                </a>
              </li>
          </ul>
        </div>
      </div>
        <?php endif; ?>
    </nav>
    <div class="container-fluid mb-2">
      <div class="row">
        <div class="col-lg-12">
          <div class="form-group">
            <div class="input-group input-group-alternative mb-4">
              <input class="form-control" name="cari" placeholder="Cari diskusi di sini .." type="text">
                <div class="input-group-append">
                  <span class="input-group-text"><i class="fa fa-search"></i></span>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </header>
