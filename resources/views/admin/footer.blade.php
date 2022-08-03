
<!-- -------------------------------------------------------------- -->
<!-- End footer -->
<!-- -------------------------------------------------------------- -->
</div>
<!-- -------------------------------------------------------------- -->
<!-- End Page wrapper  -->
      <!-- -------------------------------------------------------------- -->
    </div>
    <!-- -------------------------------------------------------------- -->
    <!-- End Wrapper -->
    <!-- -------------------------------------------------------------- -->
    <div class="chat-windows"></div>
    <!-- -------------------------------------------------------------- -->
    <!-- All Jquery -->
    <!-- -------------------------------------------------------------- -->
    <script src="{{asset('adminfiles/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('adminfiles/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- apps -->
    <script src="{{asset('adminfiles/dist/js/app.min.js')}}"></script>
    <script src="{{asset('adminfiles/dist/js/app.init.mini-sidebar.js')}}"></script>
    <script src="{{asset('adminfiles/dist/js/app-style-switcher.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('adminfiles/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('adminfiles/assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('adminfiles/dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('adminfiles/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('adminfiles/dist/js/feather.min.js')}}"></script>
    <script src="{{asset('adminfiles/dist/js/custom.min.js')}}"></script>
    <!--This page JavaScript -->
    <script src="{{asset('adminfiles/assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
    <script src="{{asset('adminfiles/dist/js/pages/dashboards/dashboard1.js')}}"></script>
    <!-- Sparkline chart -->
    <script src="{{asset('adminfiles/dist/js/pages/sparkline/jquery.charts-sparkline.js')}}"></script>
    <!-- Forms -->
    <script src="{{asset('adminfiles/assets/extra-libs/jqbootstrapvalidation/validation.js')}}"></script>
    <!-- custom fields -->
    <script src="{{asset('adminfiles/assets/libs/jquery.repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{asset('adminfiles/assets/extra-libs/jquery.repeater/repeater-init.js')}}"></script>
    <script src="{{asset('adminfiles/assets/extra-libs/jquery.repeater/dff.js')}}"></script>

    <script>
      !(function (window, document, $) {
        'use strict';
        $('input,select,textarea').not('[type=submit]').jqBootstrapValidation();
      })(window, document, jQuery);
    </script>
    <!-- Tables -->

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
   <script>
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
          { extend: 'pdf', className:'pdfButton' },
          { extend: 'excel', className: 'excelButton' },
          { extend: 'csv', className: 'csvButton' },
          { extend: 'copy', className: 'copyButton' },
        ]
    } );
} );

   </script>
   <script>
      feather.replace();
      $(".preloader").fadeOut();
      // ==============================================================
      // Login and Recover Password
      // ==============================================================
    </script>

  </body>
</html>
