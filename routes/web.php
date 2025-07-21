<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('index');
})->name('home');
/*Route::get('/test-log', function (App\Services\Logs\LoggerService $logger) {
    $logger->info('Ez audit log', [], 'audit');
    $logger->error('Ez security log', [], 'security');
    $logger->info('Ez alap log');

    return 'Logok elküldve.';
});
*/
Route::get('/lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');

Route::get('/debug-session', function () {
    return response()->json([
        'session' => Session::all(),
        'locale' => App::getLocale(),
    ]);
});
