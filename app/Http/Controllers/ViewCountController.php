<?php

namespace App\Http\Controllers;

use App\Models\ViewCount;
use Illuminate\Http\Request;

class ViewCountController extends Controller
{
    //viewcount
    public function viewcount(Request $request)
    {
        $data = ViewCount::where('user_id',$request->user_id)->where('blog_id',$request->blog_id)->first();
        if(!empty($data)){
            return back();
        }
        ViewCount::create([
            'user_id'=> $request->user_id,
            'blog_id'=> $request->blog_id,
        ]);
        return redirect()->back();
    }
}
