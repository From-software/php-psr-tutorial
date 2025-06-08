<?php

declare(strict_types=1);

namespace Core\Logger;

use RuntimeException;

/**
 * Basic File Logger which logs to an "app.log" file in the specified directory.
 */
final class FileLogger
{
    use LoggerTrait;

    public function __construct(
        public readonly string $path = LOGS_DIR,
        public readonly string $fileName = 'app.log'
    ) {
        if (!is_dir($this->path)) {
            mkdir($this->path, recursive: true);
        }

        if (!is_writable($this->path)) {
            throw new RuntimeException("Log directory is not writable: {$this->path}");
        }
    }

    /**
     * @inheritDoc
     */
    public function log($level, \Stringable|string $message, array $context = []): void
    {
        $filePath = "{$this->path}/{$this->fileName}";
        $filePath = str_replace('/', DS, $filePath);

        $timestamp = $this->timestamp();
        $level     = $this->parseLevel($level);

        $message = $this->interpolate($message, $context);
        $message = "$timestamp [$level] - $message" . PHP_EOL;

        file_put_contents($filePath, $message, FILE_APPEND | LOCK_EX);
    }
}
