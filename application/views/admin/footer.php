 <footer class="main-footer">
    <div class="pull-right hidden-xs">
     
    </div>
    <strong>Copyright &copy; 2018 <a href="#">MSS</a>.</strong> All rights
    reserved.
  </footer>


  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/vendor/admin/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/admin/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/admin/js/select2.full.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/vendor/admin/js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/vendor/admin/js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/vendor/admin/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/vendor/admin/js/demo.js"></script>
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
</body>
</html>
