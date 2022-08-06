@extends('admin.master')

@section('title', 'Quản lý sản phẩm')

@section('content-title', 'Quản lý sản phẩm')

@section('content')
    <form 
    action="{{ isset($category) ? route('category_update', $category->id) : route('category_store') }}
    " method="POST"
       >
        @csrf
        @if (isset($category))
            @method('PUT')
        @endif
        <div class='form-group'>
            <label for="">Tên Danh mục</label>
            <input type="text" name='name' class='form-control' value="{{ isset($category) ? $category->name : old('name') }}">
        </div>
      
        <div>
            <button class='btn btn-primary'>{{ isset($category) ? 'Cập nhật' : 'Tạo mới' }}</button>
            <button type='reset' class='btn btn-warning'>Nhập lại</button>
        </div>



    </form>

@endsection
