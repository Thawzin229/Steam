<?php

namespace App\Models;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'blog_id',
        'comment'
    ];
    public function blogs()
    {
        return $this->belongsTo(Blog::class);
    }

    // scope 
    public function scopeFetchComs($query,$id)
    {
        $query->select('comments.*',DB::raw("DATE_FORMAT(created_at,'%M %e , %Y') as date"))
        ->addSelect(['user_name' => User::select('user_name')->whereColumn('users.id','comments.user_id')->take(1)])
        ->addSelect(['user_image' => User::select('image')->whereColumn('users.id','comments.user_id')->take(1)])
        ->addSelect(['user_avatar' => User::select('avatar')->whereColumn('users.id','comments.user_id')->take(1)])
        ->where('comments.blog_id',$id);
    }
}
