<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>/admin/plugins/jquery/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url() ?>/admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() ?>/admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url() ?>/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url() ?>/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url() ?>/admin/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url() ?>/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url() ?>/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url() ?>/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?php echo base_url() ?>/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>

<script src="<?php echo base_url() ?>/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>/admin/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url() ?>/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Select2 -->
<script src="<?php echo base_url() ?>/admin/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url() ?>/admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url() ?>/admin/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>/admin/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url() ?>/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url() ?>/admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url() ?>/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url() ?>/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="<?php echo base_url() ?>/admin/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="<?php echo base_url() ?>/admin/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->


<script src="<?php echo base_url() ?>/admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>/admin/dist/js/adminlte.js"></script>


<script type="text/javascript" src="<?php echo base_url() ?>/admin/dist/imgUploder/jquery.uploader.min.js"></script>

<script>
    (function(){
        $("#example_img_up").uploader({
            multiple:true,
        })

    }());
</script>
<?php require_once(FCPATH .'admin/dist/js/ajaxScript.php'); ?>

</body>
</html>