<br>
<br>
<section id="cart_items">
    <div class="container">
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">BKash Payment System</h4>
        </div>
        <div class="modal-body">
          <p>Personal Number:01748613498(Send Money)</p>
          <p>-Type Your User Name And Mobaile Number in Refference</p>
          <p>-Untill Payment Clear,Booking will be on pending</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
      <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li class="active">Shopping Cart</li>
        </ol>
      </div>
      <div class="col-lg-12">
        <center>
          <?php if ($this->session->flashdata('class')): ?>
        <div class="alert <?php echo $this->session->flashdata('class') ?> alert-dismissible" role="alert">

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>

  </button>
  <?php echo $this->session->flashdata('message'); ?>
  
    
</div>
              
            <?php endif; ?>
        </center>
      </div>
      <div class="table-responsive cart_info">
        <?php  if ($allOrder) { ?>
        <table class="table table-condensed">
          <thead>
            <tr class="cart_menu">
            
             <td style="color:#f16821">Product Name</td>
              <td class="price" style="color:#f16821">Price</td>
              <td class="quantity" style="color:#f16821">Quantity</td>
              <!-- <td class="quantity" style="color:#f16821">Payment Method</td> -->
              <td class="total" style="color:#f16821">Total</td>
              <td></td>
            </tr>
          </thead>
          <tbody>
            <?php 
                
                  $grandTotal=0;
                
            ?>

            <?php foreach ($allOrder as $p){ ?>

            <tr>
              <td style="color:black"><?php echo $p->product_name ?></td>
              
              <td class="cart_price" style="color:black">
                ৳<?php echo $p->price ?>
              </td>
              <td class="cart_quantity">
                <div class="cart_quantity_button">
                  <form method="post" action="<?php echo base_url('home/cartUpdate') ?>">
                    <input style="width: 50px" type="number" name="qty" value="<?php echo $p->quantity ?>" >
                    <input type="hidden" name="id" value="<?php echo $p->id ?>">
                    <!-- <select  id="myselect" name="payment_methood">
        <option value="1" selected>Cash</option>
        <option value="2">BKash</option>
      </select> -->
                    <input type="hidden" name="product_id" value="<?php echo $p->product_id ?>">

                    <input type="submit" name="submit" value="Update">
                    <td style="height: 200px">
    
      
   
      </td>
                  </form>
                </div>
              </td>
              <?php 
              $totalPrice=$p->price * $p->quantity;
              $grandTotal=$grandTotal+$totalPrice

               ?>
              <td class="cart_total" style="color:black">
                <p class="cart_total_price">৳ <?php echo $totalPrice ?></p>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="<?php echo base_url('home/deleteCartById/'.$p->id)?>"><i class="fa fa-times"></i></a>
              </td>
            </tr>
            <?php }
             ?>
<span style="margin-left: 75%;color: black">Grand Total = <span style="color:#f16821;font-weight: bold"><?php echo $grandTotal ?></span></span>

          </tbody>

        </table>
        <?php }else{ ?>
          <div class="col-lg-12">
            <center>
              <h2 style="color:red;margin-bottom: 150px;margin-top: 200px">
                You Have n't any product in your cart
              </h2>
            </center>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <section id="do_action">
    <div class="container">
      <?php  if ($allOrder) { ?>
      <div class="heading" style="background-color: #4CAF50;">
        <center><span style="color: white;font-weight: bold;font-size: 25px">Do Your Want to Buy ?</span></center>
      </div>
      <br>

      <div class="row">
        <div class="col-sm-6">
          
        <span style="margin-left: 45%"><a href="<?php echo base_url('home/choosePaymentMethood/'.$p->customer_id) ?>"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Yes</button></a></span>
        </div>
        <div class="col-sm-6">
          <span style="margin-left: 55%"><a href=""><button class="btn btn-danger">No</button></a></span>
        </div>
      </div>
    <?php } ?>
    </div>
  </section><!--/#do_action-->
  