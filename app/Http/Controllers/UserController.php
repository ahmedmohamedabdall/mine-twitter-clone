<?php

namespace App\Http\Controllers;

use App\Http\Requests\updateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $ideas = $user->ideas()->with(['user:id,name,image', 'comments.user'])->simplePaginate(3);

        $userData = Cache::remember("userData_{$user->id}", now()->addMinutes(15), function () use ($user) {

            return $user->loadCount(['likes', 'comments', 'ideas', 'followers']);
        });

        return view('users.show', compact('user', 'ideas', 'userData'));
    }


    public function profile(User $user)
    {
        return $this->show($user);
    }


    /**
     * Show the form for editing the specified resource.
     */

    public function edit(User $user)
    {

        $ideas = $user->ideas()->paginate(3);
        $editing = true;
        return view('users.edit', compact('user', 'editing', 'ideas'));
    }




    public function update(updateUserRequest $request, User $user)
    {



        $validated = $request->validated();


        if ($request->has('image')) {
            $imagePath = $request->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;
            Storage::disk('public')->delete($user->image ?? '');
        }

        $user->update($validated);
        return redirect()->route('profile', ['user' => $user->id])->with('success', 'user updated');
    }
}
