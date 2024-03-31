<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\UserCollection;
use App\Models\UserCollectonName;
use Illuminate\Support\Facades\Auth;

class UserCollectionController extends Controller
{
    //page
    public function page()
    {
        $search = "%".preg_replace("/[^A-Za-z0-9]/",'',request('search'))."%";
        $games = Game::get(['name','id'])->toArray();
        $collection = UserCollectonName::query()
        ->when($search,function($query,$search){
            $query->whereRaw("regexp_replace(name,'[^A-Za-z0-9]','') like ?",[$search])->get()->toArray();
        })
        ->where("user_id",Auth::user()->id)
        ->get()->toArray();
        return Inertia::render("user/collection/page",['games' => $games,'collections' => $collection]);
    }

    //create 
    public function create(Request $request)
    {   
        $data = $request->validate([
            'name' => 'required',
            'games' => 'required|array',
            'user_id' => 'required',
        ]);
        UserCollectonName::create(['name' => $request->name,'user_id'=> Auth::user()->id]);
        $coll_id = UserCollectonName::where('name',$request->name)->first()->id;
        $slug_name = Str::slug($request->name);
        foreach ($request->games as $game) {
            UserCollection::create([
                'name' => $request->name,
                'user_id' => $request->user_id,
                'game_id' => $game,
                'collection_id' => $coll_id,
                'slug' => $slug_name
            ]);
        }
        return redirect()->back()->withErrors(['status' => 'collection added.']);
    }

    // gaemss
    public function games($id)
    {
        $search = "%".preg_replace("/[^A-Za-z0-9]/",'',request('search'))."%";
        $games = UserCollection::query()
        ->join('games','user_collections.game_id','games.id')
        ->addSelect([
            'name' => Game::select("name")->whereColumn('id','user_collections.game_id')->take(1),
            'image' => Game::select("image")->whereColumn('id','user_collections.game_id')->take(1),
            'os' => Game::select("os")->whereColumn('id','user_collections.game_id')->take(1),
        ])
        ->when($search,function($query,$search){
            $query->whereRaw("regexp_replace(games.name,'[^A-Za-z0-9]','') like ?",[$search])->get()->toArray();
        })
        ->where('collection_id',$id)
        ->paginate()->withQueryString();
        return Inertia::render('user/collection/collection',['games' => $games,'collection_id'=>$id]);
    }

    // delete
    public function delete($id)
    {
        UserCollectonName::where('id',$id)->delete();
        UserCollection::where('collection_id',$id)->delete();
        return redirect()->back();
    }

    public function gamedelete($id)
    {
        UserCollection::where('id',$id)->delete();
        return redirect()->back();
    }
}
