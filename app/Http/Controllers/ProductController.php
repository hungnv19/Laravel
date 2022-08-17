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
        
        // 1. Khởi tạo đối tượng user mới
        $product = new Product();
        // 2. Cập nhật giá trị cho các thuộc tính của $user
        // $user->name = $request->name;
        // $user->phone = $request->phone;
        $product->fill($request->all()); // đặt name ở form cùng giá trị với thuộc tính
        // 3. Xử lý file avatar gửi lên
        if($request->hasFile('avatar')) {
            // Nếu trường avatar có file thì sẽ trả về true
            // 3.1 Xử lý tên file
            $avatar = $request->avatar;
            $avatarName = $avatar->hashName();
            $avatarName = $request->username . '_' . $avatarName;
            // dd($avatar->storeAs('images/users', $avatarName));
            // 3.2 Lưu file và gán đường dẫn cho $user->avatar
            $product->avatar = $avatar->storeAs('images/users', $avatarName);
           
        } else {
            $product->avatar = '';
        }
        // 4. Lưu
        $product->save();
        session()->flash('success', 'Tạo mới sản phẩm thành công!');
        return redirect()->route('admin.product.list');
        // Lab: Thực hiện chức năng chỉnh sửa, method PUT, có dữ liệu của user hiện tại và lưu

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
