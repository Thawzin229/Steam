<?php

namespace App\Models;

use App\Models\Game;
use App\Models\User;
use App\Models\GameItem;
use App\Models\UserItems;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Market extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'item_id',
        'game_id',
        'sell_price',
        'user_item_id'
    ];

    public function items()
    {
        return $this->hasMany(UserItems::class);
    }


    public function scopeFetchItemData($query,$filter_data)
    {
        $search = $filter_data['search'];
        $sorting = $filter_data['sorting'];
        $game_id = $filter_data['game_id'];

        $query->join("game_items",'game_items.id','markets.item_id')
        ->select('markets.*',DB::raw("DATE_FORMAT(markets.created_at,'%M %e , %Y') as date"))
        ->addSelect([
            'item_name' => GameItem::select('name')->whereColumn('id','markets.item_id')->take(1),
            'item_image' => GameItem::select('image')->whereColumn('id','markets.item_id')->take(1),
            'game_name' => Game::select('name')->whereColumn('id','markets.game_id')->take(1),
            'user_name' => User::select('user_name')->whereColumn('id','markets.user_id')->take(1)
        ])
        ->when($search,function($query,$search){
            $query->whereRaw("regexp_replace(game_items.name,'[^A-Za-z0-9]','') like ?",[$search])->get()->toArray();
        })
        ->when($game_id,function($query,$game_id){
            $query->where('markets.game_id',$game_id)->paginate()->withQueryString();
        })
        ->when($sorting,function($query,$sorting){
            switch ($sorting) {
                case 'under-10-dollar':
                    $query->where('markets.sell_price','<=',10)->paginate()->withQueryString();
                    break;
                case '100-300':
                        $query->where('markets.sell_price','>=',100)->where('markets.sell_price','<=',300)->paginate()->withQueryString();
                    break;
                case '300-500':
                        $query->where('markets.sell_price','>=',300)->where('markets.sell_price','<=',500)->paginate()->withQueryString();
                    break;
                    case 'above-500-dollar':
                        $query->where('markets.sell_price','>=',500)->paginate()->withQueryString();
                    break;
                
                default:
                    # code...
                    break;
            }
        });
    }
}
