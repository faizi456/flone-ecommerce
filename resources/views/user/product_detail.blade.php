@extends('user.layouts.main')

@section('main-section')

    <div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li class="active">Shop Details </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="shop-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7 col-md-12">
                    <div class="product-details-img mr-20 product-details-tab">
                        @php
                        $product_images = explode(',',$product->images);
                        @endphp
                        <div id="gallery" class="product-dec-slider-2">
                            @foreach($product_images as $image)
                            <a data-image="{{asset($image)}}" data-zoom-image="{{asset($image)}}">
                                <img src="{{asset($image)}}" alt="">
                            </a>
                            @endforeach
                        </div>
                        <div class="zoompro-wrap zoompro-2 pl-20">
                            <div class="zoompro-border zoompro-span">
                                <img class="zoompro" height="500px" src="{{asset($image)}}"
                                    data-zoom-image="{{asset($image)}}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-lg-5 col-md-12">
                    <div class="product-details-content ml-70">
                        <h2>{{$product->product_name}}</h2>
                        <div class="product__details--info__price mb-10 pro-details-rating-wrap mt-3">
                            @if($product->product_type == "Single Product")
                            <span class="current__price" style="color: red; font-size:17px;">RS. {{$product->unitPrice}}</span>
                            @else
                            <span id="price" class="current__price" style="color: red; font-size:17px;"></span>
                            @endif
                        </div>
                        <div class="pro-details-rating-wrap">
                            <span><a>Code: {{$product->product_code}}</a></span>
                        </div>
                        <div id="alert-div">

                        </div>
                        <p>{{$product->description}}</p>
                        @if($product->product_type == "Variation Product")
                        <div class="row mt-4">
                            <div class="col-6 product__variant--list ">
                                <fieldset class="variant__input--fieldset" style="border: none; border-radius:24px; box-shadow: 0px 3px 9px 1px rgba(0, 0, 0, 0.315);">
                                    @php
                                        $v_color = unserialize($product->color);
                                    @endphp
                                    <select name="" id="selectColor" class="form-select" disabled style="border:none; color: #3a3a3a; border-radius:24px;">
                                        <option>Color</option>
                                        @foreach($v_color as $key => $color)
                                        <option value="{{$product->product_id}}-{{$color}}">{{$color}}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-6 product__variant--list ">
                                <fieldset class="variant__input--fieldset" style="border: none; border-radius:24px; box-shadow: 0px 3px 9px 1px rgba(0, 0, 0, 0.315);">
                                    @php
                                        $v_size = explode(',',$product->size);
                                    @endphp
                                    <select name="size" id="select_size" class="form-select" style="border:none; color: #3a3a3a; border-radius:24px;">
                                        <option value="">Size</option>
                                        @foreach($v_size as $value)
                                        <option value="{{$product->product_id}}-{{$value}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        @endif
                        @if($product->product_type=="Variation Product")
                        <form method="POST" id="variationProduct">
                            @csrf
                            <div class="pro-details-quality">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="quantity" value="1">
                                </div>
                                <div class="product__variant--list mb-15 mt-4">
                                    <input type="hidden" name="product_id" value="{{$product->product_id}}">
                                    <input type="text" hidden name="product_price" id="product_price" value="" required>
                                    <input type="text" hidden name="product_size" id="product_size" value="" required>
                                    <input type="text" hidden name="product_color" id="product_color" value="" required>
                                </div>
                                <div class="pro-details-cart btn-hover">
                                    <button id="cart-btn" type="submit" style="border: none;"><a>Add To Cart</a></button>
                                </div>
                                <div class="pro-details-wishlist">
                                    <a href="#"><i class="fa fa-heart-o"></i></a>
                                </div>
                                <div class="pro-details-compare">
                                    <a href="#"><i class="pe-7s-shuffle"></i></a>
                                </div>
                            </div>
                        </form>
                        @else
                        <form method="POST" id="singleProduct">
                            @csrf
                            <div>
                                <div class="pro-details-quality">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="text" name="quantity" value="1"> 
                                    </div>
                                    <input type="text" hidden name="product_id" value="{{$product->product_id}}">
                                    <div class="pro-details-cart btn-hover">
                                        <button id="cart-btn-single" type="submit" style="border: none; background:transparent;"><a>Add To Cart</a></button>
                                    </div>
                                    <div class="pro-details-wishlist">
                                        <a href="#"><i class="fa fa-heart-o"></i></a>
                                    </div>
                                    <div class="pro-details-compare">
                                        <a href="#"><i class="pe-7s-shuffle"></i></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endif
                        <div class="product__details--info__meta">
                            <p class="product__details--info__meta--list"><strong>Category:</strong>  <span>{{$product->cat->name}}</span></p>
                            <p class="product__details--info__meta--list"><strong>Sub Category:</strong>  <span>{{$product->subcat->subcat_name}}</span></p>
                        </div>
                        <div class="pro-details-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="description-review-area pb-90">
        <div class="container">
            <div class="description-review-wrapper">
                <div class="description-review-topbar nav">
                    <a data-bs-toggle="tab" href="#des-details1">Additional information</a>
                    <a class="active" data-bs-toggle="tab" href="#des-details2">Description</a>
                </div>
                <div class="tab-content description-review-bottom">
                    <div id="des-details2" class="tab-pane active">
                        <div class="product-description-wrapper">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                            <p>ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commo consequat. Duis aute irure dolor in reprehend in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                cupidatat non proident, sunt in culpa qui officia deserunt </p>
                        </div>
                    </div>
                    <div id="des-details1" class="tab-pane ">
                        <div class="product-anotherinfo-wrapper">
                            <ul>
                                <li><span>Weight</span> 400 g</li>
                                <li><span>Dimensions</span>10 x 10 x 15 cm </li>
                                <li><span>Materials</span> 60% cotton, 40% polyester</li>
                                <li><span>Other Info</span> American heirloom jean shorts pug seitan letterpress</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


