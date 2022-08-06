@extends('admin.master')

@section('title', 'Quản lý người dùng')

@section('content-title', 'Quản lý người dùng')

@section('content')
    <div class='my-3'>
        <a href="{{ route('product_create') }}">
            <button class='btn btn-success'>Tạo mới</button>
        </a>
    </div>
    <table class='table'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Ngày sinh</th>

                <th>Email</th>
                <th>Avatar</th>
                <th>Trạng thái </th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user_list as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->birthday }}</td>
                    {{-- <td>{{$user->username}}</td> --}}
                    <td>{{ $user->email }}</td>
                    <td><img src="{{ asset($user->avatar) }}" alt="" width="100"></td>
                    <!-- Nếu chỉ select và paginate thì ở đây mới thực hiện truy vấn -->
                    <!-- N+1 Query để lấy ra danh sách kèm thông tin của quan hệ -->

                    {{-- <td>
                        <a href="">
                            <button class='btn btn-warning'>Chỉnh sửa</button>
                        </a>
                        <form
                            action="{{route('user.delete', $user->id)}}"
                            method="post"
                        >
                            @csrf
                            @method('DELETE')
                            <button class='btn btn-danger'>Xoá</button>
                        </form>
                    </td> --}}
                    <td>
                        @if ($user->status == 1)
                            {{-- {{ route('user_status', $user) }} --}}
                            <a href=""><button class="btn btn-primary"
                                    onclick="return confirm('Bạn có chắc chắn muốn thay đổi không')">Đang hoạt
                                    dộng</button></a>
                        @else
                            {{-- {{ route('user_status', $user) }} --}}
                            <a href=""><button class="btn btn-danger"
                                    onclick="return confirm('Bạn có chắc chắn muốn thay đổi không')">Đã
                                    khóa</button></a>
                        @endif
                    </td>
                    <td>
                        {{-- {{ route('admin_delete', $user->id) }} --}}
                        <a href="" onclick="return confirm('Bạn có chắc muốn xóa')">
                            <i class="fas fa-trash"> XÓA</i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <div>
        {{ $user_list->links() }}
    </div> --}}
@endsection
