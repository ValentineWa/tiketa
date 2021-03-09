<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "eventcategory".
 *
 * @property int $ecategoryId
 * @property string $ecategoryName
 *
 * @property Events[] $events
 */
class Eventcategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'eventcategory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ecategoryName'], 'required'],
            [['ecategoryName'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ecategoryId' => 'Ecategory ID',
            'ecategoryName' => 'Ecategory Name',
        ];
    }

    /**
     * Gets query for [[Events]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Events::className(), ['ecategoryId' => 'ecategoryId']);
    }
}
