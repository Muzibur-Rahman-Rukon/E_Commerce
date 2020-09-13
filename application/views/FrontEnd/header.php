<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Selling &mdash; Website by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/icomoon/style.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.theme.default.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.theme.default.min.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.fancybox.min.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datepicker.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/flaticon/font/flaticon.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/aos.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Admin/Special/fonts/font-awesome-4.7.0/css/font-awesome.css') ?>">
    <!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.1/dist/css/uikit.min.css" />

<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.3.1/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.3.1/dist/js/uikit-icons.min.js"></script>
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  	  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    <div class="top-bar py-3 bg-light" id="home-section">
      <div class="container">
        <div class="row align-items-center">
         
          <div class="col-6 text-left">
            <ul class="social-media">
              <li><a href="https://web.facebook.com/universelconstant.mahedi" class=""><span class="icon-facebook"></span></a></li>
              <li><a href="https://web.facebook.com/universelconstant.mahedi" class=""><span class="icon-twitter"></span></a></li>
              <li><a href="https://web.facebook.com/universelconstant.mahedi" class=""><span class="icon-instagram"></span></a></li>
              <li><a href="https://web.facebook.com/universelconstant.mahedi" class=""><span class="icon-linkedin"></span></a></li>
            </ul>
          </div>
          <div class="col-6">
            <p class="mb-0 float-right">
              <span class="mr-3"><a href="tel://#"> <span class="icon-phone mr-2" style="position: relative; top: 2px;"></span><span class="d-none d-lg-inline-block text-black">(+880) 17 3859 7697</span></a></span>
              <span><a href="#"><span class="icon-envelope mr-2" style="position: relative; top: 2px;"></span><span class="d-none d-lg-inline-block text-black">moonmumu27@gmail.com</span></a></span>
            </p>
            
          </div>
        </div>
      </div> 
    </div>

    <header class="site-navbar py-4 bg-white js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h2 class="mb-0 site-logo"><a href="<?php echo base_url('home/index') ?>" class="text-black mb-0">E Bazar<span class="text-primary">.</span> </a></h2>
          </div>
          
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="<?php echo base_url('home/index') ?>" class="nav-link">Home</a></li>
                <li>
            <a href="#">Products &#9662;</a>
            <ul class="dropdown">
              <?php if ($allCategory) {
               foreach ($allCategory as $p) {
              
               
                ?>
                <li><a href="<?php echo site_url('home/showCategoryById/'.$p->cat_id) ?>"><?php echo $p->cat_name ?></a></li>
                <?php }
                } ?>
            </ul>
        </li>
                <li>
            <a href="#">Brand &#9662;</a>
            <ul class="dropdown">
              <?php if ($allBrand) {
               foreach ($allBrand as $p) {
              
               
                ?>
                <li><a href="<?php echo site_url('home/showBrandById/'.$p->brand_id) ?>"><?php echo $p->brand_name ?></a></li>
                <?php }
                } ?>
            </ul>
        </li>
        <?php if ($this->session->userdata('id')) {
          # code...
         ?>
         <li><a href="<?php echo base_url('home/contact') ?>" class="nav-link">Contact</a></li>
         
         <li>
            <a href="#"><i style="font-size: 20px" class="fa fa-user-circle"></i> &#9662;</a>
            <ul class="dropdown">
                <li><a href="<?php echo site_url('home/userOrder') ?>">Order</a></li>
                <li><a href="<?php echo site_url('home/profile') ?>">Profile</a></li>
                <li><a href="<?php echo site_url('home/logout') ?>">Logout</a></li>
                
            </ul>
        </li>
       <?php } else{ ?>
                <li><a href="<?php echo base_url('home/signin') ?>" class="nav-link">Signin</a></li>
                
                
                <li><a href="<?php echo base_url('home/contact') ?>" class="nav-link">Contact</a></li>
              <?php } ?>
              <a href="<?php echo base_url('home/cart') ?>">
                <span class="fa-stack fa-2x has-badge" data-count="<?php 
                if($this->session->userdata('id')){
                  $count=$this->modUser->countNumberOfOrder();
                  echo $count->num_rows();
                }

                 ?>">
  <i class="fa fa-circle fa-stack-2x"></i>
  <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
</span>
</a>
              </ul>
            </nav>
          </div>

          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>
  <style type="text/css">
    ul li ul.dropdown{
         /* Set width of the dropdown */
        background: #f2f2f2;
        display: none;
        position: absolute;
        z-index: 999;
        
    }
    ul li:hover ul.dropdown{
        display: block; /* Display the dropdown */
       
    }
    ul li ul.dropdown li{
        display: block;
         margin: 10px 30px 10px 10px;
    }
    ul li ul.dropdown li a{
        color:#fd7e14;
    }
    .fa-stack[data-count]:after {
  position: absolute;
  right: 0%;
  top: 0%;
  content: attr(data-count);
  font-size: 40%;
  padding: .6em;
  border-radius: 999px;
  line-height: .75em;
  color: white;
  color: #DF0000;
  text-align: center;
  min-width: 2em;
  font-weight: bold;
  background: white;
  border-style: solid;
}

.fa-circle {
  color: #DF0000;
}

.red-cart {
  color: #DF0000;
  background: white;
}



  </style>