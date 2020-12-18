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
    public function Hold_member($id)
    {
        $Member = User::find($id);
        $Member->Position = 2;
        $Member->save();
        return redirect()->route('adminpage');
    }
    public function Resume_member($id)
    {
        $Member = User::find($id);
        $Member->Position = 1;
        $Member->save();
        return redirect()->route('adminpage');
    }
    public function Delete_Member($id)
    {
        $Member = User::find($id);
        $MemberIdea = Idea::where('user_id', '=', $id)->get();
        //dd($brand);
        $Member->delete();
        //$MemberIdea->delete();
        return redirect()->route('adminpage');
    }
    public function AddCategory(Request $request){
        $addCategory = new Category();
        $addCategory->name=$request->get('Name');
        $addCategory->Discription=$request->get('Discription');
        $addCategory->save();
        return redirect()->route('adminpage');
    }
    public function update_Category(Request $request, $id){
        if($id > 4){
        $category = Category::find($id);
        $category->name = $request->get('Name');
        $category->Discription=$request->get('Discription');
        $category->save();
        return redirect()->route('adminpage');
            }else {
                return redirect()->route('index');
            }
    }
    public function Delete_Category($id)
    {
        if($id > 4){
        $Categorydelete = Category::find($id);
        $CategoryIdea = Idea::where('user_id', '=', $id)->get();
        //dd($brand);
        $Categorydelete->delete();
        //$MemberIdea->delete();
        return redirect()->route('adminpage');
        }else {
            return redirect()->route('index');
        }
    }
}
