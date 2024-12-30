<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class feedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
      $user=auth()->user();
      $followingsID=$user->followings()->pluck('user_id')->toArray();
        
        $ideasquery = Idea::query()->
        whereIn('user_id',$followingsID)->when(request()->has('search')
        ,function($query)use($request){
$query->where('content','like','%'.$request->get('search','').'%');
        })->with(['user','comments']);
        
        $ideas = $ideasquery->simplePaginate(5)->WithQueryString();

        return view('dashboard', ['ideas' => $ideas]);
    }
}
