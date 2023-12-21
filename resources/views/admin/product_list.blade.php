<x-app-layout>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables</h1>
        <a name="btnAdd" id="" class="btn btn-outline-success" href="{{ route('products.create') }}"
            role="button">
            Thêm Sản Phẩm</a>
        <div class="card mb-4">
            <div class="card-header">
                <div class="title-tb"> <i class="fas fa-table me-1"></i>
                    Danh Sách Sản Phẩm
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Hình Ảnh</th>
                            <th>Thông tin</th>
                            <th>Mô tả</th>
                            <th>Giá </th>
                            <th>Giá Khuyến Mãi</th>
                            <th>Hoạt Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $pd)
                            <form action="{{ route('products.destroy', $pd['id']) }}" method="post">
                                @method('delete') <input name="_method" type="hidden" value="DELETE">
                                @csrf
                                <tr class="active">
                                    <td>{{ $stt++ }}</td>
                                    <td><img src="{{ asset('build/images/' . $pd->image) }}" alt=""
                                            width="200" height="200"></a></td>
                                    <td style="width: 150px;">
                                        <p>
                                            <b>Tên: </b>{{ $pd->name }}
                                        </p>
                                        <p><b>ID: </b>{{ $pd->id }}</p>
                                        <p><b>ID_type: </b>{{ $pd->name_type_product }}</p>
                                        <p><b>Unit: </b>{{ $pd->unit }}</p>
                                        <p><b>New: </b>{{ $pd->new }}</p>
                                    </td>
                                    <td style="width:300px;">{!! $pd->description !!}</td>
                                    <td>{{ $pd->unit_price }}</td>
                                    <td>{{ $pd->promotion_price }}</td>
                                    <td style="width:130px">
                                        <button type="button" class="btn btn-success "
                                            onclick="window.location='{{ route('products.edit', $pd->id) }}'"><i
                                                class="fa-solid fa-pen-to-square"></i></button>
                                        <button name="delete" class="btn btn-danger" type="submit"><i
                                                class="fa-solid fa-trash"></i></button>
                            </form>
                            </td>
                            <td>

                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
