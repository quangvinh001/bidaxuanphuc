<x-app-layout>
    <div class="body-admin">
        <div class="container-fluid px-4">
            <div class="back">
                <button onclick="window.location.href='{{ url()->previous() }}'">Quay lại</button>
            </div>
            <div class="header-title"><span>Sửa Danh Mục Sản Phẩm</span></div>
            <br>
            <div class="card mb-4">
                <form action="{{ route('type_products.update', $type_product->id) }}" method="post" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put') <!-- <input name="_method" type="hidden" value="PATCH">  -->
                    <div class="form-group">
                        <label for="">Tên danh mục</label>
                        <input type="text" name="name" id="" class="form-control"
                            value="{{ $type_product->name }}">
                        <label for="">Slug</label>
                        <input type="text" name="slug" id="" class="form-control"
                            value="{{ $type_product->slug }}">
                        <label for="">Mô tả</label>
                        <input type="text" name="description" id="" class="form-control"
                            value="{{ isset($type_product->description) ? $type_product->description : '' }}">
                    </div>
                    <br>
                    <div class="submit">
                        <input name="btnSave" id="" class="btn btn-primary" type="submit" value="Sửa">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
