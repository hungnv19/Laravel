<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function list()
    {
        $product = Product::select('id', 'name', 'price', 'promotion', 'quantity', 'avatar', 'category_id', 'size')
        ->orderBy('id')->with('category')->paginate(5);
        // dd($product);
        return view('admin.product.list', [
        'product' => $product
    ]);
    }

    public function delete(Product $id)
    {
        
        if ($id->delete()) {
            // session()->flash('success', 'Xóa sản phẩm thành công!');
            return redirect()->back();
        }
    }

    public function create()
    {

        $category = Category::select('id', 'name')->get();
       
        return view('admin.product.create', [
            'category' => $category
        ]);
    }

    public function store(ProductRequest $request)
    {
       

        $request->validate([
            'name' => 'required|min:6|max:50',
            'price'  => 'required',
            'quantity'  => 'required',
            'describe' => 'required',
            'avatar' => 'required',
            'promotion' => 'required',
            'size' => 'required',

        ]);
        
        
        $product = new Product();
       
        $product->fill($request->all()); 
        // 3. Xử lý file avatar gửi lên
        if($request->hasFile('avatar')) {
          
            $avatar = $request->avatar;
            $avatarName = $avatar->hashName();
            $avatarName = $request->username . '_' . $avatarName;
           
            $product->avatar = $avatar->storeAs('images/users', $avatarName);
           
        } else {
            $product->avatar = '';
        }
        // 4. Lưu
        $product->save();
        session()->flash('success', 'Tạo mới sản phẩm thành công!');
        return redirect()->route('admin.product.list');
        
    }
    public function edit(Request $request)
    {
        $category = Category::all();
       
        $product = Product::where('id', $request->id)->first();
        return view('admin.product.create', [
            'category' => $category,
          
            'product' => $product
        ]);
    }
    public function update(Request $request, Product $product)
    {
        $product->fill($request->all());
        if ($request->hasFile('avatar')) {
            $avatar = $request->avatar;
            $avatarName = $avatar->hashName();
            $avatarName = $product->name . '_' . $avatarName;
            $product->avatar_product = $avatar->storeAs('images/product', $avatarName);
        }
        $product->save();
        // session()->flash('success', 'Cập nhật sản phẩm thành công!');
        return redirect()->route('admin.product.list');
    }

}
