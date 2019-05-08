</div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="Theme/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="Theme/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="Theme/dist/js/sb-admin-2.js"></script>

    <script>
        $('.print').click(function(){
            $(this).css('display','none');

            window.print();
        })
        $(document).click(function(){
                $('.print').css('display','block');
        });
        //  $(document).click(function(){
        //     $(this).css('display','block');
        // })
    </script>

</body>

</html>
