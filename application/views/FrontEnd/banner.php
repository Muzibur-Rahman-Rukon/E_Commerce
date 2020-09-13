
<br>
<br>
<br>
  
<div class="container">
                        <div id="order_modal" class="modal fade" role="dialog">


<!-- start of order confirm modal -->
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4>Congratulations!</h4>
      </div>
      <div class="modal-body">
        <p> <?php  
          if($this->session->flashdata('order')){ echo $this->session->flashdata('order'); }
          ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  <div class="row">
    <div class="col-lg-2">
      <br>
            <br>
            <br>
      <center><h2 style="color:black;font-weight: bold;color:#f16821">Product</h2></center>
      <ul class="list-group">
        <?php 
             if ($allCategory) {
              foreach ($allCategory as $p) {
               
         ?>
  <li class="list-group-item"><a style="color:#f16821" href="<?php echo site_url('home/showCategoryById/'.$p->cat_id) ?>"><?php echo $p->cat_name ?></a></li>
  <?php }
  } ?>
</ul>
    </div>
    <div class="col-lg-8">
          <div id="carousel" class="carousel slide" data-ride="carousel">
      
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="d-none d-lg-block">
            <br>
            <br>
            <br>
            <br>
            <div class="slide-box">
              <img class="contain image" width="20%" src="<?php echo base_url('assets/img/banner1.png') ?>" alt="First slide">
              <img width="20%" src="<?php echo base_url('assets/img/banner2.jpeg') ?>">
              <img width="20%" src="<?php echo base_url('assets/img/banner3.jpg') ?>" alt="First slide">
              <img width="10%" src="<?php echo base_url('assets/img/banner4.png') ?>" alt="First slide">
            </div>
          </div>
        </div>
  
      </div>
     
    </div>
    </div>
    <div class="col-lg-2">

            <br>
            <br>
            <br>
      <center><h2 style="color:black;font-weight: bold;color: #f16821">Brand</h2></center>
      <ul class="list-group">
        <?php 
        if ($allBrand) {
               foreach ($allBrand as $p) { 
         ?>
  <li class="list-group-item"><a style="color:#f16821" href="<?php echo site_url('home/showBrandById/'.$p->brand_id) ?>"><?php echo $p->brand_name ?></a></li>
<?php }
} ?>
  
</ul>
    </div>


  </div>

</div>
<style type="text/css">
  body {
    padding-top: 20px;
}

.carousel {
  width: 100%;
}

.slide-box {
  display: flex;
  justify-content: space-between;
}

@media () and () {
  .slide-box img {
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
  }
}

@media () and () {
  .slide-box img {
    -ms-flex: 0 0 33.3333%;
    flex: 0 0 33.3333%;
    max-width: 33.3333%;
  }
}

@media ()
{
  .slide-box img {
    -ms-flex: 0 0 25%;
    flex: 0 0 25%;
    height: 300px
  }
}

.carousel-caption {
  background-color: rgba(0, 0, 0, 0.5);
  padding: 20px;
  border-radius: .5rem;
}
.contain {
  position: relative;
 
}

.image {
  opacity: 1;
  display: block;transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.contain:hover .image {
  opacity: 0.3;
}

.contain:hover .middle {
  opacity: 1;
}

.text {
  background-color: #4CAF50;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}

</style>
<script>

// This would automatically run when page loads.

$( document ).ready(function() {

$("#MyModal").modal('show');

});

</script>
