<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ideaLike extends Controller
{
    public function like(Idea $idea)
    {
        $liker= auth()->user();

        $liker->likes()->attach($idea->id);

        
       
       
        return redirect()->back();
    }



    public function unlike(Idea $idea)
    {
        $liker = auth()->user();

        $liker->likes()->detach($idea->id);
        
        return redirect()->back();
    }
}
