<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Admin</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

    </nav>
  </header>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
<ul class="sidebar-menu" data-widget="tree">

<!-- <li><a href=""><i class="fa fa-id-badge" aria-hidden="true"></i> <span>Set Default ID</span></a></li>
 <li><a href="package.php"><i class="fa fa-crosshairs" aria-hidden="true"></i> <span>Package Management</span></a></li> -->
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users" aria-hidden="true"></i>
            <span>User Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li><a href="adduser.php"><i class="fa fa-circle-o"></i> <span>Add User</span></a></li>
            <li><a href="viewuser.php"><i class="fa fa-circle-o"></i> <span> View all User</span></a></li>
            <li><a href="blockeduser.php"><i class="fa fa-circle-o"></i> <span>View Block User</span></a></li>
           
          </ul>
        </li>
       <li class="treeview">
          <a href="#">
           <i class="fa fa-money" aria-hidden="true"></i>
            <span>Donations</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li><a href="donations.php"><i class="fa fa-circle-o"></i>All Donations</a></li>
            
          </ul>
        </li>




        <li><a href="support.php"><i class="fa fa-handshake-o" aria-hidden="true"></i> <span>Support</span></a></li>
        <li><a href="news.php"><i class="fa fa-newspaper-o" aria-hidden="true"></i> <span>News and Events</span></a></li>
         <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> <span>Logout</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>