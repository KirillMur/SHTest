<?php

namespace app\modules\logger\factory;

use app\modules\logger\interfaces\LoggerInterface;
use app\modules\logger\enums\LoggerEnum;
use app\modules\logger\services\DatabaseLoggerService;
use app\modules\logger\services\FileLoggerService;
use app\modules\logger\services\MailLoggerService;

class LoggerFactory
{
    /**
     * @param string $type
     * @return LoggerInterface|null
     */
    public static function getLogger(string $type): ?LoggerInterface
    {
        return match ($type) {
            LoggerEnum::FILE_TYPE => new FileLoggerService(),
            LoggerEnum::MAIL_TYPE => new MailLoggerService(),
            LoggerEnum::DATABASE_TYPE => new DatabaseLoggerService(),
            default => null,
        };
    }
}
