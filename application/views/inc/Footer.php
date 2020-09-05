      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Powered by</b> <a href="http://gatewayit.net/">Gateway IT</a>
        </div>
        <strong>Copyright &copy; <?= date('Y'); ?> <a href="javascript:"><?= $this->config->item('app_full_name'); ?></a>.</strong> All rights reserved. <b>Version</b> 1.0      </footer>

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?=  base_url('public/backend/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=  base_url('public/backend/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- SlimScroll -->
    <script src="<?=  base_url('public/backend/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
    <!-- FastClick -->
    <script src="<?=  base_url('public/backend/plugins/fastclick/fastclick.min.js'); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?=  base_url('public/backend/dist/js/app.min.js'); ?>"></script>
    <!-- AdminLTE for datepicker purposes -->
    <script src="<?=  base_url('public/js/bootstrap-datepicker.min.js'); ?>"></script>
    <!-- DataTables -->
    <script src="<?= base_url('public/backend/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('public/backend/plugins/datatables/dataTables.bootstrap.min.js') ?>"></script>
    <!-- notification -->
    <script src="<?=  base_url('public/js/jquery.toaster.js'); ?>"></script>
    <!-- cusotm function -->
    <script src="<?=  base_url('public/js/function.js'); ?>"></script>

    <script type="text/javascript">
      $('.datepicker').datepicker({
          autoclose: true,
          weekStart: 6,
          todayHighlight: true,
          todayBtn: "linked",
          format : 'yyyy-mm-dd'
      });

      $(function () {
        if($("#members_list_table").length>0){
            $("#members_list_table").DataTable();
        }
      });
    </script>
  </body>
</html>
