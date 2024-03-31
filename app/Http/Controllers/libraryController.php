<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Inertia\Inertia;
use App\Models\OrderList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class libraryController extends Controller
{
    //page 
    public function page()
    {
        $games = OrderList::query()->select('order_lists.*',DB::raw("DATE_FORMAT(created_at,'%M %e %Y') as date"))
        ->addSelect(['game_name' => Game::select("name")->whereColumn('id','order_lists.game_id')->take(1)])
        ->addSelect(['game_image' => Game::select("image")->whereColumn('id','order_lists.game_id')->take(1)])
        ->where("user_id",Auth::user()->id)->paginate(2)->withQueryString();
        return Inertia::render("user/library/page",['games' => $games]);
    }
}
