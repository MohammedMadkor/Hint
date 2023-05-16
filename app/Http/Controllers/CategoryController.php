<?php

namespace App\Http\Controllers;

use App\Http\Requests\editCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        # code...
        $categories = Category::get();
        return view('category.index',compact('categories'));
    }
    public function store(StoreCategoryRequest $request)
    {
        # code...
        Category::create([
            'name' => $request->name,
        ]);
        return redirect()->back();
    }
    public function delete($id)
    {
        # code...
        $category = Category::where('id',$id)->first();
        $category->delete();
        return redirect('category');
    }
    public function update($id)
    {
        # code...
        $category = Category::where('id',$id)->first();
        return view('category.update',compact('category'));
    }
    public function edit(editCategoryRequest $request,$id)
    {
        # code...
        $category = Category::where('id',$id)->first();
        $category->update([
            'name' => $request->name,
        ]);
        return redirect('category');
    }
    public function active(Request $request)
    {
        # code...

        $category = Category::where('id',$request->id)->first();
        $category->active = $request->active;
       $category->save();
       return $category;

    }
}
