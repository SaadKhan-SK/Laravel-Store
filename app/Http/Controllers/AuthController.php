<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post'))
        {
            // dd($request->all());
            $this->validate($request,[
                'email'=>'required|email',
                'password'=>'required'
            ],[
                'email.required' => 'The Email is required.',
                'email.email' => 'Please Enter a Valid Email Address.',
                'password.required' => 'Password is required.',
            ]);
            if(Auth::attempt([
                'email'=>$request->email,
                'password'=>$request->password
            ]))
            {
                if(Auth()->user()->role == 'Admin')
                {
                    return redirect()->route('admin.dashboard')->with('success',"Login Successfully");
                }
                else if(Auth()->user()->role == 'Vendor')
                {
                    return redirect()->route('vendor.dashboard');
                }
                else{
                    
                    return redirect()->route('user.dashboard')->with('success',"Login Successfully");
                }
            }
            else
            {
                return redirect()->back()->with("fail","Wrong Credentials");
            }
        }
        return view('admin.auth.login');
    }
    public function register(Request $request){
        if($request->isMethod("post"))
        {
            $this->validate($request,[
                'email'=>"required|email|unique:users",
                'name'=>"required",
                'password'=>"required|min:8|confirmed"
            ]);
            $data=$request->toArray();
            $user = User::create($data);
            $user->role = "Admin";
            $result = $user->save();
            auth()->login($user);
            if($result)
            {
                return redirect()->to(route('admin.dashboard'))->with('success',"Successfully Registered");
            }
            else
            {
                return redirect()->to(route('admin.dashboard'))->with('fail',"Something went wrong!");
            }
        }
        return view('admin.auth.register');
    }
    public function logout()
    {
        Auth::logout();
        return Redirect::route('auth.login')->with('success',"Logout Successfully!");
    }
}
