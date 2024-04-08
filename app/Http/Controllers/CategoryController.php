<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name'=>'required|string|unique:categories|min:3|max:40',
        ]);
        Category::insert([
            'category_name'=>$request->category_name,
            'created_at'=>Carbon::now()
        ]);
        return back()->with('message','category added successfully');
    }

    public function show()
    {
        $categories=Category::paginate(10);
        return view('category.CategoryPage',compact('categories'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'category_name'=>'required|string|unique:categories|min:3|max:40',
        ]);
        $id=$request->id;
        Category::findOrFail($id)->update([
            'category_name'=>$request->category_name,
        ]);
        return redirect()->route('cat.show')->with('message','category updated successfully');
    }
    
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('cat.show')->with('message','category deleted successfully');
    }


}
