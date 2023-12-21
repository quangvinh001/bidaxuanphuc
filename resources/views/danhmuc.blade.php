@extends('layout_home.master')
@section('content')
    <div class="name-card">
        <a class="danh-muc" href="#">{{ $category->name }}</a>
        <span>{{ $category->description }}</span>
    </div>
    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-lg-5">
        @foreach ($products as $product)
            <div class="col">
                <a href="{{ route('chitietsanpham', $product->id) }}">
                    <div class="card">
                        @if ($product->discount_percentage == 0)
                            <div class="sale"></div>
                        @else
                            <div class="card-sale">{{ $product->discount_percentage }}%</div>
                        @endif
                        <div class="card-layout">
                            <img src="/build/images/{{ $product->image }}" class="card-image" alt="...">
                            <div class="card-body">
                                <p class="card-title"><span>{{ $product->name }}</span></p>
                                <p class="card-gia">
                                    @if ($product->promotion_price == 0)
                                        <span class="flash-sale">{{ number_format($product->unit_price) }}đ</span>
                                    @else
                                        <span class="flash-del">{{ number_format($product->unit_price) }}đ</span>
                                        <span class="flash-sale">{{ number_format($product->promotion_price) }}
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
    {{ $products->links() }}
@endsection
