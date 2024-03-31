<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Inertia\Inertia;
use App\Models\OrderList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //page 
    public function page()
    {
        $status = request('status');
        if($status !== null){
            $data = OrderList::query()->select('order_lists.*',DB::raw("DATE_FORMAT(created_at,'%M %e %Y') as date"))
            ->addSelect(['game_name' => Game::select("name")->whereColumn('id','order_lists.game_id')->take(1)])
            ->addSelect(['game_image' => Game::select("image")->whereColumn('id','order_lists.game_id')->take(1)])
            ->where('status',$status)
            ->paginate(10)->withQueryString();
        }else{
            $data = OrderList::query()->select('order_lists.*',DB::raw("DATE_FORMAT(created_at,'%M %e %Y') as date"))
            ->addSelect(['game_name' => Game::select("name")->whereColumn('id','order_lists.game_id')->take(1)])
            ->addSelect(['game_image' => Game::select("image")->whereColumn('id','order_lists.game_id')->take(1)])
            ->paginate(10)->withQueryString();
        }

        $orderstatus = OrderList::query()
        ->selectRaw("count(case when status = 'pending' then 1 end) as pending")
        ->selectRaw("count(case when status = 'success' then 1 end) as success")
        ->first()->toArray();
        return Inertia::render('admin/order/page',['data'=>$data,'order_count' => $orderstatus,'permission' => Auth::user()->can('create',User::class)]);
    }

    // order stataus
    public function status(Request $request)
    {
        OrderList::where("id",$request->order_id)->update(['status' => $request->status]);
        return redirect('/admin/order');
    }

}
