@extends('layout_home.master')
@section('style')
    <style>
        .product-image {
            width: 500px;
            height: 500px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 1px 2px rgba(0, 0, 0, .19);
           
            /* border-radius: 0.25rem; */
        }

        /* Ảnh có thể thay đổi kích thước mà không làm thay đổi kích thước của khối chứa nó */
        .product-image img {
            width: 100%;
            height: 100%;
            transition: transform 0.3s ease;
            padding-top:3px;
        }

        .product-image-thumb {
            width: 95px;
            height: 95px;
            padding: 4px;
            margin-right: 7px;
            opacity: .5;
        }
        .product-image-thumb.active{
            opacity: 1;
        }
    </style>
@endsection
@section('content')
    <div class="card card-solid">
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="col-12">
                    <img src="/build/images/{{ $product->image }}" class="product-image" alt="Product Image">
                </div>
                <div class="col-12 product-image-thumbs">
                    <div class="product-image-thumb active"><img src="/build/images/{{ $product->image }}"
                            alt="Product Image"></div>
                    @foreach ($images as $item)
                        <div class="product-image-thumb"><img src="/build/images/{{ $item->path }}" alt="Product Image">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <form method="POST" action="{{ route('themgiohang', $product->id) }}">
                    @csrf
                    <input type="hidden" name="id" value="$product->id">
                    <h3 class="my-3 fw-bolder">{{ $product->name }}</h3>
                    <hr>
                    <div class="form-group">
                        <label for="quantity">Số lượng:</label>
                        <input type="number" id="quantity" name="soluong" value="1" min="1">
                    </div>
                    <div class=" py-2 px-3 mt-4"> 
                        @if ($product->promotion_price == 0)
                        <h3 class="mb-0">
                             <span class="flash-sale">{{ number_format($product->unit_price) }} đ</span> 
                        </h3>
                        @else
                            <h3 class="mb-0">
                                <span class="flash-sale">{{ number_format($product->promotion_price) }} đ</span>
                            </h3>
                            <h5 class="mt-0">
                                <small> <span class="flash-del">{{ number_format($product->unit_price) }} đ</span> </small>
                            </h5>
                        @endif
                       
                    </div>

                    <div class="mt-4">
                        <button class="add-to-cart btn btn-primary btn-lg btn-flat"> <i
                                class="fas fa-cart-plus fa-lg mr-2"></i>
                            Thêm vào giỏ hàng</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-4">
            <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                        data-bs-target="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Mô
                        tả</a>
                    <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                        data-bs-target="#product-comments" role="tab" aria-controls="product-comments"
                        aria-selected="false">Bình Luận</a>

                </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                    {!! $product->description !!}
                </div>
                <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                    Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    @if (isset($related))
        @foreach ($related as $new)
            <div class="name-card">
                <a class="danh-muc" href="#">Sản Phẩm Liên Quan</a>
            </div>
            <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-lg-5">

                <div class="col">
                    <a href="{{ route('chitietsanpham', $new->id) }}">
                        <div class="card">
                            @if ($new->discount_percentage == 0)
                                <div class="sale"></div>
                            @else
                                <div class="card-sale">{{ $new->discount_percentage }}%</div>
                            @endif
                            <div class="card-layout">
                                <img src="/build/images/{{ $new->image }}" class="card-image" alt="...">
                                <div class="card-body">
                                    <p class="card-title"><span>{{ $new->name }}</span></p>
                                    <p class="card-gia">
                                        @if ($new->promotion_price == 0)
                                            <span class="flash-sale">{{ number_format($new->unit_price) }}đ</span>
                                        @else
                                            <span class="flash-del">{{ number_format($new->unit_price) }}đ</span>
                                            <span class="flash-sale">{{ number_format($new->promotion_price) }}
                                                đ</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
        @endforeach
        </div>
        {{ $related->links('pagination::bootstrap-5') }}
    @endif
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.product-image-thumb').on('click', function() {
                var $image_element = $(this).find('img')
                $('.product-image').prop('src', $image_element.attr('src'))
                $('.product-image-thumb.active').removeClass('active')
                $(this).addClass('active')
            })
        })

        $(document).ready(function() {
            // Activate ElevateZoom on the zoom-image element
            $('#zoom-image').elevateZoom({
                gallery: 'productCarousel',
                cursor: 'pointer',
                galleryActiveClass: 'active',
                imageCrossfade: true,
                loadingIcon: 'path/to/elevatezoom/loading.gif', // Replace with the actual path to the loading icon
            });
        });
    </script>
@endsection
