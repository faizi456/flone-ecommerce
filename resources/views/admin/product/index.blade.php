@include('admin.header')

@include('admin.sidebar')
<div class="page-wrapper">
    <!-- -------------------------------------------------------------- -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- -------------------------------------------------------------- -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">

                <div class="d-flex align-items-center">

                </div>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex no-block justify-content-end align-items-center">
                    <div class="">
                        <a href="{{route('product.create')}}" class="btn float-end p-2" id="btn"><i class="feather-sm" data-feather="plus-circle"></i>Add Product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- -------------------------------------------------------------- -->
    <!-- End Bread crumb and right sidebar toggle -->
    <div class="container-fluid">
        <!-- -------------------------------------------------------------- -->
        <!-- Start Page Content -->
        <!-- -------------------------------------------------------------- -->
        <!-- File export -->
        <div class="row">
            <div class="col-12">
                <!-- ---------------------
                            start File export
                        ---------------- -->
                <div class="card" style="margin: 0px auto; box-shadow: 0px 3px 7px 0px rgba(107, 107, 107, 0.349);">
                    <div class="border-bottom title-part-padding">
                        <h4 class="card-title mb-0">All Products</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                @if(Session::has("success_message"))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {!!Session::get('success_message')!!}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @elseif(Session::has("error_message"))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {!!Session::get('error_message')!!}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered text-center display text-nowrap">
                                <thead class="bg-light">
                                    <!-- start row -->
                                    <tr>
                                        <th class="text-center">Action</th>
                                        <th class="text-center">Product</th>
                                        <th class="text-center">Categories</th>
                                        <th class="text-center">Size</th>
                                        <th class="text-center">Color</th>
                                        <th class="text-center">Prices</th>
                                        <th class="text-center">Qunatity</th>
                                    </tr>
                                    <!-- end row -->
                                </thead>
                                <tbody id="tabledata">
                                    @foreach($products as $value)
                                    <tr>
                                        {{-- Buttons --}}
                                        <td>
                                            {{-- View details button--}}
                                            <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop_{{$value->product_id}}" class="btn btn-sm btn-outline-info"><i class="fa fa-eye"></i></a><br>
                                            {{-- Edit button --}}
                                            @if($value->product_type == "Variation Product")
                                            <a href="{{route('product.edit',$value->product_id)}}" class="btn btn-sm btn-outline-success mt-2"><i class="fa fa-edit"></i></a><br>
                                            @else
                                            <a href="{{route('product.edit',$value->product_id)}}" class="btn btn-sm btn-outline-success mt-2"><i class="fa fa-edit"></i></a><br>
                                            @endif
                                            {{-- Delete button --}}
                                            <button type="button" class="btn btn-sm btn-outline-danger data-del mt-2 mb-2" data-id="{{$value->product_id}}" style="font-size: 14px;"><i class="fa fa-trash"></i></button><br>
                                        </td>
                                        {{-- Name, Code and Type --}}
                                        <td>
                                            <b>Name : {{$value->product_name}}</b><br>
                                            <b>Code : {{$value->product_code}}</b><br>
                                            <b>Type : {{$value->product_type}}</b><br><br>
                                            @if($value->status == 1)
                                            <a href="javascript:void(0)" class="status"><span class="badge-success">ACTIVE</span></a>
                                            @else
                                            <a href="javascript:void(0)" class="status mt-4"><span class="badge-danger">INACTIVE</span></a>
                                            @endif
                                        </td>
                                        {{-- Main Categories, Sub Categories and Suppliers --}}
                                        <td>
                                            <p><b>Main Category: </b>{{$value->cat->name}}</p>
                                            <p><b>Sub Category: </b>{{$value->subcat->subcat_name}}</p>
                                            <p><b>Supplier: </b>{{$value->sup->name}}</p>
                                        </td>
                                        {{-- Size --}}
                                        @if($value->product_type=="Variation Product")
                                        @php $attribute_size=explode(',', $value->size) @endphp
                                        <td>
                                            @foreach($attribute_size as $attr)
                                            <b>{{$attr}}</b><br>
                                            @endforeach
                                        </td>
                                        @else
                                        <td><small>Single product <br> have no attributes</small></td>
                                        @endif
                                        {{-- Color --}}
                                        @if($value->product_type=="Variation Product")
                                        @php
                                        $color_attribute = unserialize($value->color);
                                        @endphp
                                        <td>
                                            @foreach($color_attribute as $key=>$val)
                                            <b>{{$key}} : {{$val}}</b><br>
                                            @endforeach
                                        </td>
                                        @else
                                        <td><small>Single product <br> have no attributes</small></td>
                                        @endif
                                        {{-- Unit Price and SRP Price --}}
                                        @if($value->product_type=="Variation Product")
                                        @php
                                        $v_unitPrice = unserialize($value->unitPrice);
                                        $v_srp = unserialize($value->srp);
                                        @endphp
                                        <td>
                                            <b>Unit Cost: </b>
                                            @foreach($v_unitPrice as $key=>$val)
                                            <b>{{$key}}</b> => {{$val}}<br>
                                            @endforeach
                                            <br>
                                            <b>SRP Price: </b>
                                            @foreach($v_srp as $key=>$val)
                                            <b>{{$key}}</b> => {{$val}}<br>
                                            @endforeach
                                        </td>
                                        @else
                                        <td>
                                            <b>Unit Cost: </b>
                                            <b>{{$value->unitPrice}}</b><br>
                                            <b>SRP Price: </b>
                                            <b>{{$value->srp}}</b><br>
                                        </td>
                                        @endif
                                        {{-- Quantity type and stock --}}
                                        @if($value->product_type=="Variation Product")
                                        @php
                                        $v_quantityType = unserialize($value->quantityType);
                                        $v_stock = unserialize($value->stock);
                                        @endphp
                                        <td>
                                            <b>Quantity Type: </b><br>
                                            @foreach($v_quantityType as $key=>$val)
                                            {{$key}} => {{$val}}<br>
                                            @endforeach
                                            <br>
                                            <b>Stock : </b>
                                            @foreach($v_stock as $key=>$val)
                                            <b>{{$key}}</b> => {{$val}}<br>
                                            @endforeach
                                        </td>
                                        @else
                                        <td>
                                            <b>Quantity Type: </b>
                                            {{$value->quantityType}} <br>
                                            <b>Stock: </b>
                                            {{$value->stock}}
                                        </td>
                                        @endif
                                    </tr>


                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop_{{$value->product_id}}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable bg-dark">
                                            <div class="modal-content bg-dark text-light">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">{{$value->product_type}}</h5><br>
                                                    @if($value->status == 1)
                                                    <span class="badge-success mx-4">ACTIVE</span>
                                                    @else
                                                    <span class="badge-danger mx-4">INACTIVE</span>
                                                    @endif
                                                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            {{-- Images slider start here --}}
                                                            @php
                                                            $images=explode(',', $value->images);
                                                            @endphp
                                                            <div id="carouselExampleControls_{{ $value->product_id }}" class="carousel slide" data-bs-ride="carousel">
                                                                <div class="carousel-inner">
                                                                    @foreach($images as $key=>$val)
                                                                    <div class="carousel-item {{$key == 0 ? 'active' : '' }}" data-bs-interval="2000">
                                                                        <img src="{{ asset($val) }}" class="d-block w-100" height="350" alt="Product images">
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls_{{ $value->product_id }}" data-bs-slide="prev">
                                                                    <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                                                                    <span class="visually-hidden">Previous</span>
                                                                  </button>
                                                                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls_{{ $value->product_id }}" data-bs-slide="next">
                                                                    <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                                                                    <span class="visually-hidden">Next</span>
                                                                  </button>
                                                            </div>
                                                            {{-- slider end here --}}
                                                            <div class="row mt-2">
                                                                <div class="col-6 mt-1">
                                                                    <label for="">Product Name:</label>
                                                                    <p>{{$value->product_name}}</p>
                                                                </div>
                                                                <div class="col-6 mt-1">
                                                                    <div class="div mx-3">
                                                                        <label for="">Product Code:</label>
                                                                        <p>{{$value->product_code}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 mt-1">
                                                                    <div class="div">
                                                                        <label for="">Main Category:</label>
                                                                        <p>{{$value->cat->name}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 mt-1">
                                                                    <div class="div mx-3">
                                                                        <label for="">Sub Category : </label>
                                                                        <p>{{$value->subcat->subcat_name}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 mt-1">
                                                                    <div class="div">
                                                                        <label for="">Supplier : </label>
                                                                        <p>{{$value->sup->name}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 mt-1">
                                                                    <div class="div mx-3">
                                                                        <label for="">Description : </label>
                                                                        <p>{{$value->description}}</p>
                                                                    </div>
                                                                </div>
                                                                {{-- size --}}
                                                                @if($value->product_type == "Variation Product")
                                                                <div class="col-6 mt-1">
                                                                    <div class="div">
                                                                        <label for="">Size : </label> <br>
                                                                        @foreach($attribute_size as $attr)
                                                                        {{ $attr }} <br>
                                                                        @endforeach <br>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                {{-- color --}}
                                                                @if($value->product_type == "Variation Product")
                                                                <div class="col-6 mt-1">
                                                                    <div class="div mx-3">
                                                                        <label for="">Color : </label> <br>
                                                                        @foreach($color_attribute as $s_attr)
                                                                        {{ $s_attr }} <br>
                                                                        @endforeach <br>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                {{-- Unit Price --}}
                                                                @if($value->product_type == "Variation Product")
                                                                <div class="col-6 mt-1">
                                                                    <div class="div">
                                                                        <label for="">Unit Cost : </label>
                                                                        <p>
                                                                            @foreach($v_unitPrice as $key=>$val)
                                                                            {{ $key }} => {{ $val }} <br>
                                                                            @endforeach
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @else
                                                                <div class="col-6 mt-1">
                                                                    <div class="div">
                                                                        <label for="">Unit Cost : </label>
                                                                        <p>{{$value->unitPrice}}</p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                {{-- SRP Price --}}
                                                                @if($value->product_type == "Variation Product")
                                                                <div class="col-6 mt-1">
                                                                    <div class="div mx-3">
                                                                        <label for="">SRP : </label>
                                                                        <p>
                                                                            @foreach($v_srp as $key=>$val)
                                                                            {{ $key }} => {{ $val }} <br>
                                                                            @endforeach
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @else
                                                                <div class="col-6 mt-1">
                                                                    <div class="div mx-3">
                                                                        <label for="">SRP Price : </label>
                                                                        <p>{{$value->srp}}</p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                {{-- Quantity Type --}}
                                                                @if($value->product_type == "Variation Product")
                                                                <div class="col-6 mt-1">
                                                                    <div class="div">
                                                                        <label for="">Quantity Type : </label>
                                                                        <p>
                                                                            @foreach($v_quantityType as $key=>$val)
                                                                            {{ $key }} => {{ $val }} <br>
                                                                            @endforeach
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @else
                                                                <div class="col-6 mt-1">
                                                                    <div class="div">
                                                                        <label for="">Quantity Type : </label>
                                                                        <p>{{$value->quantityType}}</p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- ---------------------
              end File export
              ---------------- -->
            </div>
        </div>
    </div>



    @include('admin.footer')
    <script>
        $("#tabledata").on("click", ".data-del", function() {
            var id = $(this).data("id");
            var obj = $(this);
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url: "product/" + id
                , type: 'DELETE'
                , data: {
                    "id": id
                    , "_token": token
                , }
                , success: function(result) {
                    $(obj).parent().parent().remove();
                    // console.log(result.response);
                }
                , error: function(error) {
                    console.log(error.responseText);
                }
            });

        });

    </script>
