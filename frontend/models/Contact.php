<?php

namespace frontend\models;

use backend\models\Callback;
use Yii;

class Contact extends Callback
{
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        
        try {
            $this->sendCallbackTelegram();
        } catch (\Exception $e) {
            Yii::error($e->getMessage());
        }

        try {
            $this->sendCallbackEmail();
        } catch (\Exception $e) {
            Yii::error($e->getMessage());
        }
    }

    protected function setMessageBodyText(): string
    {
        $msg = 'Сообщение формы обратной связи'. PHP_EOL;
        $msg .= "Имя: " . $this->name . PHP_EOL;
        $msg .= "Тел.: " . $this->phone . PHP_EOL;
        // $msg .= "Комментарий: " . $this->comment . PHP_EOL;
        return $msg;
    }

    protected function sendCallbackTelegram()
    {
        $chat_id = Yii::$app->configManager->getItemValue('reportTelegramChatID');
        if (isset($chat_id) && !empty($chat_id)) {

            Yii::$app->telegram->sendMessage([
                'chat_id' => $chat_id,
                'text' => $this->setMessageBodyText(),
            ]);
        } else {
            return Yii::t('app', "Telegram Chat ID is not set");
        }
        return true;
    }

    protected function sendCallbackEmail()
    {
        $emails = explode(',', Yii::$app->configManager->getItemValue('reportEmail'));
        return Yii::$app->mailer->compose()
            ->setTextBody($this->setMessageBodyText())
            ->setFrom(Yii::$app->params['senderEmail'])
            ->setTo($emails)
            ->setSubject(Yii::t('app', 'Default Message Title'))
            ->send();
    }
}