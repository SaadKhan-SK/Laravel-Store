<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home()
    {
        return view('web.pages.home');
    }
    public function about()
    {
        return view('web.pages.about');
    }
    public function service()
    {
        return view('web.pages.services');
    }
    public function team()
    {
        return view('web.pages.team');
    }
    public function account()
    {
        return view('web.pages.account');
    }
    public function register(Request $request){
        // dd($request);
        if($request->isMethod("post"))
        {
            $this->validate($request,[
                'email'=>"required|email|unique:users",
                'name'=>"required",
                'password'=>"required|min:8|confirmed"
            ]);
            $data=$request->toArray();
            $user = User::create($data);
            $user->role = "User";
            $result = $user->save();
            auth()->login($user);
            if($result)
            {
                return redirect()->to(route('shop.web'))->with('success',"Successfully Registered");
            }
            else
            {
                return redirect()->back()->with('fail',"Something went wrong!");
            }
        }
    }
    public function shop()
    {
        return view('web.pages.shop');
    }
}
