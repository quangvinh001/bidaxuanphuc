<x-app-layout>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables</h1>
        <div class="card mb-4">
            <div class="card-header">
                <div class="title-tb"><i class="fas fa-table me-1"></i>
                    Hoá Đơn</div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Thông tin</th>
                            <th>Note</th>
                            <th>Ngày Đặt</th>
                            <th>Tổng Tiền </th>
                            <th>Hình Thức</th>
                            <th>Trạng Thái</th>
                            <th>Hoạt Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customer as $pd)
                            <form action="{{ route('outcarts.destroy', $pd['id']) }}" method="post">
                                @method('delete') <input name="_method" type="hidden" value="DELETE">
                                @csrf
                                <tr class="active">
                                    <td style="width: 5px;" >{{ $stt++ }}</td>
                                    <td style="width: 150px;">
                                        <p>
                                            <b>Tên khách: </b> {{ $pd->name }}
                                        </p>
                                        <p><b>Email: </b>{{ $pd->email }}</p>
                                        <p><b>Địa chỉ: </b>{{ $pd->address }}</p>
                                        <p><b>Số điện thoại: </b>{{ $pd->phone_number }}</p>
                                    </td>
                                    <td>{{ $pd->note }}</td>
                                    <td>{{ $pd->date_order }}</td>
                                    <td>{{ $pd->total }}</td>
                                    <td>{{ $pd->payment }}</td>

                                    @if ($pd->trangthai == 1)
                                        <td>Đã Hoàn Thành</td>
                                    @else
                                        <td><a href="{{ route('outcarts.edit', $pd->id) }}">Chưa Xác Nhận</a></td>
                                    @endif
                                    <td style="width:130px">
                                        <button type="button" class="btn btn-success "
                                            onclick="window.location='{{ route('outcarts.show', $pd->id) }}'"><i
                                                class="fa-solid fa-magnifying-glass"></i></button>
                                        <button name="delete" class="btn btn-danger" type="submit"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                            </form>
                        @endforeach
                    </tbody>

                </table>
                <div class="d-flex justify-content-end">
                    {{ $customer->links('pagination::bootstrap-5') }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
