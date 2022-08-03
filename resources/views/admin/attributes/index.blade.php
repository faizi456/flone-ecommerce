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
      <div class="col-12 align-self-center">
        <div class="d-flex no-block justify-content-end align-items-center">
          <div class="">
            {{-- <a href="" class="btn float-end p-2" id="btn" data-bs-toggle="modal"
              data-bs-target="#attributeValueModal"><i class="feather-sm" data-feather="plus-circle"></i>Add Attribute
              Value</a> --}}
            <a href="" class="btn float-end p-2 mx-4" id="btn" data-bs-toggle="modal"
              data-bs-target="#attributeModal"><i class="feather-sm" data-feather="plus-circle"></i>Add New
              Attribute</a>

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
      <div class="col-lg-8 col-md-8 col-sm-12 m-auto">
        <!-- ---------------------
                            start File export
                        ---------------- -->
        <div class="card" style="box-shadow: 0px 0px 15px -5px rgba(0, 0, 0, 0.534); border-radius:8px;">
          <div class="border-bottom title-part-padding">
            <h4 class="card-title mb-0">View Attributes</h4>
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
          </div>
        </div>
        <!-- ---------------------
              end File export
              ---------------- -->
      </div>
      {{-- <div class="col-lg-6 col-md-6 col-sm-12">
        <!-- ---------------------
                              start File export
                          ---------------- -->
        <div class="card" style="box-shadow: 0px 0px 15px -5px rgba(0, 0, 0, 0.534); border-radius:8px;">
          <div class="border-bottom title-part-padding">
            <h4 class="card-title mb-0">View Attribute Values</h4>
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
          </div>
        </div>
        <!-- ---------------------
                end File export
                ---------------- -->
      </div> --}}
    </div>
  </div>


  <!-- Attribute Modal -->
  <div class="modal fade" id="attributeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ attribute.store }}" method="post">
            @csrf
            <div class="row">
              <div class="col-12 m-auto">
                <label for="">Attribute Type</label>
                <input type="text" name="attribute_type" placeholder="(eg. Color)" class="form-control">
              </div>
              <div class="col-12 m-auto mt-2">
                <label for="">Attribute Value</label>
                <input type="text" name="attribute_value" placeholder="(eg. Red)" class="form-control">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn " id="btn">Save changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Attribute Value Modal -->
  <div class="modal fade" id="attributeValueModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn " id="btn">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  @include('admin.footer')