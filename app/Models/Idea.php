<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $fillable = ['content', 'user_id'];
protected $withCount=['likes'];
    protected $guarded=['id','created_at','updated_at'];
    use HasFactory;
    public function comments(){
        return $this->hasMany(comment::class);
    }
    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function likes()
    {
        return $this->belongsToMany(user::class,'idea_likes')->withTimestamps();
    }
    public function scopeSearch(Builder $query,$search=''){
       

            $query->where('content', 'like', '%' . $search . '%');
        
    }

}
