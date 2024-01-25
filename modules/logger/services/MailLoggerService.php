<?php

namespace app\modules\logger\services;

use app\modules\logger\enums\LoggerEnum;
use app\modules\logger\exceptions\LoggerException;

class MailLoggerService extends LoggerService
{
    public function __construct()
    {
        $this->setType(LoggerEnum::MAIL_TYPE);
    }

    /**
     * @inheritDoc
     * @throws LoggerException
     */
    public function send(string $message): void
    {
        if(!(new EmailSenderService())->sendEmail($message)) {
            throw new LoggerException($this->getType());
        }
    }
}
