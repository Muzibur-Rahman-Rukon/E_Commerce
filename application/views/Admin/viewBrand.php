<div class="content-wrapper">
	<div class="row padtop">
		
		<div class="col-md-6 col-md-offset-3" style="margin-left: 100px">
			<h2>View Brand</h2>
			<div class="error"> </div>
			<?php if ($this->session->flashdata('class')): ?>
        <div class="alert <?php echo $this->session->flashdata('class') ?> alert-dismissible" role="alert">

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>

  </button>
  <?php echo $this->session->flashdata('message'); ?>
  
    
</div>
              
            <?php endif; ?>
			<?php if ($allCategory): 
			$i=1;  ?>
				<table class="table table-dashed">
					<tr>
						<th>No.</th>
						<th>Category Name</th>
						<th colspan="2"><center>Action</center></th>
					</tr>
				<?php foreach ($allCategory as $p): ?>
					<tr class="ccat<?php echo $p->brand_id ?>">
						<td><?php echo $i++;  ?></td>
						<td><?php echo $p->brand_name ?></td>
						<?php 
                if ($this->session->userdata('id')=='1') {
                	# code...
                
						 ?>
						<td><a href="<?php echo site_url('admin/editBrand/'.$p->brand_id) ?>" class="btn btn-info">Edit</a></td>
						<td><a href="<?php echo site_url('admin/deleteBrand/'.$p->brand_id) ?>" class="btn btn-danger" onclick="myFunction()">Delete</a></td>
					<?php } ?>
					</tr>
				<?php endforeach; ?>
				</table>
				
			<?php else: ?>
				Brand are not available
			<?php endif; ?>

		</div>
	</div>
</div>