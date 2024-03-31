<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameCollection extends Model
{
    use HasFactory;
    protected $fillable = [
        'collection_id',
        'game_id',
    ];
}
