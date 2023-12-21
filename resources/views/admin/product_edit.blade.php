<x-app-layout>
    <div class="body-admin">
        <div class="container-fluid px-4">
            <div class="back">
                <button onclick="window.location.href='{{ url()->previous() }}'">Quay lại</button>
            </div>
            <div class="header-title"><span>Sửa Sản Phẩm</span></div>
            <br>
            <div class="card mb-4">
                <form action="{{ route('products.update', $product->id) }}" method="post" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put') <!-- <input name="_method" type="hidden" value="PATCH">  -->
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="" class="form-control"
                            value="{{ $product->name }}">
                        <label for="">Description</label>
                        <input type="text" name="description" id="" class="form-control"
                            value="{{ isset($product->description) ? $product->description : '' }}">
                        <label for="">Unit_price</label>
                        <input type="text" name="unit_price" id="" class="form-control"
                            value="{{ $product->unit_price }}">
                        <label for="">Promotion_price</label>
                        <input type="text" name="promotion_price" id="" class="form-control"
                            value="{{ $product->promotion_price }}">
                        <label for="">Unit</label>
                        <input type="text" name="unit" id="" class="form-control"
                            value="{{ $product->unit }}">
                        <label for="">New</label>
                        <input type="text" name="new" id="" class="form-control"
                            value="{{ $product->new }}">
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
                    </div>
                    <div class="submit">
                        <button name="btnSave" type="submit" type="button"
                            class="btn btn-outline-primary m-1">Sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
