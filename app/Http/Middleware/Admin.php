<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            session()->put('noty', [
                'title' => '',
                'message' => 'اجازه دسترسی به این بخش را ندارید.....',
                'status' => 'info',
                'data' => '',
            ]);
            // return abort(403);
            return redirect()->route('login');
        }

        return $next($request);
    }
}
