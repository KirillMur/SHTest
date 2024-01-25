<?php

namespace app\modules\logger\services;

use Yii;

class EmailSenderService
{
    public function sendEmail(string $message): bool
    {
//        $email = Yii::$app->params['loggerEmail'];
//        $pass = Yii::$app->params['loggerEmailPass'];

        return true;
    }
}
