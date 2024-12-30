<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        View::composer('*', function($view) {
            $user = auth()->user();
        
            $whoToFollow = Cache::remember('who_to_follow_' . ($user ? $user->id : 'guest')
            , now()->addMinutes(10), function () use ($user) {
                if ($user) {
                    return User::where('id', '!=', $user->id)
                        ->whereNotIn('id', $user->followings()->pluck('id'))
                        ->take(5)
                        ->get();
                } else {
                    return User::orderBy('created_at', 'desc')
                        ->take(5)
                        ->get();
                }
            });
        
            $view->with('whoToFollow', $whoToFollow);
        });         
    }
}

