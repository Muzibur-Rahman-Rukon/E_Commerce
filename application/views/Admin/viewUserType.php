<div class="content-wrapper">
	<div class="row padtop">
		
		<div class="col-md-6 col-md-offset-3" style="margin-left: 100px">
			<h2>All User Type</h2>
			<div class="error"> </div>
			<?php if ($this->session->flashdata('class')): ?>
        <div class="alert <?php echo $this->session->flashdata('class') ?> alert-dismissible" role="alert">

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>

  </button>
  <?php echo $this->session->flashdata('message'); ?>
  
    
</div>
              
            <?php endif; ?>
			<?php if ($allUserType):  ?>
				<table class="table table-dashed">
				<?php foreach ($allUserType as $p): ?>
					<tr class="ccat<?php echo $p->id ?>">
						<td><?php   ?></td>
						<td><?php echo $p->type_name ?></td>
						<td><a href="<?php echo site_url('admin/editUserType/'.$p->id) ?>" class="btn btn-info">Edit</a></td>
						<td><a href="<?php echo site_url('admin/deleteUserType/'.$p->id) ?>" class="btn btn-danger" onclick="myFunction()">Delete</a></td>
					</tr>
				<?php endforeach; ?>
				</table>
				
			<?php else: ?>
				Panel are not available
			<?php endif; ?>

		</div>
	</div>
</div>