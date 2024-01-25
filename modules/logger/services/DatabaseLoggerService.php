<?php

namespace app\modules\logger\services;

use app\modules\logger\enums\LoggerEnum;
use app\modules\logger\exceptions\LoggerException;

class DatabaseLoggerService extends LoggerService
{
    public function __construct()
    {
        $this->setType(LoggerEnum::DATABASE_TYPE);
    }

    /**
     * @inheritDoc
     * @throws LoggerException
     */
    public function send(string $message): void
    {
        if(!(new DBSaverService())->saveData($message)) {
            throw new LoggerException($this->getType());
        }
    }
}
