<div class="content-wrapper">
	<div class="row padtop">
		
		<div class="col-md-6 col-md-offset-2" style="margin-left: 200px;margin-top: 30px">
			<h2>Edit User</h2>

			<?php echo form_open_multipart('admin/updateUser','','') ?>
		<input name="id" type="hidden" value="<?php echo $userType[0]['id']; ?>">
			
			<div class="form-group">
				<label>User Name</label>
				<br>
				<?php echo form_input('name',$userType[0]['name'],'class="form-congrol"'); ?>
			</div>
			<div class="form-group">
    <label>Select Type</label>
    
      <select class="" id="division" name="type">
        <option><?php echo $userType[0]['type']; ?></option>
        <?php
    foreach($allCat as $panel)
    {
     echo '<option value="'.$panel->type_name.'">'.$panel->type_name.'</option>';
    }
    ?>
      </select>
</div>
<div class="form-group">
				<label>Password</label>
				<br>
				<?php echo form_input('password',$userType[0]['password'],'class="form-congrol"'); ?>
			</div>
			<div class="form-group">
				<?php echo form_submit('Update User','Update User','class="btn btn-primary"'); ?>
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