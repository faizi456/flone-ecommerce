@extends('user.layouts.main')

@section('main-section')
    <div class="shop-area breadcrumb-mt section-padding-12 pt-25 pb-160">
        <div class="container-fluid">
            <div class="row flex-row-reverse">
                <div class="col-xl-10 col-lg-9">
                    <div class="shop-wrap-5">
                        <div class="shop-top-bar">
                            <div class="shop-top-bar-left">
                                <div class="shop-tab nav">
                                    <a href="#shop-1" class="active" data-toggle="tab"><img class="inject-me" src="{{asset('FrontendFiles/images/icon-img/shop-grid.svg')}}" alt=""></a>
                                    <a href="#shop-2" data-toggle="tab"><img class="inject-me" src="{{asset('FrontendFiles/images/icon-img/shop-list.svg')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="shop-top-bar-right">
                                <div class="shop-page-list">
                                    <ul>
                                        <li>Show</li>
                                        <li class="active"><a href="#">2</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">6</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content pt-30">
                            <div id="shop-1" class="tab-pane active">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="product-wrap mb-50">
                                            <div class="product-img product-img-zoom mb-25">
                                                <a href="product-details.html">
                                                    <img src="FrontendFiles/images/product/product-98.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <h4><a href="product-details.html">Wood Pen & Holder</a></h4>
                                                <div class="product-price">
                                                    <span>$ 124</span>
                                                    <span class="old-price">$ 130</span>
                                                </div>
                                            </div>
                                            <div class="product-action-position-1 text-center">
                                                <div class="product-content">
                                                    <h4><a href="product-details.html">Wood Pen & Holder</a></h4>
                                                    <div class="product-price">
                                                        <span>$ 124</span>
                                                        <span class="old-price">$ 130</span>
                                                    </div>
                                                </div>
                                                <div class="product-action-wrap">
                                                    <div class="product-action-cart">
                                                        <button title="Add to Cart">Add to cart</button>
                                                    </div>
                                                    <button data-toggle="modal" data-target="#exampleModal"><i class="icon-zoom"></i></button>
                                                    <button title="Add to Compare"><i class="icon-compare"></i></button>
                                                    <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="product-wrap mb-50">
                                            <div class="product-img product-img-zoom mb-25">
                                                <a href="product-details.html">
                                                    <img src="FrontendFiles/images/product/product-99.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <h4><a href="product-details.html">Eco Bag</a></h4>
                                                <div class="product-price">
                                                    <span>$ 124</span>
                                                    <span class="old-price">$ 130</span>
                                                </div>
                                            </div>
                                            <div class="product-action-position-1 text-center">
                                                <div class="product-content">
                                                    <h4><a href="product-details.html">Eco Bag</a></h4>
                                                    <div class="product-price">
                                                        <span>$ 124</span>
                                                        <span class="old-price">$ 130</span>
                                                    </div>
                                                </div>
                                                <div class="product-action-wrap">
                                                    <div class="product-action-cart">
                                                        <button title="Add to Cart">Add to cart</button>
                                                    </div>
                                                    <button data-toggle="modal" data-target="#exampleModal"><i class="icon-zoom"></i></button>
                                                    <button title="Add to Compare"><i class="icon-compare"></i></button>
                                                    <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="product-wrap mb-50">
                                            <div class="product-img product-img-zoom mb-25">
                                                <a href="product-details.html">
                                                    <img src="FrontendFiles/images/product/product-100.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <h4><a href="product-details.html">Table Plant</a></h4>
                                                <div class="product-price">
                                                    <span>$ 124</span>
                                                    <span class="old-price">$ 130</span>
                                                </div>
                                            </div>
                                            <div class="product-action-position-1 text-center">
                                                <div class="product-content">
                                                    <h4><a href="product-details.html">Table Plant</a></h4>
                                                    <div class="product-price">
                                                        <span>$ 124</span>
                                                        <span class="old-price">$ 130</span>
                                                    </div>
                                                </div>
                                                <div class="product-action-wrap">
                                                    <div class="product-action-cart">
                                                        <button title="Add to Cart">Add to cart</button>
                                                    </div>
                                                    <button data-toggle="modal" data-target="#exampleModal"><i class="icon-zoom"></i></button>
                                                    <button title="Add to Compare"><i class="icon-compare"></i></button>
                                                    <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="product-wrap mb-50">
                                            <div class="product-img product-img-zoom mb-25">
                                                <a href="product-details.html">
                                                    <img src="FrontendFiles/images/product/product-137.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <h4><a href="product-details.html">Product Title</a></h4>
                                                <div class="product-price">
                                                    <span>$ 124</span>
                                                    <span class="old-price">$ 130</span>
                                                </div>
                                            </div>
                                            <div class="product-action-position-1 text-center">
                                                <div class="product-content">
                                                    <h4><a href="product-details.html">Product Title</a></h4>
                                                    <div class="product-price">
                                                        <span>$ 124</span>
                                                        <span class="old-price">$ 130</span>
                                                    </div>
                                                </div>
                                                <div class="product-action-wrap">
                                                    <div class="product-action-cart">
                                                        <button title="Add to Cart">Add to cart</button>
                                                    </div>
                                                    <button data-toggle="modal" data-target="#exampleModal"><i class="icon-zoom"></i></button>
                                                    <button title="Add to Compare"><i class="icon-compare"></i></button>
                                                    <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="product-wrap mb-50">
                                            <div class="product-img product-img-zoom mb-25">
                                                <a href="product-details.html">
                                                    <img src="FrontendFiles/images/product/product-96.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <h4><a href="product-details.html">Product Title</a></h4>
                                                <div class="product-price">
                                                    <span>$ 124</span>
                                                    <span class="old-price">$ 130</span>
                                                </div>
                                            </div>
                                            <div class="product-action-position-1 text-center">
                                                <div class="product-content">
                                                    <h4><a href="product-details.html">Product Title</a></h4>
                                                    <div class="product-price">
                                                        <span>$ 124</span>
                                                        <span class="old-price">$ 130</span>
                                                    </div>
                                                </div>
                                                <div class="product-action-wrap">
                                                    <div class="product-action-cart">
                                                        <button title="Add to Cart">Add to cart</button>
                                                    </div>
                                                    <button data-toggle="modal" data-target="#exampleModal"><i class="icon-zoom"></i></button>
                                                    <button title="Add to Compare"><i class="icon-compare"></i></button>
                                                    <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="product-wrap mb-50">
                                            <div class="product-img product-img-zoom mb-25">
                                                <a href="product-details.html">
                                                    <img src="FrontendFiles/images/product/product-97.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <h4><a href="product-details.html">Product Title</a></h4>
                                                <div class="product-price">
                                                    <span>$ 124</span>
                                                    <span class="old-price">$ 130</span>
                                                </div>
                                            </div>
                                            <div class="product-action-position-1 text-center">
                                                <div class="product-content">
                                                    <h4><a href="product-details.html">Product Title</a></h4>
                                                    <div class="product-price">
                                                        <span>$ 124</span>
                                                        <span class="old-price">$ 130</span>
                                                    </div>
                                                </div>
                                                <div class="product-action-wrap">
                                                    <div class="product-action-cart">
                                                        <button title="Add to Cart">Add to cart</button>
                                                    </div>
                                                    <button data-toggle="modal" data-target="#exampleModal"><i class="icon-zoom"></i></button>
                                                    <button title="Add to Compare"><i class="icon-compare"></i></button>
                                                    <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="product-wrap mb-50">
                                            <div class="product-img product-img-zoom mb-25">
                                                <a href="product-details.html">
                                                    <img src="FrontendFiles/images/product/product-98.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <h4><a href="product-details.html">Product Title</a></h4>
                                                <div class="product-price">
                                                    <span>$ 124</span>
                                                    <span class="old-price">$ 130</span>
                                                </div>
                                            </div>
                                            <div class="product-action-position-1 text-center">
                                                <div class="product-content">
                                                    <h4><a href="product-details.html">Product Title</a></h4>
                                                    <div class="product-price">
                                                        <span>$ 124</span>
                                                        <span class="old-price">$ 130</span>
                                                    </div>
                                                </div>
                                                <div class="product-action-wrap">
                                                    <div class="product-action-cart">
                                                        <button title="Add to Cart">Add to cart</button>
                                                    </div>
                                                    <button data-toggle="modal" data-target="#exampleModal"><i class="icon-zoom"></i></button>
                                                    <button title="Add to Compare"><i class="icon-compare"></i></button>
                                                    <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="product-wrap mb-50">
                                            <div class="product-img product-img-zoom mb-25">
                                                <a href="product-details.html">
                                                    <img src="FrontendFiles/images/product/product-99.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <h4><a href="product-details.html">Product Title</a></h4>
                                                <div class="product-price">
                                                    <span>$ 124</span>
                                                    <span class="old-price">$ 130</span>
                                                </div>
                                            </div>
                                            <div class="product-action-position-1 text-center">
                                                <div class="product-content">
                                                    <h4><a href="product-details.html">Product Title</a></h4>
                                                    <div class="product-price">
                                                        <span>$ 124</span>
                                                        <span class="old-price">$ 130</span>
                                                    </div>
                                                </div>
                                                <div class="product-action-wrap">
                                                    <div class="product-action-cart">
                                                        <button title="Add to Cart">Add to cart</button>
                                                    </div>
                                                    <button data-toggle="modal" data-target="#exampleModal"><i class="icon-zoom"></i></button>
                                                    <button title="Add to Compare"><i class="icon-compare"></i></button>
                                                    <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="shop-2" class="tab-pane ">
                                <div class="shop-list-wrap mb-50">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="product-list-img">
                                                <a href="product-details.html">
                                                    <img src="FrontendFiles/images/product/product-138.jpg" alt="">
                                                </a>
                                                <div class="shop-list-quickview">
                                                    <button data-toggle="modal" data-target="#exampleModal"><i class="icon-zoom"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <div class="shop-list-content ml-20">
                                                <h3><a href="#">Product Title Here</a></h3>
                                                <div class="pro-list-price">
                                                    <span>$50.00</span>
                                                    <span class="old-price">$50.00</span>
                                                </div>
                                                <p>Composition: 50% cotton,45% polyester, 5% polyamide. Filling: 100% polyester. Hood fur: 64% acrylic,23% modacrylic,13% polyester</p>
                                                <div class="product-list-action">
                                                    <button title="Add to Compare"><i class="icon-compare"></i></button>
                                                    <div class="product-action-cart">
                                                        <button title="Add to Cart">Add to cart</button>
                                                    </div>
                                                    <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shop-list-wrap mb-50">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="product-list-img">
                                                <a href="product-details.html">
                                                    <img src="FrontendFiles/images/product/product-137.jpg" alt="">
                                                </a>
                                                <div class="shop-list-quickview">
                                                    <button data-toggle="modal" data-target="#exampleModal"><i class="icon-zoom"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <div class="shop-list-content ml-20">
                                                <h3><a href="#">Product Title Here</a></h3>
                                                <div class="pro-list-price">
                                                    <span>$50.00</span>
                                                    <span class="old-price">$50.00</span>
                                                </div>
                                                <p>Composition: 50% cotton,45% polyester, 5% polyamide. Filling: 100% polyester. Hood fur: 64% acrylic,23% modacrylic,13% polyester</p>
                                                <div class="product-list-action">
                                                    <button title="Add to Compare"><i class="icon-compare"></i></button>
                                                    <div class="product-action-cart">
                                                        <button title="Add to Cart">Add to cart</button>
                                                    </div>
                                                    <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shop-list-wrap mb-50">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="product-list-img">
                                                <a href="product-details.html">
                                                    <img src="FrontendFiles/images/product/product-136.jpg" alt="">
                                                </a>
                                                <div class="shop-list-quickview">
                                                    <button data-toggle="modal" data-target="#exampleModal"><i class="icon-zoom"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <div class="shop-list-content ml-20">
                                                <h3><a href="#">Product Title Here</a></h3>
                                                <div class="pro-list-price">
                                                    <span>$50.00</span>
                                                    <span class="old-price">$50.00</span>
                                                </div>
                                                <p>Composition: 50% cotton,45% polyester, 5% polyamide. Filling: 100% polyester. Hood fur: 64% acrylic,23% modacrylic,13% polyester</p>
                                                <div class="product-list-action">
                                                    <button title="Add to Compare"><i class="icon-compare"></i></button>
                                                    <div class="product-action-cart">
                                                        <button title="Add to Cart">Add to cart</button>
                                                    </div>
                                                    <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-pagination-style text-center mt-50">
                                <ul>
                                    <li><a class="active" href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#"><i class="icofont-long-arrow-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3">
                    <div class="shop-sidebar-style shop-sidebar-style-mrg2">
                        <div class="sidebar-widget">
                            <h4 class="pro-sidebar-title">Subcategories</h4>
                            <div class="sidebar-widget-categori mt-45 mb-70">
                                <ul>
                                    <li><a href="#">All</a> </li>
                                    <li><a class="active" href="#">Clothing</a> </li>
                                    <li><a href="#">Shoes</a> </li>
                                    <li><a href="#">Watches</a> </li>
                                    <li><a href="#">Jewelry</a> </li>
                                    <li><a href="#">Accessories</a> </li>
                                    <li><a href="#"> Big & Tall </a> </li>
                                    <li><a href="#">Contemporary</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h4 class="pro-sidebar-title">Filter By Color</h4>
                            <div class="pro-details-color-content sidebar-widget-color mt-45 mb-70">
                                <ul>
                                    <li><a class="white" href="#">Black</a></li>
                                    <li><a class="azalea" href="#">Blue</a></li>
                                    <li><a class="dolly" href="#">Green</a></li>
                                    <li><a class="peach-orange" href="#">Orange</a></li>
                                    <li><a class="mona-lisa active" href="#">Pink</a></li>
                                    <li><a class="cupid" href="#">gray</a></li>
                                    <li><a class="one" href="#">one</a></li>
                                    <li><a class="two" href="#">two</a></li>
                                    <li><a class="three" href="#">three</a></li>
                                    <li><a class="four" href="#">four</a></li>
                                    <li><a class="five" href="#">five</a></li>
                                    <li><a class="six" href="#">six</a></li>
                                    <li><a class="seven" href="#">seven</a></li>
                                    <li><a class="eight" href="#">eight</a></li>
                                    <li><a class="nine" href="#">nine</a></li>
                                    <li><a class="ten" href="#">ten</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h4 class="pro-sidebar-title">Filter By Size</h4>
                            <div class="sidebar-widget-size mt-50 mb-75">
                                <ul>
                                    <li><a href="#">XS</a> </li>
                                    <li><a href="#">S</a> </li>
                                    <li><a href="#">M</a> </li>
                                    <li><a href="#">L</a> </li>
                                    <li><a href="#">XL</a> </li>
                                    <li><a href="#">XXL</a> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h4 class="pro-sidebar-title">Filter By Price Range</h4>
                            <div class="price-filter mt-55 mb-65">
                                <div id="slider-range"></div>
                                <div class="price-slider-amount">
                                    <div class="label-input">
                                        <span>Price: </span><input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h4 class="pro-sidebar-title">Filter By Brand</h4>
                            <div class="sidebar-widget-brand-logo mt-50">
                                <ul>
                                    <li><a href="#"><img src="FrontendFiles/images/brand-logo/brand-logo-1.png" alt=""></a></li>
                                    <li><a href="#"><img src="FrontendFiles/images/brand-logo/brand-logo-2.png" alt=""></a></li>
                                    <li><a href="#"><img src="FrontendFiles/images/brand-logo/brand-logo-3.png" alt=""></a></li>
                                    <li><a href="#"><img src="FrontendFiles/images/brand-logo/brand-logo-6.png" alt=""></a></li>
                                    <li><a href="#"><img src="FrontendFiles/images/brand-logo/brand-logo-5.png" alt=""></a></li>
                                    <li><a href="#"><img src="FrontendFiles/images/brand-logo/brand-logo-4.png" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-12 col-sm-6">
                        <div class="quickview-img">
                            <img src="FrontendFiles/images/product/product-3.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-12 col-sm-6">
                        <div class="product-details-content quickview-content">
                            <h2>Electronic Shop</h2>
                            <div class="product-ratting-review-wrap">
                                <div class="product-ratting-digit-wrap">
                                    <div class="product-ratting">
                                        <i class="icon-rating"></i>
                                        <i class="icon-rating"></i>
                                        <i class="icon-rating"></i>
                                        <i class="icon-rating"></i>
                                        <i class="icon-star-empty"></i>
                                    </div>
                                    <div class="product-digit">
                                        <span>4.0</span>
                                    </div>
                                </div>
                                <div class="product-review-order">
                                    <span>62 Reviews</span>
                                    <span>242 orders</span>
                                </div>
                            </div>
                            <p>Seamlessly predominate enterprise metrics without performance based process improvements.</p>
                            <div class="pro-details-price">
                                <span>US $75.72</span>
                                <span class="old-price">US $95.72</span>
                            </div>
                            <div class="pro-details-color-wrap">
                                <span>Color:</span>
                                <div class="pro-details-color-content">
                                    <ul>
                                        <li><a class="white" href="#">Black</a></li>
                                        <li><a class="azalea" href="#">Blue</a></li>
                                        <li><a class="dolly" href="#">Green</a></li>
                                        <li><a class="peach-orange" href="#">Orange</a></li>
                                        <li><a class="mona-lisa active" href="#">Pink</a></li>
                                        <li><a class="cupid" href="#">gray</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pro-details-size">
                                <span>Size:</span>
                                <div class="pro-details-size-content">
                                    <ul>
                                        <li><a href="#">XS</a></li>
                                        <li><a href="#">S</a></li>
                                        <li><a href="#">M</a></li>
                                        <li><a href="#">L</a></li>
                                        <li><a href="#">XL</a></li>
                                        <li><a href="#">XXL</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pro-details-quality">
                                <span>Quantity:</span>
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1">
                                </div>
                            </div>
                            <div class="product-details-meta">
                                <ul>
                                    <li><span>Model:</span> <a href="#">Odsy-1000</a></li>
                                    <li><span>Ship To</span> <a href="#">2834 Laurel Lane</a>, <a href="#">Mentone</a> , <a href="#">Texas</a></li>
                                </ul>
                            </div>
                            <div class="pro-details-action-wrap">
                                <div class="pro-details-buy-now">
                                    <a href="#">Buy Now</a>
                                </div>
                                <div class="pro-details-action">
                                    <a title="Add to Cart" href="#"><i class="icon-basket"></i></a>
                                    <a title="Add to Wishlist" href="#"><i class="icon-heart"></i></a>
                                    <a class="social" title="Social" href="#"><i class="icon-share"></i></a>
                                    <div class="product-dec-social">
                                        <a class="facebook" title="Facebook" href="#"><i class="icon-social-facebook-square"></i></a>
                                        <a class="twitter" title="Twitter" href="#"><i class="icon-social-twitter"></i></a>
                                        <a class="instagram" title="Instagram" href="#"><i class="icon-social-instagram"></i></a>
                                        <a class="pinterest" title="Pinterest" href="#"><i class="icon-social-pinterest"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->
@endsection

