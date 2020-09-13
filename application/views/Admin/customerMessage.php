<div class="container">
	<div class="row">
		<div class="col-lg-12">
			
			<table class="table">
    <thead>
      <tr>
        <th>Sender Name</th>
        <th>Message</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	<?php if ($customerMessage) {
				foreach ($customerMessage as $p) {
					# code...
				 ?>
      <tr>
      	
        <td><?php echo $p->sender_name ?></td>
        <td><?php echo $p->message ?></td>
        <td><?php if ($p->status=='0') {
         ?>
         <a href="<?php echo base_url('admin/changeMessageStatus/'.$p->id) ?>"><button class="btn btn-primary">Unseen</button></a>
         	<?php } else{

         	 ?>
         	 <span style="color:green">Seen</span>
         	 <a href="<?php echo base_url('admin/deleteCMessage/'.$p->id) ?>"><button class="btn btn-danger">Delete</button></a>
         	<?php } ?>
         </td>
      </tr>
      <?php }
} ?>
     
    </tbody>
  </table>

		</div>
	</div>
</div>