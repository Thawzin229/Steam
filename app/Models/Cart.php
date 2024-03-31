<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'game_id',
        'quantity',
        'total_price'
    ];
    public function games()
    {
        return $this->belongsToMany(Game::class);
    }
}
