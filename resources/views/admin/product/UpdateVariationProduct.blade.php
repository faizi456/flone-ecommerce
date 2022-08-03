@include('admin.header')

@include('admin.sidebar')
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- -------------------------------------------------------------- -->
        <!-- Start Page Content -->
        
        {{-- Variation Product Form --}}
        <div class="" id="showVariationProductForm">
            <form enctype="multipart/form-data" id="variationProductForm">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-lg-10">
                        <div class="card" style="box-shadow: 0px 0px 15px -5px rgba(0,0,0,0.75); border-radius:14px;">
                            <div class="border-bottom">
                                <h4 class="card-title mt-4 mx-3">Update Product</h4>
                                <a href="{{ route('product.index') }}" class="btn btn-danger btn-sm float-end" style="margin-top: -56px; width:100px; padding:8px;">Go Back</a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div id="success-div">
                                    </div>
                                    <div id="error-div">
                                    </div>
                                </div>
                                <div class="row mx-5">
                                    @php $images = explode(',', $product->images) @endphp
                                    @if(isset($images) && !empty($images))
                                        @foreach($images as $image)
                                            @if(isset($image) && !empty($image))
                                                <div class="col-lg-2 col-md-4 col-sm-12 mx-2">
                                                    <img src="{{$image}}" alt="img" height="120" width="150" class="mt-3"><br>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 mt-3">
                                        <input type="text" hidden name="product_type" value="Variation Product">
                                        <label for="">Product Code</label>
                                        <input type="hidden" name="id" id="pro_id" value="{{$product->product_id}}">
                                        <input type="text" name="product_code" value="{{$product->product_code}}" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 col-md-12 mt-3">
                                        <label for="">Product Name</label>
                                        <input type="text" name="product_name" value="{{$product->product_name}}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mt-3">
                                        <textarea name="description" rows="4" class="form-control" required>{{$product->description}}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 mt-3">
                                        <label for="">Main Category</label>
                                        <select name="mainCategory" class="form-control" required>
                                            <option value="{{$product->mainCategory}}">{{$product->cat->name}}</option>
                                            @foreach($categories as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-12 mt-3">
                                        <label for="">Sub Category</label>
                                        <select name="subCategory" class="form-control" required>
                                            <option value="{{$product->subCategory}}">{{$product->subcat->subcat_name}}</option>
                                            @foreach($subcategories as $sub)
                                            <option value="{{$sub->sub_id}}">{{$sub->subcat_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-12 mt-3">
                                        <label for="">Supplier</label>
                                        <select name="supplier" class="form-control" required>
                                            <option value="{{$product->supplier}}">{{$product->sup->name}}</option>
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
                                            <input class="form-check-input btn btn-lg" value="1" {{ $product->status=="1" ? 'checked' : '' }} name="status" id="btn" style="width:60px;" type="checkbox" data-toggle="tooltip" data-placement="left" title="Click to show this product online">
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
                                <div class="col-md-3">
                                    <button type="button" onclick="add_more();" class="btn rounded-pill px-4 btn-light-success text-success font-medium waves-effect waves-light">
                                        <i data-feather="plus-circle" class="feather-sm fill-white"></i> Add new attributes
                                    </button>
                                </div>
                                @php $v_size = explode(',', $product->size); @endphp
                                @foreach($v_size as $key=>$value)
                                    <div id="product_fields">
                                        <div class="form-group" id="product_attr_1">
                                            <div class="row">
                                                <div class="col-md-2 mt-3">
                                                    @php $va_stock = unserialize($product->stock); @endphp
                                                    <label for="">Stock</label>
                                                    <input type="text" name="stock[]" id="stock" value="{{ $va_stock[$value] }}" class="form-control" required>
                                                </div>
                                                <div class="col-md-2 mt-3">
                                                    @php $va_srp = unserialize($product->srp); @endphp
                                                    <label for="">SRP</label>
                                                    <input type="text" name="srp[]" value="{{ $va_srp[$value] }}" id="srp" class="form-control" required>
                                                </div>
                                                <div class="col-md-2 mt-3">
                                                    @php $va_unitPrice = unserialize($product->unitPrice); @endphp
                                                    <label for="">Unit Price</label>
                                                    <input type="text" name="unitPrice[]" value="{{ $va_unitPrice[$value] }}" id="unitPrice" class="form-control" required>
                                                </div>
                                                <div class="col-md-3 mt-3">
                                                    <label for="">Size</label>
                                                    <input type="text" name="size[]" id="size" value="{{$value}}" class="form-control" required>
                                                </div>
                                                <div class="col-md-3 mt-3">
                                                    @php $va_color = unserialize($product->color); @endphp
                                                    <label for="">Color</label>
                                                    <input type="text" name="color[]" value="{{ $va_color[$value] }}" id="color" class="form-control" required>
                                                </div>
                                                <div class="col-md-3 mt-3">
                                                    @php $va_quantityType = unserialize($product->quantityType); @endphp
                                                    <label for="">Quantity Type</label>
                                                    <input type="text" name="quantityType[]" value="{{ $va_quantityType[$value] }}" id="quantityType" class="form-control" required>
                                                </div>
                                                <div class="col-md-3 mt-3">
                                                    <label for="">Images</label>
                                                    <input type="hidden" name="old_images" value="{{ $product->images }}">
                                                    <input type="file" name="attr_images[]" id="attr_images" class="form-control" multiple>
                                                </div>
                                                <div class="col-md-3 mt-3">
                                                    <button type="button" onclick="remove_more('1');" class="btn rounded-pill px-4 btn-light-danger text-danger font-medium waves-effect waves-light">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button class="btn col-12 mb-4" type="submit" id="form-submit">UPDATE</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

@include('admin.footer')

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>

<script>
    var count = 1;

    function add_more() {
        count++;
        var html = ' <div class="form-group" id="product_attr_' + count + '"><div class="row">';

        html += '<div class="col-md-2 mt-3"><input type="text" name="stock[]" id="stock" class="form-control" placeholder="Stock" required></div>';

        html += '<div class="col-md-2 mt-3"><input type="text" name="srp[]" id="srp" class="form-control" placeholder="SRP" required></div>';

        html += '<div class="col-md-2 mt-3"><input type="text" name="unitPrice[]" id="unitPrice" class="form-control" placeholder="Unit Price" required></div>';

        html += '<div class="col-md-3 mt-3"><input type="text" name="size[]" id="size" class="form-control" placeholder="Size" required></div>';

        html += '<div class="col-md-3 mt-3"><input type="text" name="color[]" id="color" class="form-control" placeholder="Color" required></div>';

        html += '<div class="col-md-3 mt-3"><input type="text" name="quantityType[]" id="quantityType" placeholder="Quantity Type" class="form-control" required></div>';

        html += '<div class="col-md-3 mt-3"><input type="file" name="attr_images[]" id="attr_images" class="form-control" multiple required></div>';

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
        // variation product
        $("#variationProductForm").submit(function(event){
            event.preventDefault();
            var id= document.getElementById("pro_id").value;
            var form = $("#variationProductForm")[0];
            var formData = new FormData(form);
            $("#form-submit").prop("disabled", true);
            $.ajax({
                type:"POST",
                url:'/product/'+ id ,
                data:formData,
                processData:false,
                contentType:false,
                success:function(response){
                    $("#success-div").html('<div class="alert alert-success alert-dismissible fade show" role="alert">Product is updated successfully! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    $("#form-submit").prop("disabled", false);
                },
                error:function(error){
                    $("#error-div").html('<div class="alert alert-success alert-dismissible fade show" role="alert">Product is not updated! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    $("#form-submit").prop("disabled", false);
                }
            });
        });
    });
</script>
