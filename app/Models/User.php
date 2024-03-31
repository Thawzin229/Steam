<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Blog;
use App\Models\Friend;
use App\Models\UserItems;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_name',
        'email',
        'second_email',
        'image',
        'avatar',
        'google_id',
        'role',
        'best_game',
        'status',
        'jwt_token',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function scopeFetch($query,$search)
    {
        $query->select('id','user_name','email','avatar','image','role','status','second_email')
        ->when($search,function($query,$search){
            $query->whereRaw("regexp_replace(user_name,'[^A-Za-z0-9]','') like ?",[$search])->paginate(10)->withQueryString();
        });
    }
    // relation 
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function items()
    {
        return $this->hasMany(UserItems::class);
    }

    public function friends()
    {
        return $this->hasMany(Friend::class);
    }
}
