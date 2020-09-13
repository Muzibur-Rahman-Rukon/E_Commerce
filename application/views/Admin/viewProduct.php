<div class="content-wrapper">
	<div class="row padtop">
		
		<div class="col-md-6 col-md-offset-3" style="margin-left: 0px">
			<h2>All Product</h2>
			<div class="error"> </div>
			<?php if ($this->session->flashdata('class')): ?>
        <div class="alert <?php echo $this->session->flashdata('class') ?> alert-dismissible" role="alert">

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>

  </button>
  <?php echo $this->session->flashdata('message'); ?>
  
    
</div>
              
            <?php endif; ?>
			<?php if ($allProduct):  ?>
				<table class="table table-dashed">
					
					<th>Product Model</th>
					
					<th>Brand</th>
					
					<th>Stock</th>
					<th>Image</th>
					<th colspan="4"><center>Action</center></th>
				<?php foreach ($allProduct as $panel): ?>
					<tr class="ccat<?php echo $panel->p_id ?>">
						<?php 
                        
                        $post_title = $panel->p_title;
                         $post_title = word_limiter($post_title, 2);

						 ?>
					
						<td><?php echo $panel->p_model  ?></td>
						
						<td><?php echo $panel->p_brand ?></td>
						<?php 
                        
                        $p_details = $panel->p_details;
                         $p_details = word_limiter($p_details, 3);

						 ?>
						
						
						<td><?php if ($panel->P_stock<5) {
							# code...
						 ?>
						 	<span style="color: red;font-weight: bold"> <?php echo $panel->P_stock; ?></span>
						 <?php }else{ ?>
						 	<?php echo $panel->P_stock; ?>
						 <?php } ?>
						 </td>
						<!-- <td><?php echo $panel->post_body ?></td> -->

						<td><img  src="<?php echo base_url('assets/img/'.$panel->p_img) ?>" ></td>
						 <td><a href="<?php echo site_url('admin/editProduct/'.$panel->p_id) ?>" class="btn btn-primary">Edit</a></td>
						<td><a href="<?php echo site_url('admin/deleteProduct/'.$panel->p_id) ?>" class="btn btn-danger" onclick="myFunction()">Delete</a></td>
						<td><a href="<?php echo site_url('admin/viewproductbyid/'.$panel->p_id); ?>" class="btn btn-info">View Details</a></td>
						<?php if ($panel->P_stock<5) {
							# code...
						 ?>
						 
						 <td><a href="<?php echo site_url('admin/editProduct/'.$panel->p_id) ?>" class="btn btn-success">Enrich Stock</a></td>
						<?php } ?>
					</tr>
				<?php endforeach; ?>
				</table>
				
			<?php else: ?>
				Panel are not available
			<?php endif; ?>

		</div>
	</div>
</div>