<?php

namespace App\Models;

use App\Models\Game;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GameCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'game_id',
        'category_id',
    ];
    public function game()
    {
        return $this->belongsToMany(Game::class);
    }
}
