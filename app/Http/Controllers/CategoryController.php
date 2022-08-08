<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function list()
    {
        $category = Category::select('id', 'name')->orderBy('id', 'desc')->get();
        return view('admin.category.list', [
            'category' => $category
        ]);
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $category = new Category();
        $category->fill([
            'name' => $request->name
        ])->save();
        return redirect()->route('admin.category.list');
    }
    public function edit(Request $request)
    {
        $category = Category::where('id', $request->id)->first();
        return view('admin.category.create', [
            'category' => $category
        ]);
    }
    public function update(Request $request, Category $category)
    {
        $category->find($request->id)->update($request->all());
        $category->save();
        return redirect()->route('admin.category.list');
    }
    public function delete(Request $request)
    {
        Category::destroy($request->id);
        return redirect()->route('admin.category.list');
    }
    public function fill_category(Request $request)
    {
        $category = Category::all();
      
        $fill_category = Product::where('category_id', $request->id)->with('category')->paginate(10);
        // if (Auth::user()) {
        //     $count_giohang = Giohang::where('id_user', Auth::user()->id)->get();
        //     return view('clinet.san-pham', [
        //         'danhmuc' => $danhmuc,
        //         'product' => $fill_danhmuc,
        //         'kichthuoc' => $kichthuoc,
        //         'count_giohang' => $count_giohang
        //     ]);
        // } else {
            return view('client.shop', [
                'category' => $category,
                'product' => $fill_category,
                
            ]);
        // }
    }
}

