<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Inertia\Inertia;
use App\Models\GameItem;
use App\Models\UserItems;
use App\Models\ItemIncome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserItemsController extends Controller
{
    //page 
    public function page($id)
    {
        $search = "%".preg_replace('/[^A-Za-z0-9]/','',request('search'))."%";
        $game_name = Game::where('id',$id)->first()->name;
        $items = GameItem::query()
        ->when($search,function($query,$search){
            $query->whereRaw("regexp_replace(name,'[^A-Za-z0-9]','') like ?",[$search])->paginate()->withQueryString();
        })
        ->where('game_id',$id)->paginate()->withQueryString();
        return Inertia::render('user/market/page',['items' => $items,"game_name" => $game_name,'game_id' => $id]);
    }

    // purchase
    public function purchase(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'game_id' => 'required',
            'item_id' => 'required',
        ]);
        $item_price = GameItem::where('id',$request->item_id)->first()->price;
        $wallet = User::where("id",Auth::user()->id)->first()->wallet;
        if($wallet >= $item_price){
        $updated_price = $wallet - $item_price;
        User::where('id',Auth::user()->id)->update(['wallet' => $updated_price]);

        ItemIncome::create(['user_id' => $request->user_id, 'item_id' => $request->item_id, 'price' => $item_price]);

        UserItems::create($data);
        return redirect()->back();
        }else{
            return back()->withErrors(['err_status' => 'Not enough wallet to proceed.']);
        }

        
    }
}
