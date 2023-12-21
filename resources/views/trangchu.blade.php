@extends('layout_home.master')
@section('content')
    @if (isset($new_products))
        @foreach ($new_products as $new)
            <div class="name-card">
                <a class="danh-muc" href="#">Sản Phẩm Mới</a>
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
        {{ $new_products->links('pagination::bootstrap-5') }}
    @endif
    @foreach ($categories as $product_types)
    <div class="name-card">
        <a class="danh-muc" href="#">{{ $product_types->name }}</a>
        <span>{{ $product_types->description }}</span>
    </div>
    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-lg-5">
        @foreach ($product_types->products as $products)
            <div class="col">
                <a href="{{ route('chitietsanpham', $products->id) }}">
                    <div class="card">
                        @if ($products->discount_percentage == 0)
                            <div class="sale"></div>
                        @else
                            <div class="card-sale">{{ $products->discount_percentage }}%</div>
                        @endif
                        <div class="card-layout">
                            <img src="/build/images/{{ $products->image }}" class="card-image" alt="...">
                            <div class="card-body">
                                <p class="card-title"><span>{{ $products->name }}</span></p>
                                <p class="card-gia">
                                    @if ($products->promotion_price == 0)
                                        <span class="flash-sale">{{ number_format($products->unit_price) }}đ</span>
                                    @else
                                        <span class="flash-del">{{ number_format($products->unit_price) }}đ</span>
                                        <span class="flash-sale">{{ number_format($products->promotion_price) }}
                                            đ</span>
                                    @endif
                            </div>
                        </div>
                    </div>
                </a>

            </div>
        @endforeach
    </div>
    {{ $categories->links() }}

@endforeach
@endsection
