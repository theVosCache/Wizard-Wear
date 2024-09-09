<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Require2FA
{
    public function handle(Request $request, Closure $next)
    {
        if (app()->isLocal()) {
            return $next($request);
        }

        if (!$request->user()->two_factor_confirmed_at) {
            session()->flash('danger', 'ACCESS DENIED');
            session()->flash('danger-extended-message', '2FA required for this page');
            return redirect()->route('profile.2fa');
        }
        return $next($request);
    }
}
