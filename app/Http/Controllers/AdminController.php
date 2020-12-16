<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Idea;
use App\Http\Controllers\AdminController;
use App\Models\Category;

class AdminController extends Controller
{
    public function Admin_Page()
    {
        $Member = User::all();
        $Categories = Category::all();
        $Ideas = Idea::all();
        return view('admin/Admin Page',compact('Member','Categories','Ideas'));
    }
    public function Hold_member(Request $request, $id)
    {
        $Member = User::find($id);
        $Member->Position = 2;
        $Member->save();
        return redirect()->route('adminpage');
    }
    public function Resume_member(Request $request, $id)
    {
        $Member = User::find($id);
        $Member->Position = 1;
        $Member->save();
        return redirect()->route('adminpage');
    }
    public function Delete_Member(Request $request, $id)
    {
        $Member = Brand::find($id);
        //dd($brand);
        $Member->delete();
        return redirect()->route('adminpage');
    }
}
