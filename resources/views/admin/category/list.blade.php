@extends('admin.master')

@section('title', 'Danh mục')

@section('content-tile', 'Danh sách danh mục')

@section('content')
    <div class='my-3'>
        <a href="{{route('admin.category.create') }}">
            <button class='btn btn-success'>Tạo mới</button>
        </a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td><a href="{{route('admin.category.edit', $item->id) }}"><i class="far fa-edit"></i>Sửa</a> |


                        <a href="{{route('admin.category.delete', $item->id) }}" onclick="return confirm('Bạn muốn xóa nó không')">
                            <i class="fas fa-trash"></i>Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
