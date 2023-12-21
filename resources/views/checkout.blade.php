@extends('layout_home.master')
@section('style')
    <style>
        .payment_box.active #flexRadioDefault2 {
            display: block;
        }

        .btn-submit {
            background-color: rgb(198, 198, 198);
        }

        .btn-submit:hover {
            background-color: var(--text-color-hover)
        }

        .table td,
        .table th {
            text-align: center;
            vertical-align: baseline;
        }

        input#quantity {
            width: 40px;
            text-align: center;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('dathang') }}" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                @if (Session::has('cart'))
                    <div class="title-checkout d-grid gap-2 d-md-flex justify-content-md-center">
                        <h4><strong>Giỏ hàng</strong></h4>
                    </div>
                    <div class="space20">&nbsp;</div>

                    <div class="col-sm-8">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Hình Ảnh</th>
                                    <th scope="col">Tên Sản Phẩm</th>
                                    <th scope="col">Số Lượng</th>
                                    <th scope="col">Đơn Giá</th>
                                    <th scope="col">Tổng Tiền</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product_cart as $product)
                                    <tr>
                                        <td> <img width="100px" height="100px"
                                                src="/build/images/{{ $product['item']['image'] }}" alt=""
                                                class="pull-left"></td>
                                        <td>{{ $product['item']['name'] }}</td>
                                        <td>
                                            {{ $product['qty'] }}
                                        </td>
                                        <td>
                                            @if ($product['item']['promotion_price'] == 0)
                                                {{ number_format($product['item']['unit_price']) }}@else{{ number_format($product['item']['promotion_price']) }}
                                            @endif
                                        </td>
                                        <td>{{number_format($product['price']*$product['qty'])}}</td>
                                        <td> <a href="{{ route('xoagiohang', $product['item']['id']) }}">
                                                Xoá</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="your-order-item">
                            <div class="pull-left">
                                <p class="your-order-f18">Thành Tiền</p>
                            </div>
                            <div class="pull-right">
                                <h5 class="color-black">
                                    {{ number_format($totalPrice) }}đ
                                </h5>
                            </div>
                        </div>
                        <br>
                        <div class="your-order-head">
                            <h5>Hình thức thanh toán</h5>
                        </div>
                        <div class="your-order-body">
                            <div class="form-check">
                                <input value="COD" class="form-check-input" type="radio" name="payment_method"
                                    id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Ship COD
                                </label>
                                <div class="payment_box">
                                    Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho
                                    nhân
                                    viên giao hàng
                                </div>
                            </div>
                            <div class="form-check">
                                <input value="ATM" class="form-check-input" type="radio" name="payment_method"
                                    id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Chuyển Khoản Qua ATM
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col col-sm-4">
                        <div class="form-group">
                            <input class="form-control" type="text" id="name" name="full_name" placeholder="Họ tên"
                                required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="email" id="email" name="email"required
                                placeholder="expample@gmail.com">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" id="address" name="address" placeholder="Địa chỉ"
                                required>
                        </div>
                        <div class="form-group">
                            <input name="phone" type="text" id="phone" class="form-control"
                                placeholder="Số điện thoại" />
                        </div>
                        <div class="form-group">
                            <textarea name="note" id="notes" class="form-control" rows="4" placeholder="Nội dung ghi chú"></textarea>
                        </div>
                        <div class="form-group d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-submit"><strong>Đặt Hàng</strong></button>
                        </div>

                    </div>
                @else
                    <h4 class="title-checkout d-grid gap-2 d-md-flex justify-content-md-center">Giỏ Hàng Trống</h4>
                @endif
            </div>
        </form>
    </div> <!-- .container -->
@endsection
