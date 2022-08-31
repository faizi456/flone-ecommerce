@extends('user.layouts.main')

@section('main-section')


    <div class="slider-area">
        <div class="slider-active owl-carousel nav-style-1 owl-dot-none">
            <div class="single-slider slider-height-1 bg-purple">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                            <div class="slider-content slider-animated-1">
                                <h3 class="animated">Smart Products</h3>
                                <h1 class="animated">Summer Offer <br>2020 Collection</h1>
                                <div class="slider-btn btn-hover">
                                    <a class="animated" href="shop.html">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                            <div class="slider-single-img slider-animated-1">
                                <img class="animated" src="FrontendFiles/assets/img/slider/single-slide-1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider slider-height-1 bg-purple">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                            <div class="slider-content slider-animated-1">
                                <h3 class="animated">Smart Products</h3>
                                <h1 class="animated">Summer Offer <br>2020 Collection</h1>
                                <div class="slider-btn btn-hover">
                                    <a class="animated" href="shop.html">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                            <div class="slider-single-img slider-animated-1">
                                <img class="animated" src="FrontendFiles/assets/img/slider/single-slide-hm1-2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="suppoer-area pt-100 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="support-wrap mb-30 support-1">
                        <div class="support-icon">
                            <img class="animated" src="FrontendFiles/assets/img/icon-img/support-1.png" alt="">
                        </div>
                        <div class="support-content">
                            <h5>Free Shipping</h5>
                            <p>Free shipping on all order</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="support-wrap mb-30 support-2">
                        <div class="support-icon">
                            <img class="animated" src="FrontendFiles/assets/img/icon-img/support-2.png" alt="">
                        </div>
                        <div class="support-content">
                            <h5>Support 24/7</h5>
                            <p>Free shipping on all order</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="support-wrap mb-30 support-3">
                        <div class="support-icon">
                            <img class="animated" src="FrontendFiles/assets/img/icon-img/support-3.png" alt="">
                        </div>
                        <div class="support-content">
                            <h5>Money Return</h5>
                            <p>Free shipping on all order</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="support-wrap mb-30 support-4">
                        <div class="support-icon">
                            <img class="animated" src="FrontendFiles/assets/img/icon-img/support-4.png" alt="">
                        </div>
                        <div class="support-content">
                            <h5>Order Discount</h5>
                            <p>Free shipping on all order</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-area pb-60">
        <div class="container">
            <div class="section-title text-center">
                <h2>DAILY DEALS!</h2>
            </div>
            <div class="product-tab-list nav pt-30 pb-55 text-center">
                <a class="active" href="#product-1" data-bs-toggle="tab" >
                    <h4>New Arrivals  </h4>
                </a>
                <a href="#product-2" data-bs-toggle="tab">
                    <h4>Sale Items </h4>
                </a>
            </div>
            <div class="tab-content jump">
                <div class="tab-pane active" id="product-1">
                    <div class="row">
                        @foreach($latest_products as $new_product)
                            <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                                <div class="product-wrap mb-25">
                                    <div class="product-img">
                                        @php
                                            $product_images = explode(',',$new_product->images);
                                        @endphp
                                        <a href="{{route('productDetail',$new_product->product_id)}}">
                                            <img class="default-img" src="{{asset($product_images[0])}}" alt="New Product image" width="200px" height="300px">
                                            <img class="hover-img" src="{{asset($product_images[1])}}" alt="New Product image" width="200px" height="300px">
                                        </a>
                                        <span class="purple">New</span>
                                        <div class="product-action">
                                            <div class="pro-same-action pro-wishlist">
                                                <a title="Wishlist" href="wishlist.html"><i class="pe-7s-like"></i></a>
                                            </div>
                                            <div class="pro-same-action pro-cart">
                                                <a title="Add To Cart" href="{{route('productDetail',$new_product->product_id)}}">View item Detail</a>
                                            </div>
                                            <div class="pro-same-action pro-quickview">
                                                <a title="Quick View" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="{{route('productDetail',$new_product->product_id)}}">{{$new_product->product_name}}</a></h3>
                                        <div class="product-rating">
                                            <i class="fa fa-star-o yellow"></i>
                                            <i class="fa fa-star-o yellow"></i>
                                            <i class="fa fa-star-o yellow"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="product-price">
                                            @if($new_product->product_type == "Single Product")
                                                <span>RS. {{$new_product->unitPrice}}</span>
                                            @else
                                                @php
                                                    $v_unitPrice = unserialize($new_product->unitPrice);
                                                    $newUnitPrice = array();
                                                    $i=0;
                                                @endphp
                                                @foreach($v_unitPrice as $key=>$val)
                                                    @php
                                                        $newUnitPrice[$i] = $val;
                                                        $i++;
                                                    @endphp
                                                @endforeach
                                                <span>RS. {{$newUnitPrice[0]}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane " id="product-2">
                    <div class="row">
                        @foreach($sale_products as $sale_product)
                            <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                                <div class="product-wrap mb-25">
                                    <div class="product-img">
                                        @php
                                            $sale_product_images = explode(',',$sale_product->images);
                                        @endphp
                                        <a href="{{route('productDetail',$sale_product->product_id)}}">
                                            <img class="default-img" src="{{asset($sale_product_images[0])}}" alt="Sale product image"  width="200px" height="300px">
                                            <img class="hover-img" src="{{asset($sale_product_images[1])}}" alt="sale product image"  width="200px" height="300px">
                                        </a>
                                        <span class="pink">-20%</span>
                                        <div class="product-action">
                                            <div class="pro-same-action pro-wishlist">
                                                <a title="Wishlist" href="wishlist.html"><i class="pe-7s-like"></i></a>
                                            </div>
                                            <div class="pro-same-action pro-cart">
                                                <a title="Add To Cart" href="{{route('productDetail',$sale_product->product_id)}}"><i class="pe-7s-cart"></i> View Item Detail</a>
                                            </div>
                                            <div class="pro-same-action pro-quickview">
                                                <a title="Quick View" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="{{route('productDetail',$sale_product->product_id)}}">{{$sale_product->product_name}} </a></h3>
                                        <div class="product-rating">
                                            <i class="fa fa-star-o yellow"></i>
                                            <i class="fa fa-star-o yellow"></i>
                                            <i class="fa fa-star-o yellow"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="product-price">
                                            @if($sale_product->product_type == "Single Product")
                                                <span>RS. {{$sale_product->unitPrice}}</span>
                                            @else
                                                @php
                                                    $v_unitPrice = unserialize($sale_product->unitPrice);
                                                    $newUnitPrice = array();
                                                    $i=0;
                                                @endphp
                                                @foreach($v_unitPrice as $key=>$val)
                                                    @php
                                                        $newUnitPrice[$i] = $val;
                                                        $i++;
                                                    @endphp
                                                @endforeach
                                                <span>RS. {{$newUnitPrice[0]}}</span>
                                            @endif
                                            <span class="old">RS. {{$newUnitPrice[0] + $newUnitPrice[0]/100*20}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog-area pb-55">
        <div class="container">
            <div class="section-title text-center mb-55">
                <h2>OUR BLOG</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog-wrap mb-30 scroll-zoom">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="FrontendFiles/assets/img/blog/blog-1.jpg" alt=""></a>
                            <span class="purple">Lifestyle</span>
                        </div>
                        <div class="blog-content-wrap">
                            <div class="blog-content text-center">
                                <h3><a href="blog-details.html">Lorem ipsum dolor sit <br> amet consec.</a></h3>
                                <span>By Shop <a href="#">Admin</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog-wrap mb-30 scroll-zoom">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="FrontendFiles/assets/img/blog/blog-2.jpg" alt=""></a>
                            <span class="pink">Lifestyle</span>
                        </div>
                        <div class="blog-content-wrap">
                            <div class="blog-content text-center">
                                <h3><a href="blog-details.html">Lorem ipsum dolor sit <br> amet consec.</a></h3>
                                <span>By Shop <a href="#">Admin</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog-wrap mb-30 scroll-zoom">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="FrontendFiles/assets/img/blog/blog-3.jpg" alt=""></a>
                            <span class="purple">Lifestyle</span>
                        </div>
                        <div class="blog-content-wrap">
                            <div class="blog-content text-center">
                                <h3><a href="blog-details.html">Lorem ipsum dolor sit <br> amet consec.</a></h3>
                                <span>By Shop <a href="#">Admin</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection