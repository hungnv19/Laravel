@extends('admin.master')

@section('title', 'Quản lý sản phẩm')

@section('content-title', 'Quản lý sản phẩm')

@section('content')
    <form action="{{ isset($product) ? route('admin.product.update', $product->id) : route('admin.product.store') }}
    "
        method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($product))
            @method('PUT')
        @endif
        <div class='form-group'>
            <label for="">Tên</label>
            <input type="text" name='name' class='form-control'
                value="{{ isset($product) ? $product->name : old('name') }}">
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class='form-group'>
            <label for="">Giá</label>
            <input type="text" name='price' class='form-control' value="{{ isset($product) ? $product->price : '' }}">
            @if ($errors->has('price'))
                <span class="text-danger">{{ $errors->first('price') }}</span>
            @endif
        </div>
        <div class='form-group'>
            <label for="">Số lượng</label>
            <input type="number" name='quantity' class='form-control'
                value="{{ isset($product) ? $product->quantity : '' }}">
            @if ($errors->has('quantity'))
                <span class="text-danger">{{ $errors->first('quantity') }}</span>
            @endif
        </div>
        <div class='form-group'>
            <label for="">Mô tả</label>
            <input type="text" name='describe' class='form-control'
                value="{{ isset($product) ? $product->describe : '' }}">
            @if ($errors->has('describe'))
                <span class="text-danger">{{ $errors->first('describe') }}</span>
            @endif
        </div>
        <div class='form-group'>
            <label for="">Khuyến mãi</label>
            <input type="text" name='promotion' class='form-control'
                value="{{ isset($product) ? $product->promotion : '' }}">
            @if ($errors->has('promotion'))
                <span class="text-danger">{{ $errors->first('promotion') }}</span>
            @endif
        </div>
        <div class='form-group'>
            <label for="">Ảnh đại diện</label>
            <input type="file" name='avatar' class='form-control'>
            @if (isset($product) && $product->avatar)
                <img src="{{ asset($product->avatar) }}" alt="{{ $product->name }}" width="100">
            @endif
            @if ($errors->has('avatar'))
                <span class="text-danger">{{ $errors->first('avatar') }}</span>
            @endif
        </div>
        <div class='form-group'>
            <label for="">Danh mục</label>
            <select name="category_id" class='form-control'>
                @foreach ($category as $item)
                    <option value="{{ $item->id }}"
                        {{ isset($product) && $product->category_id === $item->id ? 'selected' : '' }}>{{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class='form-group'>
            <label for="">Size</label>
            <input type="text" name='size' class='form-control'
                value="{{ isset($product) ? $product->username : '' }}">
            @if ($errors->has('size'))
                <span class="text-danger">{{ $errors->first('size') }}</span>
            @endif
        </div>

        
        <div>
            <button class='btn btn-primary'>{{ isset($product) ? 'Cập nhật' : 'Tạo mới' }}</button>
            {{-- <button type='reset' class='btn btn-warning'>Nhập lại</button> --}}
        </div>



    </form>

@endsection
