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
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class=""><a href="{{url('/admindash')}}"><h6>Home / </h6></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><h6>Admins</h6></li>
                  </ol>
                </nav>
              </div>
            </div>
            <div class="col-7 align-self-center">
              <div class="d-flex no-block justify-content-end align-items-center">
                <div class="">
                  <a href="{{route('register.create')}}" class="btn float-end p-2" id="btn"><i class="feather-sm" data-feather="plus-circle"></i>Add New Admin</a>
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
            <div class="col-lg-12">
              <!-- ---------------------
                            start File export
                        ---------------- -->
              <div class="card" style="margin: 0px auto; box-shadow: 0px 3px 7px 0px rgba(107, 107, 107, 0.349);">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title mb-0">View Admins</h4>
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
                          <th>Name</th>
                          <th>Email</th>
                          <th>Status</th>
                          <th>Updated At</th>
                        </tr>
                        <!-- end row -->
                      </thead>
                      <tbody>
                        @foreach($admins as $value)
                        <tr>
                          <td>
                            <a href="" class="btn btn-sm mt-1" id="btn-update"><i class="feather" data-feather="edit" style="height:15px; width:15px;"></i></a>
                              <form action="" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-sm mt-1" id="btn-delete"  onclick="return confirm('Are you sure you want to delete?')"><i class="feather-sm" data-feather="trash" ></i></button>
                              </form>
                              <!-- <button class="btn btn-danger"><i class="feather-sm" data-feather="trash" ></i></button> -->
                              <!-- <button class="btn btn-success"><i class="feather-sm" data-feather="eye"></i></button> -->
                          </td>
                          <td>{{ $value->name }}</td>
                          <td>{{ $value->email }}</td>
                          <td></td>
                          <td>{{ $value->updated_at }}</td>
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

@include('admin.footer')