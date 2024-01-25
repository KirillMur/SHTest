<?php

namespace app\modules\logger\services;

use app\modules\logger\enums\LoggerEnum;
use app\modules\logger\exceptions\LoggerException;

class FileLoggerService extends LoggerService
{
    public function __construct()
    {
        $this->setType(LoggerEnum::FILE_TYPE);
    }

    /**
     * @inheritDoc
     * @throws LoggerException
     */
    public function send(string $message): void
    {
        if(!(new FileCreationService())->saveFile($message)) {
            throw new LoggerException($this->getType());
        }
    }
}
