<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use Inertia\Inertia;
use App\Models\NewsCom;
use App\Models\SteamNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserSteamNewController extends Controller
{
    //page 
    public function page()
    {
        $news = SteamNews::query()->select('steam_news.*',DB::raw("DATE_FORMAT(created_at,'%M %eth') as date"))
        ->addSelect(['like_count' => Like::select(DB::raw('COUNT(news_id) as count'))->whereColumn('news_id','steam_news.id')->take(1),
        'com_count' => NewsCom::select(DB::raw('COUNT(news_id) as count'))->whereColumn('news_id','steam_news.id')->take(1),
        ])
        ->paginate()->withQueryString();

        return Inertia::render('user/news/page',['news' => $news]);

    }
    // single page 
    public function singlePage($id)
    {
        $single_new = SteamNews::query()->select('steam_news.*',DB::raw("DATE_FORMAT(created_at,'%M %e , %Y') as date"))
        ->addSelect(['like_count' => Like::select(DB::raw("COUNT(news_id) as count"))->whereColumn('news_id','steam_news.id')->take(1),
        'com_count' => NewsCom::select(DB::raw("COUNT(news_id) as com_count"))->whereColumn('news_id','steam_news.id')->take(1)
        ]) 
        ->where('id',$id)->first()->toArray();
        $coms = NewsCom::query()
        ->select('news_coms.*',DB::raw("DATE_FORMAT(created_at,'%M %e , %Y') as date"))
        ->addSelect(['user_name' => User::select('user_name')->whereColumn('id','news_coms.user_id')->take(1),
                    'user_image' => User::select('image')->whereColumn('id','news_coms.user_id')->take(1),
                    'user_avatar' => User::select('avatar')->whereColumn('id','news_coms.user_id')->take(1)
        ])->
        where('news_id', $id)->paginate()->withQueryString();
        return Inertia::render('user/news/single', ['single_new' => $single_new,'coms' => $coms]);
    }

    // like system 
    public function like(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'news_id' => 'required',
        ]);
        $already = Like::where('user_id', $request->user_id)->where('news_id', $request->news_id)->first();
        if($already){
            return back()->withErrors(['status' => 'you already liked the news.']);
        }
        Like::create($data);
        return redirect()->back();
    }

    // comment 
    public function comment(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'news_id' => 'required',
            'comment' => 'required|string|max:1000',
        ]);

        NewsCom::create($data);
        return redirect()->back();
    }
}
