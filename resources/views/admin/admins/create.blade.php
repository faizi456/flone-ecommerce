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
                        <a href="{{route('register.index')}}" class="btn float-end p-2" id="btn"><i class="feather-sm" data-feather="eye"></i>View Admins</a>
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
        <div class="row">
            <div class="col-2"></div>
            <div class="col-lg-8">
                <div class="card" style="padding-bottom:6px; box-shadow: 0px 0px 15px -5px rgba(0,0,0,0.75); border-radius:14px;">
                    <div class="border-bottom title-part-padding">
                        <h4 class="card-title mb-0">Register New Admin</h4>
                    </div>
                    <div class="card-body">
                        <h6 style="margin-top: -6px; color:rgba(128, 128, 128, 0.774);">Please fill the following form to register new admin *</h6>
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
                        <form action="{{ route('register.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mt-3">
                                    <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                                </div>
                                <div class="col-lg-12 col-md-12 mt-3">
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="col-lg-12 col-md-12 mt-3">
                                    <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                                </div>
                                <div class="col-lg-12 col-md-12 mt-3">
                                    <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                                </div>
                                <div class="col-lg-12 col-md-12 mt-3">
                                    <select name="admin_role" class="form-control" required>
                                        <option readonly>SELECT</option>
                                        <option value="Super Admin">Super Admin</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Employee">Employee</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:-8px;">
            <div class="col-2"></div>
            <div class="col-lg-8">
                <button class="btn col-12 mb-4" id="btn">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>

    @include('admin.footer')
`