<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\GameCategory;
use Illuminate\Http\Request;
use App\Models\GameCollection;
use Illuminate\Support\Facades\DB;
use App\Main;

class storeController extends Controller
{
    //page
    public function page()
    {
        $search = "%".preg_replace('/[^A-Za-z0-9]/','',request('search'))."%";
        $main = new Main();
        $datas = $main->fetchData($search);
        $categories = $datas['categories'];
        $games = $datas['games'];
        $collections = $datas['collections'];
        return Inertia::render('user/store/store',['categories' => $categories,'games'=>$games,'collections'=>$collections]);
    }

    public function searchCollection($id)
    {
        $main = new Main();
        $datas = $main->fetchData();
        $categories = $datas['categories'];
        $collections = $datas['collections'];
        

        $games = GameCollection::select('games.*',DB::raw("DATE_FORMAT(games.created_at,'%M %e %Y') as date"),'game_collections.collection_id as collection')
        ->join('games','games.id','game_collections.game_id')
        ->where("collection_id",$id)->paginate(5)->withQueryString();
        return Inertia::render('user/store/store',['categories' => $categories,'games'=>$games,'collections'=>$collections]);
    }

    public function searchCategoriesStore($id)
    {
        $main = new Main();
        $datas = $main->fetchData();
        $categories = $datas['categories'];
        $collections = $datas['collections'];
        
        $games = GameCategory::select('games.*',DB::raw("DATE_FORMAT(games.created_at,'%M %e %Y') as date"),'game_categories.category_id as ID','categories.name as category_name')
        ->join('games','games.id','game_categories.game_id')
        ->join('categories','categories.id','game_categories.category_id')
        ->where("game_categories.category_id",$id)
        ->paginate(5)->withQueryString();
        return Inertia::render('user/store/store',['categories' => $categories,'games'=>$games,'collections'=>$collections]);

    }

}
