@extends('user.layouts.main')

@section('main-section')

    <div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li class="active">Cart Page </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="cart-main-area pt-90 pb-100">
        <div class="container">
            <h3 class="cart-page-title">Your cart items</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <form>
                        @csrf
                        <div class="table-content table-responsive cart-table-content">
                            <table id="tabledata">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Attributes</th>
                                        <th>Until Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @if(count($cart_products) > 0)
                                        @foreach($cart_products as $product)
                                            <tr class="cartpage">
                                                <td class="product-thumbnail">
                                                    <a><img src="{{asset($product->image)}}" alt="product image" width="70px" height="70px" style="box-shadow: 0px 3px 9px 1px rgba(0, 0, 0, 0.315); border-radius:12px;"></a>
                                                </td>
                                                <td class="product-name">
                                                    <a>{{$product->product_name}}</a> <br>
                                                    <a>{{$product->product_code}}</a> <br>
                                                    <a>{{$product->product_type}}</a>
                                                </td>
                                                <td class="product-name">
                                                    @if($product->size == "")
                                                        <a style="font-size: 12px;">Single product</a>
                                                    @endif
                                                    <a>{{$product->size}}</a> <br>
                                                    <a>{{$product->color}}</a>
                                                </td>
                                                <td class="product-price-cart"><a class="amount">RS. {{$product->unitPrice}}</a></td>
                                                <input type="hidden" class="unitPrice" name="unitPrice" value="{{$product->unitPrice}}">
                                                <input type="hidden" class="cart_id" name="cart_id[]" value="{{$product->id}}">
                                                <td class="product-quantity">
                                                    <div class="cart-plus-minus">
                                                        <input class="cart-plus-minus-box qty-input" type="text" name="quantity[]" value="{{$product->quantity}}">
                                                    </div>
                                                </td>
                                                <td class="product-subtotal"><a class="amount" id="subtotalPrice_{{$product->id}}">RS. {{$product->subtotal}}</a></td>
                                                <td class="product-remove">
                                                    <a class="del" data-id="{{$product->id}}"><i class="fa fa-times"></i></a>
                                            </td>
                                            </tr>
                                            @php
                                                $total = $total + $product->subtotal;
                                            @endphp
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7">No items in cart</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update">
                                        <a href="{{route('shop')}}">Continue Shopping</a>
                                    </div>
                                    <div class="cart-clear">
                                        <a class="empty-cart">Clear Shopping Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="cart-tax">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gray">Estimate Shipping And Tax</h4>
                                </div>
                                <div class="tax-wrapper">
                                    <p>Enter your destination to get a shipping estimate.</p>
                                    <div class="tax-select-wrapper">
                                        <div class="tax-select">
                                            <label>
                                                * Country
                                            </label>
                                            <select class="email s-email s-wid">
                                                <option>Bangladesh</option>
                                                <option>Albania</option>
                                                <option>Åland Islands</option>
                                                <option>Afghanistan</option>
                                                <option>Belgium</option>
                                            </select>
                                        </div>
                                        <div class="tax-select">
                                            <label>
                                                * Region / State
                                            </label>
                                            <select class="email s-email s-wid">
                                                <option>Bangladesh</option>
                                                <option>Albania</option>
                                                <option>Åland Islands</option>
                                                <option>Afghanistan</option>
                                                <option>Belgium</option>
                                            </select>
                                        </div>
                                        <div class="tax-select">
                                            <label>
                                                * Zip/Postal Code
                                            </label>
                                            <input type="text">
                                        </div>
                                        <button class="cart-btn-2" type="submit">Get A Quote</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="discount-code-wrapper">
                                <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4> 
                                </div>
                                <div class="discount-code">
                                    <p>Enter your coupon code if you have one.</p>
                                    <form>
                                        <input type="text" required="" name="name">
                                        <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="grand-totall">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                </div>
                                <h5>Total products <span id="total">RS. {{$total}}</span></h5>
                                {{-- <div class="total-shipping">
                                    <h5>Total shipping</h5>
                                    <ul>
                                        <li><input type="checkbox"> Standard <span>$20.00</span></li>
                                        <li><input type="checkbox"> Express <span>$30.00</span></li>
                                    </ul>
                                </div> --}}
                                <h4 class="grand-totall-title">Grand Total <span id="grand_total">RS. {{$total}}</span></h4>
                                <a href="{{url('/checkout')}}">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
