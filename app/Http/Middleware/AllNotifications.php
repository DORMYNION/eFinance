<?php

namespace App\Http\Middleware;

use Closure;

class AllNotifications
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public $data = [];

    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        foreach ($user->notifications as $notification) {
            $this->data[] = $notification->type;
        }
        dd($this->data);
        
        return $next($request);
    }
}
