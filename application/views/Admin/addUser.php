<div class="container">
  <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-5" style="box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);">
      <div style="margin-top: 10%;margin-left: 20%">
    <!--Material textarea-->

  <?php echo form_open_multipart('Admin/adUser','','') ?>
  <h2>Add User</h2>
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
<input name="addedBy" type="hidden" value="<?php echo $this->session->userdata('name') ?>">
<div class="form-group">
    <label>User Name</label>
    <br>
    <input type="" name="name" class="">
</div>
<div class="form-group">
    <label>Select Type</label>
    
      <select class="" id="division" name="type">
        <option>Select Role</option>
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
    <input type="password" name="password" class="">
</div>
<div class="form-group">
        <?php echo form_submit('Add User','Add User','class="btn btn-primary"'); ?>
      </div>
      



</div>
    </div>
    <div class="col-lg-4"></div>
  </div>
 
</div>