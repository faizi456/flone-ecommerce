@php
    function mac(){
        ob_start();
        system('ipconfig/all');
        $mycom=ob_get_contents();
        ob_clean();
        $findme="Physical";
        $pmac=strpos($mycom, $findme);
        $mac=substr($mycom, ($pmac+36),17);
        return $mac;
    }
    $mac1 = mac();
    $mac_address = session()->put('mac',$mac1);

    $categories = getCategories();
@endphp
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Flone</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="FrontendFiles/assets/img/favicon.png">
    
    <!-- CSS
	============================================ -->
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('FrontendFiles/assets/css/bootstrap.min.css')}}">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('FrontendFiles/assets/css/icons.min.css')}}">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('FrontendFiles/assets/css/plugins.css')}}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('FrontendFiles/assets/css/style.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.min.js" integrity="sha512-8Y8eGK92dzouwpROIppwr+0kPauu0qqtnzZZNEF8Pat5tuRNJxJXCkbQfJ0HlUG3y1HB3z18CSKmUo7i2zcPpg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<style>
    #msg{
        color: #C6011F;
        font-weight: bold;
        font-size: 13px;
        margin-top:-13px;
    }
</style>
<body>
<header class="header-area header-padding-1 sticky-bar header-res-padding clearfix">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-6 col-4">
                <div class="logo">
                    <a href="index.html">
                        <img alt="" src="{{asset('FrontendFiles/assets/img/logo/logo.png')}}">
                    </a>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 d-none d-lg-block">
                <div class="main-menu">
                    <nav>
                        <ul>
                            <li><a href="{{url('/')}}">Home</a>
                            </li>
                            <li><a href="{{url('/shop')}}"> Shop </a>
                                <ul class="submenu">
                                    @foreach($categories as $category)
                                        <li><a href="{{url('/shop')}}">{{$category->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="">Blog</a>
                                <ul class="submenu">
                                    <li><a href="blog-no-sidebar.html">Blog</a></li>
                                    <li><a href="blog-details-3.html">Blog details</a></li>
                                </ul>
                            </li>
                            <li><a href="{{url('/aboutUs')}}"> About </a></li>
                            <li><a href="{{url('/contactUs')}}"> Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-8">
                   <div class="header-right-wrap">
                    <div class="same-style header-search">
                        <a class="search-active" href="#"><i class="pe-7s-search"></i></a>
                        <div class="search-content">
                            <form action="#">
                                <input type="text" placeholder="Search" />
                                <button class="button-search"><i class="pe-7s-search"></i></button>
                            </form>
                        </div> 
                    </div>
                    @if(Auth::Check())
                    <div class="same-style account-satting">
                        <a class="account-satting-active" href="#"><i class="pe-7s-user-female"></i></a>
                        <div class="account-dropdown">
                            <ul>
                                <li><a href="wishlist.html">Wishlist  </a></li>
                                <li><a href="my-account.html">my account</a></li>
                                <li><a href="{{route('user.logout')}}">Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                    @else
                    <div class="same-style account-satting">
                        <a class="account-satting-active" href="#"><i class="pe-7s-user-female"></i></a>
                        <div class="account-dropdown">
                            <ul>
                                <li><a href="{{url('/login-register')}}">Login</a></li>
                                <li><a href="{{url('/login-register')}}">Register</a></li>
                                <li><a href="wishlist.html">Wishlist  </a></li>
                            </ul>
                        </div>
                    </div>
                    @endif
                    <div class="same-style header-wishlist">
                        <a href="wishlist.html"><i class="pe-7s-like"></i></a>
                    </div>
                    <div class="same-style cart-wrap">
                        <button class="icon-cart">
                            <i class="pe-7s-shopbag"></i>
                            <span class="count-style">02</span>
                        </button>
                        <div class="shopping-cart-content">
                            <ul>
                                <li class="single-shopping-cart">
                                    <div class="shopping-cart-img">
                                        <a href="#"><img alt="" src="{{asset('FrontendFiles/assets/img/cart/cart-1.png')}}"></a>
                                    </div>
                                    <div class="shopping-cart-title">
                                        <h4><a href="#">T- Shart & Jeans </a></h4>
                                        <h6>Qty: 02</h6>
                                        <span>$260.00</span>
                                    </div>
                                    <div class="shopping-cart-delete">
                                        <a href="#"><i class="fa fa-times-circle"></i></a>
                                    </div>
                                </li>
                                <li class="single-shopping-cart">
                                    <div class="shopping-cart-img">
                                        <a href="#"><img alt="" src="{{asset('FrontendFiles/assets/img/cart/cart-2.png')}}"></a>
                                    </div>
                                    <div class="shopping-cart-title">
                                        <h4><a href="#">T- Shart & Jeans </a></h4>
                                        <h6>Qty: 02</h6>
                                        <span>$260.00</span>
                                    </div>
                                    <div class="shopping-cart-delete">
                                        <a href="#"><i class="fa fa-times-circle"></i></a>
                                    </div>
                                </li>
                            </ul>
                            <div class="shopping-cart-total">
                                <h4>Shipping : <span>$20.00</span></h4>
                                <h4>Total : <span class="shop-total">$260.00</span></h4>
                            </div>
                            <div class="shopping-cart-btn btn-hover text-center">
                                <a class="default-btn" href="{{url('/cart')}}">view cart</a>
                                <a class="default-btn" href="{{url('/checkout')}}">checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-menu-area">
            <div class="mobile-menu">
                <nav id="mobile-menu-active">
                    <ul class="menu-overflow">
                        <li><a href="{{url('/')}}">HOME</a></li>
                        <li><a href="{{url('/shop')}}">Shop</a>
                            <ul >
                                @foreach($categories as $category)
                                    <li><a href="{{url('/shop')}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="blog.html">Blog</a>
                            <ul>
                                <li><a href="blog-no-sidebar.html">Blog</a></li>
                                <li><a href="blog-details-3.html">Blog details</a></li>
                            </ul>
                        </li>
                        <li><a href="{{url('/aboutUs')}}">About us</a></li>
                        <li><a href="{{url('/contactUs')}}">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>


@yield('main-section')



<footer class="footer-area bg-gray pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-4">
                <div class="copyright mb-30">
                    <div class="footer-logo">
                        <a href="index.html">
                            <img alt="" src="FrontendFiles/assets/img/logo/logo.png">
                        </a>
                    </div>
                    <p>© 2021 <a href="#">Flone</a>.<br> All Rights Reserved</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4">
                <div class="footer-widget mb-30 ml-30">
                    <div class="footer-title">
                        <h3>ABOUT US</h3>
                    </div>
                    <div class="footer-list">
                        <ul>
                            <li><a href="about.html">About us</a></li>
                            <li><a href="#">Store location</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="#">Orders tracking</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4">
                <div class="footer-widget mb-30 ml-50">
                    <div class="footer-title">
                        <h3>USEFUL LINKS</h3>
                    </div>
                    <div class="footer-list">
                        <ul>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Support Policy</a></li>
                            <li><a href="#">Size guide</a></li>
                            <li><a href="#">FAQs</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="footer-widget mb-30 ml-75">
                    <div class="footer-title">
                        <h3>FOLLOW US</h3>
                    </div>
                    <div class="footer-list">
                        <ul>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Instagram</a></li>
                            <li><a href="#">Youtube</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer-widget mb-30 ml-70">
                    <div class="footer-title">
                        <h3>SUBSCRIBE</h3>
                    </div>
                    <div class="subscribe-style">
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <div id="mc_embed_signup" class="subscribe-form">
                            <form id="mc-embedded-subscribe-form" class="validate" novalidate="" target="_blank" name="mc-embedded-subscribe-form" method="post" action="https://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef">
                                <div id="mc_embed_signup_scroll" class="mc-form">
                                    <input class="email" type="email" required="" placeholder="Enter your email here.." name="EMAIL" value="">
                                    <div class="mc-news" aria-hidden="true">
                                        <input type="text" value="" tabindex="-1" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef">
                                    </div>
                                    <div class="clear">
                                        <input id="mc-embedded-subscribe" class="button" type="submit" name="subscribe" value="Subscribe">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="tab-content quickview-big-img">
                            <div id="pro-1" class="tab-pane fade show active">
                                <img src="{{asset('FrontendFiles/assets/img/product/quickview-l1.jpg')}}" alt="">
                            </div>
                            <div id="pro-2" class="tab-pane fade">
                                <img src="{{asset('FrontendFiles/assets/img/product/quickview-l2.jpg')}}" alt="">
                            </div>
                            <div id="pro-3" class="tab-pane fade">
                                <img src="{{asset('FrontendFiles/assets/img/product/quickview-l3.jpg')}}" alt="">
                            </div>
                            <div id="pro-4" class="tab-pane fade">
                                <img src="{{asset('FrontendFiles/assets/img/product/quickview-l2.jpg')}}" alt="">
                            </div>
                        </div>
                        <!-- Thumbnail Large Image End -->
                        <!-- Thumbnail Image End -->
                        <div class="quickview-wrap mt-15">
                            <div class="quickview-slide-active owl-carousel nav nav-style-1" role="tablist">
                                <a class="active" data-bs-toggle="tab" href="#pro-1"><img src="{{asset('FrontendFiles/assets/img/product/quickview-s1.jpg')}}" alt=""></a>
                                <a data-bs-toggle="tab" href="#pro-2"><img src="{{asset('FrontendFiles/assets/img/product/quickview-s2.jpg')}}" alt=""></a>
                                <a data-bs-toggle="tab" href="#pro-3"><img src="FrontendFiles/assets/img/product/quickview-s3.jpg" alt=""></a>
                                <a data-bs-toggle="tab" href="#pro-4"><img src="{{asset('FrontendFiles/assets/img/product/quickview-s2.jpg')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="product-details-content quickview-content">
                            <h2>Products Name Here</h2>
                            <div class="product-details-price">
                                <span>$18.00 </span>
                                <span class="old">$20.00 </span>
                            </div>
                            <div class="pro-details-rating-wrap">
                                <div class="pro-details-rating">
                                    <i class="fa fa-star-o yellow"></i>
                                    <i class="fa fa-star-o yellow"></i>
                                    <i class="fa fa-star-o yellow"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <span>3 Reviews</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisic elit eiusm tempor incidid ut labore et dolore magna aliqua. Ut enim ad minim venialo quis nostrud exercitation ullamco</p>
                            <div class="pro-details-list">
                                <ul>
                                    <li>- 0.5 mm Dail</li>
                                    <li>- Inspired vector icons</li>
                                    <li>- Very modern style  </li>
                                </ul>
                            </div>
                            <div class="pro-details-size-color">
                                <div class="pro-details-color-wrap">
                                    <span>Color</span>
                                    <div class="pro-details-color-content">
                                        <ul>
                                            <li class="blue"></li>
                                            <li class="maroon active"></li>
                                            <li class="gray"></li>
                                            <li class="green"></li>
                                            <li class="yellow"></li>
                                            <li class="white"></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="pro-details-size">
                                    <span>Size</span>
                                    <div class="pro-details-size-content">
                                        <ul>
                                            <li><a href="#">s</a></li>
                                            <li><a href="#">m</a></li>
                                            <li><a href="#">l</a></li>
                                            <li><a href="#">xl</a></li>
                                            <li><a href="#">xxl</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-details-quality">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                </div>
                                <div class="pro-details-cart btn-hover">
                                    <a href="#">Add To Cart</a>
                                </div>
                                <div class="pro-details-wishlist">
                                    <a href="#"><i class="fa fa-heart-o"></i></a>
                                </div>
                                <div class="pro-details-compare">
                                    <a href="#"><i class="pe-7s-shuffle"></i></a>
                                </div>
                            </div>
                            <div class="pro-details-meta">
                                <span>Categories :</span>
                                <ul>
                                    <li><a href="#">Minimal,</a></li>
                                    <li><a href="#">Furniture,</a></li>
                                    <li><a href="#">Fashion</a></li>
                                </ul>
                            </div>
                            <div class="pro-details-meta">
                                <span>Tag :</span>
                                <ul>
                                    <li><a href="#">Fashion, </a></li>
                                    <li><a href="#">Furniture,</a></li>
                                    <li><a href="#">Electronic</a></li>
                                </ul>
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
    </div>
</div>
<!-- Modal end -->
<!-- All JS is here
============================================ -->
<script src="{{asset('FrontendFiles/assets/js/vendor/modernizr-3.11.7.min.js')}}"></script>
<script src="{{asset('FrontendFiles/assets/js/vendor/jquery-v3.6.0.min.js')}}"></script>
<script src="{{asset('FrontendFiles/assets/js/vendor/jquery-migrate-v3.3.2.min.js')}}"></script>
<script src="{{asset('FrontendFiles/assets/js/vendor/popper.min.js')}}"></script>
<script src="{{asset('FrontendFiles/assets/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('FrontendFiles/assets/js/plugins.js')}}"></script>
<script src="{{asset('FrontendFiles/assets/js/ajax-mail.js')}}"></script>
<script src="{{asset('FrontendFiles/assets/js/main.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGM-62ap9R-huo50hJDn05j3x-mU9151Y"></script>
<script>
    function init() {
        var mapOptions = {
            zoom: 11,
            scrollwheel: false,
            center: new google.maps.LatLng(40.709896, -73.995481),
            styles: 
            [
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#e9e9e9"
                        },
                        {
                            "lightness": 17
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#f5f5f5"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 17
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 29
                        },
                        {
                            "weight": 0.2
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 18
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#f5f5f5"
                        },
                        {
                            "lightness": 21
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#dedede"
                        },
                        {
                            "lightness": 21
                        }
                    ]
                },
                {
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "saturation": 36
                        },
                        {
                            "color": "#333333"
                        },
                        {
                            "lightness": 40
                        }
                    ]
                },
                {
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#f2f2f2"
                        },
                        {
                            "lightness": 19
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#fefefe"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#fefefe"
                        },
                        {
                            "lightness": 17
                        },
                        {
                            "weight": 1.2
                        }
                    ]
                }
            ]
        };
        var mapElement = document.getElementById('map');
        var map = new google.maps.Map(mapElement, mapOptions);
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(40.709896, -73.995481),
            map: map,
            icon: 'assets/img/icon-img/2.png',
            animation:google.maps.Animation.BOUNCE,
            title: 'Snazzy!'
        });
    }
    google.maps.event.addDomListener(window, 'load', init);