<script language="JavaScript" type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        $("#select_size").change(function(){
            var sizeAndId = $(this).val();
            $("#cart-btn").prop("disabled", true);
            $.ajax({
                type:'get',
                url:'/get-product-price',
                data:{sizeAndId:sizeAndId},
                success:function(response){
                    // alert(response);
                    $("#price").html("RS. "+response.price);
                    $('#product_price').val(response.price);
                    $('#selectColor').val(response.id+'-'+response.color);
                    $('#product_color').val(response.color);
                    $('#product_size').val(response.size);
                    $("#cart-btn").prop("disabled", false);
                },
                error:function(error){
                    alert("Please select any size");
                }
            });
        });

        //Single product add to cart
        $("#singleProduct").submit(function(event){
            event.preventDefault();
            var form = $("#singleProduct")[0];
            var formData = new FormData(form);
            $("#cart-btn-single").prop("disabled", true);
            $.ajax({
                type:"POST",
                url:'/cart',
                data:formData,
                processData:false,
                contentType:false,
                success:function(response){
                    if(response.success){
                        $("#alert-div").html('<div class="alert alert-success" role="alert"><b>'+response.success+'</b><button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                        $("#cart-btn").prop("disabled", false);
                    }
                    else{
                        $("#alert-div").html('<div class="alert alert-danger" role="alert"><b>'+response+'</b><button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                        $("#cart-btn").prop("disabled", false);
                    }   
                }
            });
        });


        // Variation Product Add to Cart
        $("#cart-btn").click(function(){
            event.preventDefault();
            var form = $("#variationProduct")[0];
            var formData = new FormData(form);
            $("#cart-btn").prop("disabled", true);
            $.ajax({
                type:"POST",
                url:'/cart',
                data:formData,
                processData:false,
                contentType:false,
                success:function(response){
                    if(response.success){
                        $("#alert-div").html('<div class="alert alert-success" role="alert"><b>'+response.success+'</b><button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                        $("#cart-btn").prop("disabled", false);
                    }
                    else{
                        $("#alert-div").html('<div class="alert alert-danger" role="alert"><b>'+response+'</b><button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                        $("#cart-btn").prop("disabled", false);
                    }                
                }
            });
        });


    });
</script>