<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="/vendor/almasaeed2010/adminlte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p style='padding-bottom:2px;'>
          <?php echo $this->session->nama ?>
        </p>
        <i class="fa fa-circle text-success"></i>
        <?php echo $this->session->jabatan ?>
      </div>
    </div>
    <div style=' margin:10px;'>
      <a href="/auth/logout" style='text-align:center;'><i class='fa fa-logout'></i>Signout</a>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">USERS</li>
      <li class="treeview">
        <a href="/users"><i class="fa fa-users"></i><span>Users</span></a>
      </li>
      <li class="header">SETTINGS</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-gears"></i>
          <span>Setting</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/privileges"><i class="fa fa-warning"></i> Privileges</a></li>
          <li><a href="/tech_support"><i class="fa fa-wrench"></i> Technical Support</a></li>
          <li><a href="/route_ring"><i class="fa fa-road"></i> Route & Ring Expedition</a></li>
          <li><a href="/breeder"><i class="fa fa-envira"></i> Breeder</a></li>
          <li><a href="/breeder_score"><i class="fa fa-star"></i> Breeder's Score</a></li>
          <li><a href="/contract"><i class="fa fa-money"></i> Contract Prices</a></li>
          <li><a href="/std_production"><i class="fa fa-industry"></i> Standard Production</a></li>
          <li>
            <a href="#"><i class="fa fa-truck"></i> Supplier
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
              <li><a href="/supplier"><i class="fa fa-th-list"></i> Suppliers List</a></li>
              <li><a href="/supplier_product"><i class="fa fa-archive"></i> Supplier's Products</a></li>
            </ul>
          </li>
          <li><a href="/insentif"><i class="fa fa-dollar"></i> Insentif</a></li>
          <li><a href="/buyer"><i class="fa fa-shopping-cart"></i> Buyer</a></li>
        </ul>
      </li>
      <li class="header">PRODUCTION</li>
    </ul>
    <!-- /.sidebar menu -->
  </section>
  <!-- /.sidebar -->
</aside>