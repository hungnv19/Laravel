@extends('admin.master')

@section('title', 'Quản lý sản phẩm')

@section('content-title', 'Quản lý sản phẩm')

@section('content')
    <form
        action="{{ isset($category) ? route('admin.category.update', $category->id) : route('admin.category.store') }}
    "
        method="POST">
        @csrf
        @if (isset($category))
            @method('PUT')
        @endif
        <div class='form-group'>
            <label for="">Tên Danh mục</label>
            <input type="text" name='name' class='form-control'
                value="{{ isset($category) ? $category->name : old('name') }}">
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div>
            <button class='btn btn-primary'>{{ isset($category) ? 'Cập nhật' : 'Tạo mới' }}</button>

        </div>



    </form>

@endsection
