<br>
<br>
<br>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
            <center>
              <h2 style="color:red;margin-bottom: 15px;margin-top: 25px">
                See Our Office On Google Map
              </h2>
            </center>
          </div>
          <div class="col-lg-12">
          	<!-- New York, NY, USA (40.7127837, -74.00594130000002) -->
<iframe src="https://maps.google.com/maps?q=24.886436, 91.880722&z=15&output=embed" width="100%" height="350" frameborder="0" style="border:0"></iframe>
          </div>
          <div class="col-lg-12">
          	<h2 style="font-weight: bold;color: green">Send Message</h2>
          	      <?php if ($this->session->flashdata('class')): ?>
        <div class="alert <?php echo $this->session->flashdata('class') ?> alert-dismissible" role="alert">

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>

  </button>
  <?php echo $this->session->flashdata('msg'); ?>
  
    
</div>
              
            <?php endif; ?>
          </div>
          <div class="col-lg-12">
          	<form method="post" action="<?php if($this->session->userdata('id')){
          		echo base_url('home/sendMessage');
          	}else{
          		echo base_url('home/signin');
          	} ?>">
          		<div class="form-group">
          			<textarea name="message" placeholder="Type Your Message" rows="4" cols="50"></textarea>
          		</div>
          		<input type="hidden" name="sender_id" value="<?php echo $this->session->userdata('id') ?>">
          		<input type="hidden" name="sender_name" value="<?php echo $this->session->userdata('username') ?>">
          		<input class="btn btn-info" type="submit" name="submit" value="submit">
          	</form>
          </div>
	</div>
</div>