<?php

namespace backend\models;

use common\models\Status;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "callback".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $body
 * @property int|null $agreement
 * @property int|null $created_at
 */
class Callback extends \yii\db\ActiveRecord
{

    const AGREEMENT_YES = 1;
    const AGREEMENT_NO = 0;
    
    public function behaviors()
    {
        return[
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => null,
                'value' => function () {
                    return date('U');
                },
            ],
        ];
    } 

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%callback}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body'], 'string'],
            [['agreement', 'created_at'], 'integer'],
            [['name', 'phone', 'email'], 'string', 'max' => 255],

            [['name', 'phone'], 'required'],
            ['agreement', 'compare', 'compareValue' => self::AGREEMENT_YES, 'operator' => '==', 'message' => Yii::t('app', 'Agreement Required')],
        ];
    }

    public static function getAgreementsArray()
    {
        return [
            self::AGREEMENT_YES => Yii::t('app', "Agreement Yes"),
            self::AGREEMENT_NO => Yii::t('app', 'Agreement No'),
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Client Name'),
            'phone' => Yii::t('app', 'Client Phone'),
            'email' => Yii::t('app', 'Client Email'),
            'body' => Yii::t('app', 'Client Body'),
            'agreement' => Yii::t('app', 'Client Agreement'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return CallbackQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CallbackQuery(get_called_class());
    }
}
