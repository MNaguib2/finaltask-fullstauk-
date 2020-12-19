<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\Idea;
use Auth;

class profilecontroller extends Controller
{
    public function profile ($id){
        $profile = User::find($id);
        if (Auth::user()->id == $id){
        return view('admin/profile',compact('profile'));
         }else{
                return back();
        }
    }

    public function profile_edite(Request $request, $id){
        if (Auth::user()->id == $id){
        $profile = User::find($id);
        $profile->name=$request->get('name');
        //$profile->password= Hash::make($request->get('password'));
        //*
        if($request->get('changepassword')=='on'){
            if(strlen($request->get('password')) > 7){
                $profile->password= Hash::make($request->get('password'));
                //return response()->json(['success'=> $request->get('password') ]);
            }
        }
        //*/
        $profile->Address=$request->get('Address');
        $profile->email =$request->get('email');
        $profile->save();
        return redirect()->route('index');
        }else{
        return back();
        }
    }
    public function Add_thing($id){
        $iduser = $id;
        if (Auth::user()->id == $iduser){
        $Categories = Category::all();
        return view('admin/Edite Page',compact('iduser' , 'Categories'));
        }else{
             return back();
        }
    }
    public function Add_Data(Request $request, $id){
        //*
        if (Auth::user()->id == $id){
        $think = new idea();
        $think->name=$request->get('Title');
        $think->Discription=$request->get('Discrpition');
        $think->price=$request->get('price');
        $think->user_id = $id;
        $think->Category_Id = $request->get('categoryname');
        $think->Rate=$request->get('rate');
        $think->Image = "Image/d.jpg";
        if ($request->hasFile('image')) 
        {
            $file = $request->file('image');            
            $image_name = time().$file->getClientOriginalName();
            $image_path = 'Image/idea_images/';
            $file->move($image_path,$image_name); // upload image to spacific folder brand_images on my server
            $image = $image_path.$image_name;
            $think->Image = $image;
        }
        $think->save();
        
        //*/
        //return response()->json(['success'=> $request->get('categoryname') ]);
        return redirect()->route('index');
            }else{
                return back();
        }
    }

    public function view ($id){
        $idea =  idea::find($id);
        $usrmail =  User::find($idea->user_id);
        return view('view', compact('idea','usrmail'));
    }
    
    public function Edite_think ($id){
        try {
            $iduser =  idea::find($id);
            $Categories = Category::all();
            return view('admin/Edite Page', compact('iduser' , 'Categories'));
            } catch (\Exception $e) {
                return back();
            }
    }
    public function Delete_think ($id){        
        $idea =  idea::find($id);
        if (Auth::user()->id == $idea->user_id || Auth::user()->Position == 0){
        $idea->delete();
        return redirect()->route('index');
        }else{
            return back();
        }
    }
    public function update_think(Request $request, $id){
        //*
        try {
        $ideaupdate = idea::find($id);
        if (Auth::user()->id == $ideaupdate->user_id || Auth::user()->Position == 0){
        $ideaupdate->name=$request->get('Title');
        $ideaupdate->Discription=$request->get('Discrpition');
        $ideaupdate->price=$request->get('price');
        $ideaupdate->Category_Id = $request->get('categoryname');
        if (Auth::user()->Position == 0){
        $ideaupdate->Rate=$request->get('rate');
        }
        if ($request->hasFile('image')) 
        {
            $file = $request->file('image');            
            $image_name = time().$file->getClientOriginalName();
            $image_path = 'Image/idea_images/';
            $file->move($image_path,$image_name); // upload image to spacific folder brand_images on my server
            $image = $image_path.$image_name;
            $ideaupdate->Image = $image;
        }
        $ideaupdate->save();
        return redirect()->route('index');
        }else{
            return back();
        }
        } catch (Exception $e) {
            return back();
        }
    }
}
