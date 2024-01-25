<?php

namespace app\modules\logger\services;

use app\modules\logger\models\Logger;

class DBSaverService
{
    public function saveData(string $message): bool
    {
        return (new Logger())->saveRecord($message);
    }
}
