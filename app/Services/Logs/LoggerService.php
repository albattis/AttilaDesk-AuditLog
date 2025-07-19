<?php

namespace App\Services\Logs;

use Exception;
use Illuminate\Support\Facades\Log;


class LoggerService
{
    public function log(string $message, string $level='info', array $context = [],?string $channel = null) : void
    {
        try {

            $level = strtolower($level);
            $logger = $channel ? Log::channel($channel) : Log::channel(config('logging.default'));
            $validLevels = [
                'emergency',
                'alert',
                'critical',
                'error',
                'warning',
                'notice',
                'info',
                'debug'
            ];

            if (!in_array($level, $validLevels)) {
                $level = 'info';
            }
            Log::log($level, $message,$context,$channel);
            $logger->log($level, $message, $context);

        }catch(Exception $e)
        {
            error_log('LoggerService hiba: ' . $e->getMessage());
        }
    }

    /**
     * Info loggolás
     *
     * @param string $message Üzenet
     * @param array $context  Részletes leirás
     * @return void
     */
    public function info(string $message, array $context = [],?string $channel = null): void
    {
        $this->log($message, 'info', $context,$channel);
    }
    /**
     * Hiba loggolás
     *
     * @param string $message Üzenet
     * @param array $context  Részletes leirás
     * @return void
     */
    public function error(string $message, array $context = [],?string $channel = null): void
    {
        $this->log($message, 'error', $context,$channel);
    }

    /**
     * Kritikus hiba loggolás
     *
     * @param string $message Üzenet
     * @param array $context  Részletes leirás
     * @return void
     */
    public function critical(string $message, array $context = [],?string $channel = null): void
    {
        $this->log($message, 'critical', $context,$channel);
    }

    /**
     * Azzonali hiba loggolás
     *
     * @param string $message Üzenet
     * @param array $context  Részletes leirás
     * @return void
     */
    public function emergency(string $message, array $context = [],?string $channel = null): void
    {
        $this->log($message, 'emergency', $context,$channel);
    }
    /**
     * Kisebb hiba loggolás
     *
     * @param string $message Üzenet
     * @param array $context  Részletes leirás
     * @return void
     */
    public function alert(string $message, array $context = [],?string $channel = null): void
    {
        $this->log($message, 'alert', $context,$channel);
    }
    /**
     * Figyelmeztetési loggolás
     *
     * @param string $message Üzenet
     * @param array $context  Részletes leirás
     * @return void
     */
    public function warning(string $message, array $context = [],?string $channel = null): void
    {
        $this->log($message, 'warning', $context,$channel);
    }

    /**
     * Feljegyzés loggolás
     *
     * @param string $message Üzenet
     * @param array $context  Részletes leirás
     * @return void
     */
    public function notice(string $message, array $context = [],?string $channel = null): void
    {
        $this->log($message, 'notice', $context,$channel);
    }

    /**
     * Hibajavitás loggolás
     *
     * @param string $message Üzenet
     * @param array $context  Részletes leirás
     * @return void
     */
    public function debug(string $message, array $context = [],?string $channel = null): void
    {
        $this->log($message, 'debug', $context,$channel);
    }
}
