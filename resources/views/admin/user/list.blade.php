@extends('admin.master')

@section('title', 'Quản lý người dùng')

@section('content-title', 'Quản lý người dùng')

@section('content')

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
                    <td>{{ $user->email }}</td>
                    <td><img src="{{ asset($user->avatar) }}" alt="" width="100"></td>
                    <td>
                        @if ($user->status == 1)
                            <a href="{{route('user.status', $user)}}"><button class="btn btn-primary"
                                    onclick="return confirm('Bạn có chắc chắn muốn thay đổi không')">Đang hoạt
                                    dộng</button></a>
                        @else
                            <a href="{{route('user.status', $user)}}"><button class="btn btn-danger"
                                    onclick="return confirm('Bạn có chắc chắn muốn thay đổi không')">Đã
                                    khóa</button></a>
                        @endif
                    </td>
                    {{-- <td>

                        <a href="{{ route('user.delete', $user->id) }}" onclick="return confirm('Bạn có chắc muốn xóa')">
                            <i class="fas fa-trash"> XÓA</i></a>
                    </td> --}}
                    <td>
                        <form action="{{ route('user.delete', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class='btn btn-danger'>Xoá</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $user_list->links() }}
    </div>
@endsection
