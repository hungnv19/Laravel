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
                <th>Mã nhân viên</th>
                <th>Email</th>
                <th>Avatar</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user_list as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->birthday}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td><img src="{{asset($user->avatar)}}" alt="" width="100"></td>
                    <!-- Nếu chỉ select và paginate thì ở đây mới thực hiện truy vấn -->
                    <!-- N+1 Query để lấy ra danh sách kèm thông tin của quan hệ -->
                    
                    <td>
                        <a href="">
                            <button class='btn btn-warning'>Chỉnh sửa</button>
                        </a>
                        <form
                            action=""
                            method="post"
                        >
                            @csrf
                            @method('DELETE')
                            <button class='btn btn-danger'>Xoá</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <div>
        {{ $user_list->links() }}
    </div> --}}
