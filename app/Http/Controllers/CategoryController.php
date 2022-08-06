<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function list()
    {
        $category = Category::all();
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
        return redirect()->route('category.list');
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
        return redirect()->route('category.list');
    }
    public function delete(Request $request)
    {
        Category::destroy($request->id);
        return redirect()->route('category.list');
    }
}

