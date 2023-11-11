<?php

namespace App\Http\Controllers;

use App\Http\Libraries\Generic;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        $profile = Profile::with('user')->where(['user_id'=>auth()->user()->id])->first();
        $data['profile'] = $profile;

        if($request->isMethod("post"))
        {
            $this->validate($request,[
                'email'=>"required|email",
                'name'=>"required",
                'password'=>"confirmed",
                'image'=>'nullable|image',
            ]);

            $value = [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password,
                'contact'=>$request->contact,
                'address'=>$request->address,
                'description'=>$request->description,
            ];
            if ($request->hasFile('image')) {
                $value['image'] = Generic::upload_image($request->file('image'));
            }

            $profile = Profile::findOrFail($request->id);
            $profile->update($value);

            if ($profile) {
                return redirect()->route('admin.profile')->with('success', 'Profile Update Successfully');
            } else {
                return redirect()->back()->with('fail', "Something went wrong!");
            }
        }
        return view('admin.auth.profile')->with(['data'=>$data]);

    } 
    public function getUserProfile(Request $request,$id)
    {
         $profile = Profile::with('user')->where(['user_id'=>$id])->first();
         $data['profile'] = $profile;
        //  echo '<pre>';
        //  echo print_r($data['profile']);
        //  exit;
         return view('admin.auth.viewProfile')->with(['data'=>$data]);
    }
    public function viewProfile(Request $request)
    {
        $profile = Profile::with('user')->where(['user_id'=>auth()->user()->id])->first();
        $data['profile'] = $profile;

        // echo '<pre>';
        // echo print_r($data['profile']);
        // exit;

        return view('admin.auth.viewProfile')->with(['data'=>$data]);
    }  
}
