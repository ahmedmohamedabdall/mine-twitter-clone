<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Policies\commentDeletePolicy;
use App\Policies\commentPolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'image'
    ];
    /*
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


            

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
  
    public function ideas()
    {
        return $this->hasMany(Idea::class)->orderBy('created_at', 'desc')->latest();
    }
    public function comments()
    {
        return $this->hasMany(comment::class)->orderBy('created_at', 'desc')->latest();
    }
    public function getImage()
    {
        if ($this->image) {
            return url('storage/' . $this->image);
        }
        return "https://api.dicebear.com/6.x/fun-emoji/svg?seed={{ $this->name }}";
    }

    public function followings()
    {

        return $this->belongsToMany(User::class, 'follwer_user', 'follower_id', 'user_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follwer_user', 'user_id', 'follower_id')->withTimestamps();
    }


    public function  followes(User $user)
    {
        return $this->followings()->where('user_id', $user->id)->exists();
    }
    


    public function likes()
    {
        return $this->belongsToMany(Idea::class, 'idea_likes')->withTimestamps();
    }
    
    public function  likes_boste(Idea $idea)
    {
        return $this->likes->contains($idea);
    }
}
