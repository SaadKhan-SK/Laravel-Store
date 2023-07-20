<?php

namespace App\Http\Controllers;

use App\Models\Inbox;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.pages.dashboard');
    }
    public function chat()
    {
        $inbox = new Inbox();
        $data['inboxes'] = $inbox->with('user','lastMessage','getProfile')->where(['owner_id'=>auth()->user()->id])->get();

        $users = User::with('profile')->where('id', '!=', auth()->user()->id)->get();
        $data['users'] = $users;
        // echo '<pre>';
        // echo print_r($data['users']->toArray());
        // exit;
        return view('admin.chat.chat')->with(['data'=>$data]);
    }
    
}
