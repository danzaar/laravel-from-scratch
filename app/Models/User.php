<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


//class User extends Authenticatable
//{
//
//    use HasApiTokens, HasFactory, Notifiable;
//
//    /**
//     * The attributes that are mass assignable.
//     *
//     * @var string[]
//     */
//    protected $fillable = [
//        'name',
//        'email',
//        'password',
//    ];
//
//    /**
//     * The attributes that should be hidden for serialization.
//     *
//     * @var array
//     */
//    protected $guarded = [];
//
//    /**
//     * The attributes that should be cast.
//     *
//     * @var array
//     */
//    protected $casts = [
//        'email_verified_at' => 'datetime',
//    ];
//    /**
//     * @var mixed
//     */
//
//    public function post(): HasMany
//    {
//        return $this->hasMany(Post::class);
//    }
//}

class User extends Authenticatable
{
    use HasFactory;

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //this is an ACCESSOR
    public function getUsernameAttribute($username)
    {
        return ucwords($username);
    }

    //this is an MUTATOR
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }


    protected $guarded = [];

    protected $posts;
    /**
     * @var mixed
     */
    private $post;

    public function post(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}

