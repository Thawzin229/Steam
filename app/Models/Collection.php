<?php

namespace App\Models;

use App\Models\Game;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Collection extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];

    public function games()
    {
        return  $this->hasMany(Game::class);
    }
    public function gamecollections()
    {
        return  $this->hasMany(GameCollection::class);
    }
}
