<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Market;
use App\Models\GameItem;
use App\Models\UserItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MarketController extends Controller
{
    //market 
    public function market()
    {
        $sorting = request("sorting");
        $search = "%".preg_replace("/[^A-Za-z0-9]/",'',request('search'))."%";
        $game_id = request("game_id");

        $filter_data = [
            'sorting' => $sorting,
            'search' => $search,
            'game_id' => $game_id,
        ];

        $items = Market::query()->FetchItemData($filter_data)->paginate()->withQueryString();

        $itemsname = GameItem::query()->select("name","id")->get()->toArray();
        $games = Game::query()->select("name","id",'image')->get()->toArray();

        $gameAndItems =  [
            'games' => $games,
            'items' => $itemsname,
        ];
        return Inertia::render("user/market/market",['items' => $items,'gameanditem' => $gameAndItems]);
    }

    // addTomarket
    public function addTomarket(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'item_id' => 'required',
            'game_id' => 'required',
            'sell_price' => 'required',
            'user_item_id' => 'required',
        ]);
        Market::create($data);
        return redirect()->back()->withErrors(['status' => 'yes']);  



    }

    // purchase
    public function purchase(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'game_id' => 'required',
            'item_id' => 'required',
        ]);
        $item_price = Market::where('id',$request->market_id)->first()->sell_price;
        $wallet = User::where("id",Auth::user()->id)->first()->wallet;
        $seller_wallet = User::where("id",$request->seller_id)->first()->wallet;
        if($wallet >= $item_price){
        $updated_price = $wallet - $item_price;
        User::where('id',Auth::user()->id)->update(['wallet' => $updated_price]);

        $price_to_seller = $seller_wallet + $item_price; 
        User::where('id',$request->seller_id)->update(['wallet' => $price_to_seller]);



        UserItems::create($data);
        Market::where('id',$request->market_id)->delete();
        UserItems::where("id",$request->user_item_id)->delete();
        return redirect()->back();
        }else{
            return back()->withErrors(['err_status' => 'Not enough wallet to proceed.']);
        }

        
    }
}
