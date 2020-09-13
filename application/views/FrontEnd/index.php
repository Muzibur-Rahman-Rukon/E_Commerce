   <style type="text/css">
 

   </style>
    <div class="site-section" id="products-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-6 text-center">
            <h3 class="section-sub-title">Popular Products</h3>
            <h2 class="section-title mb-3">Our Products</h2>
            <p>We Deliver Best Product of Electronics,Also Produce All Excellent Brand. Popular and Beautiful Produce deliver on every Product.</p>
          </div>
        </div>
        <div class="row">
          <?php if ($allProduct) {
              foreach ($allProduct as $row){
                if ($row->P_stock>0) {
                  # code...
                
             ?>

          <div class="col-lg-4 col-md-6 mb-5">
            
            <div class="product-item item col4">
              <figure>
                <img  style="height:250px" src="<?php echo base_url('assets/img/'.$row->p_img) ?>"alt="Image" class="img-fluid">
               </figure>
              <div class="px-4">
                <h3>
                  <a href="#"><?php echo $row->p_brand ?></a><br>
                  <a href="#"><?php echo $row->p_model ?></a>
                </h3>
                <div>
                  <?php 
 if ($row->P_stock>0) {
   # code...
 
                   ?>
                  <a href="<?php if($this->session->userdata('id')){
        echo site_url('home/addToCart/'.$row->p_id."/".$row->p_brand."/".$row->p_img."/".$row->price."/".$row->p_model);
      } else{
        echo site_url('home/signin');
      } ?>" class="btn btn-black mr-1 rounded-0">Cart</a>
    <?php }else{ ?>
      <a class="btn btn-black mr-1 rounded-0" href="">Out Of Stock</a>
    <?php } ?>
                  <a href="<?php if($this->session->userdata('id')){
                    echo site_url('home/viewProduct/'.$row->p_id);
                  } else{
                    echo site_url('home/viewProduct/'.$row->p_id);
                  } 
                   ?>" class="btn btn-black btn-outline-black ml-1 rounded-0">View</a>
                 
                </div>
              </div>
            </div>
          </div>
         <?php }
       }foreach ($allProduct as $row){
                if ($row->P_stock>0) {
                  # code...
                
             ?>

          <div class="col-lg-4 col-md-6 mb-5">
            
            <div class="product-item item col4">
              <figure>
                <img  style="height:250px" src="<?php echo base_url('assets/img/'.$row->p_img) ?>"alt="Image" class="img-fluid">
               </figure>
              <div class="px-4">
                <h3>
                  <a href="#"><?php echo $row->p_brand ?></a><br>
                  <a href="#"><?php echo $row->p_model ?></a>
                </h3>
                <div>
                  <?php 
 if ($row->P_stock<0) {
   # code...
 
                   ?>
                  <a href="<?php if($this->session->userdata('id')){
        echo site_url('home/addToCart/'.$row->p_id."/".$row->p_brand."/".$row->p_img."/".$row->price."/".$row->p_model);
      } else{
        echo site_url('home/signin');
      } ?>" class="btn btn-black mr-1 rounded-0">Cart</a>
    <?php }else{ ?>
      <a class="btn btn-black mr-1 rounded-0" href="">Out Of Stock</a>
    <?php } ?>
                  <a href="<?php if($this->session->userdata('id')){
                    echo site_url('home/viewProduct/'.$row->p_id);
                  } else{
                    echo site_url('home/viewProduct/'.$row->p_id);
                  } 
                   ?>" class="btn btn-black btn-outline-black ml-1 rounded-0">View</a>
                 
                </div>
              </div>
            </div>
          </div>
         <?php }
       } 
         } else{ ?>
          <div class="col-lg-12">
            <center>
              <h2 style="color:red">
                Insufficient Stock
              </h2>
            </center>
          </div>
         <?php } ?>

  

 


          
        </div>
      </div>
    </div>
    <div style="margin-top: 10%;margin-left: 50%">
  <center>
    
     <p class="uk-text-primary"><?php echo $links; ?></p>
   </center>
 </div>
    