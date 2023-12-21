<x-app-layout>
    <hr>
    <div class="body-admin">
        <div class="card-body p-4">
            <div class="back">
                <button onclick="window.location.href='{{ url()->previous() }}'">Quay lại</button>
            </div>
            <div class="header-title"><span>Sửa Banner</span></div>
            <br>
            <form action="{{ route('slides.update', $slide->id) }}" method="post" role="form"
                enctype="multipart/form-data">
                @csrf
                @method('put') <!-- <input name="_method" type="hidden" value="PATCH">  -->
                <div class="form-group">
                    <input type="file" class="form-control-file" id="" name="image_file" placeholder=""
                        onchange="changeImage(event)" value="{{ isset($slide->image) ? $slide->image : '123' }}">
                    <img id="image" src="{{ asset('build/images/' . $slide->image) }}" class="img-thumnail"
                        style="width:40rem" alt=""
                        value="{{ isset($slide->image) ? $slide->image : '123' }}"><br>
                    <script type="text/javascript">
                        const changeImage = (e) => {
                            const img = document.getElementById('image');
                            const file = e.target.files[0]
                            img.src = URL.createObjectURL(file);
                        }
                    </script>
                </div>
                <div class="submit">
                <input name="btnSave" id="" class="btn btn-primary" type="submit" value="Sửa">
                </div>
        </div>
        </form>
    </div>
    </div>
</x-app-layout>
