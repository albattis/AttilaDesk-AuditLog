<?php

namespace App\Http\Middleware;

use App\Services\Logs\LoggerService;
use Closure;
use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        $locale = Session::get('locale', config('app.locale'));

        if (!in_array($locale, ['en', 'hu'])) {
            $locale = config('app.locale'); // fallback

        }

        App::setLocale($locale);

        return $next($request);
    }
}

