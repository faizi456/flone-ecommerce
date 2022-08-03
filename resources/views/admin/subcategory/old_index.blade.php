@include('admin.header')

@include('admin.sidebar')
<div class="page-wrapper">
  <!-- -------------------------------------------------------------- -->
  <!-- Bread crumb and right sidebar toggle -->
  <!-- -------------------------------------------------------------- -->
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-5 align-self-center">
        
      </div>
      <div class="col-7 align-self-center">
        <div class="d-flex no-block justify-content-end align-items-center">
          <div class="">
            <button type="button" class="btn float-end p-2" id="btn" data-bs-toggle="modal"
              data-bs-target="#staticBackdrop">
              <i class="feather-sm" data-feather="plus-circle"></i> Add Sub Category
            </button>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
              aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Sub Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="{{route('subcategory.store')}}" method="POST" class="row g-2 needs-validation"
                      novalidate>
                      @csrf
                      <div class="col-md-12 col-lg-12">
                        <label for="validationCustom01" class="form-label">Subcategory</label>
                        <input type="text" class="form-control" name="subcat_name" id="validationCustom01" required
                          value="{{old('name')}}" placeholder="Enter Name">
                        @error('subcat_name')
                        <span style="color:#E32636; font-size:14px; font-weight:bold;">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="col-md-12 col-lg-12">
                        <label for="validationCustom01" class="form-label">Main Category</label>
                        <select name="main_cat" id="validationCustom01" required class="form-control">
                          <option value="">SELECT</option>
                          @foreach($subcategory as $cat)
                          <option value="{{$cat->cat->id}}">{{$cat->cat->name}}</option>
                          @endforeach
                        </select>
                        @error('main_cat')
                        <span style="color:#E32636; font-size:14px; font-weight:bold;">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="col-md-12 col-lg-12">
                        <label for="validationCustom01" class="form-label">Description</label>
                        <textarea name="description" id="validationCustom01" required class="form-control"
                          rows="4">{{old('description')}}</textarea>
                        @error('description')
                        <span style="color:#E32636; font-size:14px; font-weight:bold;">{{ $message }}</span>
                        @enderror
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn" id="btn" type="submit">Add </button>
                    <button type="button" class="btn" style="background-color:red; color:white;"
                      data-bs-dismiss="modal">Close</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- modal end -->
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
      <div class="col-lg-1"></div>
      <div class="col-lg-10">
        <!-- ---------------------
                start File export
              ---------------- -->
        <div class="card" style="margin: 0px auto; box-shadow: 0px 3px 7px 0px rgba(107, 107, 107, 0.349);">
          <div class="border-bottom title-part-padding">
            <h4 class="card-title mb-0">Sub Category</h4>
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
              <table id="example" class="table table-striped table-bordered display text-nowrap">
                <thead class="bg-light">
                  <!-- start row -->
                  <tr>
                    <th>Action</th>
                    <th>Sub Category</th>
                    <th>Main Category</th>
                    <th>Descriptin</th>
                    <th>Updated At</th>
                  </tr>
                  <!-- end row -->
                </thead>
                <tbody>
                  @foreach($subcategory as $data)
                  <tr>
                    <td>
                      <button class="btn btn-sm btn-outline-success">Edit</button>
                      <button class="btn btn-sm btn-outline-danger" onclick="destroyCategory({{$data->id}})">Delete</button>
                      {{-- <a href="" class="btn btn-sm" id="btn-update" data-bs-toggle="modal"
                        data-bs-target="#updatemat_{{$data->sub_id}}"><i class="feather" data-feather="edit"
                          style="height:17px; width:17px;"></i></a> --}}

                      <div class="modal fade" id="updatemat_{{$data->sub_id}}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Update Sub Category</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <form action="{{route('subcategory.update',$data->sub_id)}}" method="POST"
                              class="row g-2 needs-validation" novalidate>
                              @method('PATCH')
                              @csrf
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12 col-lg-12">
                                    <label for="validationCustom01" class="form-label">Subcategory</label>
                                    <input type="text" class="form-control" name="subcat_name" id="validationCustom01"
                                      required value="{{$data->subcat_name}}" placeholder="Enter Name">
                                    @error('subcat_name')
                                    <span style="color:#E32636; font-size:14px; font-weight:bold;">{{ $message }}</span>
                                    @enderror
                                  </div>
                                  <div class="col-md-12 col-lg-12">
                                    <label for="validationCustom01" class="form-label">Main Category</label>
                                    <select name="main_cat" id="validationCustom01" required class="form-control">
                                      <option value="">SELECT</option>
                                      @foreach($subcategory as $cat)
                                      <option value="{{$cat->cat->id}}">{{$cat->cat->name}}</option>
                                      @endforeach
                                    </select>
                                    @error('main_cat')
                                    <span style="color:#E32636; font-size:14px; font-weight:bold;">{{ $message }}</span>
                                    @enderror
                                  </div>
                                  <div class="col-md-12 col-lg-12">
                                    <label for="validationCustom01" class="form-label">Description</label>
                                    <textarea name="description" id="validationCustom01" required class="form-control"
                                      rows="4">{{$data->description}}</textarea>
                                    @error('description')
                                    <span style="color:#E32636; font-size:14px; font-weight:bold;">{{ $message }}</span>
                                    @enderror
                                  </div>
                                  <!--row-->
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button class="btn" id="btn" type="submit">Update </button>
                                <button type="button" class="btn" style="background-color:red; color:white;"
                                  data-bs-dismiss="modal">Close</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <form action="{{route('subcategory.destroy', $data->sub_id)}}" method="post">
                        @csrf
                        @method("DELETE")
                        {{-- <button type="submit" class="btn btn-sm mt-1" id="btn-delete"
                          onclick="return confirm('Are you sure you want to delete?')"><i class="feather-sm"
                            data-feather="trash"></i></button> --}}
                      </form>
                      <!-- <button class="btn btn-danger"><i class="feather-sm" data-feather="trash" ></i></button> -->
                      <!-- <button class="btn btn-success"><i class="feather-sm" data-feather="eye"></i></button> -->
                    </td>
                    <td>{{$data->subcat_name}}</td>
                    <td>{{$data->cat->name}}</td>
                    <td>{{$data->description}}</td>
                    <td>{{$data->updated_at}}</td>
                  </tr>
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
      <div class="col-lg-1"></div>
    </div>
  </div>
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()

  </script>
  @include('admin.footer')