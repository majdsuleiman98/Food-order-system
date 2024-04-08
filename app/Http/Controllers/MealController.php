<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Meal;
use App\Models\Cart;
use App\Models\Card;
use App\Models\Order;
use Carbon\Carbon;
use Stripe;
use Illuminate\Http\UploadedFile;
class MealController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $meals=Meal::paginate(5);
        return view('meal.index')->with('meals',$meals);
    }


    public function create()
    {
        $cats=Category::latest()->get();
        return view('meal.create')->with('cats',$cats);
    }


    public function store(Request $request)
    {
        $request->validate([
            'meal_name'=>'required|string|min:2|max:40',
            'description'=>'required',
            'price'=>'required|numeric',
            'image'=>'required|image',
        ]);
        $image=$request->file('image');
        $newimage=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('Meals',$newimage);
        $meal=new Meal();
        $meal->meal_name=$request->meal_name;
        $meal->description=$request->description;
        $meal->price=$request->price;
        $meal->image=$newimage;
        $meal->category_id=$request->category_id;
        $meal->created_at=Carbon::now();
        $meal->save();
        $notification = array(
			'message_id' => 'Meal added Successfully',
			'alert-type' => 'success'
		);
        return redirect()->back()->with($notification);
    }



    public function edit($id)
    {
        $meal=Meal::find($id);
        $cats=Category::latest()->get();
        return view('meal.edit',compact('meal','cats'));
    }


    public function update(Request $request, $id)
    {
        if($request->file('image'))
        {
            $meal=Meal::findorFail($id);
            $image=$request->file('image');
            $newimage=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('Meals',$newimage);
            $meal->image=$newimage;
            $meal->meal_name=$request->meal_name;
            $meal->description=$request->description;
            $meal->price=$request->price;
            $meal->category_id=$request->category_id;
            $meal->save();
            $notification = array(
                'message_id' => 'Meal Update Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('meal.index')->with($notification);
        }
        else
        {
            $meal=Meal::findorFail($id);
            $meal->meal_name=$request->meal_name;
            $meal->description=$request->description;
            $meal->price=$request->price;
            $meal->category_id=$request->category_id;
            $meal->save();
            $notification = array(
                'message_id' => 'Meal Update Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('meal.index')->with($notification);
        }
    }


    public function destroy($id)
    {
        Meal::find($id)->delete();
        $notification = array(
			'message_id' => 'Meal deleted Successfully',
			'alert-type' => 'success'
		);

        return redirect()->route('meal.index')->with($notification);
    }

    public function addToCart(Meal $meal)
    {
        if(session()->has('cart')) {
            $cart=new Cart(session()->get('cart'));
        }
        else {
            $cart=new Cart();
        }
        $cart->add($meal);
        session()->put('cart',$cart);
        $notification = array(
			'message_id' => 'Meal added to cart Successfully',
			'alert-type' => 'success'
		);
        return redirect()->back()->with($notification);
    }

    public function showcart()
    {
        if(session()->has('cart'))
        {
            $cart=new Cart(session()->get('cart'));
        }
        else {
            $cart=null;
        }
        // $orders_count=Order::last()->id();
        if(Order::all()->isEmpty())
        {
            $last_order_id=0;
        }
        $last_order_id=Order::max('id');
        return view('cart.show',compact('cart','last_order_id'));
    }

    public function charge()
    {
        //save order
        // auth()->user()->order()->create([

        // ]);

        //save order details


        //clean cart
        // session()->forget('cart');

        // $notification = array(
		// 	'message_id' => 'your order has been received Successfully',
		// 	'alert-type' => 'success'
		// );

        // return redirect()->route('home')->with($notification);

    }
    public function delete(Meal $meal)
    {
        $cart=new Cart(session()->get('cart'));
        $cart->remove($meal->id);
        if($cart->totalQty<=0)
        {
            session()->forget('cart');
        }
        else
        {
            session()->put('cart',$cart);
        }
        $notification = array(
			'message_id' => 'Meal removed from cart Successfully',
			'alert-type' => 'info'
		);
        return redirect()->back()->with($notification);
    }

    public function updateqty(Request $request, Meal $meal)
    {
        $request->validate([
            "qty"=>"required|numeric|min:1"
        ]);
        $cart=new Cart(session()->get('cart'));
        $cart->updateQty($meal->id,$request->qty);
        session()->put('cart',$cart);
        $notification = array(
			'message_id' => 'qty updated',
			'alert-type' => 'info'
		);
        return redirect()->back()->with($notification);
    }


    public function orderstore(Request $request)
    {
        //stripe ile online ödeme tamamla
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\charge::create([
        'amount'=>($request->total_price)*100,
        'currency'=>'try',
        'source'=>$request->stripeToken,
        'description'=>"test payment from username : ".Auth::user()->name." - userID : ".Auth::user()->id
        ]);
        //save order
        Order::insert([
            'user_id'=>$request->user_id,
            'date'=>$request->date,
            'time'=>$request->time,
            'total_price'=>$request->total_price,
            'status'=>'sipariş alındı'
        ]);
        //save order details
        foreach($request->meal_id as $index => $meal) {
            Card::create([
                'order_id'=>$request->order_id,
                'meal_id'=>$request->meal_id[$index],
                'quantity'=>$request->quantity[$index],
                'price'=>$request->price[$index],
                ]);
            }
        session()->forget('cart');//sepet temizle.
        $notification = array(
			'message_id' => 'your order has been received Successfully',
			'alert-type' => 'success'
		);
        return redirect()->route('home')->with($notification);
    }


    public function checkout()
    {
        //new
        if(session()->has('cart'))
        {
            $cart=new Cart(session()->get('cart'));
        }
        else {
            $cart=null;
        }
        // $orders_count=Order::last()->id();
        if(Order::all()->isEmpty())
        {
            $last_order_id=0;
        }
        $last_order_id=Order::max('id');
        return view('stripe',compact('cart','last_order_id'));
    }
}

