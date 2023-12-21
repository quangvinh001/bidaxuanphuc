<x-app-layout>
    <div class="body-admin">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container-fluid px-4">
            <div class="back">
                <button onclick="window.location.href='{{ url()->previous() }}'">Quay lại</button>
            </div>
        <div class="header-title">
            <h1 style="text-align:center;color:green">Thêm Danh Mục Sản Phẩm</h1>
        </div>
       <br>
        <div class="card mb-4">
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Tên Sản Phẩm</label>
                <input type="text" name="name" id="" class="form-control">
                <label for="">Danh Mục Sản Phẩm</label>
                <select class="form-select" aria-label="Default select example" name="type_id">
                    <option selected>Open this select menu</option>
                    @foreach ($type as $products)
                        <option value="{{ $products->id }}">{{ $products->name }}</option>
                    @endforeach
                </select>
                <label for="">Giá </label>
                <input type="text" name="unit_price" id="" class="form-control">
                <label for="">Giá Khuyến Mãi</label>
                <input type="text" name="promotion_price" id="" class="form-control">
                <label for="">Số Lượng</label>
                <input type="text" name="unit" id="" class="form-control">
                <label for="">Sản Phẩm Mới</label>
                <input type="text" name="new" id="" class="form-control">
                <label for="">Mô tả</label>
                <input type="file" class="form-control-file" id="" name="image_file" placeholder=""
                    onchange="changeImage(event)">
                <img id="image" src="" class="img-thumnail" style="width:10rem" alt=""><br>
                <script type="text/javascript">
                    const changeImage = (e) => {
                        const img = document.getElementById('image');
                        const file = e.target.files[0]
                        img.src = URL.createObjectURL(file);
                    }
                </script>
                <textarea name="description" id="mytextarea" placeholder="Thêm Mô Tả Sản Phẩm"></textarea>

            </div>
            <br>
            <div class="submit">
                <input name="btnSave" id="" class="btn btn-primary" type="submit" value="Thêm Sản Phẩm">
            </div>
        </form>
        </div>
        </div>
    </div>
</x-app-layout>
