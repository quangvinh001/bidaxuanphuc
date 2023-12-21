<x-app-layout>
    <div class="body-admin">
        <div class="container-fluid px-4">
            <div class="edit">
                <div class="back">
                    <button onclick="window.location.href='{{ url()->previous() }}'">Quay lại</button>
                </div>
                <div class="header-title"><span>Sửa Thông Tin Người Dùng</span></div>
                <form action="{{ route('users.update', $user->id) }}" method="post" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('put') <!-- <input name="_method" type="hidden" value="PATCH">  -->
                
                        <div class="form-group">
                            <label for="">Họ Tên</label>
                            <input type="text" name="name" id="" class="form-control"
                                value="{{ $user->name }}">
                            <label for="">Email</label>
                            <input type="text" name="email" id="" class="form-control"
                                value="{{ isset($user->email) ? $user->email : '' }}">
                            <label for="">Cập bậc</label>
                            <input type="number" name="role" id="" class="form-control"
                                value="{{ isset($user->role) ? $user->role : '' }}">
                            <span>Level 0 tương ứng với người dùng, Level 1 tướng ứng với Admin</span>
                        </div>
                        <div class="submit">
                        <input name="btnSave" id="" class="btn btn-primary" type="submit" value="Sửa">
                        </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
