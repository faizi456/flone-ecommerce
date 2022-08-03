<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dking - Multipurpose eCommerce HTML Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('FrontendFiles/images/favicon.png')}}">

    <!-- All CSS is here
	============================================ -->

    <!-- <link rel="stylesheet" href="FrontendFiles/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="FrontendFiles/css/vendor/vandella.css">
    <link rel="stylesheet" href="FrontendFiles/css/vendor/jellybelly.css">
    <link rel="stylesheet" href="FrontendFiles/css/vendor/icofont.min.css">
    <link rel="stylesheet" href="FrontendFiles/css/vendor/fontello.css">
    <link rel="stylesheet" href="FrontendFiles/css/plugins/easyzoom.css">
    <link rel="stylesheet" href="FrontendFiles/css/plugins/slick.css">
    <link rel="stylesheet" href="FrontendFiles/css/plugins/nice-select.css">
    <link rel="stylesheet" href="FrontendFiles/css/plugins/animate.css">
    <link rel="stylesheet" href="FrontendFiles/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="FrontendFiles/css/plugins/jquery-ui.css">
    <link rel="stylesheet" href="FrontendFiles/css/style.css"> -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <link rel="stylesheet" href="{{asset('FrontendFiles/css/vendor/vendor.min.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendFiles/css/plugins/plugins.min.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendFiles/css/style.min.css')}}">
</head>

