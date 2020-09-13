<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V19</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/Login_v19/images/icons/favicon.ico') ?>"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Login_v19/vendor/bootstrap/css/bootstrap.min.css') ?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Login_v19/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Login_v19/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') ?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Login_v19/vendor/animate/animate.css') ?>">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Login_v19/vendor/css-hamburgers/hamburgers.min.css') ?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Login_v19/vendor/animsition/css/animsition.min.css') ?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Login_v19/vendor/select2/select2.min.css') ?>">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Login_v19/vendor/daterangepicker/daterangepicker.css') ?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Login_v19/css/util.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Login_v19/css/main.css') ?>">
<!--===============================================================================================-->
</head>
<body><br>
        <br>
    
    <div class="limiter" style="margin-top: 5%">
        <center><h2 style="margin-bottom: 1%;color:#df0000"> Order History</h2></center>
                    <table class="table">
    <thead>
      <tr>
        
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Time</th>
        <th>Payment Status</th>
        <th>Delivery Status</th>
        
        
      </tr>
    </thead>
    <tbody>
        
        <?php if ($userOrder) {
                foreach ($userOrder as $p) {
                    # code...
                 ?>
      <tr>
        
        <?php 
                        
                        $product_name = $p->product_name;
                    $product_name = word_limiter($p->product_name, 1);

             ?>
        <td><?php echo $product_name; ?></td>
        <td><?php echo $p->quantity; ?></td>
        <td><?php echo $p->price; ?></td>
        <td><?php echo $p->time; ?></td>
        <td>
            <?php 
            if ($p->payment_status=='0') {
              # code...
            
                 if ($p->delivery_status=='0') {
                     # code...
                 
             ?>
             <span style="color: red">Payment Incomplete</span>
         <?php }
         } ?>
        </td>
        <?php if ($p->payment_status=='1') {
          # code...
        
                 
                     # code...
                 
             ?>
        
        <td><?php if ($p->delivery_status=='0') {
         ?>
         <span style="color: red">Delivery Incomplete</span>
            <?php } else{

             ?>
             <span style="color:green">Delivery Complete</span>
             
            <?php } ?>
         </td>
        <?php 
        } ?>

         
      </tr>
      <?php }
} ?>
     
    </tbody>
  </table>
    </div>
    

    
<!--===============================================================================================-->
    <script src="<?php echo base_url('assets/Login_v19/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
<!--===============================================================================================-->
    <script src="<?php echo base_url('assets/Login_v19/vendor/animsition/js/animsition.min.js') ?>"></script>
<!--===============================================================================================-->
    <script src="<?php echo base_url('assets/Login_v19/vendor/bootstrap/js/popper.js') ?>"></script>
    <script src="<?php echo base_url('assets/Login_v19/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
<!--===============================================================================================-->
    <script src="<?php echo base_url('assets/Login_v19/vendor/select2/select2.min.js') ?>"></script>
<!--===============================================================================================-->
    <script src="<?php echo base_url('assets/Login_v19/vendor/daterangepicker/moment.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/Login_v19/vendor/daterangepicker/daterangepicker.js') ?>"></script>
<!--===============================================================================================-->
    <script src="<?php echo base_url('assets/Login_v19/vendor/countdowntime/countdowntime.js') ?>"></script>
<!--===============================================================================================-->
    <script src="<?php echo base_url('assets/Login_v19/js/main.js') ?>"></script>

</body>
</html>
