<x-app-layout>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables</h1>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Thêm
            Danh Mục</button>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm Danh Mục</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('type_products.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Tên Danh Mục Sản Phẩm</label>
                                <input type="text" name="name" id="" class="form-control">
                                <label for="">Slug</label>
                                <input type="text" name="slug" id="" class="form-control"
                                    placeholder="Viết thường không dấu cách nhau bằng - ">
                                <label for="">Mô Tả</label>
                                <input type="text" name="description" id="" class="form-control">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary m-1" data-bs-dismiss="modal">Tắt</button>
                        <button name="btnSave" type="submit" class="btn btn-primary m-1">Lưu</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <div class="title-tb"> <i class="fas fa-table me-1"></i>
                    Danh Mục Sản Phẩm
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Mô tả danh mục</th>
                            <th>Slug</th>
                            <th>Ngày tạo</th>
                            <th>Ngày sửa</th>
                            <th>Hoạt động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($type_products as $pdt)
                            <form action="{{ route('type_products.destroy', $pdt['id']) }}" method="post">
                                @method('delete') <input name="_method" type="hidden" value="DELETE">
                                @csrf
                                <tr class="active">
                                    <td>{{ $stt++ }}</a></td>
                                    <td>{{ $pdt->name }}</td>
                                    <td>{{ $pdt->description }}</td>
                                    <td>{{ $pdt->slug }}</td>
                                    <td>{{ $pdt->created_at }}</td>
                                    <td>{{ $pdt->updated_at }}</td>
                                    <td style="width:130px"><button type="button" class="btn btn-success"
                                            onclick="window.location='{{ route('type_products.edit', $pdt->id) }}'"><i
                                                class="fas fa-pen"></i></button>
                                        <button name="delete" class="btn btn-danger" type="submit"><i
                                                class="fas fa-trash"></i></button>
                            </form>
                            </td>
                            <td>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{ $type_products->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
