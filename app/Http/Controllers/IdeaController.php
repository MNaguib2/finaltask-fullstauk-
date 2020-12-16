<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Idea;

class IdeaController extends Controller
{
    /*
    function get_idea($id)
    {
        $Idea1 = Idea::where('category_id', '=', 1)->get();
        $Idea2 = Idea::where('category_id', '=', 2)->get();
        $Idea3 = Idea::where('category_id', '=', 3)->get();
        $Idea4 = Idea::where('category_id', '=', 4)->get();
        $Categories = Category::whereNotIn('id', [1,2,3,4])->get();
        $type = "Brands";
        $ideas = Idea::where('category_id', $id);
        return view('Admin/',compact('ideas','Idea1','Idea2','Idea3'));
    }
    //*/
}
