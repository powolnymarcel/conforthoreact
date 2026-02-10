<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user()) {
            return redirect()->route('admin.login');
        }

        $allowedEmails = [
            'powolnymarcel@gmail.com',
            'deborah@confortho.eu',
        ];

        if (!in_array($request->user()->email, $allowedEmails) && !$request->user()->is_admin) {
            abort(403);
        }

        return $next($request);
    }
}
