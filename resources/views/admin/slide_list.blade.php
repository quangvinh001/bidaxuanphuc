<x-app-layout>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables</h1>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Thêm Banner</button>
        <br>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tải Ảnh Banner Lên</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('slides.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="">Tải Ảnh Lên 1 Hoặc Nhiều Ảnh</label>
                            <img id="image" src="" class="img-thumnail" style="width:10rem" alt="">
                            <input style="width:10rem" type="file" name="images[]" id="images" accept="image/*"
                                onchange="changeImage(event)" multiple required><br>
                            <script type="text/javascript">
                                const changeImage = (e) => {
                                    const img = document.getElementById('images');
                                    const file = e.target.files[0]
                                    img.src = URL.createObjectURL(file);
                                }
                            </script>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary m-1" data-bs-dismiss="modal">Tắt</button>
                        <button name="btnSave" type="submit" class="btn btn-primary m-1">Thêm Mới</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <div class="title-tb"> <i class="fas fa-table me-1"></i>
                    Banner
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Hình ảnh banner</th>
                            <th>Hoạt động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($slides as $slide)
                            <form action="{{ route('slides.destroy', $slide['id']) }}" method="post">
                                @method('delete') <input name="_method" type="hidden" value="DELETE">
                                @csrf
                                <tr class="active">
                                    <td>{{$stt++}}</td>
                                    <td><img src="/build/images/{{ $slide->image }}" alt="" height="400px"></a>
                                    </td>
                                    <td style="width:130px"><button type="button" class="btn btn-success"
                                            onclick="window.location='{{ route('slides.edit', $slide->id) }}'"><i
                                                class="fas fa-pen"></i></button>
                                        <button onclick="confirmDelete()" name="delete" class="btn btn-danger"
                                            type="submit"><i class="fas fa-trash"></i></button>
                            </form>
                            </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{ $slides->links('pagination::bootstrap-5') }}
                  </div>
            </div>
        </div>
    </div>

</x-app-layout>
