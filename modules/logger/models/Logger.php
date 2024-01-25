<?php

namespace app\modules\logger\models;

use yii\db\ActiveRecord;

/**
 * @property int $id [int(11) unsigned]
 * @property string $message [varchar(255)]
 */
class Logger extends ActiveRecord
{
    public function saveRecord(string $message): bool
    {
//        $this->message = $message;
//
//        return $this->save();

        return true;
    }
}
