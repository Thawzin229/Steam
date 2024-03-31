<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Game;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //page 
    public function page()
    {
        $carts = Cart::select("name",'image','price','games.id as game_id','carts.id as cart_id','carts.quantity as quantity','carts.total_price as total_price',DB::raw("DATE_FORMAT(carts.created_at,'%M %e , %Y') as carted_date "))
        ->join('games','games.id','carts.game_id')
        ->paginate(5)->withQueryString();
        return Inertia::render("user/cart/list",['carts' => $carts]);
    }
    // add to cart
    public function addToCart(Request $request)
    {
        Cart::create([
            'user_id'=>$request->user_id,
            'game_id'=>$request->game_id,
            'quantity'=>$request->quantity,
            'total_price'=>$request->total_price,
        ]);
        return redirect('user/cart');
    }
    // delete 
    public function delete($cart_id)
    {
        Cart::where('id',$cart_id)->delete();
        return redirect('/user/cart');
    }
}
