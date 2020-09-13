<br>
<br>
<br>
<br>
<br>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<?php if ($this->session->flashdata('order')) {
			
			?>
			<center>
			<h2 style="color:green">Congratulation <span style="color: #f16821;font-weight: bold"></span><?php echo $this->session->userdata('username') ?></h2>
			<h4><?php echo $this->session->flashdata('order') ?></h4>
			</center>
		<?php } ?>
		</div>
	</div>
</div>