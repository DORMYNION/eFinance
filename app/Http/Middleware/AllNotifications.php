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
            // $request->data[] = $notification->type;
            // $request->attributes->add(['myAttribute' => $notification->type]);
            // $request->attributes->add(['myAttribute' => 'myValue']);
            $this->data[] = $notification->type;
        }
        dd($this->data);
        // dd($request);
        
        return $next($request);
    }
}
