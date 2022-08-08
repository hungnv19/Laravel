@extends('admin.master')

@section('title', 'Quản lý sản phẩm')

@section('content-title', 'Quản lý sản phẩm')

@section('content')
    <form 
    action="{{ isset($product) ? route('admin.product.update', $product->id) : route('admin.product.store') }}
    " method="POST"
        enctype="multipart/form-data">
        @csrf
        @if (isset($product))
            @method('PUT')
        @endif
        <div class='form-group'>
            <label for="">Tên</label>
            <input type="text" name='name' class='form-control' value="{{ isset($product) ? $product->name : old('name') }}">
        </div>
        <div class='form-group'>
            <label for="">Giá</label>
            <input type="text" name='price' class='form-control' value="{{ isset($product) ? $product->price : '' }}">
        </div>
        <div class='form-group'>
            <label for="">Số lượng</label>
            <input type="number" name='quantity' class='form-control' value="{{ isset($product) ? $product->quantity : '' }}">
        </div>
        <div class='form-group'>
            <label for="">Mô tả</label>
            <input type="text" name='describe' class='form-control' value="{{ isset($product) ? $product->describe : '' }}">
        </div>
        <div class='form-group'>
            <label for="">Khuyến mãi</label>
            <input type="text" name='promotion' class='form-control' value="{{ isset($product) ? $product->promotion : '' }}">
        </div>
        <div class='form-group'>
            <label for="">Ảnh đại diện</label>
            <input type="file" name='avatar' class='form-control'>
            @if (isset($product) && $product->avatar)
                <img src="{{ asset($product->avatar) }}" alt="{{ $product->name }}" width="100">
            @endif
        </div>
        <div class='form-group'>
            <label for="">Danh mục</label>
            <select name="category_id" class='form-control'>
                @foreach ($category as $item)
                    <option value="{{ $item->id }}"
                        {{ isset($product) && $product->category_id === $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class='form-group'>
            <label for="">Size</label>
            <input type="text" name='size' class='form-control' value="{{isset($product) ? $product->username : ''}}">
        </div>
      
        {{-- <div class='form-group'>
            <label for="">Trạng thái</label>
            <input type="radio" name='status' value="1"
                {{ isset($user) && $user->status === 1 ? 'checked' : '' }}>Kích hoạt
            <input type="radio" name='status' value="0"
                {{ isset($user) && $user->status === 0 ? 'checked' : '' }}>K kích hoạt
        </div> --}}

        <div>
            <button class='btn btn-primary'>{{ isset($product) ? 'Cập nhật' : 'Tạo mới' }}</button>
            {{-- <button type='reset' class='btn btn-warning'>Nhập lại</button> --}}
        </div>



    </form>

@endsection
