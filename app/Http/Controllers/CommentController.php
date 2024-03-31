<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Comment;
use App\Models\ViewCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    //create comment 
    public function comment(Request $request)
    {
        $data = $request->validate([
            'user_id' => "required",
            'blog_id' => "required",
            'comment' => "required"
        ]);
        Comment::create($data);
        return redirect()->back();
    }

}
