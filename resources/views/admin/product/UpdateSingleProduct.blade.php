@include('admin.header')

@include('admin.sidebar')
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- -------------------------------------------------------------- -->
        <!-- Start Page Content -->
        <!-- -------------------------------------------------------------- -->


        {{-- Single Product Form --}}
        <div class="" id="showSingleProductForm">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-lg-10">
                    <form enctype="multipart/form-data" id="singleProductForm">
                        @csrf
                        @method('PATCH')
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
                                        <input type="text" hidden name="product_type" value="Single Product">
                                        <label for="">Product Name</label>
                                        <input type="text" name="product_name" class="form-control" required value="{{$product->product_name}}">
                                    </div>
                                    <div class="col-lg-6 col-md-12 mt-3">
                                        <label for="">Product Code</label>
                                        <input type="hidden" name="id" id="pro_id" value="{{$product->product_id}}">
                                        <input type="text" value="{{$product->product_code}}" name="product_code" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mt-3">
                                        <textarea name="description" rows="4" class="form-control" required placeholder="Enter Description">{{$product->description}}</textarea>
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
                                    <div class="col-lg-4 col-md-12 mt-3">
                                        <label for="">Unit Price</label>
                                        <input type="text" name="unitPrice" value="{{$product->unitPrice}}" class="form-control" required>
                                    </div>
                                    <div class="col-lg-4 col-md-12 mt-3">
                                        <label for="">SRP</label>
                                        <input type="text" name="srp" value="{{$product->srp}}" class="form-control" required>
                                    </div>
                                    <div class="col-lg-4 col-md-12 mt-3">
                                        <label for="">Qunatity Type</label>
                                        <input type="text" name="quantityType" value="{{$product->quantityType}}" required class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 mt-3">
                                        <label for="">Stock</label>
                                        <input type="text" name="stock" value="{{$product->stock}}" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 col-md-12 mt-3">
                                        <label for="">Images</label>
                                        <input type="file" name="images[]" class="form-control" multiple>
                                        <input type="hidden" name="old_images" value="{{$product->images}}">
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
                        <button class="btn col-12 mb-4" id="form-submit">UPDATE</button>
                    </form>
                </div>
            </div>
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
    $(document).ready(function(){
        // variation product
        $("#singleProductForm").submit(function(event){
            event.preventDefault();
            var id= document.getElementById("pro_id").value;
            var form = $("#singleProductForm")[0];
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