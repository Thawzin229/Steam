<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCom extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'news_id',
        'comment'
    ];
}
