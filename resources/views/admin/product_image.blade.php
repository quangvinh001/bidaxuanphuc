<x-app-layout>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables</h1>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Thêm
            Hình Ảnh Sản Phẩm</button>
            <br>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm Hình ảnh Sản Phẩm</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('hinhanhs.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                    <input type="file" name="images[]" id="images" accept="image/*" onchange="changeImage(event)" multiple required>
                                <img id="images" src="" class="img-thumnail" style="width:10rem"
                                    alt="">
                                <label for="">ID Sản Phẩm</label>
                                <select class="form-select form-control" aria-label="Default select example" name="product_id" required>
                                    <option selected>Open this select menu</option>
                                    @foreach ($products as $value)
                                        <option value="{{ $value->id }}">id:{{ $value->id }}, {{ $value->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <br>
                                <script type="text/javascript">
                                    const changeImage = (e) => {
                                        const img = document.getElementById('images');
                                        const file = e.target.files[0]
                                        img.src = URL.createObjectURL(file);
                                    }
                                </script>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button name="btnSave" type="submit" class="btn btn-primary m-1">Lưu</button>
                        <button type="button" class="btn btn-secondary m-1" data-bs-dismiss="modal">Tắt</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <div class="title-tb"> <i class="fas fa-table me-1"></i>
                    Hình Ảnh Sản Phẩm
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Hình Ảnh</th>
                            <th>Id Sản Phẩm</th>
                            <th>Ngày Sửa</th>
                            <th>Ngày Cập Nhập</th>
                            <th>Hoạt Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($images as $pdt)
                            <form action="{{ route('hinhanhs.destroy', $pdt['id']) }}" method="post">
                                @method('delete') <input name="_method" type="hidden" value="DELETE">
                                @csrf
                                <tr class="active">
                                    <td>{{ $stt++ }}</a></td>
                                    <td><img class="img-product-image" src="{{ asset('/build/images/' . $pdt->path) }}" alt=""
                                        width="100%" height="50px" ></a></td>
                                    <td>{{ $pdt->product_id }}</td>
                                    <td>{{ $pdt->created_at }}</td>
                                    <td>{{ $pdt->updated_at }}</td>
                                    <td style="width:130px"><button type="button" class="btn btn-success"
                                            onclick="window.location='{{ route('hinhanhs.edit', $pdt->id) }}'"><i
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
                    {{ $images->links('pagination::bootstrap-5') }}
                  </div>
            </div>
        </div>
    </div>
</x-app-layout>
