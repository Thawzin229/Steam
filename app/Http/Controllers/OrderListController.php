<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderListController extends Controller
{
    //order list 
    public function orderlist(Request $request)
    {
        if(Auth::user()->wallet >= intval($request->totalprice)){

        $summed_price = Auth::user()->wallet - intval($request->totalprice);
        User::where("id",Auth::user()->id)->update(['wallet' => $summed_price]);

        OrderList::create([
            'user_id' => $request->user_id,
            'game_id' => $request->game_id,
            'totalprice' => $request->totalprice,
            'order_code' => $request->order_code,
        ]);

        //sum up 
        Order::create([
            'user_id' => $request->user_id,
            'totalprice' => $request->totalprice,
            'order_code' => $request->order_code,
        ]);
        Cart::where("id",$request->cart_id)->delete();

        return redirect('/user/store');
    }
    return redirect('user/cart')->withErrors(['is_match'=>'You dont have enought wallet']);
}

}
