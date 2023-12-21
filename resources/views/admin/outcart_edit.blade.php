<x-app-layout>
    <div class="body-admin">
        <div class="container-fluid px-4">
            <div class="header-title"><span>Xác Nhận Đơn Hàng</span></div>
            <div class="back">
                <button onclick="window.location.href='{{ url()->previous() }}'">Quay lại</button>
            </div>
            <br>
            <div class="card mb-4">
                <form action="{{ route('outcarts.update', $outcart->id) }}" method="post" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Stt</th>
                                    <th>ID Khách Hàng</th>
                                    <th>Ngày Đặt</th>
                                    <th>Tổng Tiền</th>
                                    <th>Hình Thức Thành Toán</th>
                                    <th>Ghi Chú</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr class="active">
                                    <td>{{ $key++ }}</td>
                                    <td>{{ $outcart->id_customer }}</td>
                                    <td>{{ $outcart->date_order }}</td>
                                    <td>{{ $outcart->total }}</td>
                                    <td>{{ $outcart->payment }}</td>
                                    <td>{{ $outcart->note }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="submit">
                        <button name="btnSave" type="submit" type="button" class="btn btn-outline-primary m-1">Xác
                            Nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
