<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Meal;
use App\Models\User;
use App\Models\Order;
use App\Models\Card;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if(Auth()->user()->is_admin==1)
        {
            $orders=Order::orderBy('id','Desc')->get();
            $user_count=User::count();
            $meal_count=Meal::count();
            $order_count=Order::count();
            $category_count=Category::count();
            return view('AdminPage',compact('user_count','meal_count','order_count','category_count','orders'));
        }

        $cats=Category::all();
        if($request->srch)
        {
            $meals=Meal::where('meal_name','like','%'.$request->srch.'%')->get();
            return view('UserPage',compact('cats','meals'));
        }

        if($request->min and $request->max)
        {
            $meals=Meal::whereBetween('price',[$request->min,$request->max])->get();
            return view('UserPage',compact('cats','meals'));
        }


        if(!$request->category)
        {
            $meals=Meal::all();
            return view('UserPage',compact('cats','meals'));
        }
        $Category = Category::where('category_name','=',$request->category)->first();
        $meals=Meal::where('category_id','=',$Category->id)->get();
        return view('UserPage',compact('cats','meals'));


    }

    public function changestatus(Request $request,$id)
    {
        $order=Order::find($id);
        Order::where('id',$id)->update(['status'=>$request->status]);
        return redirect()->back();
    }

    public function show_orders()
    {
        $orders=Order::where('user_id','=',Auth::user()->id)->get();
        return view('order.show',compact('orders'));
    }
    public function show_order_details($id)
    {
        $order=Card::where('order_id','=',$id)->get();//sipariş detayları
        $order1=Order::where('id','=',$id)->first();//sipaiş genel bilgileri
        return view('order.show_order_details',compact('order','order1'));
    }

    public function show_order_details_for_admin($id)
    {
        $order=Card::where('order_id','=',$id)->get();
        return view('order.show_order_details_for_admin',compact('order'));
    }

    public function users_page()
    {
        $users=User::where('is_admin',0)->get();
        return view('userspage',compact('users'));
    }

}
