<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Collection;
use Illuminate\Http\Request;
use App\Models\GameCollection;
use Illuminate\Support\Facades\Auth;

class CollectionController extends Controller
{
    //page 
    public function page()
    {
        $names = Game::select('id','name')->get()->toArray();
        return Inertia::render("admin/collection/create",['names'=>$names]);
    }

    // list page 
    public function listpage()
    {
        $collections = Collection::with(['gamecollections' => function($query){
            $query->select("collection_id")
            ->addSelect(['game' => Game::select('name')->whereColumn('id','game_collections.game_id')->take(1)]);
        }])
        ->get()->toArray();
        return Inertia::render("admin/collection/list",['collections'=>$collections,'permission' => Auth::user()->can('create',User::class)]);
    }

    // create 
    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => "required|string|unique:collections",
            'games' => "required|array",
        ]);
        Collection::create(['name' => $request->name]);
        $id = Collection::where('name',$request->name)->first()->id;
        foreach ($request->games as $game_id) {
            GameCollection::create([
                'collection_id' => $id,
                'game_id' => $game_id,
            ]);
        }
        return redirect('/admin/collection/list');
    }

    // delelte 
    public function delete($id)
    {
        Collection::where('id',$id)->delete();
        GameCollection::where('collection_id',$id)->delete();
        return redirect('/admin/collection/list');
    }
}
