<div class="container">
  <div style="margin-top:30px;margin-left: 150px;">
    <!--Material textarea-->

  <?php echo form_open_multipart('Admin/adProduct','','') ?>
  <h2>Add Product</h2>
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
<div class="form-group">
    <label>Product Title</label>
    <input type="" name="p_title" class="form-control">
</div>

<div class="form-group">
    <label>Select Category</label>
    
      <select class="" id="division" name="p_category">
        <option>Select Category</option>
        <?php
    foreach($allCategory as $panel)
    {
     echo '<option value="'.$panel->cat_id.'">'.$panel->cat_name.'</option>';
    }
    ?>
      </select>
</div>
<!-- <div class="form-group">

   
    <input type="file" class="form-control" id="pic" name="post_image">

  </div> -->
   <label for="pic">Product Image</label>
  <div class="form-group">
        <?php echo form_upload('p_img','',''); ?>
      </div>
      <div class="form-group">
    <label>Select Brand</label>
    
      <select class="" id="division" name="p_brand">
        <option>Select Brand</option>
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
    <input type="" name="p_model" class="form-control">
</div>
<div class="form-group">
    <label>Price</label>
    <input type="" name="price" class="form-control">
</div>
<div class="form-group">
    <label>Features--1</label>
    <input type="" name="features1" class="form-control">
</div>
<div class="form-group">
    <label>Features--2</label>
    <input type="" name="features2" class="form-control">
</div>
<div class="form-group">
    <label>Features--3</label>
    <input type="" name="features3" class="form-control">
</div>
<div class="form-group">
    <label>Features--4</label>
    <input type="" name="features4" class="form-control">
</div>
<div class="form-group">
    <label>Processor</label>
    <input type="" name="processor" class="form-control">
</div>
<div class="form-group">
    <label>Display</label>
    <input type="" name="display" class="form-control">
</div>
<div class="form-group">
    <label>Memory</label>
    <input type="" name="memory" class="form-control">
</div>
<div class="form-group">
    <label>Storage</label>
    <input type="" name="storage" class="form-control">
</div>
<div class="form-group">
    <label>Graphics</label>
    <input type="" name="graphics" class="form-control">
</div>
<div class="form-group">
    <label>Chipset</label>
    <input type="" name="chipset" class="form-control">
</div>
<div class="form-group">
    <label>Operating System</label>
    <input type="" name="operating_System" class="form-control">
</div>
<div class="form-group">
    <label>Battery</label>
    <input type="" name="battery" class="form-control">
</div>
<div class="form-group">
    <label>Adapter</label>
    <input type="" name="adapter" class="form-control">
</div>
<div class="form-group">
    <label>Audio</label>
    <input type="" name="audio" class="form-control">
</div>


<div class="form-group">
    <i class="ti-pencil-alt2 menu-icon"></i>
  <label for="exampleFormControlTextarea1">Product Detail's</label>
  <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10" name="p_details"></textarea>
</div>
<div class="form-group">
    <label>Product in Stock</label>
    <input type="" name="P_stock" class="form-control">
    
</div>
<div class="form-group">
        <?php echo form_submit('Add Product','Add Product','class="btn btn-primary"'); ?>
      </div>
      



</div>
</div>