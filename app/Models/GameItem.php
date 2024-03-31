<?php

namespace App\Models;

use App\Models\Game;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GameItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'price',
        'status',
        'game_id'
    ];

    public function game()
    {
        $this->belongsTo(Game::class);
    }
}
