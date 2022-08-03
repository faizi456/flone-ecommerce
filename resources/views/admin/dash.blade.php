@include('admin.header')
      <!-- -------------------------------------------------------------- -->
      <!-- End Topbar header -->
      <!-- -------------------------------------------------------------- -->
      <!-- -------------------------------------------------------------- -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- -------------------------------------------------------------- -->
      @include('admin.sidebar')
      <!-- -------------------------------------------------------------- -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- -------------------------------------------------------------- -->
      <!-- -------------------------------------------------------------- -->
      <!-- Page wrapper  -->
      <!-- -------------------------------------------------------------- -->
      <div class="page-wrapper">
        <!-- -------------------------------------------------------------- -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- -------------------------------------------------------------- -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-5 align-self-center">
              <h4 class="page-title">Home</h4>
              <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admindash')}}">Home /</a></li>
                    <!-- <i data-feather="chevron-right" class="feather-sm mt-1"></i>
                    <li class="breadcrumb-item active" aria-current="page">Library</li> -->
                  </ol>
                </nav>
              </div>
            </div>
            <div class="col-7 align-self-center">
              <div class="d-flex no-block justify-content-end align-items-center">
                <div class="me-2">
                  <div class="lastmonth"></div>
                </div>
                <div class="">
                  <small>LAST MONTH</small>
                  <h4 class="text-info mb-0 font-medium">$58,256</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- -------------------------------------------------------------- -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- -------------------------------------------------------------- -->
        <!-- -------------------------------------------------------------- -->
        <!-- Container fluid  -->
        <!-- -------------------------------------------------------------- -->
        <div class="container-fluid">
          <!-- -------------------------------------------------------------- -->
          <!-- Start Page Content -->
          <!-- -------------------------------------------------------------- -->
          <div class="row">
            <div class="col-lg-3 col-md-6">
              <!-- ---------------------
                            start Total Visit
                        ---------------- -->
              <div class="card">
                <div class="card-body analytics-info">
                  <h4 class="card-title">Total Visit</h4>
                  <div class="row">
                    <div class="col-4">
                      <div id="sparklinedash"></div>
                    </div>
                    <div class="col-8 text-end d-flex align-items-center justify-content-end">
                      <i data-feather="arrow-up" class="fill-white feather-sm text-success"></i>
                      <span class="counter text-success font-medium">1659</span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- ---------------------
                            end Total Visit
                        ---------------- -->
            </div>
            <div class="col-lg-3 col-md-6">
              <!-- ---------------------
                            start Total Page Views
                        ---------------- -->
              <div class="card">
                <div class="card-body analytics-info">
                  <h4 class="card-title">Total Page Views</h4>
                  <div class="row">
                    <div class="col-4">
                      <div id="sparklinedash2"></div>
                    </div>
                    <div class="col-8 text-end d-flex align-items-center justify-content-end">
                      <i data-feather="arrow-up" class="fill-white feather-sm text-primary"></i>
                      <span class="font-medium text-primary">7469</span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- ---------------------
                            end Total Page Views
                        ---------------- -->
            </div>
            <div class="col-lg-3 col-md-6">
              <!-- ---------------------
                            start Unique Visitor
                        ---------------- -->
              <div class="card">
                <div class="card-body analytics-info">
                  <h4 class="card-title">Unique Visitor</h4>
                  <div class="row">
                    <div class="col-4">
                      <div id="sparklinedash3"></div>
                    </div>
                    <div class="col-8 text-end d-flex align-items-center justify-content-end">
                      <i data-feather="arrow-up" class="fill-white feather-sm text-warning"></i>
                      <span class="font-medium text-warning">6011</span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- ---------------------
                            end Unique Visitor
                        ---------------- -->
            </div>
            <div class="col-lg-3 col-md-6">
              <!-- ---------------------
                            start Bounce Rate
                        ---------------- -->
              <div class="card">
                <div class="card-body analytics-info">
                  <h4 class="card-title">Bounce Rate</h4>
                  <div class="row">
                    <div class="col-4">
                      <div id="sparklinedash4"></div>
                    </div>
                    <div class="col-8 text-end d-flex align-items-center justify-content-end">
                      <i data-feather="arrow-up" class="fill-white feather-sm text-danger"></i>
                      <span class="text-danger font-medium">18%</span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- ---------------------
                            end Bounce Rate
                        ---------------- -->
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <!-- ---------------------
                            start Total Visit
                        ---------------- -->
              <div class="card">
                <div class="card-body analytics-info">
                  <div class="d-flex align-items-center mb-3">
                    <h4 class="card-title mb-0">Total Visit</h4>
                    <div class="ms-auto">
                      <small class="text-success"
                        ><i data-feather="arrow-up" class="fill-white text-success feather-sm"></i>
                        18% High then last month</small
                      >
                    </div>
                  </div>
                  <div class="d-flex align-items-center">
                    <div class="border-end pe-3">
                      <h6 class="text-muted fw-normal">Overall Growth</h6>
                      <b>80.40%</b>
                    </div>
                    <div class="ms-3 border-end pe-3">
                      <h6 class="text-muted fw-normal">Montly</h6>
                      <b>15.40%</b>
                    </div>
                    <div class="ms-3">
                      <h6 class="text-muted fw-normal">Day</h6>
                      <b>5.50%</b>
                    </div>
                  </div>
                </div>
                <div id="sparkline8"></div>
              </div>
              <!-- ---------------------
                            end Total Visit
                        ---------------- -->
            </div>
            <div class="col-lg-4">
              <!-- ---------------------
                            start Site Traffic
                        ---------------- -->
              <div class="card">
                <div class="card-body analytics-info">
                  <h4 class="card-title">Site Traffic</h4>
                  <div class="d-flex align-items-center">
                    <div class="border-end pe-3">
                      <h6 class="text-muted fw-normal">Overall Growth</h6>
                      <b>80.40%</b>
                    </div>
                    <div class="ms-3 border-end pe-3">
                      <h6 class="text-muted fw-normal">Montly</h6>
                      <b>15.40%</b>
                    </div>
                    <div class="ms-3">
                      <h6 class="text-muted fw-normal">Day</h6>
                      <b>5.50%</b>
                    </div>
                  </div>
                </div>
                <div id="sparkline9"></div>
              </div>
              <!-- ---------------------
                            end Site Traffic
                        ---------------- -->
            </div>
            <div class="col-lg-4">
              <!-- ---------------------
                            start Site Visit
                        ---------------- -->
              <div class="card">
                <div class="card-body analytics-info">
                  <h4 class="card-title">Site Visit</h4>
                  <div class="d-flex align-items-center">
                    <div class="border-end pe-3">
                      <h6 class="text-muted fw-normal">Overall Growth</h6>
                      <b>80.40%</b>
                    </div>
                    <div class="ms-3 border-end pe-3">
                      <h6 class="text-muted fw-normal">Montly</h6>
                      <b>15.40%</b>
                    </div>
                    <div class="ms-3">
                      <h6 class="text-muted fw-normal">Day</h6>
                      <b>5.50%</b>
                    </div>
                  </div>
                </div>
                <div id="sparkline10"></div>
              </div>
              <!-- ---------------------
                            end Site Visit
                        ---------------- -->
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <!-- ---------------------
                            start Bar Chart
                        ---------------- -->
              <div class="card">
                <div class="title-part-padding border-bottom">
                  <h4 class="card-title mb-0">Bar Chart</h4>
                </div>
                <div class="card-body analytics-info">
                  <div id="sparkline12" class="text-center"></div>
                </div>
              </div>
              <!-- ---------------------
                            end Bar Chart
                        ---------------- -->
            </div>
            <div class="col-lg-4">
              <!-- ---------------------
                            start Pie Chart
                        ---------------- -->
              <div class="card">
                <div class="title-part-padding border-bottom">
                  <h4 class="card-title mb-0">Pie Chart</h4>
                </div>
                <div class="card-body analytics-info">
                  <div id="sparkline11" class="text-center"></div>
                </div>
              </div>
              <!-- ---------------------
                            end Pie Chart
                        ---------------- -->
            </div>
            <div class="col-lg-4">
              <!-- ---------------------
                            start Composite Bar Chart
                        ---------------- -->
              <div class="card">
                <div class="title-part-padding border-bottom">
                  <h4 class="card-title mb-0">Composite Bar Chart</h4>
                </div>
                <div class="card-body analytics-info">
                  <div id="sparkline13" class="text-center"></div>
                </div>
              </div>
              <!-- ---------------------
                            end Composite Bar Chart
                        ---------------- -->
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <!-- ---------------------
                            start Line Chart
                        ---------------- -->
              <div class="card">
                <div class="title-part-padding border-bottom">
                  <h4 class="card-title mb-0">Line Chart</h4>
                </div>
                <div class="card-body bg-primary analytics-info">
                  <div id="sparkline14"></div>
                </div>
              </div>
              <!-- ---------------------
                            end Line Chart
                        ---------------- -->
            </div>
            <div class="col-lg-4">
              <!-- ---------------------
                            start Bar with different color chart
                        ---------------- -->
              <div class="card">
                <div class="title-part-padding border-bottom">
                  <h4 class="card-title mb-0">Bar with different color chart</h4>
                </div>
                <div class="card-body analytics-info">
                  <div id="sparkline15" class="text-center"></div>
                </div>
              </div>
              <!-- ---------------------
                            end Bar with different color chart
                        ---------------- -->
            </div>
            <div class="col-lg-4">
              <!-- ---------------------
                            start Line Chart
                        ---------------- -->
              <div class="card">
                <div class="title-part-padding border-bottom">
                  <h4 class="card-title mb-0">Line Chart</h4>
                </div>
                <div class="card-body analytics-info">
                  <div id="sparkline16" class="text-center"></div>
                </div>
              </div>
              <!-- ---------------------
                            end Line Chart
                        ---------------- -->
            </div>
          </div>
          <!-- -------------------------------------------------------------- -->
          <!-- End PAge Content -->
          <!-- -------------------------------------------------------------- -->
          <!-- -------------------------------------------------------------- -->
          <!-- Right sidebar -->
          <!-- -------------------------------------------------------------- -->
          <!-- .right-sidebar -->
          <!-- -------------------------------------------------------------- -->
          <!-- End Right sidebar -->
          <!-- -------------------------------------------------------------- -->
        </div>
        <!-- -------------------------------------------------------------- -->
        <!-- End Container fluid  -->
        <!-- -------------------------------------------------------------- -->
        <!-- -------------------------------------------------------------- -->
        <!-- footer -->
        <!-- -------------------------------------------------------------- -->


@include('admin.footer')