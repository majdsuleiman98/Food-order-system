<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;
// use App\Http\Controllers\bycrpt;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user=Auth::user();
        return view('Profile',compact('user'));
    }



    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required|string|min:2|max:40',
            'phone'=>'required',
            'address'=>'required|string',
            'password'=>'required|string',
        ]);
        $user=Auth::user();
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->address=$request->address;

        if($request->has('password'))
        {
            $user->password=Hash::make($request->password);
        }
        $user->save();
        return redirect()->back();
    }


    public function show_new_user()
    {
        return view('newuser');
    }
    public function add_new_user(Request $request)
    {
        $request->validate([
            'name'=>'required|string|min:2|max:40',
            'email'=>'required|email|string|unique:users',
            'phone'=>'required',
            'address'=>'required|string',
            'password'=>'string',
            'c_password'=>'same:password'
        ]);
            $user=new User();
            $user->name=$request->name;
            $user->phone=$request->phone;
            $user->email=$request->email;
            $user->address=$request->address;
            $user->password=Hash::make($request->password);
            if($request->role == 1)
            {
                $user->is_admin=1;
            }
            else
            {
                $user->is_admin=0;
            }


            $user->save();
        return redirect()->back();
    }

}
