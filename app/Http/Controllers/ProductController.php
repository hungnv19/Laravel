<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function list()
    {
        $product = Product::select('id', 'name', 'price', 'promotion', 'quantity', 'avatar', 'category_id', 'size')
        ->with('category')
        ->paginate(6);
        // dd($product);
        return view('admin.product.list', [
        'product' => $product
    ]);
    }

    public function delete(Product $id)
    {
        if ($id->delete()) {
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

    public function store(Request $request)
    {
        // 0. Định nghĩa các điều kiện dữ liệu phù hợp để kiểm tra
        // $request->validate([
        //     'name' => 'required|min:6|max:32',
        //     'email' => 'required|min:6|max:32|email',
        //     'avatar' => 'file',
        //     'birthday' => 'required|date'
        // ]);
        // Nếu không đáp ứng các điều kiện trên thì
        // thoát hàm và quay lại form kèm thêm biến lỗi ($errors)

        // Nếu đáp ứng được điều kiện thì sẽ chạy tiếp xuống code bên dưới


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
            // storage/app/images/users
            // Cấu hình config/filesystems.php để public/images ~ storage/app/images
            // Chạy câu lệnh: php artisan storage:link
        } else {
            $product->avatar = '';
        }
        // 4. Lưu
        $product->save();

        return redirect()->route('product.list');
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
        return redirect()->route('product.list');
    }

}
