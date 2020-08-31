<?php 

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Gate;

class AuthGates {

    public function handle($request, Closure $next) {

        $user = auth()->user();

        if($user) {
            Gate::define('admin', function($user) {
                return $user->hasRole('Admin');
            });

            Gate::define('staff', function($user) {
                return $user->hasRole('Staff');
            });

            Gate::define('user', function($user) {
                return $user->hasRole('User');
            });
        }

        return $next($request);

    }

}