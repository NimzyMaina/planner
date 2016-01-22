    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js" type="text/javascript"></script>
    <script src="<?= asset ("/bower_components/AdminLTE/plugins/jQuery/jquery.min.js") ?>"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?= asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") ?>" type="text/javascript"></script>

    <script src="<?= asset('/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?= asset('/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js')?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= asset ("/bower_components/AdminLTE/dist/js/app.min.js") ?>" type="text/javascript"></script>

    <script src="<?= asset ("/bower_components/sweetalert2/dist/sweetalert2.min.js") ?>" type="text/javascript"></script>

    <script src="<?= asset ("/bower_components/formValidation/dist/js/formValidation.min.js") ?>"></script>
    <script src="<?= asset ("/bower_components/formValidation/dist/js/framework/bootstrap.min.js") ?>"></script>
    <!-- iCheck -->
    <script src="<?= asset ("/bower_components/AdminLTE./plugins/iCheck/icheck.min.js") ?>"></script>

    <!-- fullCalendar 2.2.5 -->

    <script src="<?= asset('/bower_components/AdminLTE/plugins/fullcalendar/fullcalendar.min.js')?>" type="text/javascript"></script>
    <script src="<?= asset('/bower_components/AdminLTE/plugins/fullcalendar/gcal.js')?>" type="text/javascript"></script>

<!-- variables passed to main.js as php can't be accessed of an external .js file -->
    <script type="text/javascript">
        var ajax_url = "<?= asset('/ajax.php')?>";
        var update_user = "<?= asset('/admin/updateuser')?>";
        var google_calender_id ="<?= getenv('CALENDAR_ID')?>";
        var calender_api_key = "<?= getenv('CALENDAR_API_KEY')?>";
    </script>

    <script src="<?= asset ("/js/main.js") ?>"></script>


    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience -->
    </body>
</html>