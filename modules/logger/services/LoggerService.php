<?php

namespace app\modules\logger\services;

use app\modules\logger\exceptions\LoggerException;
use app\modules\logger\factory\LoggerFactory;
use app\modules\logger\interfaces\LoggerInterface;

class LoggerService implements LoggerInterface
{
    private string $type;

    /**
     * @inheritDoc
     * @throws LoggerException
     */
    public function send(string $message): void
    {
        $logger = LoggerFactory::getLogger($this->getType());

        $logger->send($message);
    }

    /**
     * @inheritDoc
     * @throws LoggerException
     */
    public function sendByLogger(string $message, string $loggerType): void
    {
        $this->setType($loggerType);
        $this->send($message);
    }

    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @inheritDoc
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }
}
