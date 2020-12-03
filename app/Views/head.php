<!DOCTYPE html>
<html>
<head>
  <?= csrf_meta(); ?>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="logo2.jpeg">
  <title><?= $title ?></title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link type="text/css" href="<?= base_url('assets_forum/css/argon.css') ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets_forum/summernote2/summernote.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets_forum/vendor/font-awesome/css/all.min.css') ?>">
  <link type="text/css" href="<?= base_url('assets_forum/css/setting.css') ?>" rel="stylesheet">
</head>
<body class="bg-secondary">
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-default mb-4">
      <div class="container-fluid">
        <div class="row">
          <img src="logo3.png" height="30px">
          <a class="navbar-brand float-right ml-3" href="/" style="font-size: 13pt;">FORUM <b>SECODE</b></a>
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
              <a class="nav-link p-1 nav-link-icon" style="font-size:11pt;font-weight:bold" href="/">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-1 nav-link-icon" style="font-size:11pt;font-weight:bold" href="/list_member">MEMBER</a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-1 nav-link-icon" style="font-size:11pt;font-weight:bold" href="rules">
                RULES
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-1 nav-link-icon" style="font-size:11pt;font-weight:bold" href="/products">PRODUCTS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-1 nav-link-icon" style="font-size:11pt;font-weight:bold" href="/contact">CONTACT US</a>
            </li>
            <? if(!empty($status)): ?>
            <li class="nav-item dropdown">
              <a class="nav-link nav-link-icon" href="#" style="padding:7px;font-size:10pt;font-weight:bold" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <? if($status[0]['user_gambar'] == ""): ?>
                <img class="img-fluid rounded-circle shadow" style="width: 22px;height: 22px" src="/gambar/sistem/member.png">
                <? else: ?>
                <img class="img-fluid rounded-circle shadow" style="width: 22px;height: 22px" src="/gambar/member/<?php echo $status[0]['user_gambar'] ?>">
                <? endif; ?>
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
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logout">Logout</a>
              </div>
            </li>
            <? else: ?>
              <li class="nav-item">
                <a class="btn btn-success btn-sm " style="padding:7px;font-size:10pt;font-weight:bold" href="/masuk">&nbsp;
                  <i class="fa fa-sign-in-alt"></i> &nbsp;LOGIN&nbsp;
                </a>
                <a class="btn btn-primary btn-sm float-right" style="padding:7px;font-size:10pt;font-weight:bold" href="/daftar">&nbsp;
                  <i class="fa fa-sign-out-alt"></i>&nbsp;DAFTAR&nbsp;
                </a>
              </li>
            <? endif; ?>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid mb-2">
      <div class="row">
        <div class="col-lg-12">
          <div class="form-group">
            <form action="/cari" method="get">
              <div class="input-group input-group-alternative mb-4">
                <input class="form-control" placeholder="Cari diskusi di sini .." type="text">
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
