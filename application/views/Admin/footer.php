</div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?php echo base_url('assets/Admin/vendors/base/vendor.bundle.base.js'); ?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="<?php echo base_url('assets/Admin/vendors/chart.js/Chart.min.js'); ?>"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo base_url('assets/Admin/js/off-canvas.js'); ?>"></script>
  <script src="<?php echo base_url('assets/Admin/js/hoverable-collapse.js'); ?>"></script>
  <script src="<?php echo base_url('assets/Admin/js/template.js'); ?>"></script>
  <script src="<?php echo base_url('assets/Admin/js/todolist.js'); ?>"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo base_url('assets/Admin/js/dashboard.js'); ?>"></script>
  <!-- End custom js for this page-->
            <?php  
          
          
  if($this->session->flashdata('order')){  ?>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#order_modal').modal('show');
    });
</script>
<?php } ?>
</body>

</html>

