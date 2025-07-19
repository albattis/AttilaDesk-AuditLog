<?php


namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use App\Services\Logs\LoggerService;

class LoggerServiceTest extends TestCase
{
    /** @test */
    public function it_logs_info_message_to_default_channel()
    {
        Log::shouldReceive('log')
            ->once()
            ->with('info', 'Teszt üzenet', [], null);

        $logger = new LoggerService();
        $logger->info('Teszt üzenet');
    }

    /** @test */
    public function it_logs_error_message_to_custom_channel()
    {
        Log::shouldReceive('log')
            ->once()
            ->with('error', 'Hiba történt', [], 'audit');

        $logger = new LoggerService();
        $logger->error('Hiba történt', [], 'audit');
    }

}
