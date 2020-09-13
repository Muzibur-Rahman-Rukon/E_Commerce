<div class="content-wrapper">
	<div class="row padtop">
		
		<div class="col-md-6 col-md-offset-2" style="margin-left: 200px;margin-top: 30px">
			<h2>Edit Brand</h2>
			<?php echo form_open_multipart('admin/updateBrand','','') ?>
		<input name="brand_id" type="hidden" value="<?php echo $userType[0]['brand_id']; ?>">
			
			<div class="form-group">
				<?php echo form_input('brand_name',$userType[0]['brand_name'],'class="form-congrol"'); ?>
			</div>
			<div class="form-group">
				<?php echo form_submit('Update Brand','Update Brand','class="btn btn-primary"'); ?>
			</div>
			<div>
      <?php if ($this->session->flashdata('class')): ?>
        <div class="alert <?php echo $this->session->flashdata('class') ?> alert-dismissible" role="alert">

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>

  </button>
  <?php echo $this->session->flashdata('message'); ?>
  
    
</div>
              
            <?php endif; ?>
    </div>
			<?php echo form_close(); ?>
		</div>
		<div class="col-md-3">
			
		</div>
	</div>
</div>