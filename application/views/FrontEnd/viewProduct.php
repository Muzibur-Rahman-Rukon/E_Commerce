<br>
<br>
<br>
<div class="container">
	<div class="row">
		<?php if ($viewProduct):
            foreach ($viewProduct as $row) {
            	# code...
            
		 ?>
			<div class="col-lg-6">
			<img  style="height:250px" src="<?php echo base_url('assets/img/'.$row->p_img) ?>"alt="Image" class="img-fluid">
			
		</div>
		<div class="col-lg-6">
			<table class="table">
			<div class="heading" style="background-color: #4CAF50;color:white">
				 <h2><?php echo $row->p_title ?></h2>
			</div>
			<h3 style="color:black;font-weight: bold">Features</h3>
			<p style="color:black">
				1.<?php  echo $row->features1  ?><br>
				2.<?php  echo $row->features2  ?><br>
				3.<?php  echo $row->features3  ?><br>
				4.<?php  echo $row->features4  ?><br>
			</p>
 
  <tbody>
    <tr>
     
      <td style="color:black">Brand </td>
      <td style="color:#f16821"><?php echo $row->p_brand ?></td>
   
    </tr>
    <tr>
     
      <td style="color:black">Price </td>
      <td style="color:#f16821"><?php echo $row->price ?></td>
   
    </tr>
    <tr>
     
      <td style="color:black">Model </td>
      <td style="color:#f16821"><?php echo $row->p_model ?></td>
   
    </tr>
    <tr>
     
      <td style="color:black">Processor </td>
      <td style="color:#f16821"><?php echo $row->processor ?></td>
   
    </tr>
    <tr>
     
      <td style="color:black">Display </td>
      <td style="color:#f16821"><?php echo $row->display ?></td>
   
    </tr>
    <tr>
     
      <td style="color:black">Memory </td>
      <td style="color:#f16821"><?php echo $row->memory ?></td>
   
    </tr>
    <tr>
     
      <td style="color:black">Storage </td>
      <td style="color:#f16821"><?php echo $row->storage ?></td>
   
    </tr>
    <tr>
     
      <td style="color:black">Graphics </td>
      <td style="color:#f16821"><?php echo $row->graphics ?></td>
   
    </tr>
    <tr>
     
      <td style="color:black">Chipset </td>
      <td style="color:#f16821"><?php echo $row->chipset ?></td>
   
    </tr>
     <tr>
     
      <td style="color:black">Operating System </td>
      <td style="color:#f16821"><?php echo $row->operating_System ?></td>
   
    </tr>
    <tr>
     
      <td style="color:black">Battery </td>
      <td style="color:#f16821"><?php echo $row->battery ?></td>
   
    </tr>
    <tr>
     
      <td style="color:black">Adapter </td>
      <td style="color:#f16821"><?php echo $row->adapter ?></td>
   
    </tr>
    <tr>
     
      <td style="color:black">Audio </td>
      <td style="color:#f16821"><?php echo $row->audio ?></td>
   
    </tr>
  </tbody>
</table>


		</div>
		
		 <div class="col-lg-12">
		 	<center><a href="<?php if($this->session->userdata('id')){
		 		echo site_url('home/addToCart/'.$row->p_id."/".$row->p_brand."/".$row->p_img."/".$row->price."/".$row->p_model);
		 	} else{
		 		echo site_url('home/signin');
		 	} ?>"><button class="btn btn-info">Add To Cart</button></a></center>
		 </div>
		 <?php
		}

		 endif ?>
		
	</div>
</div>