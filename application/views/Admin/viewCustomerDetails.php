<div class="container">
  <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-5" style="box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);">
      <div style="margin-top: 10%;margin-left: 20%">
  <?php 
        if ($allCustomer) {
          foreach ($allCustomer as $row) {
            # code...
          
   ?>
   <h2>Customer Detail's</h2><hr>
   <h4> Name: <?php echo $row->username ?></h4>
   <h4> Mobile Number: <?php echo $row->mobaile_number ?></h4>
   <h4> Address: <?php echo $row->address ?></h4>
   <h4> Email: <?php echo $row->email ?></h4>
   <?php 
       }
        }
    ?>
</div>
    </div>
    <div class="col-lg-4"></div>
  </div>
 
</div>