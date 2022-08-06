@extends('admin.master')

@section('title', 'Quản lý sản phẩm')

@section('content-title', 'Quản lý sản phẩm')

@section('content')
    <div class='my-3'>
        <a href="{{route('product_create')}}">
            <button class='btn btn-success'>Tạo mới</button>
        </a>
    </div>
    <table class='table'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Đơn Giá</th>
                <th>Khuyến Mại</th>
                <th>Số Lượng</th>
                <th>Danh mục</th>
                <th>Ảnh</th>
                <th>Size</th>
                <th colspan="2">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($product as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->promotion}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->category->name}}</td>
                    <td><img src="{{asset($item->avatar)}}" alt="" width="100"></td>
                    <!-- Nếu chỉ select và paginate thì ở đây mới thực hiện truy vấn -->
                    <!-- N+1 Query để lấy ra danh sách kèm thông tin của quan hệ -->
                    <td>{{$item->size}}</td>
                    <td>
                        <a href="">
                            <button class='btn btn-warning'>Edit</button>
                        </a>
                        <form
                            action="{{route('product_delete', $item->id)}}"
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
    <div>
        {{$product->links() }}
    </div>
@endsection