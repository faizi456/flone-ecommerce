@extends('user.layouts.main')

@section('main-section')

    <div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li class="active">Shop </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="shop-area pt-95 pb-100">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="shop-bottom-area mt-35">
                        <div class="tab-content jump">
                            <div id="shop-1" class="tab-pane active">
                                <div class="row">
                                    @foreach($products as $product)
                                        @if($product->status == "1")
                                        <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6">
                                            <div class="product-wrap mb-25 scroll-zoom" style="box-shadow: 0px 3px 9px 1px rgba(0, 0, 0, 0.096); border-radius:14px;">
                                                <div class="product-img">
                                                    @php
                                                        $product_images = explode(',',$product->images);
                                                    @endphp
                                                    <a href="{{route('productDetail',$product->product_id)}}">
                                                        <img class="default-img" height="300px" width="300px" src="{{asset($product_images[0])}}" style="border-top-right-radius:14px; border-top-left-radius:14px;" alt="Product image">
                                                        <img class="hover-img" height="300px" width="300px" src="{{asset($product_images[1])}}" style="border-top-right-radius:14px; border-top-left-radius:14px;" alt="Product image">
                                                    </a>
                                                    {{-- <span class="pink">-10%</span> --}}
                                                    <div class="product-action">
                                                        <div class="pro-same-action pro-wishlist">
                                                            <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                                        </div>
                                                        <div class="pro-same-action pro-cart">
                                                            <a href="{{route('productDetail',$product->product_id)}}"><small> View Item Detail</small></a>
                                                        </div>
                                                        <div class="pro-same-action pro-quickview">
                                                            <a title="Quick View" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content text-center">
                                                    <h3><a href="{{route('productDetail',$product->product_id)}}">{{$product->product_name}}</a></h3>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star-o yellow"></i>
                                                        <i class="fa fa-star-o yellow"></i>
                                                        <i class="fa fa-star-o yellow"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        @if($product->product_type == "Single Product")
                                                            <span>RS. {{$product->unitPrice}}</span>
                                                        @else
                                                                @php
                                                                    $v_unitPrice = unserialize($product->unitPrice);
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
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="pro-pagination-style text-center mt-30">
                            <ul>
                                <li><a class="prev" href="#"><i class="fa fa-angle-double-left"></i></a></li>
                                <li><a class="active" href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a class="next" href="#"><i class="fa fa-angle-double-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="sidebar-style mr-30">
                        <div class="sidebar-widget">
                            <h4 class="pro-sidebar-title">Search </h4>
                            <div class="pro-sidebar-search mb-50 mt-25">
                                <form class="pro-sidebar-search-form" action="#">
                                    <input type="text" placeholder="Search here...">
                                    <button>
                                        <i class="pe-7s-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h4 class="pro-sidebar-title">Categories</h4>
                            <div class="sidebar-widget-list mt-30">
                                <ul class="submenu">
                                    @foreach($categories as $category)
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <a href="">{{$category->name}}</a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget mt-50">
                            <h4 class="pro-sidebar-title">Sub Categories</h4>
                            <div class="sidebar-widget-list mt-30">
                                <ul class="submenu">
                                    @foreach($subcategories as $subcategory)
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <a href="">{{$subcategory->subcat_name}}</a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection