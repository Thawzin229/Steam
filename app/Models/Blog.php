<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\ViewCount;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    protected $fillable =[
        'author_id',
        'title',
        'body',
        'image',
    ];

    // scope 

    // signle blog data
    public function scopeFetchData($query,$id)
    {
        $query->select('blogs.*',DB::raw("DATE_FORMAT(created_at,'%M %e , %Y') as date"))->with(['comments' => function($query){
            $query->select('user_id','blog_id','comment',DB::raw("DATE_FORMAT(created_at,'%M %e , %Y') as date"))
            ->addSelect(['user_name' => User::select('user_name')->whereColumn('id','comments.user_id')->take(1)])
            ->addSelect(['user_image' => User::select('image')->whereColumn('id','comments.user_id')->take(1)])
            ->addSelect(['user_avatar' => User::select('avatar')->whereColumn('id','comments.user_id')->take(1)]);
        }])
        ->addSelect(['count' => Comment::select(DB::raw("COUNT('comments.blog_id') as count"))->whereColumn('comments.blog_id','blogs.id')->take(1)])
        ->addSelect(['view_count' => ViewCount::select(DB::raw("COUNT('view_counts.blog_id') as count"))->whereColumn('view_counts.blog_id','blogs.id')->take(1)])
        ->where('id',$id);
    }

    // overall data 
    public function scopeFetchAllData($query,$search)
    {
        $query->select('blogs.*',DB::raw("DATE_FORMAT(created_at,'%M %e , %Y') as date"))
        ->when($search,function($query,$search){
            $query->whereRaw("regexp_replace(title,'[^A-Za-z0-9]','') like ?",[$search])->paginate(6)->withQueryString();
        })
        ->addSelect(['author_name' => User::select('user_name')->whereColumn('id','blogs.author_id')->take(1)])
        ->addSelect(['com_count' => Comment::select(DB::raw("COUNT('comments.blog_id') as count"))->whereColumn('comments.blog_id','blogs.id')->take(1)])
        ->addSelect(['view_count' => ViewCount::select(DB::raw("COUNT('view_counts.blog_id') as count"))->whereColumn('view_counts.blog_id','blogs.id')->take(1)]);
    }
    
    //relation 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
