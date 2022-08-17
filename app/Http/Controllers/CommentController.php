<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comment = Comment::select('id', 'content', 'user_id', 'product_id', 'created_at')->orderBy('id', 'desc')->with('user')->with('product')->paginate(10);
        return view('admin.comment.list', ['comment_list' => $comment]);
    }
    public function delete(Comment $id)
    {
        if ($id->delete()) {
            session()->flash('comment','Xóa comment thành công!');
                return redirect()->back();
            }
    }
    public function create(Request $request, $id) {
        $data = new Comment();
        $data->content = $request->content;
        $data->user_id = Auth::user()->id;
        $data->product_id = $id;
        // dd($data);
        $data->save();
        return redirect()->route('productDetail', $id);
    }
}