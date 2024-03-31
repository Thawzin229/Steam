<?php

namespace App\Models;

use App\Models\Game;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'game_id',
        'status',
    ];

    public function scopeGroupData($query,$search)
    {
        $query->select('groups.*',DB::raw("DATE_FORMAT(created_at,'%M %e,%Y') as date"))
        ->when($search,function($query,$search){
            $query->whereRaw("regexp_replace(name,'[^A-Za-z0-9]','') like ?",[$search])->get()->toArray();
        })
        ->addSelect(['game_type' => Game::select('name')->whereColumn('id','groups.game_id')->take(1)])
        ->addSelect(['game_image' => Game::select('image')->whereColumn('id','groups.game_id')->take(1)]);
    }
}
