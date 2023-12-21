<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="#" class="text-nowrap logo-img">
                {{-- <img src="{{ asset('/build/images/logo-rs.png') }}" width="180" alt="" /> --}}
                <x-application-logo />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Danh Mục</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('outcarts.index') }}" aria-expanded="false">
                        <span>
                            <i class="fa-solid fa-wallet"></i>
                        </span>
                        <span class="hide-menu">Hoá Đơn</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('products.index') }}" aria-expanded="false">
                        <span>
                            <i class="fa-solid fa-store"></i>
                        </span>
                        <span class="hide-menu">Sản Phẩm</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('type_products.index') }}" aria-expanded="false">
                        <span>
                            <i class="fa-solid fa-briefcase"></i>
                        </span>
                        <span class="hide-menu">Danh Mục Sản Phẩm</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('hinhanhs.index') }}" aria-expanded="false">
                        <span>
                            <i class="fa-solid fa-images"></i>
                        </span>
                        <span class="hide-menu">Hình Ảnh Sản Phẩm</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('users.index') }}" aria-expanded="false">
                        <span>
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <span class="hide-menu">Người Dùng</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('slides.index') }}" aria-expanded="false">
                        <span>
                            <i class="fa-solid fa-image"></i>
                        </span>
                        <span class="hide-menu">Banner</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Tài Khoản</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('profile.edit') }}" aria-expanded="false">
                        <i class="ti ti-user fs-6"></i>
                        <p class="mb-0 fs-3">Thông Tin Tài Khoản</p>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('register')}}" aria-expanded="false">
                      <span>
                        <i class="ti ti-user-plus"></i>
                      </span>
                      <span class="hide-menu">Đăng Kí</span>
                    </a>
                  </li>
                <li class="sidebar-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="btn btn-outline-primary mx-3 mt-2 d-block"
                            onclick="event.preventDefault();
        this.closest('form').submit();">Logout</a>
                    </form>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
