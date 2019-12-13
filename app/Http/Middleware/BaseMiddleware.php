<?php

namespace App\Http\Middleware;

use Closure;

class BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check subdomains
        $domain = explode('.', $request->getHost());
        if (count($domain) > 2) {
            $subDomain = explode('.', $request->getHost())[0];
            $request->attributes->add(['cityEntity' => $subDomain]);
        }

        return $next($request);
    }
}
