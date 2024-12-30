<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboard_Controlle extends Controller
{
    public function index()

    {

        // Start the query with eager loading for likes and comments

        $ideasQuery = Idea::with([
            'user:id,name,image',
            'comments.user:id,name,image',
            "comments:content,created_at,user_id,idea_id" // Load the user relationship for each comment
        ])
            ->orderBy('created_at', 'desc'); // Eager load comments and their associated users




        // Check if there's a search 

        if (request()->has('search')) {

            $ideasQuery->search(request('search',''));
        }


        

        $ideas = $ideasQuery->paginate(5)->withQueryString();


        return view('dashboard', compact('ideas'));
    }
}
