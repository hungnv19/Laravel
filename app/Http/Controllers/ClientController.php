<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        $products = Product::select('id', 'name', 'price', 'quantity', 'avatar', 'describe', 'promotion', 'category_id', 'size')
            ->with('category')->limit(3);

        $products_2 = Product::select('id', 'name', 'price', 'quantity', 'avatar', 'describe', 'promotion', 'category_id', 'size')
            ->orderBy('id')->with('category')->limit(4);

        $sofa = DB::table('product')->join('category', 'product.category_id', '=', 'category.id')->select('product.*')
            ->where('category.name', '=', 'sofa')->limit(1)
            ->get();
        // dd($sofa);
        return view('layout.master', ['product' => $products, 'product_2' => $products_2, 'sofa' => $sofa]);
    }
    public function productDetail(Product $id)
    {
        $comment = Comment::select('id', 'content', 'user_id', 'product_id')->where('product_id', $id->id)
        ->orderBy('id', 'desc')->with('user')->with('product')->paginate(10);
        return view('client.shop-detail', [
            'product' => $id,
            'comments' => $comment,
        ]);
    }
    public function product()
    {
        $products = Product::select('id', 'name', 'price', 'quantity', 'avatar', 'describe', 'promotion', 'category_id', 'size')
            ->orderBy('name')->with('category')->paginate(12);
        $category = Category::select('id', 'name')->get();
      
        return view('client.shop', [
            'product' => $products,
            'category' => $category,
            
        ]);
    }
    public function categoryProducts($id)
    {
        $product = DB::table('product')->join('category', 'product.category_id', '=', 'category.id')->select('product.*')
            ->where('product.category_id', '=', $id)
            ->paginate(12);
        $category = Category::select('id', 'name')->get();
      
        // dd($category);
        return view('client.shop', [
            'product' => $product,
            'category' => $category,
           
        ]);
    }
   
    public function searchProduct(Request $requests)
    {
        $product = Product::where('name', 'like', '%' . $requests->name . '%')->paginate(12);
        $category = Category::select('id', 'name')->get();
      
        return view('client.shop', [
            'product' => $product,
            'category' => $category,
          
        ]);
    }
}
