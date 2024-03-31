<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Category;
use App\Models\GameItem;
use App\Models\ScreenShot;
use App\Models\GameCategory;
use App\Models\UserCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'price',
        'cpu',
        'status',
        'gpu',
        'ram',
        'directx',
        'storage',
        'os',
    ];
    public function gamecategory()
    {
        return $this->hasMany(GameCategory::class);
    }
    public function screenshots()
    {
        return $this->hasMany(ScreenShot::class);
    }

    public function item()
    {
        return $this->hasMany(GameItem::class);
    }
    
    // public function userCollection()
    // {
    //     return $this->belongsToMany(UserCollection::class);
    // }
    


    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
    public function scopeFetchData($query,$search)
    {
        $query->with(['gamecategory' => function ($query) {
            $query->select('game_id')
            ->addSelect(['category_name' => Category::select("name")->whereColumn('id','game_categories.category_id')->take(1)]);
        }])
        ->when($search,function($query,$search){
            $query->whereRaw("regexp_replace(name,'[^A-Za-z0-9]','') like ?",[$search])->get()->toArray();
        });
    }


}
