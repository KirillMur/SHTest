<?php

namespace app\modules\logger\controllers;

use app\modules\logger\enums\LoggerEnum;
use app\modules\logger\exceptions\LoggerException;
use app\modules\logger\factory\LoggerFactory;
use app\modules\logger\services\LoggerService;
use app\modules\logger\interfaces\LoggerInterface;
use Yii;
use yii\base\Controller;

/**
 * @property-read string $message
 */
class LoggerController extends Controller
{
    private LoggerInterface $loggerService;

    public function init()
    {
        $this->loggerService = new LoggerService();
        $loggerType = Yii::$app->params['defaultLogger'];

        $this->loggerService->setType($loggerType);
    }

    /**
    • Sends a log message to the default logger.
     */
    public function actionLog(): string
    {
        $message = $this->getMessage();

        try {
            $this->loggerService->send($message);
        } catch (LoggerException) {
            Yii::$app->session->setFlash('error', "Can't save log.");

            return $this->render('result.php', [
                'message' => 'Error occurred'
            ]);
        }

        Yii::$app->session->setFlash('success', "Ok!");

        return $this->render('result.php', [
            'message' => 'Message sent to default logger',
        ]);
    }

    /**
    • Sends a log message to a special logger.
     *
    • @param string $type
     */
    public function actionLogTo(string $type): string
    {
        $message = $this->getMessage();

        try {
            $logger = LoggerFactory::getLogger($type);

            $logger->send($message);
        } catch (LoggerException) {
            Yii::$app->session->setFlash('error', "Can't save log.");

            return $this->render('result.php', [
                'message' => 'Error occurred'
            ]);
        }

        Yii::$app->session->setFlash('success', "Ok!");

        return $this->render('result.php', [
            'message' => 'Message sent to ' . $this->loggerService->getType(),
        ]);
    }

    /**
     * • Sends a log message to all loggers.
     */
    public function actionLogToAll(): string
    {
        $message = $this->getMessage();
        $loggerService = new LoggerService();

        try {
            foreach (LoggerEnum::ALL_TYPES as $type) {
                $loggerService->setType($type);
                $loggerService->send($message);
            }
        } catch (LoggerException) {
            Yii::$app->session->setFlash('error', "Can't save log.");

            return $this->render('result.php', [
                'message' => 'Error occurred'
            ]);
        }

        Yii::$app->session->setFlash('success', "Ok!");

        return $this->render('result.php', [
            'message' => 'Was sent to all Logger types!'
        ]);
    }

    private function getMessage(): string
    {
        //for example Yii::$app->request->post('logMessage')
        $message = '';

        return $message;
    }
}
