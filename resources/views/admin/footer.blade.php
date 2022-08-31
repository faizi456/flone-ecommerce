
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
    {{-- <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script> --}}
    <script src="{{asset('adminfiles/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('adminfiles/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
   
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





<script>
  function showProductForm() {
      var showDiv = document.getElementById("showDiv");
      var showSingleProductForm = document.getElementById("showSingleProductForm");
      showVariationProductForm.style.display = showDiv.value == "VariationProduct" ? "block" : "none";
      showSingleProductForm.style.display = showDiv.value == "SingleProduct" ? "block" : "none";
  }
  $(function() {
      $('[data-toggle="tooltip"]').tooltip()
  });
</script>
<script>
  var count = 1;

  function add_more() {
      count++;
      var html = ' <div class="form-group" id="product_attr_' + count + '"><div class="row">';

      html += '<div class="col-md-2 mt-3"><input type="text" name="stock[]" id="stock" class="form-control" placeholder="Stock" ></div>';

      html += '<div class="col-md-2 mt-3"><input type="text" name="srp[]" id="srp" class="form-control" placeholder="SRP" ></div>';

      html += '<div class="col-md-2 mt-3"><input type="text" name="unitPrice[]" id="unitPrice" class="form-control" placeholder="Unit Price" ></div>';

      html += '<div class="col-md-3 mt-3"><input type="text" name="size[]" id="size" class="form-control" placeholder="Size" ></div>';

      html += '<div class="col-md-3 mt-3"><input type="text" name="color[]" id="color" class="form-control" placeholder="Color" ></div>';

      html += '<div class="col-md-3 mt-3"><input type="text" name="quantityType[]" id="quantityType" placeholder="Quantity Type" class="form-control" ></div>';

      html += '<div class="col-md-3 mt-3"><input type="file" name="attr_images[]" onchange="preview_images();" id="attr_images" class="form-control" multiple ></div>';

      html += '<div class="col-md-3 mt-3"><button type="button" onclick="remove_more(' + count + ');" class="btn rounded-pill px-4 btn-light-danger text-danger font-medium waves-effect waves-light"><i class="fas fa-minus"></i></button></div>';

      html += '</div></div>';

      jQuery("#product_fields").append(html);
  }

  function remove_more(count) {
      jQuery("#product_attr_" + count).remove();
  }

</script>
<script>
  $(document).ready(function(){
      // single product
      $("#producForm").submit(function(event){
          event.preventDefault();
          var form = $("#producForm")[0];
          var formData = new FormData(form);
          $("#form-submit").prop("disabled", true);
          $.ajax({
              type:"POST",
              url:'/product',
              data:formData,
              processData:false,
              contentType:false,
              success:function(response){
                  $("#alert-div").html('<div class="alert alert-success" role="alert"><b>Product is added Successfully</b></div>');
                  $("#form-submit").prop("disabled", false);
                  $('#producForm').trigger("reset");
              },
              error:function(error){
                  $("#result").text(error.responseText);
                  $("#form-submit").prop("disabled", false);
              }
          });
      });

      // variation product
      $("#variationProductForm").submit(function(event){
          event.preventDefault();
          var form = $("#variationProductForm")[0];
          var formData = new FormData(form);
          $("#form-submit").prop("disabled", true);
          $.ajax({
              url:'/product',
              type:"POST",
              data:formData,
              processData:false,
              contentType:false,
              success:function(response){
                  $("#success-div").html('<div class="alert alert-success" role="alert"><b>Product is added successfully!</b></div>');
                  $("#form-submit").prop("disabled", false);
                  $('#variationProductForm').trigger("reset");
              },
              error:function(error){
                  $("#result").text(error.responseText);
                  $("#form-submit").prop("disabled", false);
              }
          });
      });
  });
</script>


<script>
  function preview_images(){
      var total_file=document.getElementById("attr_images").files.length;
      for(var i=0;i<total_file;i++)
      {
          $('#image_preview').append("<img height='150px' width='150px class='img-fluid' style='margin-left:20px; margin-top:4px;' src='"+URL.createObjectURL(event.target.files[i])+"'>");
      }
  }
</script>





  </body>
</html>
