<x-app-layout>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables</h1>
        <div class="card mb-4">
            <div class="card-header">
                <div class="tb">
                    <i class="fas fa-table me-1"></i>
                Hoá Đơn Chi Tiết
                </div>
                <div class="back">
                    <button onclick="window.location.href='{{ url()->previous() }}'">Quay lại</button>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>ID Hoá Đơn</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Số Lượng</th>
                            <th>Đơn Giá</th>
                            <th>Tổng Tiền</th>
                            <th>Ghi Chú</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bill_detail as $bill_detail)
                            <tr class="active">
                                <td>{{ $key++ }}</td> 
                                <td>{{ $bill_detail->id_bill }}</td>
                                <td>{{ $bill_detail->name }}</td>
                                <td>{{ $bill_detail->quantity }}</td>
                                <td>{{ $bill_detail->unit_price }}</td>
                                <td>{{ $bill_detail->total }}</td>
                                <td>{{ $bill_detail->note }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
