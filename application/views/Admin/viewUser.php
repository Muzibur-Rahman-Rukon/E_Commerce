<div class="content-wrapper">
	<div class="row padtop">
		
		<div class="col-md-6 col-md-offset-3" style="margin-left: 100px">
			<h2>All User</h2>
			<div class="error"> </div>
			<?php if ($this->session->flashdata('class')): ?>
        <div class="alert <?php echo $this->session->flashdata('class') ?> alert-dismissible" role="alert">

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>

  </button>
  <?php echo $this->session->flashdata('message'); ?>
  
    
</div>
              
            <?php endif; ?>
			<?php if ($allUser):  
               $i=1;
				?>
				<table class="table table-dashed">
					<tr>
						<th>No.</th>
						<th>User Name</th>
						<th>Type</th>
						<th>Added By</th>
						<th colspan="2"><center>Action</center></th>
					</tr>
				<?php foreach ($allUser as $p): ?>
					<tr class="ccat<?php echo $p->id ?>">
						<td><?php echo $i++;  ?></td>
						<td><?php echo $p->name  ?></td>
						<td><?php echo $p->type ?></td>
						<td><?php echo $p->addedBy ?></td>
						<td><a href="<?php echo site_url('admin/editUser/'.$p->id) ?>" class="btn btn-info">Edit</a></td>
						<td><a href="<?php echo site_url('admin/deleteUser/'.$p->id) ?>" class="btn btn-danger" onclick="myFunction()">Delete</a></td>
					</tr>
				<?php endforeach; ?>
				</table>
				
			<?php else: ?>
				Panel are not available
			<?php endif; ?>

		</div>
	</div>
</div>