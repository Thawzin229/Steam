<?php

namespace App\Models;

use App\Models\Game;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JoinGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'group_id',
        'status',
    ];

    public function scopeRequest($query,$group_id)
    {
        $query->select('join_groups.*')
        ->addSelect(['name' => User::select('user_name')->whereColumn('id','join_groups.user_id')->take(1)])
        ->addSelect(['avatar' => User::select('avatar')->whereColumn('id','join_groups.user_id')->take(1)])
        ->addSelect(['image' => User::select('image')->whereColumn('id','join_groups.user_id')->take(1)])
        ->where('group_id',$group_id)
        ->where('status','pending');
    }

 
}
