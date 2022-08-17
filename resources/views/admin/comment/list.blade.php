@extends('admin.master')

@section('title', 'Trang Admin')
@section('content-title', 'Quản lý Bình luận')
@section('content-nav', 'Bình luận')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nội dung</th>
              <th>Người comment</th>
              <th>Sản phẩm</th>
              <th>Chức năng</th>
            </tr>
          </thead>
          <tbody>
            @foreach($comment_list as $item)
            <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->content}}</td>
              <td>{{ isset($item->user) ? $item->user->name : '' }}</td>
              <td>{{ isset($item->product) ? $item->product->name : '' }}</td>
              <td>
                <form action="{{route('admin.comments.delete',  $item->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-app">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
        </table>
      </div>

      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
<div>
  {{ $comment_list->links() }}
</div>
@endsection