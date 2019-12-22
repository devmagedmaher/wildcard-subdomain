<?php

namespace App\Http\Middleware;

use Closure;
use Illluminate\Support\Facades\View;
use App\Settings\SiteSettings;
use App\Website;

class CheckSubdomainExists
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
        $settings = app(SiteSettings::class);

        // abort if website doesn't exists
        if (!$settings->websiteExists()) {
            
            abort(404);
        }

        return $next($request);
    }
}
