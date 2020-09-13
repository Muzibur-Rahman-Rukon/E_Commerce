<div class="container">
	<div class="row">
		<div class="col-lg-12">
			
			<table class="table">
    <thead>
      <tr>
        
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Time</th>
        <th>Un/Seen</th>
        <th>Delivery Status</th>
        <th>Customer Detail's</th>
        
      </tr>
    </thead>
    <tbody>
        
    	<?php if ($customerOrder) {
				foreach ($customerOrder as $p) {
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
        <td><?php if ($p->seen_unseen=='0') {
         ?>
         <a href="<?php echo base_url('admin/changeSeenStatus/'.$p->id) ?>"><button class="btn btn-info">Unseen</button></a>
           <?php }else{ ?>
            <span style="color:green">Seen</span>
           <?php } ?>
         </td>
        <td>

            <?php 
            if ($p->payment_status=='1') {
                # code...
            
            if ($p->delivery_status=='0') {
         ?>
         <a href="<?php echo base_url('admin/changeDeliveryStatus/'.$p->id) ?>"><button class="btn btn-primary">Delivery Incomplete</button></a>
         	<?php } else{

         	 ?>
         	 <span style="color:green">Delivery Complete</span>
         	 <a href="<?php echo base_url('admin/deleteCOrder/'.$p->id) ?>"><button class="btn btn-danger">Delete</button></a>
         	<?php }
            }else{

             ?>
            <a href="<?php echo base_url('admin/changePaymentStatus/'.$p->id) ?>"><button class="btn btn-primary">Payment Incomplete</button></a>
        <?php } ?>
         </td>
        <?php 
        $d=$this->modAdmin->fetchCustomerInfoById($p->customer_id);

         ?>
        <td>
            <?php 
                 if ($d->id) {
                     # code...
                 
             ?>
            
                      <a href="<?php echo base_url('admin/viewCustomerDetails/'.$d->id) ?>"><button class="btn btn-primary">view</button></a>
                  <?php } ?>
         </td>

         
      </tr>
      <?php }
} ?>
     
    </tbody>
  </table>

		</div>
	</div>
</div>