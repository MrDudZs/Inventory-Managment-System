<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    /**
     * Summary of handle
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param mixed $permissionLevel
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permissionLevel)
    {
        $user = Auth::user();

        if ($user->permission_level != $permissionLevel) {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('login');
        }

        return $next($request);
    }
}