</script>


<script>
    // Update Cart Data
    $(document).ready(function () {
        $('.qtybutton').click(function (e) {
            e.preventDefault();
            var quantity = $(this).closest(".cartpage").find('.qty-input').val();
            var cart_id = $(this).closest(".cartpage").find('.cart_id').val();
            var unitPrice = $(this).closest(".cartpage").find('.unitPrice').val();
            var data = {
                '_token': $('input[name=_token]').val(),
                'quantity':quantity,
                'cart_id':cart_id,
                'unitPrice':unitPrice,
            };
            $.ajax({
                url: '/update-cart',
                type: 'POST',
                data: data,
                success: function(response){
                    $("#subtotalPrice_"+cart_id).html("RS. "+response.subtotalPrice);
                    $("#total").html("RS. "+response.total);
                    $("#grand_total").html("RS. "+response.total);
                }
            });
        });
    
    
        // Delete single item
        $('.del').click(function () {
            var id=$(this).data("id");
            var obj = $(this);
            $.ajax({
                url: '/delete-single-item',
                type: 'GET',
                data:{id:id},
                success: function(response){
                    $(obj).parent().parent().remove();
                    $("#total").html("RS. "+response.total);
                    $("#grand_total").html("RS. "+response.total);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    
    
        // empty cart
        $('.empty-cart').click(function(){
            $.ajax({
                url:'/empty-cart',
                type:'GET',
                success:function(response){
                    $("#tabledata tbody").empty();
                    $("#total").html("RS. "+response.total);
                    $("#grand_total").html("RS. "+response.total);
                },
                error:function(error){
                    console.log(error);
                }
            });
        });

        

        // register user
        $("#registerform").submit(function(event){
            event.preventDefault();
            var form = $("#registerform")[0];
            var formData = new FormData(form);
            $("#register-btn").prop("disabled", true);
            $.ajax({
                url:'/registration',
                type:"POST",
                data:formData,
                processData:false,
                contentType:false,
                success:function(response){
                    $('#registerform').trigger("reset");
                    $("#reg-alert-div").html('<div class="alert alert-success" role="alert"><b>'+response.res+'</b><button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    $("#register-btn").prop("disabled", false);
                }
            });
        });


    });
    </script>
    
</body>
</html>