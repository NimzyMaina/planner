    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.3 -->
    <script src="<?= asset ("/bower_components/AdminLTE/plugins/jQuery/jQuery-2.1.3.min.js") ?>"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?= asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") ?>" type="text/javascript"></script>

    <script src="<?= asset('/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?= asset('/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js')?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= asset ("/bower_components/AdminLTE/dist/js/app.min.js") ?>" type="text/javascript"></script>

    <script src="<?= asset ("/bower_components/sweetalert2/dist/sweetalert2.min.js") ?>" type="text/javascript"></script>

    <script>
        $("#example1").DataTable();
    </script>

    <script>
        $(function(){
            //acknowledgement message
            var message_status = $("#status");
            $("td[contenteditable=true]").blur(function(){
                var field_userid = $(this).attr("id") ;
                var value = $(this).text() ;
                $.post("<?= asset('/admin/updateuser')?>" ,field_userid + "=" + value,function(data){
                    if(data != '')
                    {
                        swal({   title: 'Success!',   text: data,   timer: 2000 });
                    }
                });
            });
        });
    </script>


    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience -->
    </body>
</html>