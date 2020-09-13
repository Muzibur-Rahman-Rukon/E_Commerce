<div class="container">
  <div style="margin-top:30px;margin-left: 150px;">
    <!--Material textarea-->

  <?php echo form_open_multipart('Admin/updateProduct','','') ?>
  <h2>Edit Product</h2>
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
    <?php
    if ($viewProduct) {
       foreach ($viewProduct as $p) {
         # code...
       
     ?>
<div class="form-group">
    <label>Product Title</label>
    <input type="" name="p_title" value="<?php echo $p->p_title ?>" class="form-control">
    <input type="hidden" name="p_id" value="<?php echo $p->p_id ?>" class="form-control">
</div>

<div class="form-group">
  <?php 
  
   $d=$this->modAdmin->fetchCategoryById($p->cat_id);

   ?>
    <label>Select Category</label>
    
      <select class="" id="division" name="p_category">
        <option><?php echo $d->cat_name ?></option>
        <?php
    foreach($allCategory as $panel)
    {
     echo '<option value="'.$panel->cat_id.'">'.$panel->cat_name.'</option>';
    }
    ?>
      </select>
</div>

  <input type="hidden" name="Oldp_img" value="<?php echo $p->p_img ?>">
   <label for="pic">Product Image</label>
   <img  src="<?php echo base_url('assets/img/'.$p->p_img) ?>" >
  <div class="form-group">
        <?php echo form_upload('p_img','',''); ?>
      </div>
      <div class="form-group">
    <label>Select Brand</label>
    
      <select class="" id="division" name="p_brand">
        <option><?php echo $p->p_brand ?></option>
        <?php
    foreach($allBrand as $panel)
    {
     echo '<option value="'.$panel->brand_name.'">'.$panel->brand_name.'</option>';
    }
    ?>
      </select>
</div>
<div class="form-group">
    <label>Product Model/Code</label>
    <input type="" name="p_model" value="<?php echo $p->p_model ?>" class="form-control">
</div>
<div class="form-group">
    <label>Price</label>
    <input type="" name="price" value="<?php echo $p->price ?>" class="form-control">
</div>
<div class="form-group">
    <label>Features--1</label>
    <input type="" name="features1" value="<?php echo $p->features1 ?>" class="form-control">
</div>
<div class="form-group">
    <label>Features--2</label>
    <input type="" name="features2" value="<?php echo $p->features2 ?>" class="form-control">
</div>
<div class="form-group">
    <label>Features--3</label>
    <input type="" name="features3" value="<?php echo $p->features3 ?>" class="form-control">
</div>
<div class="form-group">
    <label>Features--4</label>
    <input type="" name="features4" value="<?php echo $p->features4 ?>" class="form-control">
</div>
<div class="form-group">
    <label>Processor</label>
    <input type="" name="processor" value="<?php echo $p->processor ?>" class="form-control">
</div>
<div class="form-group">
    <label>Display</label>
    <input type="" name="display" value="<?php echo $p->display ?>" class="form-control">
</div>
<div class="form-group">
    <label>Memory</label>
    <input type="" name="memory" value="<?php echo $p->memory ?>" class="form-control">
</div>
<div class="form-group">
    <label>Storage</label>
    <input type="" name="storage" value="<?php echo $p->storage ?>" class="form-control">
</div>
<div class="form-group">
    <label>Graphics</label>
    <input type="" name="graphics" value="<?php echo $p->graphics ?>" class="form-control">
</div>
<div class="form-group">
    <label>Chipset</label>
    <input type="" name="chipset" value="<?php echo $p->chipset ?>" class="form-control">
</div>
<div class="form-group">
    <label>Operating System</label>
    <input type="" name="operating_System" value="<?php echo $p->operating_System ?>" class="form-control">
</div>
<div class="form-group">
    <label>Battery</label>
    <input type="" name="battery" value="<?php echo $p->battery ?>" class="form-control">
</div>
<div class="form-group">
    <label>Adapter</label>
    <input type="" name="adapter" value="<?php echo $p->adapter ?>" class="form-control">
</div>
<div class="form-group">
    <label>Audio</label>
    <input type="" name="audio" value="<?php echo $p->audio ?>" class="form-control">
</div>


<div class="form-group">
    <i class="ti-pencil-alt2 menu-icon"></i>
  <label for="exampleFormControlTextarea1">Product Detail's</label>
  <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10" name="p_details"><?php echo $p->p_details ?></textarea>
</div>
<div class="form-group">
    <label>Product in Stock</label>
    <input type="" name="P_stock" class="form-control" value="<?php echo $p->P_stock ?>">
    
</div>

<div class="form-group">
        <?php echo form_submit('Update Product','Update Product','class="btn btn-primary"'); ?>
      </div>
      
<?php }
} ?>


</div>
</div>