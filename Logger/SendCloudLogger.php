<?php
namespace SendCloud\SendCloud\Logger;

use DateTimeZone;
use Monolog\Handler\HandlerInterface;
use Monolog\Logger;
use SendCloud\SendCloud\Api\ConfigInterface;
use Stringable;

/**
 * Class SendCloudLogger
 *
 * @package SendCloud\SendCloud\Logger
 */
class SendCloudLogger extends Logger
{
    /**
     * @var ConfigInterface
     */
    private ConfigInterface $config;

    /**
     * SendCloudLogger Constructor.
     *
     * @param ConfigInterface    $config
     * @param string             $name
     * @param HandlerInterface[] $handlers
     * @param callable[]         $processors
     * @param DateTimeZone|null  $timezone
     */
    public function __construct(ConfigInterface $config, string $name, array $handlers = [], array $processors = [], ?DateTimeZone $timezone = null)
    {
        parent::__construct($name, $handlers, $processors, $timezone);
        $this->config = $config;
    }

    /**
     * Adds a log record at the DEBUG level.
     *
     * @param string|Stringable $message
     * @param mixed[]           $context
     */
    public function debug($message, array $context = []): void
    {
        if ($this->checkIfMessageShouldBeLogged(static::DEBUG)) {
            $this->addRecord(static::DEBUG, (string) $message, $context);
        }
    }

    /**
     * Adds a log record at the INFO level.
     *
     * @param string|Stringable $message
     * @param mixed[]           $context
     */
    public function info($message, array $context = []): void
    {
        if ($this->checkIfMessageShouldBeLogged(static::INFO)) {
            $this->addRecord(static::INFO, (string) $message, $context);
        }
    }

    /**
     * Adds a log record at the NOTICE level.
     *
     * @param string|Stringable $message
     * @param mixed[]           $context
     */
    public function notice($message, array $context = []): void
    {
        if ($this->checkIfMessageShouldBeLogged(static::NOTICE)) {
            $this->addRecord(static::NOTICE, (string) $message, $context);
        }
    }

    /**
     * Adds a log record at the WARNING level.
     *
     * @param string|Stringable $message
     * @param mixed[]           $context
     */
    public function warning($message, array $context = []): void
    {
        if ($this->checkIfMessageShouldBeLogged(static::WARNING)) {
            $this->addRecord(static::WARNING, (string) $message, $context);
        }
    }

    /**
     * Adds a log record at the ERROR level.
     *
     * @param string|Stringable $message
     * @param mixed[]           $context
     */
    public function error($message, array $context = []): void
    {
        if ($this->checkIfMessageShouldBeLogged(static::ERROR)) {
            $this->addRecord(static::ERROR, (string) $message, $context);
        }
    }

    /**
     * Adds a log record at the CRITICAL level.
     *
     * @param string|Stringable $message
     * @param mixed[]           $context
     */
    public function critical($message, array $context = []): void
    {
        if ($this->checkIfMessageShouldBeLogged(static::CRITICAL)) {
            $this->addRecord(static::CRITICAL, (string) $message, $context);
        }
    }

    /**
     * Adds a log record at the ALERT level.
     *
     * @param string|Stringable $message The log message
     * @param mixed[]           $context The log context
     */
    public function alert($message, array $context = []): void
    {
        if ($this->checkIfMessageShouldBeLogged(static::ALERT)) {
            $this->addRecord(static::ALERT, (string) $message, $context);
        }
    }

    /**
     * Checks if message should be logged or not.
     *
     * @param int $logLevel
     *
     * @return bool
     */
    private function checkIfMessageShouldBeLogged(int $logLevel): bool
    {
        $minLogLevel = $this->config->getMinimalLogLevel() ?? static::WARNING;

        return $logLevel >= $minLogLevel;
    }
}
