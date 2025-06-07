<?php

declare(strict_types=1);

namespace Core\Logger;

use InvalidArgumentException;

trait LoggerTrait
{

    /**
     * System is unusable.
     *
     * @param mixed[] $context
     */
    public function emergency(string|\Stringable $message, array $context = []): void
    {
        $this->log('emergency', $message, $context);
    }

    /**
     * Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     *
     * @param mixed[] $context
     */
    public function alert(string|\Stringable $message, array $context = []): void
    {
        $this->log('alert', $message, $context);
    }

    /**
     * Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     *
     * @param mixed[] $context
     */
    public function critical(string|\Stringable $message, array $context = []): void
    {
        $this->log('critical', $message, $context);
    }

    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     * @param mixed[] $context
     */
    public function error(string|\Stringable $message, array $context = []): void
    {
        $this->log('error', $message, $context);
    }

    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     * @param mixed[] $context
     */
    public function warning(string|\Stringable $message, array $context = []): void
    {
        $this->log('warning', $message, $context);
    }

    /**
     * Normal but significant events.
     *
     * @param mixed[] $context
     */
    public function notice(string|\Stringable $message, array $context = []): void
    {
        $this->log('notice', $message, $context);
    }

    /**
     * Interesting events.
     *
     * Example: User logs in, SQL logs.
     *
     * @param mixed[] $context
     */
    public function info(string|\Stringable $message, array $context = []): void
    {
        $this->log('info', $message, $context);
    }

    /**
     * Detailed debug information.
     *
     * @param mixed[] $context
     */
    public function debug(string|\Stringable $message, array $context = []): void
    {
        $this->log('debug', $message, $context);
    }

    /**
     * Interpolate message and apply context values.
     * Placeholders are wrapped in curly braces, e.g. {username} will be replaced with the `username` key in the `$context` array.
     *
     * @param string $message
     * @param array  $context
     *
     * @return string
     */
    protected function interpolate(string $message, array $context): string
    {
        foreach ($context as $key => $val) {
            unset($context[$key]);
            $context['{' . $key . '}'] = $val;
        }

        return strtr($message, $context);
    }

    /**
     * Get current timestamp in 'Y-m-d H:i:s' format.
     *
     * @return string
     */
    protected function timestamp(): string
    {
        return date('Y-m-d H:i:s');
    }

    /**
     * Parse log level to uppercase string.
     *
     * @param $level
     *
     * @return string
     * @throws InvalidArgumentException
     */
    protected function parseLevel($level): string
    {
        if (is_string($level)) {
            return mb_strtoupper($level);
        }

        throw new InvalidArgumentException('Log level must be a string.');
    }
}
