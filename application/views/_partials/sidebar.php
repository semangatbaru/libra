    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/') ?>STAYl.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata("username"); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <ul class="sidebar-menu" data-widget="tree">

        <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i> 
            <span>Home</span>
            
          </a>
            
            <li><a href="<?php echo site_url('Pemesanan') ?>"> Pemesanan</a></li>
            <li><a href="<?php echo site_url('Barangmasuk') ?>"> Data Barang Masuk</a></li>
            <li><a href="<?php echo site_url('Pelanggan') ?>"> Data Pelanggan</a></li>
            <li><a href="<?php echo site_url('User') ?>"> Data User</a></li>
          </ul>
        </li>

    <ul class="sidebar-menu" data-widget="tree">        
        <li class="treeview">
          <a>
            <i class="fa fa-book"></i>
            <span>Laporan</span>

          </a>
              <li><a href="<?php echo site_url('Laporan_Pemesanan') ?>"> Pesanan </a></li>
            <li><a href="<?php echo site_url('Laporan_Transaksi') ?>"> Data Belanja </a></li>
            <li><a href="<?php echo site_url('Laporan_Debit') ?>"> Debit </a></li>
            <li><a href="<?php echo site_url('Laporan_Kredit') ?>"> Kredit </a></li>
            
          </ul>
        
        </li>
        <li >
        </li>
        <li class="header"><a href="<?php echo site_url('auth/logout'); ?>"><span class="glyphicon glyphicon-arrow-left"><span>Keluar </a>
        </li>
        

      </ul>
    </section>