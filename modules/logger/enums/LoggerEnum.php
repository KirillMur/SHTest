<?php

namespace app\modules\logger\enums;

class LoggerEnum
{
    public const FILE_TYPE = 'file';
    public const MAIL_TYPE = 'mail';
    public const DATABASE_TYPE = 'database';

    public const ALL_TYPES = [
        self::FILE_TYPE,
        self::MAIL_TYPE,
        self::DATABASE_TYPE,
    ];
}