<body>
    <div class="main-wrapper main-wrapper-3">
        <header class="header-area section-padding-1 transparent-bar">
            <div class="header-large-device">
                <div class="header-bottom sticky-bar">
                    <div class="container-fluid">
                        <div class="header-bottom-flex">
                            <div class="logo-menu-wrap">
                                <div class="logo">
                                    <a href="{{url('/')}}">
                                        <img src="{{asset('FrontendFiles/images/logo/logo-9.png')}}" alt="logo">
                                    </a>
                                </div>
                                <div class="main-menu menu-lh-1 main-menu-padding-1 menu-mrg-1">
                                    <nav>
                                        <ul>
                                            <li><a href="{{url('/')}}">Home</a></li>
                                            <li><a href="{{url('/shop')}}">Shop</a>
                                                <ul class="sub-menu-width">
                                                    @foreach($categories as $value)
                                                        <li><a href="{{ url('maincategory/'.$value->id) }}">{{ $value->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li><a href="{{url('/blog')}}">Blog</a></li>
                                            <li><a href="{{url('/aboutUs')}}">About Us</a></li>
                                            <li><a href="{{url('/contactUs')}}">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="header-action-wrap header-action-flex header-action-width header-action-mrg-1">
                                <div class="search-style-1">
                                    <form>
                                        <div class="form-search-1">
                                            <input class="input-text" value="" placeholder="Type to search" type="search">
                                            <button>
                                                <i class="icofont-search-1"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="same-style">
                                    <a href="login-register.html"><i class="icofont-user-alt-3"></i></a>
                                </div>
                                <div class="same-style header-cart">
                                    <a class="cart-active" href="#"><i class="icofont-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-small-device header-small-ptb sticky-bar">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="mobile-logo mobile-logo-width">
                                <a href="index.html">
                                    <img alt="" src="{{asset('FrontendFiles/images/logo/logo-9.png')}}">
                                </a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="header-action-wrap header-action-flex header-action-mrg-1">
                                <div class="same-style header-cart">
                                    <a class="cart-active" href="#"><i class="icofont-shopping-cart"></i></a>
                                </div>
                                <div class="same-style header-info">
                                    <button class="mobile-menu-button-active">
                                        <span class="info-width-1"></span>
                                        <span class="info-width-2"></span>
                                        <span class="info-width-3"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- mini cart start -->
        <div class="sidebar-cart-active">
            <div class="sidebar-cart-all">
                <a class="cart-close" href="#"><i class="icofont-close-line"></i></a>
                <div class="cart-content">
                    <h3>Shopping Cart</h3>
                    <ul>
                        <li class="single-product-cart">
                            <div class="cart-img">
                                <a href="#"><img src="{{asset('FrontendFiles/images/cart/cart-1.jpg')}}" alt=""></a>
                            </div>
                            <div class="cart-title">
                                <h4><a href="#">Awesome Mobile</a></h4>
                                <span> 1 × $49.00 </span>
                            </div>
                            <div class="cart-delete">
                                <a href="#">×</a>
                            </div>
                        </li>
                        <li class="single-product-cart">
                            <div class="cart-img">
                                <a href="#"><img src="{{asset('FrontendFiles/images/cart/cart-2.jpg')}}" alt=""></a>
                            </div>
                            <div class="cart-title">
                                <h4><a href="#">Smart Watch</a></h4>
                                <span> 1 × $49.00 </span>
                            </div>
                            <div class="cart-delete">
                                <a href="#">×</a>
                            </div>
                        </li>
                    </ul>
                    <div class="cart-total">
                        <h4>Subtotal: <span>$170.00</span></h4>
                    </div>
                    <div class="cart-checkout-btn">
                        <a class="btn-hover cart-btn-style" href="cart.html">view cart</a>
                        <a class="no-mrg btn-hover cart-btn-style" href="checkout.html">checkout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile menu start -->
        <div class="mobile-menu-active clickalbe-sidebar-wrapper-style-1">
            <div class="clickalbe-sidebar-wrap">
                <a class="sidebar-close"><i class="icofont-close-line"></i></a>
                <div class="mobile-menu-content-area sidebar-content-100-percent">
                    <div class="mobile-search">
                        <form class="search-form" action="#">
                            <input type="text" placeholder="Search here…">
                            <button class="button-search"><i class="icofont-search-1"></i></button>
                        </form>
                    </div>
                    <div class="clickable-mainmenu-wrap clickable-mainmenu-style1">
                        <nav>
                            <ul>
                                <li class="has-sub-menu"><a href="#">Home</a>
                                    <ul class="sub-menu-2">
                                        <li class="has-sub-menu"><a href="#">Demo Group #01</a>
                                            <ul class="sub-menu-2">
                                                <li><a href="index.html">Home Multipurpose</a></li>
                                                <li><a href="index-megashop.html">Home Mega Shop</a></li>
                                                <li><a href="index-fashion.html">Home Fashion</a></li>
                                                <li><a href="index-fashion-2.html">Home Fashion 2 </a></li>
                                                <li><a href="index-automobile.html">Home Automobile</a></li>
                                                <li><a href="index-furniture.html">Home Furniture</a></li>
                                                <li><a href="index-electric.html">Home Electric</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-sub-menu"><a href="#">Demo Group #02</a>
                                            <ul class="sub-menu-2">
                                                <li><a href="index-electric-2.html">Home Electric 2</a></li>
                                                <li><a href="index-handcraft.html">Home Hand Craft</a></li>
                                                <li><a href="index-book.html">Home Book</a></li>
                                                <li><a href="index-book-2.html">Home Book 2</a></li>
                                                <li><a href="index-cake.html">Home cake</a></li>
                                                <li><a href="index-organic.html">Home Organic</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-sub-menu"><a href="#">Demo Group #03</a>
                                            <ul class="sub-menu-2">
                                                <li><a href="index-flower.html">Home Flower</a></li>
                                                <li><a href="index-treeplant.html">Home Tree plant</a></li>
                                                <li><a href="index-pet-food.html">Home Pet Food</a></li>
                                                <li><a href="index-kids.html">Home Kids</a></li>
                                                <li><a href="index-kids-2.html">Home Kids 2</a></li>
                                                <li><a href="index-kids-3.html">Home Kids 3</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-sub-menu"><a href="#">shop</a>
                                    <ul class="sub-menu-2">
                                        <li class="has-sub-menu"><a href="#">Shop Layout</a>
                                            <ul class="sub-menu-2">
                                                <li><a href="shop.html">Shop Grid Style 1</a></li>
                                                <li><a href="shop-2.html">Shop Grid Style 2</a></li>
                                                <li><a href="shop-3.html">Shop Grid Style 3</a></li>
                                                <li><a href="shop-4.html">Shop Grid Style 4</a></li>
                                                <li><a href="shop-5.html">Shop Grid Style 5</a></li>
                                                <li><a href="shop-6.html">Shop Grid Style 6</a></li>
                                                <li><a href="shop-list.html">Shop List Style 1</a></li>
                                                <li><a href="shop-list-no-sidebar.html">Shop List Style 2</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-sub-menu"><a href="#">Product Layout</a>
                                            <ul class="sub-menu-2">
                                                <li><a href="product-details.html">Product Layout 1</a></li>
                                                <li><a href="product-details-2.html">Product Layout 2</a></li>
                                                <li><a href="product-details-3.html">Product Layout 3</a></li>
                                                <li><a href="product-details-4.html">Product Layout 4</a></li>
                                                <li><a href="product-details-5.html">Product Layout 5</a></li>
                                                <li><a href="product-details-6.html">Product Layout 6</a></li>
                                                <li><a href="product-details-7.html">Product Layout 7</a></li>
                                                <li><a href="product-details-8.html">Product Layout 8</a></li>
                                                <li><a href="product-details-9.html">Product Layout 9</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-sub-menu"><a href="#">Shop Page</a>
                                            <ul class="sub-menu-2">
                                                <li><a href="my-account.html">My Account</a></li>
                                                <li><a href="checkout.html">Check Out</a></li>
                                                <li><a href="cart.html">Shopping Cart</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="order-tracking.html">Order Tracking</a></li>
                                                <li><a href="compare.html">Compare</a></li>
                                                <li><a href="store.html">Store</a></li>
                                                <li><a href="empty-cart.html">Empty Cart</a></li>
                                                <li><a href="login-register.html">login / register</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-sub-menu"><a href="#">Pages</a>
                                    <ul class="sub-menu-2">
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="contact-us.html">Contact Us</a></li>
                                        <li><a href="contact-us-2.html">Contact Us 2</a></li>
                                        <li><a href="404.html">404 Page</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop.html">Collections</a></li>
                                <li class="has-sub-menu"><a href="#">Blog</a>
                                    <ul class="sub-menu-2">
                                        <li><a href="blog.html">Blog Page</a></li>
                                        <li><a href="blog-no-sidebar.html">Blog No sidebar</a></li>
                                        <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact-us.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="mobile-curr-lang-wrap">
                        <div class="single-mobile-curr-lang">
                            <a class="mobile-language-active" href="#">Language <i class="icofont-simple-down"></i></a>
                            <div class="lang-curr-dropdown lang-dropdown-active">
                                <ul>
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">Spanish</a></li>
                                    <li><a href="#">Hindi </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="aside-contact-info">
                        <ul>
                            <li><i class="icofont-clock-time"></i>Monday - Friday: 9:00 - 19:00</li>
                            <li><i class="icofont-envelope"></i>Info@example.com</li>
                            <li><i class="icofont-stock-mobile"></i>(+55) 254. 254. 254</li>
                            <li><i class="icofont-home"></i>Helios Tower 75 Tam Trinh Hoang - Ha Noi - Viet Nam</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
