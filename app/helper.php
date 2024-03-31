<?php
namespace App;

use App\Models\Game;
use App\Models\User;
use App\Models\Friend;
use App\Models\Category;
use App\Models\GameItem;
use App\Models\UserItems;
use App\Models\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Main{
function fetchData($search=null)
{
        $categories = Category::query()->select("id",'name')->get()->toArray();

        $games = Game::select("games.*",DB::raw("DATE_FORMAT(games.created_at,'%M %e %Y') as date"))
        ->with(['gamecategory' => function($query){
            $query->select('game_id')
            ->addSelect(['category_name' => Category::select('name')->whereColumn('id','game_categories.category_id')->take(1)]);
        },'screenshots'])
        ->when($search,function($query,$search){
          $query->whereRaw("regexp_replace(name,'[^A-Za-z0-9]','') like ?",[$search])->paginate(5)->withQueryString();
        })
        ->paginate(5)->withQueryString();

        $normal_games = Game::with(['gamecategory' => function($query){
          $query->select('game_id')
          ->addSelect(['category_name' => Category::select('name')->whereColumn('id','game_categories.category_id')->take(1)]);
      }])->get()->toArray();

        $latest_games = Game::with(['gamecategory' => function($query){
            $query->select('game_id')
            ->addSelect(['category_name' => Category::select('name')->whereColumn('id','game_categories.category_id')->take(1)]);
        },'screenshots'])
        ->latest()
        ->get()->toArray();

        $collections = Collection::get()->toArray();

        $under_10_games =  Game::where('price','<',10)->paginate()->withQueryString();

        
        return [
          'categories' => $categories,
          'games' => $games,
          'latest_games' => $latest_games,
          'normal_games' => $normal_games,
          'collections' => $collections,
          'under_10_games' => $under_10_games,
        ];
}

public function userData()
{
    $user = User::select('users.*',DB::raw("DATE_FORMAT(created_at , '%M %e , %Y') as date"))->where('role','user')->latest()->paginate(5)->withQueryString();
    return $user;
}
}

class FriendData{
  public function friends()
  {

    return  Friend::query()
    ->addSelect(['user_name' => User::select('user_name')->whereColumn('id','friends.sender_id')->take(1)])
    ->addSelect(['user_image' => User::select('image')->whereColumn('id','friends.sender_id')->take(1)])
    ->addSelect(['user_avatar' => User::select('avatar')->whereColumn('id','friends.sender_id')->take(1)])
    ->where("receiver_id",Auth::user()->id)->where('status','friended')
    ->paginate(10)->withQueryString();

  }

  public function requests()
  {
    return  Friend::query()
    ->addSelect(['user_name' => User::select('user_name')->whereColumn('id','friends.sender_id')->take(1)])
    ->addSelect(['user_image' => User::select('image')->whereColumn('id','friends.sender_id')->take(1)])
    ->addSelect(['user_id' => User::select('id')->whereColumn('id','friends.sender_id')->take(1)])
    ->addSelect(['user_avatar' => User::select('avatar')->whereColumn('id','friends.sender_id')->take(1)])
    ->where("receiver_id",Auth::user()->id)->where('status','requested')
    ->paginate(10)->withQueryString();
  }
}


class ImgUpload{
function uploadImage($request,$folder){
  if($request->hasFile('image'))
      {
        if(isset($request->id)){
          $old_image = GameItem::where("id",$request->id)->first()->image;
          if($old_image !== null)
          {
            Storage::delete("item_images/".$old_image);
          }
        }
            $file_name = uniqid().$request->file("image")->getClientOriginalName();
            $request->file('image')->storeAs($folder,$file_name);
            return $file_name;
      }else{
          $old_image = GameItem::where("id",$request->id)->first()->image;
          return $old_image;
      }
}
}

class UserInfo{

public function fetchDataFri($id = null)
{
    return $id === null ? Friend::query()->select(DB::raw("DATE_FORMAT(created_at,'%M %e , %Y') as friend_date"))
      ->addSelect([
        'user_name' => User::select('user_name')->whereColumn('id', 'friends.sender_id')->take(1),
        'user_image' => User::select('image')->whereColumn('id', 'friends.sender_id')->take(1),
        'user_avatar' => User::select('avatar')->whereColumn('id', 'friends.sender_id')->take(1)
      ])
      ->where("receiver_id", Auth::user()->id)->where('status', 'friended')
      ->paginate(10)->withQueryString() 
      : Friend::query()->select(DB::raw("DATE_FORMAT(created_at,'%M %e , %Y') as friend_date"))
        ->addSelect([
          'user_name' => User::select('user_name')->whereColumn('id', 'friends.sender_id')->take(1),
          'user_image' => User::select('image')->whereColumn('id', 'friends.sender_id')->take(1),
          'user_avatar' => User::select('avatar')->whereColumn('id', 'friends.sender_id')->take(1)
        ])
        ->where("receiver_id",$id)->where('status', 'friended')
        ->paginate(10)->withQueryString();
}

public function fetchDataItems($number=null,$id = null)
  {
    return $id === null ? UserItems::query()
      ->addSelect(['name' => GameItem::select("name")->whereColumn("id", "user_items.item_id")->take(1)])
      ->addSelect(['image' => GameItem::select("image")->whereColumn("id", "user_items.item_id")->take(1)])
      ->addSelect(['game_name' => Game::select("name")->whereColumn("id", "user_items.game_id")->take(1)])
      ->where('user_id', Auth::user()->id)->paginate($number)->withQueryString()
      :
      UserItems::query()
        ->addSelect(['name' => GameItem::select("name")->whereColumn("id", "user_items.item_id")->take(1)])
        ->addSelect(['image' => GameItem::select("image")->whereColumn("id", "user_items.item_id")->take(1)])
        ->addSelect(['game_name' => Game::select("name")->whereColumn("id", "user_items.game_id")->take(1)])
        ->where('user_id', $id)->paginate($number)->withQueryString();

  }
}

?>