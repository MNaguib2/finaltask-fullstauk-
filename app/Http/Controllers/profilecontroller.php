<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class profilecontroller extends Controller
{
    public function profile ($id){
        $profile = User::find($id);
        return view('admin/profile',compact('profile'));
    }
}
