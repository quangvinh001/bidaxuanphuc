<x-app-layout>
    <div class="body-admin">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="container-fluid px-4">
                <h1 class="mt-4">Tables</h1>
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="title-tb"> <i class="fas fa-table me-1"></i>
                            Người Dùng
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Cấp bậc</th>
                                    <th>Hoạt động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <form action="{{ route('users.destroy', $user['id']) }}" method="post">
                                        @method('delete') <input name="_method" type="hidden" value="DELETE">
                                        @csrf
                                        <tr class="active">
                                            <td>{{ $stt++ }}</a></td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <!-- <td>{{ $user->password }}</a></td> -->
                                            <td>****************</td>
                                            @if ($user->role === 1)
                                                <td>Quản Trị Viên</td>
                                            @else
                                                <td>Người Dùng</td>
                                            @endif
                                            <td style="width:130px"><button type="button" class="btn btn-success"
                                                    onclick="window.location='{{ route('users.edit', $user->id) }}'"><i
                                                        class="fas fa-pen"></i></button>
                                                <button name="delete" class="btn btn-danger" type="submit"><i
                                                        class="fas fa-trash"></i></button>
                                    </form>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {{ $users->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
