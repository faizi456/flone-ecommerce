@include('admin.header')

@include('admin.sidebar')
<div class="page-wrapper">
    <!-- -------------------------------------------------------------- -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- -------------------------------------------------------------- -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">

                <div class="d-flex align-items-center">
                    <div class="col-lg-5 col-md-7 col-sm-8">
                        <select required id="showDiv" onchange="showProductForm()" style="background-color: #ee2761; color:white;" class="form-control">
                            <option value="">Select Product Type</option>
                            <option value="SingleProduct">SingleProduct</option>
                            <option value="VariationProduct">VariationProduct</option>
                        </select>

                    </div>
                </div>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex no-block justify-content-end align-items-center">
                    <div class="">
                        <a href="{{route('product.index')}}" class="btn float-end p-2" id="btn"><i class="feather-sm" data-feather="eye"></i>View Products</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 m-auto mt-2">
                @if(Session::has("success_message"))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {!!Session::get('success_message')!!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @elseif(Session::has("error_message"))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {!!Session::get('error_message')!!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- -------------------------------------------------------------- -->
    <!-- End Bread crumb and right sidebar toggle -->
    <div class="container-fluid">
        <!-- -------------------------------------------------------------- -->
        <!-- Start Page Content -->
        <!-- -------------------------------------------------------------- -->


        {{-- Single Product Form --}}
        <div class="" id="showSingleProductForm" style="display:none;">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-lg-10">
                    <form enctype="multipart/form-data" id="producForm" method="POST">
                        @csrf
                        <div class="card" style="box-shadow: 0px 0px 15px -5px rgba(0,0,0,0.75); border-radius:14px;">
                            <div class="border-bottom title-part-padding">
                                <h4 class="card-title mb-0">Add New Product</h4>
                            </div>
                            <div class="card-body">
                                <div id="alert-div">
                 
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 mt-3">
                                        <input type="text" hidden name="product_type" value="Single Product">
                                        <label for="">Product Name</label>
                                        <input type="text" name="product_name" class="form-control" >
                                    </div>
                                    <div class="col-lg-6 col-md-12 mt-3">
                                        <label for="">Product Code</label>
                                        <input type="text" name="product_code" class="form-control" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mt-3">
                                        <textarea name="description" rows="4" class="form-control"  placeholder="Enter Description"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 mt-3">
                                        <label for="">Main Category</label>
                                        <select name="mainCategory" class="form-control" >
                                            <option value="">SELECT</option>
                                            @foreach($categories as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-12 mt-3">
                                        <label for="">Sub Category</label>
                                        <select name="subCategory" class="form-control" >
                                            <option value="">SELECT</option>
                                            @foreach($subcategories as $sub)
                                            <option value="{{$sub->sub_id}}">{{$sub->subcat_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-12 mt-3">
                                        <label for="">Supplier</label>
                                        <select name="supplier" class="form-control" >
                                            <option value="">SELECT</option>
                                            @foreach($suppliers as $sup)
                                            <option value="{{$sup->id}}">{{$sup->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 mt-3">
                                        <label for="">Unit Price</label>
                                        <input type="text" name="unitPrice" class="form-control" >
                                    </div>
                                    <div class="col-lg-4 col-md-12 mt-3">
                                        <label for="">SRP</label>
                                        <input type="text" name="srp" class="form-control" >
                                    </div>
                                    <div class="col-lg-4 col-md-12 mt-3">
                                        <label for="">Qunatity Type</label>
                                        <input type="text" name="quantityType"  class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 mt-3">
                                        <label for="">Stock</label>
                                        <input type="text" name="stock" class="form-control" >
                                    </div>
                                    <div class="col-lg-6 col-md-12 mt-3">
                                        <label for="">Images</label>
                                        <input type="file" name="images[]" class="form-control" multiple >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 mt-3 m-auto">
                                        <label for="">Show Online?</label>
                                        <div class="form-check form-switch" style="margin-left: 120px; margin-top:-23px;">
                                            <input class="form-check-input btn btn-lg" value="1" name="status" id="btn" style="width:60px;" type="checkbox" data-toggle="tooltip" data-placement="left" title="Click to show this product online">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn col-12 mb-4" id="form-submit">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>


        
        {{-- Variation Product Form --}}
        <div class="" id="showVariationProductForm" style="display:none;">
            <form enctype="multipart/form-data"  id="variationProductForm" method="POST">
                @csrf
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-lg-10">
                        <div class="card" style="box-shadow: 0px 0px 15px -5px rgba(0,0,0,0.75); border-radius:14px;">
                            <div class="border-bottom title-part-padding">
                                <h4 class="card-title mb-0">Add New Product</h4>
                            </div>
                            <div class="card-body">
                                <div id="success-div">
                 
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 mt-3">
                                        <input type="text" hidden name="product_type" value="Variation Product">
                                        <label for="">Product Code</label>
                                        <input type="text" name="product_code" class="form-control" >
                                    </div>
                                    <div class="col-lg-6 col-md-12 mt-3">
                                        <label for="">Product Name</label>
                                        <input type="text" name="product_name" class="form-control" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mt-3">
                                        <textarea name="description" rows="4" class="form-control" ></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 mt-3">
                                        <label for="">Main Category</label>
                                        <select name="mainCategory" class="form-control" >
                                            <option value="">SELECT</option>
                                            @foreach($categories as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-12 mt-3">
                                        <label for="">Sub Category</label>
                                        <select name="subCategory" class="form-control" >
                                            <option value="">SELECT</option>
                                            @foreach($subcategories as $sub)
                                            <option value="{{$sub->sub_id}}">{{$sub->subcat_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-12 mt-3">
                                        <label for="">Supplier</label>
                                        <select name="supplier" class="form-control" >
                                            <option value="">SELECT</option>
                                            @foreach($suppliers as $sup)
                                            <option value="{{$sup->id}}">{{$sup->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 mt-3 m-auto">
                                        <label for="">Show Online?</label>
                                        <div class="form-check form-switch" style="margin-left: 120px; margin-top:-23px;">
                                            <input class="form-check-input btn btn-lg" value="1" name="status" id="btn" style="width:60px;" type="checkbox" data-toggle="tooltip" data-placement="left" title="Click to show this product online">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top:-8px;">
                    <div class="col-1"></div>
                    <div class="col-lg-10">
                        <div class="card" style="box-shadow: 0px 0px 15px -5px rgba(0,0,0,0.75); border-radius:14px;">
                            <div class="border-bottom title-part-padding">
                                <h4 class="card-title mb-0">Product Attributes</h4>
                            </div>
                            <div class="card-body">
                                <div class="row" >
                                    <div class="col-lg-12 col-md-12 col-sm-12" id="image_preview">
                        
                                    </div>
                                </div>
                                <div id="product_fields">
                                    <div class="form-group" id="product_attr_1">
                                        <div class="row">
                                            <div class="col-md-2 mt-3">
                                                <label for="">Stock</label>
                                                <input type="text" name="stock[]" id="stock" class="form-control" >
                                            </div>
                                            <div class="col-md-2 mt-3">
                                                <label for="">SRP</label>
                                                <input type="text" name="srp[]" id="srp" class="form-control" >
                                            </div>
                                            <div class="col-md-2 mt-3">
                                                <label for="">Unit Price</label>
                                                <input type="text" name="unitPrice[]" id="unitPrice" class="form-control" >
                                            </div>
                                            <div class="col-md-3 mt-3">
                                                <label for="">Size</label>
                                                <input type="text" name="size[]" id="size" class="form-control" >
                                            </div>
                                            <div class="col-md-3 mt-3">
                                                <label for="">Color</label>
                                                <input type="text" name="color[]" id="color" class="form-control" >
                                            </div>
                                            <div class="col-md-3 mt-3">
                                                <label for="">Quantity Type</label>
                                                <input type="text" name="quantityType[]" id="quantityType" class="form-control" >
                                            </div>
                                            <div class="col-md-3 mt-3">
                                                <label for="">Images</label>
                                                <input type="file" name="attr_images[]" id="attr_images" class="form-control" multiple  onchange="preview_images();">
                                            </div>
                                            <div class="col-md-3 mt-3">
                                                <button type="button" onclick="add_more();" class="btn rounded-pill px-4 btn-light-success text-success font-medium waves-effect waves-light">
                                                    <i data-feather="plus-circle" class="feather-sm fill-white"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn col-12 mb-4" type="submit" id="form-submit">SUBMIT</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

@include('admin.footer')

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