<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\CategoryFormRequest;
use Illuminate\Http\Request;



class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        return view('authenticated_user.category.index', compact('categories'));
    }

    public function create()
    {
        return view('authenticated_user.category.create');
    }

    public function store_category(CategoryFormRequest $request)
    {
        $data = $request->validated();

        $category = new Category;
        $category->name = $data['name'];
        $category->slug = Str::slug($data['slug']);
        $category->description = $data['description'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }

        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];
        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;

        $category->save();
        return redirect('admin/category')->with('message', 'Category saved successfully');
    }

    public function edit($category_id)
    {
        $category = Category::find($category_id);

        return view('authenticated_user.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $category_id)
    {

        $data = $request->validated();
        $category = Category::find($category_id);
        $category->name = $data['name'];
        $category->slug = Str::slug($data['slug']);
        $category->description = $data['description'];

        if ($request->hasFile('image')) {

            $destination = 'uploads/category/' . $category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }

        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];
        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;

        $category->update();

        return redirect('admin/category')->with('message', 'Category updated successfully');
    }

    public function delete(Request $request)
    {
     //   $category = Category::find($category_id);
        $category = Category::find($request->category_id);

        if ($category) {

            $destination = 'uploads/category/' . $category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $category->posts()->delete();
            $category->delete();
            return redirect('admin/category')->with('message', 'Category and post(s) deleted successfully');
        }
        return redirect('admin/category')->with('message', 'Category Not Found');
    }
}
