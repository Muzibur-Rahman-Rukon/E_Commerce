
  
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html">Admin Panel</a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?php echo base_url('assets/Admin/Special/images/logo.png'); ?>" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="ti-view-list"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="ti-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown mr-1">
            <a  href="<?php echo base_url('admin/customerMessage') ?>" >
              <i style="font-size: 20px" class="ti-email mx-0"></i>
            </a>

          </li>
 <li class="nav-item dropdown mr-1">
            <a  href="<?php echo base_url('admin/customerOrder') ?>" >
              <i style="font-size: 20px" class="ti-bell mx-0">
                <?php 
  $chkUnSeenOrder=$this->modAdmin->chkUnSeenOrder();
                 ?>
                 <span style="margin-left: -45%;color:red"><?php echo count($chkUnSeenOrder); ?></span>
              </i>
            </a>

          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="<?php echo base_url('assets/Admin/Special/images/logo.png'); ?>" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              
              <a class="dropdown-item" href="<?php echo base_url('Admin/logout') ?>">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="ti-view-list"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/customerOrder') ?>">
              <i class="ti-write menu-icon"></i>
              <span class="menu-title">Customer Order</span>
            </a>
          </li>
         <?php 
    if ($this->session->userdata('id')=='1') {
      # code...
    
          ?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title">User</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/addUser') ?>">Add User</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/viewUser') ?>">View User</a></li>
                
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/addUserType') ?>">Add User Type</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/viewUserType') ?>">User Type</a></li>
                
              </ul>
            </div>
          </li>
      
         <?php } ?>

          
          
          
         
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="ti-folder menu-icon"></i>
              <span class="menu-title">Category</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <?php 
   if ($this->session->userdata('id')=='1') {
     # code...
   
                 ?>

                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/addCategory') ?>">Add Category</a></li>
             <?php } ?>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/viewCategory') ?>">View Category</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="ti-folder menu-icon"></i>
              <span class="menu-title">Brand</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                
<?php 
     if ($this->session->userdata('id')=='1') {
       # code...
     
 ?>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/addBrand') ?>">Add Brand</a></li>
             <?php } ?>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/viewBrand') ?>">View Brand</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="ti-folder menu-icon"></i>
              <span class="menu-title">Product</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                

                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/addProduct') ?>">Add Product</a></li>
             
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/viewProduct') ?>">View Product</a></li>
              </ul>
            </div>
          </li>
          
          
        </ul>
      </nav>






