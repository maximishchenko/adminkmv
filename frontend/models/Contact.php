<?php

namespace frontend\models;

use backend\models\Callback;
use Yii;

class Contact extends Callback
{

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        $this->sendCallbackTelegram();
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
}