<?php

namespace App\Http\Controllers;

use App\Http\Requests\ideaCreateRequest;
use App\Http\Requests\IdeaRequest;
use App\Http\Requests\IdeaupdateRequest;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(ideaCreateRequest $request)
    {
        $validated=$request->validated();
        $validated['user_id']=auth()->id();
         Idea::create($validated);

        return redirect()->route('dashboard')->with('success', 'idea created succesfuly');
    }


    public function destroy(Idea $idea)
    {
        $this->authorize('delete', $idea);
        
        $idea->delete();


        return redirect()->route('dashboard')->with('success', 'idea deleted');
    }


    
    public function show(Idea $idea)
    {


        
        return view('ideas.idea_show', compact('idea'));
    }


    public function edit(Idea $idea)
    {
        
        $editing = true;


        return view('ideas.idea_show', compact('editing', 'idea'));
    }



    public function update(IdeaupdateRequest $request,Idea $idea)
    {

       

        
        $validated = $request->validated();
        $idea->update($validated);
        


        return redirect()->route('idea.show', $idea->id)->with('success', 'idea updated');
    }
}
