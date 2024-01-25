<?php

namespace app\modules\logger\services;

class FileCreationService
{
    public function saveFile(string $message): bool
    {
//        $fp = fopen("folder/log.csv", "wb");
//        fputcsv($fp, (array)$message);
//
//        fclose($fp);

        return true;
    }
}
