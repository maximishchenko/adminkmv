<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Callback]].
 *
 * @see Callback
 */
class CallbackQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Callback[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Callback|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
