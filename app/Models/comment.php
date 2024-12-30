<?php

namespace App\Models;

use App\Policies\commentDeletePolicy;
use App\Policies\commentPolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'idea_id',
        'user_id'

    ];

    public function idea(){
        return $this->belongsTo(Idea::class);
    }
    public function user()
    {
        return $this->belongsTo(user::class,'user_id');
    }
}
