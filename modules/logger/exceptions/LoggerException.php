<?php

namespace app\modules\logger\exceptions;

use yii\base\Exception;

class LoggerException extends Exception
{
    /**
     * Defines logger exception constructor
     *
     * @param string $loggerType
     */
    public function __construct(string $loggerType)
    {
        $message = "Logger sender ($loggerType) error";

        parent::__construct($message);
    }
}
