<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Meal;
class VisitorController extends Controller
{
    public function index(Request $request)
    {
        $cats=Category::all();
        if(!$request->category)
        {
            $meals=Meal::all();
            return view('VisitorPage',compact('cats','meals'));
        }
        $CategoryID = Category::where('category_name','=',$request->category)->first();
        $meals=Meal::where('category_id','=',$CategoryID->id)->get();
        return view('VisitorPage',compact('cats','meals'));
    }
}
