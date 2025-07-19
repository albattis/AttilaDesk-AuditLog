<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
/*Route::get('/test-log', function (App\Services\Logs\LoggerService $logger) {
    $logger->info('Ez audit log', [], 'audit');
    $logger->error('Ez security log', [], 'security');
    $logger->info('Ez alap log');

    return 'Logok elküldve.';
});
*/
Route::get('/lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');

