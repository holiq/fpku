    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="navbar-brand mr-1 py-2 text-white text-center" href="<?php echo base_url('admin') ?>">Holiq</a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php echo $uri->getSegment(2) === '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo base_url('admin') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item <?php echo $uri->getSegment(2) ===  'user' ? 'active': '' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>User</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu User:</h6>
            <a class="collapse-item" href="<?= base_url('admin/user/tambah') ?>">Tambah User</a>
            <a class="collapse-item" href="<?= base_url('admin/user') ?>">List User</a>
          </div>
        </div>
      </li>
      <li class="nav-item <?php echo $uri->getSegment(2) === 'posting' ? 'active': '' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-chair"></i>
          <span>Posting</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu Posting:</h6>
            <a class="collapse-item" href="<?= base_url('admin/posting/tambah') ?>">Tambah Posting</a>
            <a class="collapse-item" href="<?= base_url('admin/posting') ?>">List Posting</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider d-none d-md-block">
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>