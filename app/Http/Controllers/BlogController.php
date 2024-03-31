<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Comment;
use App\Models\ViewCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    //page 
    public function page()
    {
        $search = request("search");
        $search = "%".preg_replace('/[^A-Za-z0-9]/','',$search)."%";
        $blogs = Blog::query()->FetchAllData($search)->latest()->paginate(6)->withQueryString();

        return Inertia::render('user/community/page',['blogs'=>$blogs]);
    }
    // create 
    public function create(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','min:6','max:70'],
            'body' => ['required','string','min:6','max:200'],
            'image' => ['nullable','file','image']
        ]);
        if($request->hasFile('image'))
        {
            $file_name = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('blog_images',$file_name);
            $data['image'] = $file_name;
        }
        $data['author_id'] = Auth::user()->id;
        Blog::create($data);
        return redirect('/user/community/blogs');
    }

    // blog 
    public function blog($id)
    {
        $blog = Blog::query()->FetchData($id)->first();
        $comments = Comment::query()->FetchComs($id)->paginate(5)->withQueryString();
        $related_blog = Blog::inRandomOrder()->take(2)->get()->toArray();
        return Inertia::render('user/community/single',['blog'=>$blog,'related_blog'=>$related_blog,'comments'=> $comments]);
    }
}
