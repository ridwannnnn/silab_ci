<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
				<img src="<?php echo base_url('assets/upload/images/foto_profil/'.$this->session->userdata('photo')); ?>" class="img-circle">
			</div>
      <div class="pull-left info">
        <p>Admin</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">SLIDEBAR MENU ADMIN</li>
      <!-- Optionally, you can add icons to the links -->
      <?php if($this->uri->segment('2') == 'home'){ ?>
      <li class="active"><a href="<?php echo base_url('admin/home'); ?>"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
      <?php } else{ ?>
      <li><a href="<?php echo base_url('admin/home'); ?>"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
      <?php } ?>

      <?php if($this->uri->segment('2') == 'dataalat'){ ?>
      <li class="active"><a href="<?php echo base_url('admin/dataalat'); ?>"><i class="fa fa-link"></i> <span>Data Alat</span></a></li>
      <?php } else{ ?>
      <li><a href="<?php echo base_url('admin/dataalat'); ?>"><i class="fa fa-link"></i> <span>Data Alat</span></a></li>
      <?php } ?>
      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Master Peminjaman</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="#">Data Peminjaman</a></li>
          <li><a href="#">Data Pengembalian</a></li>
        </ul>
      </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
