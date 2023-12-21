<nav class="navbar fs-6 navbar-expand-md fixed-top fw-semibold " id="stickyMenu">
    <div class="container">
        <button class="btn btn-outline-dark d-lg-none" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive"><svg
                xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                <path opacity="1" fill="#1E3050"
                    d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
            </svg></button>
        <a class="navbar-brand d-md-none" href="#">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('/build/images/logo-rs.png') }}" alt="" class="d-md-none">
            </a>
        </a>
        {{-- <a class="nav-link d-md-none" href="http://"><i class="fa-solid fa-basket-shopping"></i></a> --}}
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasResponsive">
            <div class="offcanvas-header">
                <img src="{{ asset('/build/images/logo-rs.png') }}" alt="" width="80px" height="80px">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                    data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav flex-grow-1 justify-content-between align-items-center">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('/build/images/logo-rs.png') }}" alt="">
                    </a>
                    <li class="nav-item"><a class="nav-link" href="{{ route('trangchu') }}">Trang Chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('gioithieu') }}">Giới Thiệu</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('sanpham') }}" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sản Phẩm
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($type_products as $value)
                                <a class="dropdown-item"
                                    href="{{ route('danhmuc', $value->slug) }}">{{ $value->name }}</a>
                                <!-- Add more items as needed -->
                            @endforeach
                        </div>
                    </li>
                    @foreach ($type_products as $value)
                        @if ($value->slug == 'phu-kien')
                            <a class="nav-link" href="{{ route('danhmuc', $value->slug) }}">{{ $value->name }}</a>
                        @endif
                    @endforeach
                    <li class="nav-item"><a class="nav-link" href="{{ route('dichvu') }}">Dịch Vụ</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('lienhe') }}">Liên Hệ</a></li>
                    <li class="nav-item dropdown">
                        @if (Session::has('cart'))
                            <a class="nav-link" href="{{ route('dathang') }}" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                    class="fa-solid fa-basket-shopping"></i> (
                                @if (Session::has('cart'))
                                    {{ Session('cart')->totalQty }}
                                @else
                                    Trống
                                @endif
                                )
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($product_cart as $product)
                                    <div class="row giohang justify-content-center align-items-center g-2">
                                        <div class="col-4">
                                            <img class="image-giohang"
                                                src="{{ asset('build/images/' . $product['item']['image']) }}"
                                                alt="">
                                        </div>
                                        <div class="col body-giohang">
                                            <span class="name-giohang">{{ $product['item']['name'] }}</span>
                                            <span class="gia-giohang">{{ $product['qty'] }}x<span>
                                                    @if ($product['item']['promotion_price'] == 0)
                                                        {{ number_format($product['item']['unit_price']) }}@else{{ number_format($product['item']['promotion_price']) }}
                                                    @endif
                                                </span></span>
                                        </div>
                                        <div class="col-2"><a
                                                href="{{ route('xoagiohang', $product['item']['id']) }}">
                                                <i class="fa-solid fa-xmark"></i></a>
                                        </div>
                                    </div>
                                @endforeach
                                <hr>
                                <div class="row giohang justify-content-center align-items-center">
                                    <div class="col-12 mb-1">Tổng Tiền:
                                        {{ number_format($totalPrice) }}
                                        đ
                                    </div>
                                    <hr>
                                    <div class="col-12 mb-1 d-flex justify-content-center align-item-center "><a
                                            href="{{ route('dathang2') }}">Đặt Hàng</a></div>
                                </div>
                            </ul>
                        @else
                            <a class="nav-link" href="{{ route('dathang') }}" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                    class="fa-solid fa-basket-shopping"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <span class="d-flex justify-content-center align-item-center"> Giỏ Hàng
                                    Trống</span>
                            </ul>
                        @endif
                    </li>
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                            @if (Auth::user()->role === 1)
                                <a href="{{ url('/admin') }}"
                                    class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a href="{{ route('logout') }}" class="btn btn-outline-primary mx-3 mt-2 d-block"
                                        onclick="event.preventDefault();
                            this.closest('form').submit();">Logout</a>
                                </form>
                            @else
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a href="{{ route('logout') }}" class="btn btn-outline-primary mx-3 mt-2 d-block"
                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();">Logout</a>
                                </form>
                            @endif
                        @endauth
                    </div>
            </div>
            <div class="offcanvas-body nav-mobile d-md-none ">
                <ul class="navbar-nav flex-grow-1 justify-content-between align-items-start">
                    <li class="nav-item"><a class="nav-link" href="{{ route('trangchu') }}">Trang Chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('gioithieu') }}">Giới Thiệu</a></li>
                    @foreach ($type_products as $value)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('danhmuc', $value->slug) }}">{{ $value->name }}</a>
                        </li>
                    @endforeach
                    <li class="nav-item"><a class="nav-link" href="{{ route('dichvu') }}">Dịch Vụ</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('lienhe') }}">Liên Hệ</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dathang') }}" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                class="fa-solid fa-basket-shopping"></i>
                            @if (Session::has('cart'))
                                (
                                @if (Session::has('cart'))
                                    {{ Session('cart')->totalQty }}
                                @else
                                    Trống
                                @endif)
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('login'))
                            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                @auth
                                    @if (Auth::user()->role == 1)
                                        <a href="{{ url('/admin') }}"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block">Dashboard</a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <a href="{{ route('logout') }}"
                                                class="btn btn-outline-primary mx-3 mt-2 d-block"
                                                onclick="event.preventDefault();
                            this.closest('form').submit();">Logout</a>
                                        </form>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}"
                                        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                                        in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
