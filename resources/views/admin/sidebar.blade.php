<aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav">
              <!-- User Profile-->
              <li>
                <!-- User Profile-->
                <div class="user-profile d-flex no-block dropdown mt-3">
                  <div class="user-pic">
                    <img
                      src="{{asset('adminfiles/assets/images/users/8.jpg')}}"
                      alt="users"
                      class="rounded-circle"
                      width="40"
                    />
                  </div>
                  <div class="user-content hide-menu ms-2">
                    <a
                      href="#"
                      class=""
                      id="Userdd"
                      role="button"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <h5 class="mb-0 user-name font-medium">
                        Faiza Sharif <i data-feather="chevron-down" class="feather-sm"></i>
                      </h5>
                      <span class="op-5 user-email">step.faizasharif@gmail.com</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                      <a class="dropdown-item" href="#"
                        ><i data-feather="user" class="feather-sm text-info me-1"></i> My Profile</a
                      >
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                        ><i data-feather="log-out" class="feather-sm text-danger me-1"></i>
                        Logout</a
                      >
                    </div>
                  </div>
                </div>
                <!-- End User Profile-->
              </li>
              <!-- User Profile-->
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark active"
                  href="{{url('/admindash')}}"
                  aria-expanded="false"
                  ><i data-feather="home" class="feather-icon"></i
                  ><span class="hide-menu">Dashboard </span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="#"
                  aria-expanded="false"
                  ><i data-feather="clipboard" class="feather-icon"></i
                  ><span class="hide-menu">Category</span></a
                >
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="{{route('category.index')}}" class="sidebar-link"
                      ><i class="feather-sm" data-feather="minus"></i><span class="hide-menu"> Main Category</span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="{{route('subcategory.index')}}" class="sidebar-link"
                      ><i class="feather-sm" data-feather="minus"></i><span class="hide-menu"> Sub Category </span></a
                    >
                  </li>
                </ul>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark"
                  href="{{url('/supplier')}}"
                  aria-expanded="false"
                  ><i data-feather="hard-drive" class="feather-icon"></i
                  ><span class="hide-menu">Supplier </span></a
                >
              </li>
              {{-- <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark"
                  href="{{ route('attributes.index') }}"
                  aria-expanded="false"
                  ><i class="feather-sm" data-feather="package"></i>
                  <span class="hide-menu">Product Attributes</span></a
                >
              </li> --}}
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark"
                  href="{{route('product.index')}}"
                  aria-expanded="false"
                  ><i class="feather-sm" data-feather="package"></i>
                  <span class="hide-menu">Products</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="#"
                  aria-expanded="false"
                  ><i class="feather-sm" data-feather="user-check"></i><span class="hide-menu">Admin</span></a>
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="{{route('register.index')}}" class="sidebar-link"
                      ><i class="feather-sm" data-feather="minus"></i><span class="hide-menu"> Admins</span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="{{route('register.create')}}" class="sidebar-link"
                      ><i class="feather-sm" data-feather="minus"></i><span class="hide-menu"> Add New Admin </span></a
                    >
                  </li>
                </ul>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{ route('logout') }}"
                  aria-expanded="false"
                  ><i data-feather="log-out" class="feather-icon"></i
                  ><span class="hide-menu">Log Out</span></a
                >
              </li>
            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>