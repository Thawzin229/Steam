<?php

namespace App\Http\Controllers;

use App\Main;
use App\UserInfo;
use App\Models\Game;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Friend;
use App\Models\Category;
use App\Models\GameItem;
use App\Models\OrderList;
use App\Models\UserItems;
use Illuminate\Http\Request;
use App\Models\GameCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //home
    public function home()
    {
        $main = new Main();
        $datas = $main->fetchData();
        $categories = $datas['categories'];
        $games = $datas['games'];
        $under_10_games = $datas['under_10_games'];
        $latest_games = $datas['latest_games'];
        $normal_games = $datas['normal_games'];
        $collections = $datas['collections'];
        return Inertia::render('user/home',['categories' => $categories,'games'=>$games,'latest_games' => $latest_games,'normal_games' =>$normal_games,'collections'=>$collections,'under_10_games'=> $under_10_games]);
    }

    public function searchByCategories($id)
    {
        $main = new Main();
        $datas = $main->fetchData();
        $categories = $datas['categories'];
        $normal_games = $datas['normal_games'];
        $latest_games = $datas['latest_games'];
        $collections = $datas['collections'];
        $under_10_games = $datas['under_10_games'];

        

        $games = GameCollection::select('games.*',DB::raw("DATE_FORMAT(games.created_at,'%M %e %Y') as date"),'game_collections.collection_id as collection')
        ->join('games','games.id','game_collections.game_id')
        ->where("collection_id",$id)->paginate(5)->withQueryString();
        return Inertia::render('user/home',['categories' => $categories,'games'=>$games,'latest_games' => $latest_games,'normal_games'=>$normal_games,'collections'=>$collections,'under_10_games'=> $under_10_games]);



    }


    // user information 
    public function userInformation()
    {

        $user_info = new UserInfo();
        $friends = $user_info->fetchDataFri();
        $items = $user_info->fetchDataItems(6);
        $user_games = OrderList::query()->select('order_lists.*',DB::raw("DATE_FORMAT(created_at,'%M %e , %Y') as date"))
        ->addSelect(['game_name' => Game::select("name")->whereColumn('id','order_lists.game_id')->take(1)])
        ->addSelect(['game_image' => Game::select("image")->whereColumn('id','order_lists.game_id')->take(1)])
        ->where("user_id",Auth::user()->id)->latest()->paginate(4)->withQueryString();

        $user_id = Auth::user()->id;
        $count = DB::select("SELECT
            (select count(*) from friends where receiver_id = ? AND status = 'friended' ) as fri_count,
            (select count(*) from user_items where user_id = ? ) as item_count,
            (select count(*) from order_lists where user_id = ? ) as game_count
        ",[$user_id,$user_id,$user_id]);
        $user_main_info = null;
        
        return Inertia::render("user/account/account",['friends' => $friends,'items' => $items,'count'=> $count,'user_games' => $user_games,'user_main_info' => $user_main_info]);
    }

    // eachUser
    public function eachUser($id)
    {
        $user_info = new UserInfo();
        $friends = $user_info->fetchDataFri($id);
        $items = $user_info->fetchDataItems(6,$id);
        $user_games = OrderList::query()->select('order_lists.*',DB::raw("DATE_FORMAT(created_at,'%M %e , %Y') as date"))
        ->addSelect(['game_name' => Game::select("name")->whereColumn('id','order_lists.game_id')->take(1)])
        ->addSelect(['game_image' => Game::select("image")->whereColumn('id','order_lists.game_id')->take(1)])
        ->where("user_id",$id)->latest()->paginate(4)->withQueryString();

        $user_id = $id;
        $count = DB::select("SELECT
            (select count(*) from friends where receiver_id = ? AND  status = 'friended' ) as fri_count,
            (select count(*) from user_items where user_id = ? ) as item_count,
            (select count(*) from order_lists where user_id = ? ) as game_count
        ",[$user_id,$user_id,$user_id]);

        $user_main_info = User::select('user_name','image','avatar', 'wallet')->where('id', $id)->first();
        
        return Inertia::render("user/account/account",['friends' => $friends,'items' => $items,'count'=> $count,'user_games' => $user_games,'user_main_info' => $user_main_info]);
    }

    // accountUpdate
    public function accountUpdate(Request $request)
    {
        $data  =  $request->validate([
            'user_name' => ['required','string','max:200','min:2','unique:users,user_name,'.$request->id],
            'status' => ['nullable','string'],
            'role' => ['nullable','string'],
            'image' => ['nullable'],
        ]);

        if($request->hasFile('image'))
        {
            $old_img = User::where('id',$request->id)->first()->image;
            if($old_img !== null)
            {
                Storage::delete('user_images/'.$old_img);
            }
            if($request->avatar !== null)
            {
                $data['avatar'] = null; 
            }
            $file_name = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs("user_images",$file_name);
            $data['image']  = $file_name;
        }

        User::where("id",$request->id)->update($data);
        return redirect('user/account');
    }

    // accountItems
    public function accountItems()
    {
        $user_info = new UserInfo();
        $items = $user_info->fetchDataItems();
        return Inertia::render('user/account/item',['items' => $items]);
    }

    // delete the use item 

    public function deleteItem($id)
    {
        UserItems::where('id',$id)->delete();
        return redirect()->back();
    }

}
