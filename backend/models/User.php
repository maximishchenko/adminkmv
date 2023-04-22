<?php

namespace backend\models;

use common\models\User as commonUser;
use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 */
class User extends commonUser
{

    public $newPassword;

    public $repeatPassword;
    
    const SCENARIO_ADMIN_CREATE = 'adminCreate';
    const SCENARIO_ADMIN_UPDATE = 'adminUpdate';
    const SCENARIO_CONSOLE_CREATE = 'consoleCreate';
    const SCENARIO_CONSOLE_UPDATE = 'consoleUpdate';
    
    const SCENARIO_PROFILE = 'profile';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * Возвращает массив статусов пользователей
     *
     * @return array
     */
    public static function getStatusesArray(): array
    {
        return [
            static::STATUS_ACTIVE => Yii::t('app', 'STATUS_ACTIVE'),
            static::STATUS_INACTIVE => Yii::t('app', 'STATUS_BLOCKED'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'verification_token'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],

            ['status', 'default', 'value' => self::STATUS_ACTIVE, 'on' => self::SCENARIO_ADMIN_CREATE],
            ['status', 'in', 'range' => array_keys(self::getStatusesArray())],

            [['newPassword', 'repeatPassword'], 'required', 'on' => self::SCENARIO_ADMIN_CREATE],
            ['newPassword', 'string', 'min' => 6],
            ['repeatPassword', 'compare', 'compareAttribute' => 'newPassword'],
        ];
    }
    
    
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_ADMIN_CREATE] = ['username', 'email', 'status', 'newPassword', 'newPasswordRepeat'];
        $scenarios[self::SCENARIO_ADMIN_UPDATE] = ['username', 'email', 'status', 'newPassword', 'repeatPassword'];
        $scenarios[self::SCENARIO_CONSOLE_CREATE] = ['username', 'email'];
        $scenarios[self::SCENARIO_CONSOLE_UPDATE] = ['username', 'email'];

        return $scenarios;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
            'newPassword' => Yii::t('app', 'New Password'),
            'repeatPassword' => Yii::t('app', 'Repeat Password'),
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            // $this->auth_key = $this->generateAuthKey();
            $this->generateAuthKey();
            $this->setPassword($this->newPassword);
            return true;
        }
        return false;
    }
}
