<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Group;
use App\Models\Article;
use App\Models\JoinGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    //page 
    public function page($id)
    {
        $group_id =  $id;
        $group_articles =  Article::query()
        ->select('articles.*')
        ->addSelect(['group_name' => Group::select('name')->whereColumn('id','articles.group_id')->take(1)])
        ->where('group_id',$id)
        ->paginate()->withQueryString();

        $members = JoinGroup::query()
        ->addSelect(['user_name' => User::select('user_name')->whereColumn('id','join_groups.user_id')->take(1)])
        ->addSelect(['user_image' => User::select('image')->whereColumn('id','join_groups.user_id')->take(1)])
        ->addSelect(['user_avatar' => User::select('avatar')->whereColumn('id','join_groups.user_id')->take(1)])
        ->where('group_id',$group_id)
        ->where('status','success')
        ->get()->toArray();
        return Inertia::render('admin/article/page',['id' => $group_id,'articles' => $group_articles,'members'=> $members]);
    }

    // create page 
    public function createArticlePage($id)
    {
        $group_id =  $id;
        return Inertia::render('admin/article/create',['id' => $group_id]);
    }
    //crate 
    public function create(Request $request)
    {
        $data = $request->validate([
            'title' => "required",
            'body' => "required",
            'group_id' => 'required'
        ]);

        if($request->hasFile('image'))
        {
            $file_name = uniqid().$request->file("image")->getClientOriginalName();
            $request->file('image')->storeAs('article_images',$file_name);
            $data['image'] = $file_name;
        }
        Article::create($data);
        return redirect('admin/group/article/'.$request->group_id);
    }

    // edit 
    public function edit($id)
    {
        $article = Article::select('articles.*')->where('id',$id)->first()->toArray();
        $groups = Group::select('id','name')->get()->toArray();
        return Inertia::render("admin/article/edit",['article'=>$article,'groups'=>$groups]);
    }

    // update 
    public function update(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'group_id' => 'required',
        ]);
        if($request->hasFile('image'))
        {
            $old_img = Article::where('id',$request->id)->first()->image;
            if($old_img !== null)
            {
                Storage::delete('article_images/'.$old_img);
            }
            $file_name = uniqid().$request->file("image")->getClientOriginalName();
            $request->file('image')->storeAs('article_images',$file_name);
            $data['image'] = $file_name;
        }
        Article::where('id',$request->id)->update($data);
        return redirect('admin/group/article/'.$request->group_id);
    }

    // delete 
    public function delete($id)
    {
        $old_img = Article::where('id',$id)->first()->image;
        if($old_img !== null)
        {
            Storage::delete('article_images/'.$old_img);
        }
        Article::where('id',$id)->delete();
        return redirect()->back();
    }


    // user functiion
    //user page 
    public function userPage()
    {
        $search = "%".preg_replace("/[^A-Za-z0-9]/",'',request('search'))."%";
        $groups = Group::select('groups.*',DB::raw("DATE_FORMAT(created_at,'%M %e,%Y') as date"))
        ->when($search,function($query,$search){
            $query->whereRaw("regexp_replace(name,'[^A-Za-z0-9]','') like ?",[$search])->get()->toArray();
        })
        ->addSelect(['game_type' => Game::select('name')->whereColumn('id','groups.game_id')->take(1)])
        ->addSelect(['game_image' => Game::select('image')->whereColumn('id','groups.game_id')->take(1)])
        ->paginate()->withQueryString();
        $filter_group = $groups->items();
        $joined_groups = JoinGroup::where("user_id",Auth::user()->id)->where('status','success')->pluck('group_id')->toArray();
        foreach($filter_group as $gp)
        {
            $gp->is_joined = in_array($gp->id,$joined_groups) ? true : false;
        }

        return Inertia::render('user/article/page',['groups' => $groups]);
    }

    // userArticlePage
    public function userArticlePage($id)
    {
        $is_joined = JoinGroup::where('user_id',Auth::user()->id)->where('status','success')->where('group_id',$id)->first();
        if(empty($is_joined))
        {
            return redirect()->back()->withErrors(['joinornot' => 'please join the gp first']);
        }
        $search = "%".preg_replace("/[^A-Za-z0-9]/",'',request('search'))."%";
        $article_id  = request('article_id');
        if($article_id !== null)
        {
            $single_article =  Article::query()
            ->select('articles.*',DB::raw("DATE_FORMAT(created_at,'%M/%e/%Y') as date"))
            ->addSelect(['group_name' => Group::select('name')->whereColumn('id','articles.group_id')->take(1)])
            ->where('group_id',$id)
            ->where('id',$article_id)
            ->first()->toArray();
        }else{
            $single_article = 'there is no data';
        }
        $group_articles =  Article::query()
        ->select('articles.*',DB::raw("DATE_FORMAT(created_at,'%M/%e/%Y') as date"))
        ->when($search,function($query,$search){
            $query->whereRaw("regexp_replace(title,'[^A-Za-z0-9]','') like ?",[$search])->get()->toArray();
        })
        ->addSelect(['group_name' => Group::select('name')->whereColumn('id','articles.group_id')->take(1)])
        ->where('group_id',$id)
        ->paginate()->withQueryString();

        // users who cocerend with respective groups

        $members = JoinGroup::query()
        ->addSelect(['user_name' => User::select('user_name')->whereColumn('id','join_groups.user_id')->take(1)])
        ->addSelect(['user_image' => User::select('image')->whereColumn('id','join_groups.user_id')->take(1)])
        ->addSelect(['user_avatar' => User::select('avatar')->whereColumn('id','join_groups.user_id')->take(1)])
        ->where('group_id',$id)
        ->where('status','success')
        ->get()->toArray();

        return Inertia::render('user/article/article',['articles' => $group_articles,'id'=> $id,'single_article'=>$single_article,'members'=>$members]);
    }

    // single article
    public function singleArticle($id)
    {
        $blog =  Article::query()
        ->select('articles.*',DB::raw("DATE_FORMAT(created_at,'%M/%e/%Y') as date"))
        ->addSelect(['group_name' => Group::select('name')->whereColumn('id','articles.group_id')->take(1)])
        ->where('id',$id)
        ->first()->toArray();
        return Inertia::render('user/article/single',['blog'=>$blog]);
    }
   
}
