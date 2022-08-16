@extends('user.layouts.main')
@section('main-section')

<style>
    .color-div {
    display: inline-block;
    vertical-align: middle;
    width:40px;
    height:30px;
    }
    .size-div {
    display: inline-block;
    vertical-align: middle;
    width:80px;
    text-align: center;
    height:30px;
    }
</style>

<main class="main__content_wrapper">
        
    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title text-white mb-25">Product Details</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">Product Details</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Start product details section -->
    <section class="product__details--section section--padding">
        <div class="container">
            <div class="row row-cols-lg-2 row-cols-md-2">
                <div class="col">
                    <div class="product__details--media">
                        <div class="product__media--preview  swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="product__media--preview__items">
                                        @php
                                            $images = explode(',',$product->images);
                                        @endphp
                                        <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="{{asset($images[0])}}"><img class="product__media--preview__items--img" src="{{asset($images[0])}}" alt="product-media-img"></a>
                                        <div class="product__media--view__icon">
                                            <a class="product__media--view__icon--link glightbox" href="{{asset($images[0])}}" data-gallery="product-media-preview">
                                                <svg class="product__media--view__icon--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
                <div class="col">
                    <div id="alert-div">

                    </div>
                    <div class="product__details--info">
                            <h2 class="product__details--info__title mb-15">{{$product->product_name}}</h2>
                            <div class="product__details--info__price mb-10">
                                @if($product->product_type == "Single Product")
                                    <span class="current__price">RS. {{$product->unitPrice}}</span>
                                @else
                                    <span id="price" class="current__price">Select size to see price</span>
                                @endif
                            </div>
                            <p class="product__details--info__desc mb-15">{{$product->description}}</p>
                            <div class="product__variant">
                                @if($product->product_type == "Variation Product")
                                <div class="product__variant--list mb-10">
                                    <fieldset class="variant__input--fieldset">
                                        <legend class="product__variant--title mb-8">Color :</legend>
                                        @php
                                            $v_color = unserialize($product->color);
                                        @endphp
                                        <select name="" id="selectColor" style="width:100px; background-color:rgba(128, 128, 128, 0.11); border:1px solid rgba(128, 128, 128, 0.116);">
                                            <option ></option>
                                            @foreach($v_color as $key => $color)
                                            <option value="{{$product->product_id}}-{{$color}}" style="background-color: {{$color}};">{{$color}}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="product__variant--list mb-15">
                                    <fieldset class="variant__input--fieldset ">
                                        <legend class="product__variant--title mb-8">Size :</legend>
                                        @php
                                            $v_size = explode(',',$product->size);
                                        @endphp
                                        <select name="size" id="select_size" style="width:100px; background-color:rgba(128, 128, 128, 0.11); border:1px solid rgba(128, 128, 128, 0.116);">
                                            <option value="">Size</option>
                                            @foreach($v_size as $value)
                                            <option value="{{$product->product_id}}-{{$value}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                @endif
                                @if($product->product_type=="Variation Product")
                                <form method="POST" id="variationProduct">
                                    @csrf
                                <div>
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus" style="background-color: #ee2761; border:none; color:white; font-size:16px; width:20px;">
                                        <input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="" style="width:50px; text-align:center; border:#ee2761 1px solid; color:#ee2761;">
                                        <input type="button" value="+" class="plus" style="background-color: #ee2761; border:none; color:white; font-size:16px; width:20px;">
                                    </div>
                                </div>
                                        <div class="product__variant--list mb-15 mt-4">
                                            <input type="hidden" name="product_id" value="{{$product->product_id}}">
                                            <input type="text" hidden name="product_price" id="product_price" value="" required>
                                            <input type="text" hidden name="product_size" id="product_size" value="" required>
                                            <input type="text" hidden name="product_color" id="product_color" value="" required>
                                            <button class="variant__buy--now__btn primary__btn" type="submit" id="cart-btn">Add to Cart</button>
                                        </div>
                                    </form>
                                @else
                                <form method="POST" id="singleProduct">
                                    @csrf
                                    <div>
                                        <div class="quantity buttons_added">
                                            <input type="button" value="-" class="minus" style="background-color: #ee2761; border:none; color:white; font-size:16px; width:20px;">
                                            <input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="" style="width:50px; text-align:center; border:#ee2761 1px solid; color:#ee2761;">
                                            <input type="button" value="+" class="plus" style="background-color: #ee2761; border:none; color:white; font-size:16px; width:20px;">
                                        </div>
                                    </div>
                                    <div class="product__variant--list mb-15 mt-4">
                                        <input type="hidden" name="product_id" value="{{$product->product_id}}">
                                        <button class="variant__buy--now__btn primary__btn" type="submit" id="cart-btn-single">Add to Cart</button>
                                    </div>
                                </form>
                                @endif
                                <div class="product__details--info__meta">
                                    <p class="product__details--info__meta--list"><strong>Product Code:</strong>  <span>{{$product->product_code}}</span> </p>
                                    <p class="product__details--info__meta--list"><strong>Category:</strong>  <span>{{$product->cat->name}}</span></p>
                                    <p class="product__details--info__meta--list"><strong>Sub Category:</strong>  <span>{{$product->subcat->subcat_name}}</span></p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End product details section -->

</main>

@endsection
<script language="JavaScript" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                },
                error:function(error){
                    alert("Please select any variation");
                }
            });
        });

        // Variation Product Add to Cart
        $("#variationProduct").submit(function(event){
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
                },
                error:function(error){
                    alert("Please select any variation");
                }
            });
        });


    });
</script>