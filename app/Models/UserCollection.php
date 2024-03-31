<?php

namespace App\Models;

use App\Models\Game;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserCollection extends Model
{
    use HasFactory;
    protected $fillable = [
        'name' ,
        'user_id',
        'game_id',
        'slug',
        'collection_id'
    ];

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
